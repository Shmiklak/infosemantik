<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Category;
use App\Mail\Feedback;
use App\News;
use App\Subscription;
use App\Vendor;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use View;
use App\Menu;
use App\Settings;
use App\Page;

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

    public function page($slug) {
        $page = Page::where('slug', $slug)->first();
        return view('pages.basic', compact('page'));
    }

    public function contactsPage() {
        return view('pages.contacts');
    }

    public function feedback(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email|required',
            'subject' => 'required',
            'message' => 'required',
            'recaptcha' => 'required|recaptcha:login',
        ]);

        $data = new \stdClass();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->subject = $request->subject;
        $data->message = $request->message;
        Mail::to('shmiklak@gmail.com')->send(New Feedback($data));

        return response()->json(['success' => 'Ваша сообщение доставлено', 'message' => 'Мы с вами свяжемся.']);
    }

    public function newsletter(Request $request) {
        $this->validate($request, [
            'email' => 'email|required|unique:subscriptions'
        ]);

        Subscription::create($request->all());

        return response()->json(['success' => 'Вы успешно подписались на рассылку новостей', 'message' => '']);
    }

    public function subscriptionDelete($id) {
        Subscription::find($id)->delete();

        return redirect()->route('home')->with('message', 'Ваша подписка на новости отменена');
    }
}
