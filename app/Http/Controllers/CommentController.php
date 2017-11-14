<?php

namespace App\Http\Controllers;

use Auth;
use App\Comment;
use App\Career;
use App\Area;
use App\Answer;
use App\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index() {
    	$careers = Career::all();
    	return view('questions.index', compact('careers'));
    }
    
    public function create() {
        $comment = new Comment;
        $areas = Area::orderBy('grade_id')->get();
        return view('questions.create', compact('question', 'areas'));
    }

    public function store(Request $request) {

    }

    public function edit($id) {
        $comment = Comment::where('id', $id)->where('user_id', Auth::user()->id)->first();
        $areas = Area::orderBy('grade_id')->get();
        return view('questions.edit', compact('question', 'areas'));
    }

    public function update($id, Request $request) {
        
        $comment = Comment::where('id', $id)->where('user_id', Auth::user()->id)->first();

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
        $comment->save();

        flash('La prgeunta se ha actualizado y está pendiente de aprobacion.')->success();
        return redirect()->action('CommentController@cooperate');
    }
}
