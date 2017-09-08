<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    public function country()
    {
        return $this->belongsTo('App\Country');
    }
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function page()
    {
        return $this->belongsTo('App\Page');
    }
}
