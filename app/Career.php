<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    public function grades()
    {
        return $this->hasMany('App\Grade');
    }
}
