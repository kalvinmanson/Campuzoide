<?php

namespace App\Http\Controllers;

use App\Question;
use App\Career;
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
}
