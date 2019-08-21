<?php

namespace App\Exports;

use App\Attribute;
use App\Product;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ProductsExportEmpty implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('exports.products_empty', [
            'products' => Product::all(),
            'attributes' => Attribute::all()
        ]);
    }
}
