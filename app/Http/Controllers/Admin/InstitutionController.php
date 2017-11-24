<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Institution;
use App\Country;
use App\Http\Controllers\Controller;

class InstitutionController extends Controller
{
    public function index() {
        if(!$this->hasrole('Admin')) { return redirect('/'); }
    	$institutions = Institution::all();
        $countries = Country::all();
    	return view('admin.institutions.index', compact('institutions', 'countries'));
    }
    public function store(Request $request) {
        if(!$this->hasrole('Admin')) { return redirect('/'); }
    	$this->validate(request(), [
            'name' => ['required', 'max:150']
        ]);
        $institution = new Institution;
        $institution->name = $request->name;
        $institution->slug = str_slug($request->name, '-');
        $institution->country_id = $request->country_id;
        $institution->save();
        flash('Record created')->success();
        return redirect()->action('Admin\InstitutionController@index');
    }
    public function edit($id) {
        if(!$this->hasrole('Admin')) { return redirect('/'); }
        $institution = Institution::find($id);
        $countries = Country::all();
        return view('admin.institutions.edit', compact('grade', 'countries'));
    }

    public function update($id, Request $request) {
        if(!$this->hasrole('Admin')) { return redirect('/'); }

        $institution = Institution::find($id);
        $this->validate(request(), [
            'name' => ['required', 'max:150']
        ]);
        
        $institution->name = $request->name;
        $institution->country_id = $request->country_id;
        $institution->save();

        flash('Record updated')->success();
        return redirect()->action('Admin\InstitutionController@index');
    }
    public function destroy($id) {
        if(!$this->hasrole('Admin')) { return redirect('/'); }
        $institution = Institution::find($id);
        Institution::destroy($Institution->id);
        flash('Record deleted')->success();
        return redirect()->action('Admin\InstitutionController@index');
    }
}
