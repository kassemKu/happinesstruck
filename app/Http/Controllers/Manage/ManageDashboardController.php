<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class ManageDashboardController extends Controller
{
    public function index() {
        return Inertia::render('Manage/Dashboard/Index');
    }
}
