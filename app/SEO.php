<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SEO extends Model
{
    protected $fillable = ['site_name', 'description', 'keywords', 'path'];
}
