<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Banner;

class BannersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::orderBy('created_at', 'desc')->get();

        return view('admin.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banners.create');
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
           'description'=>'required',
           'image'=>'required|image',
           'image_mobile'=>'required|image'
        ]);

        $banner = Banner::Create($request->all());

        $image = $request->file('image');
        $filename = time() . '-full.' . $image->getClientOriginalExtension();
        $path = 'uploads/banners/' . $filename;
        $image->move('uploads/banners', $filename);
        $banner->image = $path;

        $image_mobile = $request->file('image_mobile');
        $filename = time() . '-mobile.' . $image_mobile->getClientOriginalExtension();
        $path = 'uploads/banners/' . $filename;
        $image_mobile->move('uploads/banners', $filename);
        $banner->image_mobile = $path;

        $banner->save();

        return redirect()->route('banners.index')->with('message', 'Баннер успешно добавлен');
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
        $banner = Banner::find($id);

        return view('admin.banners.edit', compact('banner'));
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
           'description'=>'required'
        ]);

        $old_image = $request->old_image;
        $new_image = $request->image;

        $old_image_mobile = $request->old_image_mobile;
        $new_image_mobile = $request->image_mobile;

        if ($new_image == null) {
            $request->image = $old_image;
        }
        if ($new_image_mobile == null) {
            $request->image_mobile = $old_image_mobile;
        }

        $banner = Banner::find($id);
        $banner->fill($request->all());

        if ($new_image != null) {
            $image = $request->file('image');

            $filename = time() . '-full.' . $image->getClientOriginalExtension();
            $path = 'uploads/banners/' . $filename;
            $image->move('uploads/banners', $filename);
            $banner->image = $path;
        }

        if ($new_image_mobile != null) {
            $image = $request->file('image_mobile');

            $filename = time() . '-mobile.' . $image->getClientOriginalExtension();
            $path = 'uploads/banners/' . $filename;
            $image->move('uploads/banners', $filename);
            $banner->image_mobile = $path;
        }

        $banner->save();

        return redirect()->route('banners.index')->with('message', 'Баннер успешно изменен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Banner::find($id)->delete();
        return redirect()->route('banners.index')->with('message', 'Баннер успешно удален.');
    }
}
