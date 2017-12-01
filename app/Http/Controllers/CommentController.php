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
    	
    }
    
    public function create() {
        
    }

    public function store(Request $request) {

        $this->validate(request(), [
            'content' => ['required', 'max:255', 'min:20'],
        ]);

        $comment = new Comment;
        $comment->user_id = Auth::user()->id;
        $comment->question_id = $request->question_id;
        $comment->post_id = $request->post_id;
        $comment->content_id = $request->content_id;
        $comment->content = nl2br(strip_tags($request->content));
        $comment->report = ($request->report == 1 ? 1 : 0);
        $comment->save();

        flash('Comentario agregado.')->success();
        if($comment->question_id > 0) {
            return redirect()->action('QuestionController@show', $comment->question->code);
        } elseif($comment->post_id > 0) {
            return redirect()->action('Aula\PostController@show', $comment->post->slug);
        }
    }

    public function edit($id) {
        
    }

    public function update($id, Request $request) {
        
    }
}
