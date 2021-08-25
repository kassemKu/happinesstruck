<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class LandingPageController extends Controller
{
    public function index () {
        return Inertia::render('Web/Landing/Index');
    }
}
