<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Area;
use App\Grade;
use App\Http\Controllers\Controller;

class AreaController extends Controller
{
    public function index() {
        if(!$this->hasrole('Admin')) { return redirect('/'); }
    	$areas = Area::all();
        $grades = Grade::all();
    	return view('admin.areas.index', compact('areas', 'grades'));
    }
    public function store(Request $request) {
        if(!$this->hasrole('Admin')) { return redirect('/'); }
    	$this->validate(request(), [
            'name' => ['required', 'max:150']
        ]);
        $area = new Area;
        $area->name = $request->name;
        $area->grade_id = $request->grade_id;
        $area->save();
        flash('Record created')->success();
        return redirect()->action('Admin\AreaController@index');
    }
    public function edit($id) {
        if(!$this->hasrole('Admin')) { return redirect('/'); }
        $area = Area::find($id);
        $grades = Grade::all();
        return view('admin.areas.edit', compact('area', 'grades'));
    }

    public function update($id, Request $request) {
        if(!$this->hasrole('Admin')) { return redirect('/'); }

        $area = Area::find($id);
        $this->validate(request(), [
            'name' => ['required', 'max:150'],
            'slug' => ['unique:areas,slug,'.$area->id, 'required', 'max:100']
        ]);
        
        $area->name = $request->name;
        $area->slug = $request->slug;
        $area->grade_id = $request->grade_id;
        $area->save();

        flash('Record updated')->success();
        return redirect()->action('Admin\AreaController@index');
    }
    public function destroy($id) {
        if(!$this->hasrole('Admin')) { return redirect('/'); }
        $area = Area::find($id);
        Area::destroy($Area->id);
        flash('Record deleted')->success();
        return redirect()->action('Admin\AreaController@index');
    }
}
