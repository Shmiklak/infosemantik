<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::orderBy('order', 'asc')->get();
        return view('admin.menu.index', compact('menu'));
    }

    public function updateMenu(Request $request) {
        foreach ($request->categories as $key => $item) {
            $menu = Menu::find($item['id']);
            $menu->order = $key;
            $menu->save();
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
        $menu = Menu::orderBy('order', 'asc')->get();
        return view('admin.menu.create', compact('menu'));
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
            'title'=>'required'
        ]);

        $menu = Menu::create($request->all());
        $menu->toggleStatus($request->is_pricelist);
        $menu->save();
        return redirect()->route('menu.index')->with('message', 'Пункт успешно добавлен');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
