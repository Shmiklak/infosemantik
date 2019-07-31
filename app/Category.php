<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    Use Sluggable;

    protected $fillable = ['title', 'image', 'parent_id', 'order'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function children()
    {
        return $this->hasMany('App\Category', 'parent_id', 'id')->orderBy('order', 'asc');
    }

    public static function add($fields) {
        $category = new static;
        $category->fill($fields);

        $category->save();

        return $category;
    }

    public function edit($fields) {
        $this->fill($fields);

        $this->save();
        return $this;
    }

    public function toggleStatus($value) {
        if ($value == null) {
            $this->is_popular = 0;
            $this->save();
        }
        else {
            $this->is_popular = 1;
            $this->save();
        }
    }
}
