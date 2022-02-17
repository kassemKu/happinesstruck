<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Category;
use App\Models\Order;
use App\Models\Package;
use App\Models\Product;
use App\Models\User;
use Inertia\Inertia;

class ManageDashboardController extends Controller
{
    public function index() 
    {
        $data = [
            'users' => User::count(),
            'orders' => Order::count(),
            'categories' => Category::count(),
            'products' => Product::count(),
            'packages' => Package::count(),
            'bookings' => Booking::count(),
        ];

        return Inertia::render('Manage/Dashboard/Index', ['allData' => $data]);
    }
}
