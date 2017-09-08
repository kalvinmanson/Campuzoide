<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Country;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
    public function index() {
        if(!$this->hasrole('Admin')) { return redirect('/'); }
    	$countries = Country::all();
    	return view('admin.countries.index', compact('countries'));
    }
    public function store(Request $request) {
        if(!$this->hasrole('Admin')) { return redirect('/'); }
    	$this->validate(request(), [
            'name' => ['required', 'max:100'],
            'domain' => ['required', 'max:150'],
            'code' => ['unique:countries', 'required', 'max:50']
        ]);

        $country = new Country;
        $country->name = $request->name;
        $country->domain = $request->domain;
        $country->code = $request->code;
        $country->configs = '{}';

        $country->save();
        flash('Record created')->success();
        return redirect()->action('Admin\CountryController@index');

    }

    public function edit($id) {
        if(!$this->hasrole('Admin')) { return redirect('/'); }
        $country = Country::find($id);
        return view('admin.countries.edit', compact('country'));
    }

    public function update($id, Request $request) {
        if(!$this->hasrole('Admin')) { return redirect('/'); }
        $country = Country::find($id);

        $this->validate(request(), [
            'name' => ['required', 'max:100'],
            'domain' => ['required', 'max:150'],
            'code' => ['unique:countries,code,'.$country->id, 'required', 'max:50']
        ]);
        
        $country->name = $request->name;
        $country->domain = $request->domain;
        $country->code = $request->code;
        if(is_array($request->config) > 0) {
            $country->configs = json_encode(array_filter($request->config));    
        }

        $country->save();
        flash('Record updated')->success();
        return redirect()->action('Admin\CountryController@index');
    }
}
