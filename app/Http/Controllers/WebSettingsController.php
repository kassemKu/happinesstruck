<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class WebSettingsController extends Controller
{
    public function switchLanguage(Request $request, $locale) {
        if (! in_array($locale, ['en', 'ar', 'fr'])) {
            \response()->json('something went wrong!!');
        }

        App::setLocale($locale);

        return back();
    }
}
