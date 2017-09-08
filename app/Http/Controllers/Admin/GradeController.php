<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Grade;
use App\Career;
use App\Http\Controllers\Controller;

class GradeController extends Controller
{
    public function index() {
        if(!$this->hasrole('Admin')) { return redirect('/'); }
    	$grades = Grade::all();
        $careers = Career::all();
    	return view('admin.grades.index', compact('grades', 'careers'));
    }
    public function store(Request $request) {
        if(!$this->hasrole('Admin')) { return redirect('/'); }
    	$this->validate(request(), [
            'name' => ['required', 'max:150']
        ]);
        $grade = new Grade;
        $grade->name = $request->name;
        $grade->career_id = $request->career_id;
        $grade->save();
        flash('Record created')->success();
        return redirect()->action('Admin\GradeController@index');
    }
    public function edit($id) {
        if(!$this->hasrole('Admin')) { return redirect('/'); }
        $grade = Grade::find($id);
        $careers = Career::all();
        return view('admin.grades.edit', compact('grade', 'careers'));
    }

    public function update($id, Request $request) {
        if(!$this->hasrole('Admin')) { return redirect('/'); }

        $grade = Grade::find($id);
        $this->validate(request(), [
            'name' => ['required', 'max:150']
        ]);
        
        $grade->name = $request->name;
        $grade->career_id = $request->career_id;
        $grade->save();

        flash('Record updated')->success();
        return redirect()->action('Admin\GradeController@index');
    }
    public function destroy($id) {
        if(!$this->hasrole('Admin')) { return redirect('/'); }
        $grade = Grade::find($id);
        Grade::destroy($Grade->id);
        flash('Record deleted')->success();
        return redirect()->action('Admin\GradeController@index');
    }
}
