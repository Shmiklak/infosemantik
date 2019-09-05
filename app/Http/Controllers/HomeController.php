<?php

namespace App\Http\Controllers;

use App\Attribute;
use App\Banner;
use App\Category;
use App\Mail\Feedback;
use App\News;
use App\Product;
use App\Subscription;
use App\Useful;
use App\Vendor;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use View;
use App\Menu;
use App\Settings;
use App\Page;
use Illuminate\Validation\Rule;
use App\Rules\Captcha;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $categories = Category::where('parent_id', null)->with(['children' => function ($query) {
            return $query->orderBy('order', 'asc');
        }])->orderBy('order', 'asc')->get();
        $slideshow = Banner::orderBy('created_at', 'desc')->get();
        $vendors = Vendor::orderBy('created_at', 'desc')->get();
        $news = News::orderBy('created_at', 'desc')->take(4)->get();
        $useful = Useful::orderBy('created_at', 'desc')->take(4)->get();
        $menu = Menu::orderBy('order', 'asc')->get();
        $settings = Settings::find(1);

        View::share('categories', $categories);
        View::share('slideshow', $slideshow);
        View::share('vendors', $vendors);
        View::share('news', $news);
        View::share('useful', $useful);
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
        $bestsellers = Product::where('is_bestseller', 1)->orderBy('created_at', 'desc')->get()->paginate(7);
        $recommended = Product::where('is_recommended', 1)->orderBy('created_at', 'asc')->get()->paginate(12);
        return view('home')->withBestsellers($bestsellers)->withRecommended($recommended);
    }

    public function newsPage($slug)
    {
        $single_news = News::where('slug', $slug)->first();

        return view('pages.news_single', compact('single_news'));
    }

    public function news()
    {
        $all_news = News::orderBy('created_at', 'desc')->paginate(5);
        return view('pages.news_listing', compact('all_news'));
    }

    public function usefulPage($slug)
    {
        $post = Useful::where('slug', $slug)->first();

        return view('pages.useful_single', compact('post'));
    }

    public function useful()
    {
        $posts = Useful::orderBy('created_at', 'desc')->paginate(5);
        return view('pages.useful', compact('posts'));
    }

    public function page($slug)
    {
        $page = Page::where('slug', $slug)->first();
        return view('pages.basic', compact('page'));
    }

    public function contactsPage()
    {
        return view('pages.contacts');
    }

    public function feedback(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email|required',
            'subject' => 'required',
            'message' => 'required',
            'captcha_key' => 'required',
            'captcha' => [
                'required',
                new Captcha($request->captcha_key)
            ],
        ]);

        $data = new \stdClass();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->subject = $request->subject;
        $data->message = $request->message;
        Mail::to('shmiklak@gmail.com')->send(New Feedback($data));

        return response()->json(['success' => 'Ваша сообщение доставлено', 'message' => 'Мы с вами свяжемся.']);
    }

    public function newsletter(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|required|unique:subscriptions'
        ]);

        Subscription::create($request->all());

        return response()->json(['success' => 'Вы успешно подписались на рассылку новостей', 'message' => '']);
    }

    public function subscriptionDelete($id)
    {
        Subscription::find($id)->delete();

        return redirect()->route('home')->with('message', 'Ваша подписка на новости отменена');
    }

    public function error404()
    {
        return view('errors.404');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }

    public function loginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            return redirect()->route('admin.index');
        } else {
            return redirect()->back()->with('message', 'Неверный логин или пароль!');
        }
    }

    public function product($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $attributes = $product->loadAttributes();
        return view('products.single')->withProduct($product)->withAttributes($attributes);
    }

    public function sortCatalog(Request $request)
    {
        $request->session()->put('sort', $request->sort);
        return redirect()->back();
    }

    public function category(Request $request, $slug)
    {
        if ($request->session()->get('sort') != null) {
            $sort = $request->session()->get('sort');
        } else {
            $sort = 1;
        }

        $ids = [];
        $categories = Category::where('slug', $slug)->first()->children;
        foreach ($categories as $category) {
            array_push($ids, $category->id);
        }
        $category = Category::where('slug', $slug)->first();
        array_push($ids, $category->id);
        if ($sort == 1) {
            $products = Product::whereIn('category_id', $ids)->orderBy('created_at', 'desc')->paginate(10);
        }
        if ($sort == 2) {
            $products = Product::whereIn('category_id', $ids)->orderBy('created_at', 'asc')->paginate(10);
        }
        if ($sort == 3) {
            $products = Product::whereIn('category_id', $ids)->orderBy('title', 'asc')->paginate(10);
        }
        if ($sort == 4) {
            $products = Product::whereIn('category_id', $ids)->orderBy('title', 'desc')->paginate(10);
        }

        $attributes = Category::where('slug', $slug)->first()->attributes()->get();

        return view('catalog.index')->withCategory($category)->withProducts($products)->withSort($sort)->withAttributes($attributes);
    }

    public function filterCatalog(Request $request, $slug) {
//        dd($request->all());
        if (empty($request->all())) {
            return redirect()->route('category', $slug);
        }
        if ($request->session()->get('sort') != null) {
            $sort = $request->session()->get('sort');
        } else {
            $sort = 1;
        }

        $ids = [];
        $categories = Category::where('slug', $slug)->first()->children;
        foreach ($categories as $category) {
            array_push($ids, $category->id);
        }
        $category = Category::where('slug', $slug)->first();
        array_push($ids, $category->id);

        $filterIds = [];

        foreach ($request->filter as $key=>$item) {
            $filterIds[] = DB::table('product_attributes')->where('attribute_id', $key)->where('value', $item)->pluck('product_id');
        }

        $attributes = Category::where('slug', $slug)->first()->attributes()->get();

        $filterIdsUnique = array_unique($filterIds)[0];

        if(count($filterIdsUnique) < 1) {
            return view('catalog.empty')->withCategory($category)->withAttributes($attributes);
        }

        if ($sort == 1) {
            $products = Product::whereIn('category_id', $ids)->whereIn('id', $filterIdsUnique)->orderBy('created_at', 'desc')->paginate(10);
        }
        if ($sort == 2) {
            $products = Product::whereIn('category_id', $ids)->whereIn('id', $filterIdsUnique)->orderBy('created_at', 'asc')->paginate(10);
        }
        if ($sort == 3) {
            $products = Product::whereIn('category_id', $ids)->whereIn('id', $filterIdsUnique)->orderBy('title', 'asc')->paginate(10);
        }
        if ($sort == 4) {
            $products = Product::whereIn('category_id', $ids)->whereIn('id', $filterIdsUnique)->orderBy('title', 'desc')->paginate(10);
        }



        return view('catalog.index')->withCategory($category)->withProducts($products)->withSort($sort)->withAttributes($attributes);
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $attributes = DB::table('product_attributes')->where('value', 'like', '%' . $search . '%')->get();

        $ids = [];

        foreach ($attributes as $attribute) {
            array_push($ids, $attribute->product_id);
        }

        $products = Product::whereIn('id', $ids)->orWhere('title', 'like', '%' . $search . '%')->orWhere('description', 'like', '%' . $search . '%')->orderBy('created_at', 'desc')->get();
        $news = News::where('title', 'like', '%' . $search . '%')
            ->orWhere('content', 'like', '%' . $search . '%')
            ->orderBy('created_at')->get();
        $posts = Useful::where('title', 'like', '%' . $search . '%')
            ->orWhere('content', 'like', '%' . $search . '%')
            ->orderBy('created_at')->get();

        $results = [];
        foreach ($products as $item) {
            $results[] = [
                "image" => $item->main_image,
                "title" => $item->title,
                "description" => $item->short_description,
                "type" => "product",
                "slug" => $item->slug,
                "created_at" => $item->created_at
            ];
        }
        foreach ($news as $item) {
            $results[] = [
                "image" => $item->image,
                "title" => $item->title,
                "description" => $item->shortDescription(),
                "type" => "news",
                "slug" => $item->slug,
                "created_at" => $item->created_at
            ];
        }
        foreach ($posts as $item) {
            $results[] = [
                "image" => $item->image,
                "title" => $item->title,
                "description" => $item->shortDescription(),
                "type" => "useful",
                "slug" => $item->slug,
                "created_at" => $item->created_at
            ];
        }

        $paginatedResults = collect($results)->paginate(8);

        View::share('searchQuery', $search);
        return view('search')->withResults($paginatedResults);
    }

    public function addToComparison(Request $request)
    {
        $product = Product::find($request->id);
        $currentComparison = request()->session()->get('comparison');

        if (isset($currentComparison)) {

            foreach ($currentComparison as $key => $item) {
                if ($item->id == $product->id) {
                    return response()->json(['title' => 'Вы не можете добавить один продукт дважды.', 'message' => '', 'type' => 'error']);
                }
                if ($item->category_id != $product->category_id) {
                    return response()->json(['title' => 'Вы не можете добавить продукты из разных категорий.', 'message' => '', 'type' => 'error']);
                }
            }


            if (count($currentComparison) == 3) {
                return response()->json(['title' => 'Вы не можете сравнить более трёх продуктов', 'message' => 'Удалите некоторые продукты из списка сравнения, чтобы добавить новые', 'type' => 'error']);
            }
        }

        $request->session()->push('comparison', $product);
        $count = count(request()->session()->get('comparison'));

        return response()->json(['title' => 'Продукт успешно добавлен в список сравнения', 'message' => '', 'type' => 'success', 'count' => $count]);
    }

    public function compare()
    {
        $products = request()->session()->get('comparison');

        if ($products == null) {
            return view('catalog.comparison_empty');
        }

        $attributesList = $products[0]->loadAttributes();

        $attributesNames = [];

        foreach ($attributesList as $key => $attribute) {
            $attributesNames[] = [
                "title" => $products[0]->getAttributeName($attribute->attribute_id),
                "id" => $attribute->attribute_id
            ];
        }

        return view('catalog.comparison')->withProducts($products)->withAttributesNames($attributesNames);
    }

    public function removeFromComparison(Request $request)
    {
        $products = request()->session()->get('comparison');

        if (count($products) > 1) {
            foreach ($products as $key => $product) {
                if ($product->id == $request->id) {
                    array_splice($products, $key, 1);
                    request()->session()->put('comparison', $products);
                    return redirect()->back();
                }
            }
        }
        else {
            request()->session()->forget('comparison');
            return redirect()->back();
        }
    }
}
