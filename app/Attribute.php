<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = ['title'];

    public function toggleCKEditor($value)
    {
        if ($value == "false") {
            $this->has_ckeditor = 0;
            $this->save();
        } else {
            $this->has_ckeditor = 1;
            $this->save();
        }
    }

    public function toggleShownAtTop($value)
    {
        if ($value == "false") {
            $this->shown_at_top = 0;
            $this->save();
        } else {
            $this->shown_at_top = 1;
            $this->save();
        }
    }

    public function categories()
    {
        return $this->belongsToMany(
            Category::class,
            'category_attributes',
            'attribute_id',
            'category_id'
        );
    }

    public function setCategories($ids) {
        $this->categories()->sync($ids);
    }

    public function remove() {
        $this->categories()->detach();
        $this->delete();
    }

    public function characteristics() {
        return $this->hasMany(Characteristic::class, 'attribute_id', 'id');
    }
}
