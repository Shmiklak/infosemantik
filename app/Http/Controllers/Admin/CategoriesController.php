<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('parent_id', null)->with(['children' => function ($query){
            return $query->orderBy('order', 'asc');
        }])->orderBy('order', 'asc')->get();

        return view('admin.categories.index', compact('categories'));
    }

    public function updateCategories(Request $request) {
        foreach ($request->categories as $key => $item) {
            $category = Category::find($item['id']);
            $category->order = $key;
            $category->parent_id = null;
            $category->save();
            if (isset($item['children'])) {
                foreach ($item["children"] as $ikey => $subcategory) {
                    $child = Category::find($subcategory['id']);
                    $child->parent_id = $item['id'];
                    $child->order = $ikey;
                    $child->save();
                }
            }
        }

        return response()->json(['success' => 'Операция выполнена.', 'message' => 'Порядок категорий был обновлен.']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_id', null)->orderBy('order', 'asc')->get();
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required',
            'image'=>'nullable|image'
        ]);

        $data = $request->all();

        if ($data['parent_id'] < 0) {
            $data['parent_id'] = null;
        }

        $category = Category::Add($data);

        if ($request->image != null) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = 'uploads/categories/' . $filename;
            $image->move('uploads/categories', $filename);
            $category->image = $path;
        }

        $category->toggleStatus($request->get('is_popular'));

        $category->save();

        return redirect()->route('categories.index')->with('message', 'Категория успешно добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $categories = Category::where('parent_id', null)->orderBy('order', 'asc')->get();
        return view('admin.categories.edit', compact('categories', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'=>'required',
            'image'=>'nullable|image'
        ]);

        $old_image = $request->old_image;
        $new_image = $request->image;

        if ($new_image == null) {
            $request->image = $old_image;
        }

        $data = $request->all();

        if ($data['parent_id'] < 0) {
            $data['parent_id'] = null;
        }

        $category = Category::find($id);
        $category->edit($data);

        if ($new_image != null) {
            $image = $request->file('image');

            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = 'uploads/categories/' . $filename;
            $image->move('uploads/categories', $filename);
            $category->image = $path;
        }

        $category->toggleStatus($request->get('is_popular'));

        $category->save();

        return redirect()->route('categories.index')->with('message', 'Категория ' . $category->title . ' успешно обновлена.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $title = $category->title;
        $category->delete();
        return redirect()->route('categories.index')->with('message', 'Категория ' . $title . ' успешно удалена.');
    }
}
