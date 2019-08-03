<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    Use Sluggable;

    protected $fillable = ['title', 'content'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function shortDescription() {
        $text = substr($this->content, 0, 200 + 1);

        if($last_space = strrpos($text, ' ')) {
            $text = substr($text, 0, $last_space);
            $text = rtrim($text);
            $text .=  "...";
        }

        return $text;
    }

    public static function add($fields) {
        $page = new static;
        $page->fill($fields);
        $page->save();

        return $page;
    }

    public function edit($fields) {
        $this->fill($fields);
        $this->slug = $fields['slug'];
        $this->save();
        return $this;
    }
}
