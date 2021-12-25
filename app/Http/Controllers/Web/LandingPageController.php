<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Inertia\Inertia;
use Inertia\Response;

class LandingPageController extends Controller
{
    public function index (): Response {
        $recentProducts = Product::latest()
            ->get()
            ->transform(function($product) {
                return [
                    'id' => $product->id,
                    'ar_name' => $product->ar_name,
                    'en_name' => $product->en_name,
                    'ar_short_description' => $product->ar_short_description,
                    'en_short_description' => $product->en_short_description,
                    'price' => $product->price,
                    'media' =>  $product->media()->get()->map->only('full_url'),
                ];
            });

        $featuredProducts = Product::where('featured', true)
            ->latest()
            ->get()
            ->transform(function($product) {
                return [
                    'id' => $product->id,
                    'ar_name' => $product->ar_name,
                    'en_name' => $product->en_name,
                    'ar_short_description' => $product->ar_short_description,
                    'en_short_description' => $product->en_short_description,
                    'price' => $product->price,
                    'media' =>  $product->media()->get()->map->only('full_url'),
                ];
            });

        return Inertia::render('Web/Landing/Index', [
            'recentProducts' => $recentProducts,
            'featuredProducts' => $featuredProducts
        ]);
    }
}
