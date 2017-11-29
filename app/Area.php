<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public function grade()
    {
        return $this->belongsTo('App\Grade');
    }
    public function contents()
    {
        return $this->hasMany('App\Content');
    }
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    public function topics()
    {
        return $this->hasMany('App\Topic');
    }
}
