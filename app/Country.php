<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function pages()
    {
        return $this->hasMany('App\Page')->orderBy('weight');
    }
    public function fields()
    {
        return $this->hasMany('App\Field')->orderBy('name');
    }
}
