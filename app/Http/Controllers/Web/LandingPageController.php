<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Request;
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
                    'sale_price' => $product->sale_price,
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
                    'sale_price' => $product->sale_price,
                    'media' =>  $product->media()->get()->map->only('full_url'),
                ];
            });

        return Inertia::render('Web/Landing/Index', [
            'recentProducts' => $recentProducts,
            'featuredProducts' => $featuredProducts
        ]);
    }

    /**
     *
     */
    public function search (): JsonResponse {
        $data = Product::latest()
            ->filter(Request::only('search'))
            ->paginate(5)
            ->withQueryString()
            ->through(fn($product) => [
                'id' => $product->id,
                'ar_name' => $product->ar_name,
                'en_name' => $product->en_name,
                'created_at' => $product->created_at->diffForHumans(),
                'en_slug' => $product->en_slug,
                'ar_slug' => $product->ar_slug,
                'sale_price' => $product->sale_price,
                'media' =>  $product->media()->get()->map->only('full_url'),
        ]);

        if(!$data) {
            return response()->json([
                'success' => false,
                'message' => 'no data match search result!'
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }
}
