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
        $category = Category::where('title', $row['kategoriya'])->first();

        $request = [
            'custom_id'=>$row['unikalnyy_klyuch'],
            'title'=>$row['nazvanie_produkta'],
            'category_id'=>$category->id,
            'main_image'=>'uploads/products/'.$row['glavnoe_izobrazhenie'],
            'image_1'=>($row['izobrazhenie_1'] == null ? null : 'uploads/products/'.$row['izobrazhenie_1']),
            'image_2'=>($row['izobrazhenie_2'] == null ? null : 'uploads/products/'.$row['izobrazhenie_2']),
            'image_3'=>($row['izobrazhenie_3'] == null ? null : 'uploads/products/'.$row['izobrazhenie_3']),
            'image_4'=>($row['izobrazhenie_4'] == null ? null : 'uploads/products/'.$row['izobrazhenie_4']),
            'image_5'=>($row['izobrazhenie_5'] == null ? null : 'uploads/products/'.$row['izobrazhenie_5']),
            'image_6'=>($row['izobrazhenie_6'] == null ? null : 'uploads/products/'.$row['izobrazhenie_6']),
            'description'=>$row['opisanie'],
            'short_description'=>$row['kratkoe_opisanie'],
            'is_available'=>(intval($row['nalichie']) == 1 ? 1: 0),
            'is_recommended'=>(intval($row['otobrazhat_v_rekomendovannykh']) == 1 ? 1: 0),
            'is_bestseller'=>(intval($row['bestseller']) == 1 ? 1: 0),
            'created_at'=>$row['data_publikatsii'],
        ];

        $datestring = str_replace('"', '', $request['created_at']);
        $created_date = Carbon::parse($datestring);

        $product = Product::add($request);
        $product->main_image = $request['main_image'];
        $product->image_1 = $request['image_1'];
        $product->image_2 = $request['image_2'];
        $product->image_3 = $request['image_3'];
        $product->image_4 = $request['image_4'];
        $product->image_5 = $request['image_5'];
        $product->image_6 = $request['image_6'];
        $product->created_at = $created_date;
        $product->setAvailable($request['is_available']);
        $product->setRecommended($request['is_recommended']);
        $product->setBestseller($request['is_bestseller']);

        foreach ($row as $key=>$value) {
            if (strpos($key, 'id') !== false) {
                $attr_id = substr($key, strpos($key, 'id_')+3);
                $product->setAttributes($value, 'attribute-'.$attr_id);
            }
        }

        $product->save();

        $seoSettings = SEO::create(['site_name'=>$product->title, 'path'=>'products/'.$product->slug, 'description'=>strip_tags($product->short_description)]);
    }
}
