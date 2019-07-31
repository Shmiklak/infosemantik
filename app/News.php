<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    Use Sluggable;

    protected $fillable = ['title', 'content', 'image'];

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
        $news = new static;
        $news->fill($fields);

        $news->save();

        return $news;
    }

    public function edit($fields) {
        $this->fill($fields);

        $this->save();
        return $this;
    }
}
