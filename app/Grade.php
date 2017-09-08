<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    public function career()
    {
        return $this->belongsTo('App\Career');
    }
    public function areas()
    {
        return $this->hasMany('App\Area');
    }
}
