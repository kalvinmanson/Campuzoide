<?php

namespace App\Http\Controllers;

use Auth;
use App\Question;
use App\Career;
use App\Area;
use App\Answer;
use App\User;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index() {
    	$careers = Career::all();
    	return view('questions.index', compact('careers'));
    }
    public function show($code) {
        $question = Question::where('code', $code)->first();
        //si no esta activa
        if(!$question || ($question->active == 0 && $question->user != Auth::user())) {
            flash('No tienes permisos para ver esta pregunta.')->error();
            return redirect()->action('WebController@index');
        }
        return view('questions.show', compact('question'));
    }
    public function challenge(Request $request) {

        $question = Question::where('active', true)->inRandomOrder()->get();
    	
    	if($request->career_id) {
    		$question = $question->where('career_id', $request->career_id);
    	} elseif($request->grade_id) {
            $question = $question->where('grade_id', $request->grade_id);
        } elseif($request->area_id) {
            $question = $question->where('area_id', $request->area_id);
        }

        //validate previws response
        $userResponses = Answer::where('user_id', Auth::user()->id)->pluck('question_id')->toArray();
        $question = $question->whereNotIn('id', $userResponses);

        $question = $question->first();

        if(!$question) {
            flash('Ya has respondido a todas las preguntas disponibles de esta categoría, intenta con otra categoria o vuelve mañana para encontrar más preguntas.')->success();
            return redirect()->action('QuestionController@index');
        }

        //create answer        
        $answer = new Answer();
        $answer->question_id = $question->id;
        $answer->user_id = Auth::user()->id;
        $answer->save();

        $url = $request->fullUrl();
    	return view('questions.challenge', compact('question', 'url'));
    }
    public function answer(Request $request) {
        $question = Question::where('active', true)->where('id', $request->question_id)->first();
        $answer = Answer::where('user_id', Auth::user()
            ->id)->where('question_id', $question->id)
            ->orderBy('created_at', 'desc')
            ->first();

        //si respone bien        
        if($request->answer == $question->correct) { 
            $answer->result = 1;
            $answer->time = $request->timePlayer;
            $answer->save();
        }
        $this->recalcularUser();
        $this->recalcularQuestion($question->id);
        $url = $request->url;
        return view('questions.result', compact('answer', 'url'));
    }

    public function cooperate() {
        $myQuestions = Question::where('user_id', Auth::user()->id)->paginate(20);
        return view('questions.cooperate', compact('myQuestions'));
    }
    public function create() {

        $question = new Question;
        $areas = Area::orderBy('grade_id')->get();
        return view('questions.create', compact('question', 'areas'));
    }

    public function store(Request $request) {
        $this->validate(request(), [
            'area_id' => ['required'],
            'name' => ['required', 'max:255'],
            'option_a' => ['required', 'max:255'],
            'option_b' => ['required', 'max:255'],
            'option_c' => ['required', 'max:255'],
            'option_d' => ['required', 'max:255'],
            'time' => ['required'],
            'correct' => ['required'],
        ]);

        $area = Area::find($request->area_id);

        $question = new Question;
        $question->user_id = Auth::user()->id;
        $question->career_id = $area->grade->career->id;
        $question->grade_id = $area->grade->id;
        $question->area_id = $area->id;
        $question->code = rand(1000,9999)."-".rand(1000,9999)."-".rand(1000,9999)."-".rand(1000,9999);
        $question->name = $request->name;
        $question->picture = $request->picture;
        $question->content = $request->content;
        $question->option_a = $request->option_a;
        $question->option_b = $request->option_b;
        $question->option_c = $request->option_c;
        $question->option_d = $request->option_d;
        $question->correct = $request->correct;
        $question->time = $request->time;
        $question->tags = $request->tags;
        $question->save();

        flash('Tu pregunta ha sido guardada y enviada para su revisión, una vez que sea aprobada empezara a aparecer en los desafios de preguntas.')->success();
        return redirect()->action('QuestionController@index');
    }

    public function edit($id) {
        $question = Question::where('id', $id)->where('user_id', Auth::user()->id)->first();
        $areas = Area::orderBy('grade_id')->get();
        return view('questions.edit', compact('question', 'areas'));
    }

    public function update($id, Request $request) {
        
        $question = Question::where('id', $id)->where('user_id', Auth::user()->id)->first();
        $area = Area::find($request->area_id);

        $this->validate(request(), [
            'area_id' => ['required'],
            'name' => ['required', 'max:255'],
            'option_a' => ['required', 'max:255'],
            'option_b' => ['required', 'max:255'],
            'option_c' => ['required', 'max:255'],
            'option_d' => ['required', 'max:255'],
            'time' => ['required'],
            'correct' => ['required'],
        ]);
        
        $question->career_id = $area->grade->career->id;
        $question->grade_id = $area->grade->id;
        $question->area_id = $area->id;
        $question->name = $request->name;
        $question->picture = $request->picture;
        $question->content = $request->content;
        $question->option_a = $request->option_a;
        $question->option_b = $request->option_b;
        $question->option_c = $request->option_c;
        $question->option_d = $request->option_d;
        $question->correct = $request->correct;
        $question->time = $request->time;
        $question->tags = $request->tags;
        $question->active = false;
        $question->save();

        flash('La prgeunta se ha actualizado y está pendiente de aprobacion.')->success();
        return redirect()->action('QuestionController@cooperate');
    }

    private function recalcularUser() {
        $answers = Answer::where('user_id', Auth::user()->id)->get();
        $total = $answers->count();
        $correctas = $answers->where('result', true)->count();
        if($correctas > 0) {
            $rank = ($correctas / $total) * 100;
        } else {
            $rank = 0;
        }
        Auth::user()->rank = $rank;
        Auth::user()->save();
        return true;
    }
    private function recalcularQuestion($id) {
        $question = Question::find($id);
        $answers = Answer::where('question_id', $question->id)->get();
        $total = $answers->count();
        $incorrectas = $answers->where('result', false)->count();
        if($incorrectas > 0) {
            $rank = ($incorrectas / $total) * 100;
        } else {
            $rank = 0;
        }
        $question->rank = $rank;
        $question->save();
        return true;
    }
}
