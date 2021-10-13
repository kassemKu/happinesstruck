<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class StorePageController extends Controller
{
    /**
     * @return Inertia/Response
     */

     public function index(): Response {
        return Inertia::render('Web/Store/Index');
     }
}
