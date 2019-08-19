<?php

namespace App\Http\Controllers\Admin;

use App\SEO;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->get();
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
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

        $news = News::add($request->all());

        $image = $request->file('image');

        $filename = time() . '.' . $image->getClientOriginalExtension();
        $path = 'uploads/news/' . $filename;
        $image->move('uploads/news', $filename);
        $news->image = $path;

        $news->save();
        $seoSettings = SEO::create(['site_name'=>$news->title, 'path'=>'news/'.$news->slug, 'description'=>$news->shortDescription()]);

        $news->sendEmail($request->get('newsletter'));

        return redirect()->route('news.index')->with('message', 'Новость успешно добавлена!');
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
        $news = News::find($id);

        return view('admin.news.edit', compact('news'));
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

        $news = News::find($id);
        $news->edit($request->all());

        if ($new_image != null) {
            $image = $request->file('image');

            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = 'uploads/news/' . $filename;
            $image->move('uploads/news', $filename);
            $news->image = $path;
        }

        $news->save();

        return redirect()->route('news.index')->with('message', 'Новость успешно обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::find($id)->delete();
        return redirect()->route('news.index')->with('message', 'Новость успешно удалена!');
    }
}
