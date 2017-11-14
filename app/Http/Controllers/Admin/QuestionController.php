<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Question;
use App\Area;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    public function index() {
        if(!$this->hasrole('Admin')) { return redirect('/'); }
    	$questions = Question::all();
    	return view('admin.questions.index', compact('questions'));
    }

    public function edit($id) {
        if(!$this->hasrole('Admin')) { return redirect('/'); }
        $question = Question::find($id);
        $areas = Area::all();
        return view('admin.questions.edit', compact('question', 'areas'));
    }

    public function update($id, Request $request) {
        if(!$this->hasrole('Admin')) { return redirect('/'); }

        $question = Question::find($id);
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
        $question->active = true;
        $question->save();

        flash('Record updated')->success();
        return redirect()->action('Admin\QuestionController@index');
    }
    public function destroy($id) {
        if(!$this->hasrole('Admin')) { return redirect('/'); }
        $question = Question::find($id);
        Question::destroy($Question->id);
        flash('Record deleted')->success();
        return redirect()->action('Admin\QuestionController@index');
    }
}
