<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Product;

class StorePageController extends Controller
{
    /**
     * @return Inertia/Response
     */
     public function index(): Response {
        $products = Product::paginate(20)
            ->transform(function($product) {
                return [
                    'id' => $product->id,
                    'ar_name' => $product->ar_name,
                    'en_name' => $product->en_name,
                    'sale_price' => $product->sale_price,
                    'ar_short_description' => $product->ar_short_description,
                    'en_short_description' => $product->en_short_description,
                    'media' => $product->media()->get()->map->only('id', 'directory_name', 'full_url'),
                ];
            });
        return Inertia::render('Web/Store/Index', ['products' => $products]);
     }

     /**
      * @param obj Product $product
      */
     public function show(Product $product) {
        $media = $product->media()->get()->map->only('id', 'directory_name', 'full_url');

        return Inertia::render('Web/Store/Product', ['product' => $product, 'media' => $media]);
     }
}
