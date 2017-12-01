<?php

namespace App\Http\Controllers\Aula;

use Illuminate\Http\Request;
use App\Area;
use App\Http\Controllers\Controller;

class AreaController extends Controller
{
    public function index($slug) {
    	$area = Area::where('slug', $slug)->first();
    	return view('aula.areas.index', compact('area'));
    }
}
