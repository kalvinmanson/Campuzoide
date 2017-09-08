<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
	public function profile($username) {
		//validate user
		$user = User::where('username', $username)->first();
    	return view('users.profile', compact('user'));
	}
    
}
