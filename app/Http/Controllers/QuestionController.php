<?php

namespace App\Http\Controllers;

use Auth;
use App\Question;
use App\Career;
use App\Area;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index() {
    	$careers = Career::all();
    	return view('questions.index', compact('careers'));
    }
    public function challenge(Request $request) {
    	
    	if($request->career_id) {
    		$question = Question::where()->first();
    	} elseif($request->grade_id) {
    		$question = Question::where()->first();
    	}
    	return view('questions.challenge', compact('question'));
    }
    public function cooperate() {
        $myQuestions = Question::where('user_id', Auth::user()->id)->paginate(20);
        return view('questions.cooperate', compact('myQuestions'));
    }
    public function create(Request $request) {

        if ($request->isMethod('post')) {
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

        $question = new Question;
        $areas = Area::orderBy('grade_id')->get();
        return view('questions.create', compact('question', 'areas'));
    }
}
