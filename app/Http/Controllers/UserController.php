<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Institution;
use App\Grade;
use App\Country;
use Illuminate\Http\Request;

class UserController extends Controller
{
	public function show($username) {
		//validate user
		$user = User::where('username', $username)->first();
		$institutions = Institution::all();
		$grades = Grade::all();
		$countries = Country::all();
    	return view('users.profile', compact('user', 'institutions', 'grades', 'countries'));
	}
	public function update($id, Request $request) {
		//validate user
		$user = User::find($id);
		if(Auth::check() && Auth::user()->id == $user->id) {
			$this->validate(request(), [
	            'name' => ['required', 'min:5', 'max:30']
	        ]);
			$user->institution_id = $request->institution_id;
			$user->country_id = $request->country_id;
			$user->gender = $request->gender;
			$user->name = $request->name;
			$user->phone = $request->phone;
			$user->address = $request->address;
			$user->birthdate = $request->birthdate;
			$user->description = strip_tags($request->description);
			
	        //si baja de ranking
	        if($request->grade_id < $user->grade_id) {
	        	$user->rank = 0;
	        }

	        $user->grade_id = $request->grade_id;
			$user->career_id = $user->grade->career->id;

			$user->save();

			flash('Tu perfil ha sido actualizado')->success();
        	return redirect()->action('UserController@show', $user->username);

		} else {
			flash('No tienes permisos para realizar esta acción')->error();
        	return redirect()->action('UserController@show', $user->username);

		}
	}
    
}
