<?php

namespace App\Http\Controllers;

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

        View::share('categories', $categories);
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
