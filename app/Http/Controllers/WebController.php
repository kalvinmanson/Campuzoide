<?php

namespace App\Http\Controllers;
use App\Category;
use App\Page;
use App\Question;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $lastQuestions = Question::where('active', 1)->orderBy('created_at', 'desc')->limit(5)->get();
        return view('web.index', compact('lastQuestions'));
    }
    public function category($slug)
    {
    	$country = $this->country();
        $category = Category::where('slug', $slug)->first();
        $pages = Page::where('category_id', $category->id)->paginate(10);
        if (view()->exists('web/category-'.$slug)) {
            return view('web/category-'.$slug, compact('category', 'pages'));
        } else {
            return view('web/category', compact('category', 'pages'));
        }
    }
    public function page($category, $slug)
    {
    	$country = $this->country();
        $page = Page::where('slug', $slug)->first();

        if (view()->exists('web.page-cat-'.$category)) {
            return view('web/page-cat-'.$category, compact('page'));
        } else {
            return view('web/page', compact('page'));
        }
    }
}
