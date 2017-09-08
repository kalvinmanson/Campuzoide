<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::all();
    	return view('categories.index', compact('categories'));
    }
    
}
