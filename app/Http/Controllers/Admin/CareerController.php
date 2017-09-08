<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Career;
use App\Http\Controllers\Controller;

class CareerController extends Controller
{
    public function index() {
        if(!$this->hasrole('Admin')) { return redirect('/'); }
    	$careers = Career::all();
    	return view('admin.careers.index', compact('careers'));
    }
    public function store(Request $request) {
        if(!$this->hasrole('Admin')) { return redirect('/'); }
    	$this->validate(request(), [
            'name' => ['required', 'max:150']
        ]);

        $career = new Career;
        $career->name = $request->name;
        $career->save();
        flash('Record created')->success();
        return redirect()->action('Admin\CareerController@index');
    }

    public function edit($id) {
        if(!$this->hasrole('Admin')) { return redirect('/'); }
        $career = Career::find($id);
        return view('admin.careers.edit', compact('career'));
    }

    public function update($id, Request $request) {
        if(!$this->hasrole('Admin')) { return redirect('/'); }

        $career = Career::find($id);
        $this->validate(request(), [
            'name' => ['required', 'max:150']
        ]);
        
        $career->name = $request->name;
        $career->save();

        flash('Record updated')->success();
        return redirect()->action('Admin\CareerController@index');
    }
    public function destroy($id) {
        if(!$this->hasrole('Admin')) { return redirect('/'); }
        $career = Career::find($id);
        Career::destroy($Career->id);
        flash('Record deleted')->success();
        return redirect()->action('Admin\CareerController@index');
    }
}
