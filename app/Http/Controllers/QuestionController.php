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

        $question = new Question;
        $areas = Area::all();
        return view('questions.create', compact('question', 'areas'));
    }
}
