<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class WebDashboardController extends Controller
{
    public function index() {
        return Inertia::render('Web/Dashboard/Index');
    }
}
