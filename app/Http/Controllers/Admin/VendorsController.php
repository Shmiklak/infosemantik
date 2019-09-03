<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vendor;

class VendorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = Vendor::orderBy('created_at', 'desc')->get();
        return view('admin.vendors.index', compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vendors.create');
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
            'image'=>'required|image',
        ]);

        $vendor = Vendor::create($request->all());

        $image = $request->file('image');

        $filename = time() . '.' . $image->getClientOriginalExtension();
        $path = 'uploads/vendors/' . $filename;
        $image->move('uploads/vendors', $filename);
        $vendor->image = $path;

        $vendor->save();

        return redirect()->route('vendors.index')->with('message', 'Вендор успешно добавлен!');
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
        $vendor = Vendor::find($id);

        return view('admin.vendors.edit', compact('vendor'));
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
            'image'=>'image',
        ]);

        $old_image = $request->old_image;
        $new_image = $request->image;

        if ($new_image == null) {
            $request->image = $old_image;
        }

        $vendor = Vendor::find($id);
        $vendor->fill($request->all());

        if ($new_image != null) {
            $image = $request->file('image');

            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = 'uploads/vendors/' . $filename;
            $image->move('uploads/vendors', $filename);
            $vendor->image = $path;
        }

        $vendor->save();

        return redirect()->route('vendors.index')->with('message', 'Вендор успешно изменен!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Vendor::find($id)->delete();
        return redirect()->route('vendors.index')->with('message', 'Успешно удалено!');
    }
}
