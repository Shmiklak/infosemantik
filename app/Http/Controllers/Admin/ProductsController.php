<?php

namespace App\Http\Controllers\Admin;

use App\Attribute;
use App\Category;
use App\Exports\ProductsExport;
use App\Exports\ProductsExportEmpty;
use App\SEO;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use Illuminate\Support\Facades\Storage;

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

    public function getAttributesValues(Request $request) {
        $product = Product::find($request->id);
        $attributes = $product->loadAttributes();

        foreach ($attributes as $key => $attribute) {
            $data[$key] = [
                "field"=>"attribute-".$attribute->attribute_id,
                "value"=>$attribute->value,
            ];
        }

        return response()->json($data);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'title'=>'required',
            'custom_id'=>'required|unique:products',
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

        $seoSettings = SEO::create(['site_name'=>$product->title, 'path'=>'products/'.$product->slug, 'description'=>$product->short_description]);

        return redirect()->route('products.index')->with('message', 'Продукт успешно добавлен');
    }

    public function edit($id) {
        $product = Product::find($id);
        $categories = Category::doesntHave('children')->get();
        return view('admin.products.edit')->withProduct($product)->withCategories($categories);
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'title'=>'required',
            'custom_id'=>'required',
            'description'=>'required',
            'category_id'=>'required'
        ]);

        $product = Product::find($id);
        $product->edit($request->all());
        $product->slug = $request->get('slug');
        $product->save();
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

        return redirect()->route('products.index')->with('message', 'Продукт успешно изменен');
    }


    public function destroy(Request $request) {
        Product::find($request->id)->remove();
        return response()->json(['success' => 'Операция выполнена.', 'message' => 'Продукт был удален.']);
    }

    public function export() {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

    public function exportEmpty() {
        return Excel::download(new ProductsExportEmpty, 'template.xlsx');
    }

    public function import(Request $request)
    {
        Product::truncate();
        DB::table('product_attributes')->truncate();

        Excel::import(new ProductsImport, request()->file('excel'));
        return redirect()->route('products.index')->with('message', 'База данных продуктов успешно обновлена');
    }

    public function importNew(Request $request)
    {
        Excel::import(new ProductsImport, request()->file('excel'));
        return redirect()->route('products.index')->with('message', 'База данных продуктов успешно обновлена');
    }

    public function images() {
        $files = Storage::drive('local')->allFiles('uploads/products');
        return view('admin.products.images')->withFiles($files);
    }

    public function uploadImages(Request $request) {
        $files = $request->file('images');
        if($request->hasFile('images'))
        {
            foreach ($files as $file) {
                $file->storeAs('uploads/products/', $file->getClientOriginalName());
            }
        }
        return redirect()->route('products.images');
    }

    public function deleteImage(Request $request) {
        unlink($request->file);
        return response()->json(['success' => 'Операция выполнена.', 'message' => 'Изображение было удалено.']);
    }
}
