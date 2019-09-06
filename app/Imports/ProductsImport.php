<?php

namespace App\Imports;

use App\Category;
use App\Product;
use App\SEO;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Carbon;
use Faker\Provider\DateTime;

class ProductsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        $product = Product::find($row['id']);
        $product->is_available = intval($row['nalichie']);
        $product->save();
    }
}
