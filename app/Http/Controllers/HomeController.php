<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Category;
use Illuminate\Http\Request;
use View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $categories = Category::where('parent_id', null)->with(['children' => function ($query){
            return $query->orderBy('order', 'asc');
        }])->orderBy('order', 'asc')->get();
        $slideshow = Banner::orderBy('created_at', 'desc')->get();

        View::share('categories', $categories);
        View::share('slideshow', $slideshow);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
