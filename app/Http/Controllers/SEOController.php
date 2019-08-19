<?php

namespace App\Http\Controllers;

use App\SEO;
use Illuminate\Http\Request;

class SEOController extends Controller
{
    public function update(Request $request) {
        $pageSettings = SEO::where('path', $request->get('path'))->first();

        if ($pageSettings == null) {
            SEO::create($request->all());
            return redirect()->back()->with('message', 'SEO настройки обновлены!');
        }

        $pageSettings->fill($request->all());
        $pageSettings->save();
        return redirect()->back()->with('message', 'SEO настройки обновлены!');
    }
}
