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
    public function index() {
        $usersCount = User::count();
        $ordersCount = Order::count();
        $categoriesCount = Category::count();
        $productsCount = Product::count();
        $packagesCount = Package::count();
        $bookingsCount = Booking::count();

        $data = [
            'users' => $usersCount,
            'orders' => $ordersCount,
            'categories' => $categoriesCount,
            'products' => $productsCount,
            'packages' => $packagesCount,
            'bookings' => $bookingsCount
        ];

        return Inertia::render('Manage/Dashboard/Index', ['data' => $data]);
    }
}
