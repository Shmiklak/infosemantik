<?php

namespace App\Http\Controllers\Admin;

use App\Attribute;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ProductsController extends Controller
{
    public function index() {
        return view('admin.products.index');
    }

    public function loadProducts() {
        $products = Product::orderBy('updated_at', 'asc')->get();

        foreach ($products as $key => $product) {
            $data[$key] = [
                "id"=>$product->id,
                "title"=>$product->title,
                "image"=>$product->main_image
            ];
        }

        return response()->json($data);
    }

    public function create() {
        $categories = Category::doesntHave('children')->get();
        return view('admin.products.create')->withCategories($categories);
    }

    public function getAttributes(Request $request) {
        $category = Category::find($request->id);
        $attributes = $category->attributes()->get();

        return response()->json($attributes);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'title'=>'required',
            'description'=>'required',
            'main_image'=>'required|image',
            'category_id'=>'required'
        ]);

        $product = Product::add($request->all());
        $product->uploadImage($request->file('main_image'));
        $product->setAvailable($request->get('is_available'));
        $product->setRecommended($request->get('is_recommended'));
        $product->setBestseller($request->get('is_bestseller'));


        foreach ($request->all() as $key => $attr) {
            if(!is_array($attr)) {
                if (strpos($key, 'image_') !== false) {
                    $product->uploadExtraimages($request->file($key), $key);
                }
            }
        }

        foreach ($request->all() as $key => $attr) {
            if(!is_array($attr)) {
                if (strpos($key, 'attribute') !== false) {
                    $product->setAttributes($request->get($key), $key);
                }
            }
        }

        return redirect()->route('products.index')-with('message', 'Продукт успешно добавлен');
    }

    public function edit($id) {
        $product = Product::find($id);
        return view('admin.products.edit')->withProduct($product);
    }


    public function destroy(Request $request) {
        Product::find($request->id)->remove();
        return response()->json(['success' => 'Операция выполнена.', 'message' => 'Продукт был удален.']);
    }
}
