<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class LandingPageController extends Controller
{
    public function index (): Response {
        return Inertia::render('Web/Landing/Index');
    }
}
