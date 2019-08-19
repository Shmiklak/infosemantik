<?php

namespace App;
use App\Settings;
use App\SEO;
use Illuminate\Database\Eloquent\Model;

if (! function_exists('getPageTitle')) {
    function getPageTitle($path) {
        $pageSettings = SEO::where('path', $path)->first();
        if ($pageSettings == null) {
            return Settings::find(1)->site_name;
        }
        return $pageSettings->site_name;
    }
}

if (! function_exists('getPageDescription')) {
    function getPageDescription($path) {
        $pageSettings = SEO::where('path', $path)->first();
        if ($pageSettings == null) {
            return Settings::find(1)->description;
        }
        return $pageSettings->description;
    }
}

if (! function_exists('getPageKeywords')) {
    function getPageKeywords($path) {
        $pageSettings = SEO::where('path', $path)->first();
        if ($pageSettings == null) {
            return Settings::find(1)->keywords;
        }
        return $pageSettings->keywords;
    }
}
