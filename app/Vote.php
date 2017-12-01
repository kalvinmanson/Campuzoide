<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
	public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
    public function content()
    {
        return $this->belongsTo('App\Content');
    }
    public function question()
    {
        return $this->belongsTo('App\Question');
    }
    public function topic()
    {
        return $this->belongsTo('App\Topic');
    }
    public function reply()
    {
        return $this->belongsTo('App\Reply');
    }
}
