<?php

namespace App\Http\Controllers;

use Auth;
use App\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{

    public function store(Request $request) {

        $vote = new Vote;
        $vote->user_id = Auth::user()->id;
        $vote->question_id = 0;
        $vote->post_id = 0;
        $vote->content_id = 0;
        $vote->topic_id = 0;
        $vote->reply_id = 0;
        if($request->type == "question") { $vote->question_id = $request->id; }
        if($request->type == "post") { $vote->post_id = $request->id; }
        if($request->type == "content") { $vote->content_id = $request->id; }
        if($request->type == "topic") { $vote->topic_id = $request->id; }
        if($request->type == "reply") { $vote->reply_id = $request->id; }

        // validate
        $valVote = Vote::where('user_id', Auth::user()->id)
            ->where('question_id', $vote->question_id)
            ->where('post_id', $vote->post_id)
            ->where('content_id', $vote->content_id)
            ->where('topic_id', $vote->topic_id)
            ->where('reply_id', $vote->reply_id)
            ->get();

        if($valVote->count() == 0) {
            $vote->save();    
        }        

        if($vote->question_id > 0) {
            return $vote->question->votes->count();
        } elseif($vote->post_id > 0) {
            return $vote->post->votes->count();
        }
    }

    public function edit($id) {
        
    }

    public function update($id, Request $request) {
        
    }
}
