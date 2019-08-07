<?php

namespace App\Http\Controllers\Admin;

use App\Attribute;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttributesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::doesntHave('children')->get();
        $attributes = Attribute::orderBy('updated_at', 'asc')->get();
        return view('admin.attributes.index')->withCategories($categories)->withAttributes($attributes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'title'=>'required',
        ]);
        $attribute = Attribute::create($request->all());
        $attribute->toggleCKEditor($request->has_ckeditor);
        $attribute->setCategories($request->categories);
        $attribute->save();
        return response()->json(['success' => 'Операция выполнена.', 'message' => 'Атрибут был добавлен.']);
    }

    public function data() {
        $attributes = Attribute::orderBy('updated_at', 'asc')->get();

        foreach ($attributes as $key => $attribute) {
            $data[$key] = [
                "id"=>$attribute->id,
                "title"=>$attribute->title,
                "has_ckeditor"=>$attribute->has_ckeditor,
                "categories"=>$attribute->categories()->pluck('category_id')
            ];
        }
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
        ]);
        $attribute = Attribute::find($request->id);
        $attribute->fill($request->all());
        $attribute->toggleCKEditor($request->has_ckeditor);
        $attribute->setCategories($request->categories);
        $attribute->save();
        return response()->json(['success' => 'Операция выполнена.', 'message' => 'Атрибут был изменен.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Attribute::find($request->id)->remove();
        return response()->json(['success' => 'Операция выполнена.', 'message' => 'Атрибут был удален.']);
    }
}
