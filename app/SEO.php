<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SEO extends Model
{
    protected $table = 'seo';
    protected $fillable = ['site_name', 'description', 'keywords', 'path'];
}
