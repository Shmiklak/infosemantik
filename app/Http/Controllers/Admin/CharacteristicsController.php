<?php

namespace App\Http\Controllers\Admin;

use App\Attribute;
use App\Characteristic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CharacteristicsController extends Controller
{
    public function index() {
        $attributes = Attribute::orderBy('updated_at', 'asc')->get();
        return view('admin.characteristics.index')->withAttributes($attributes);
    }

    public function data() {
        $characteristics = Characteristic::orderBy('updated_at', 'asc')->get();
        foreach ($characteristics as $key => $characteristic) {
            $data[$key] = [
                "id"=>$characteristic->id,
                "value"=>$characteristic->value,
                "attribute"=>$characteristic->attribute->title,
                "attribute_id"=>$characteristic->attribute->id,
                "show"=>$characteristic->show_in_filter
            ];
        }

        return response()->json($data);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'value'=>'required',
            'attribute_id'=>'required'
        ]);
        $char = Characteristic::create($request->all());
        $char->toggleFilter($request->show_in_filter);
        $char->save();
        return response()->json(['success' => 'Операция выполнена.', 'message' => 'Характеристика добавлена.']);
    }

    public function update(Request $request) {
        $this->validate($request,[
            'value'=>'required',
            'attribute_id'=>'required'
        ]);

        $char = Characteristic::find($request->id);
        $char->fill($request->all());
        $char->toggleFilter($request->show_in_filter);
        $char->save();
        return response()->json(['success' => 'Операция выполнена.', 'message' => 'Характеристика изменена.']);
    }

    public function destroy(Request $request) {
        Characteristic::find($request->id)->delete();
        return response()->json(['success' => 'Операция выполнена.', 'message' => 'Характеристика была удалена.']);
    }
}
