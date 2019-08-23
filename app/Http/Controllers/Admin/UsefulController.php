<?php

namespace App\Http\Controllers\Admin;

use App\Useful;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SEO;

class UsefulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Useful::orderBy('created_at', 'desc')->get();
        return view('admin.useful.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.useful.create');
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
            'image'=>'required|image',
            'content'=>'required'
        ]);

        $post = Useful::add($request->all());

        $image = $request->file('image');

        $filename = time() . '.' . $image->getClientOriginalExtension();
        $path = 'uploads/useful/' . $filename;
        $image->move('uploads/useful', $filename);
        $post->image = $path;

        $post->save();
        $seoSettings = SEO::create(['site_name'=>$post->title, 'path'=>'useful/'.$post->slug, 'description'=>$post->shortDescription()]);

        return redirect()->route('useful.index')->with('message', 'Статья успешно добавлена!');
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
        $post = Useful::find($id);

        return view('admin.useful.edit', compact('post'));
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
            'image'=>'image',
            'content'=>'required',
        ]);

        $old_image = $request->old_image;
        $new_image = $request->image;

        if ($new_image == null) {
            $request->image = $old_image;
        }

        $post = Useful::find($id);
        $post->edit($request->all());

        if ($new_image != null) {
            $image = $request->file('image');

            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = 'uploads/useful/' . $filename;
            $image->move('uploads/useful', $filename);
            $post->image = $path;
        }

        $post->save();

        return redirect()->route('useful.index')->with('message', 'Статья успешно обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Useful::find($id)->delete();
        return redirect()->route('useful.index')->with('message', 'Статья успешно удалена!');
    }
}
