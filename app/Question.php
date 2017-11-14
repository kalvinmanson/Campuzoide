<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
	public function career()
    {
        return $this->belongsTo('App\Career');
    }
    public function grade()
    {
        return $this->belongsTo('App\Grade');
    }
    public function area()
    {
        return $this->belongsTo('App\Area');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function answers()
    {
        return $this->hasMany('App\Answer');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
