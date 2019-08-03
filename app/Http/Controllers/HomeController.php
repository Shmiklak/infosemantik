<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Category;
use App\News;
use App\Vendor;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use View;
use App\Menu;
use App\Settings;

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
        $vendors = Vendor::orderBy('created_at', 'desc')->get();
        $news = News::orderBy('created_at', 'desc')->take(4)->get();
        $menu = Menu::orderBy('order', 'asc')->get();
        $settings = Settings::find(1);

        View::share('categories', $categories);
        View::share('slideshow', $slideshow);
        View::share('vendors', $vendors);
        View::share('news', $news);
        View::share('menu', $menu);
        View::share('settings', $settings);
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

    public function newsPage($slug) {
        $single_news = News::where('slug', $slug)->first();

        return view('pages.news_single', compact('single_news'));
    }

    public function news() {
        $all_news = News::orderBy('created_at', 'desc')->paginate(5);
        return view('pages.news_listing', compact('all_news'));
    }
}
