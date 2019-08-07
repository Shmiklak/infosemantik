<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class Product extends Model
{
    Use Sluggable;

    protected $fillable = ['title', 'description', 'category_id'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function category() {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public static function add($fields) {
        $product = new static;
        $product->fill($fields);

        $product->save();

        return $product;
    }

    public function removeImage() {
        if ($this->main_image != null) {
            unlink($this->main_image);
        }
    }

    public function removeExtraimage($field) {
        if ($this->$field != null) {
            unlink($this->$field);
        }
    }

    public function uploadImage($image) {
        if ($image==null) {
            return;
        }

        $this->removeImage();
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $path = 'uploads/products/' . $filename;
        $image->move('uploads/products/', $filename);
        $this->main_image = $path;
        $this->save();
    }

    public function remove() {
        $this->removeImage();
        $this->removeExtraimage('image_1');
        $this->removeExtraimage('image_2');
        $this->removeExtraimage('image_3');
        $this->removeExtraimage('image_4');
        $this->removeExtraimage('image_5');
        $this->removeExtraimage('image_6');
        $this->delete();
    }

    public function setAttributes($value, $field) {
        $attr = substr($field, 10);
        DB::table('product_attributes')->insert([
            'product_id' => $this->id,
            'attribute_id' => $attr,
            'value' =>$value,
        ]);
    }

    public function uploadExtraimages($image, $field) {
        if ($image==null) {
            return;
        }

        $this->removeExtraimage($field);
        $filename = time() . $field . '.' . $image->getClientOriginalExtension();
        $path = 'uploads/products/' . $filename;
        $image->move('uploads/products/', $filename);
        $this->$field = $path;
        $this->save();
    }

    public function setAvailable($value) {
        if ($value == null) {
            $this->is_available = 0;
            $this->save();
        } else {
            $this->is_available = 1;
            $this->save();
        }
    }

    public function setRecommended($value) {
        if ($value == null) {
            $this->is_recommended = 0;
            $this->save();
        } else {
            $this->is_recommended = 1;
            $this->save();
        }
    }

    public function setBestseller($value) {
        if ($value == null) {
            $this->is_bestseller = 0;
            $this->save();
        } else {
            $this->is_bestseller = 1;
            $this->save();
        }
    }
}
