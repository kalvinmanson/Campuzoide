<?php

namespace App\Http\Controllers;
use App\Category;
use App\Page;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        return view('web.index');
    }
    public function category($slug)
    {
    	$country = $this->country();
        $category = Category::where('slug', $slug)->first();
        return view('web.category', compact('category'));
    }
    public function page($category, $slug)
    {
    	$country = $this->country();
        $page = Page::where('slug', $slug)->first();

        return view('web.page', compact('page'));
    }
}
