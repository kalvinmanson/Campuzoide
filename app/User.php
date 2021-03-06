<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password', 'confirmed',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function questions()
    {
        return $this->hasMany('App\Question');
    }
    public function votes()
    {
        return $this->hasMany('App\Vote');
    }
    public function country()
    {
        return $this->belongsTo('App\Country');
    }
    public function institution()
    {
        return $this->belongsTo('App\Institution');
    }
    public function career()
    {
        return $this->belongsTo('App\Career');
    }
    public function grade()
    {
        return $this->belongsTo('App\Grade');
    }
}
