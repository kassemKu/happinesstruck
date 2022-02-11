<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\Request;
use App\Models\Product;

class StorePageController extends Controller
{
    /**
     * @return Inertia/Response
     */
     public function index(): Response {
        //  dd(Request::all());
        $filters = Request::all('search', 'category', 'sort');
        $products = Product::latest()
            ->filter(Request::only('search', 'filters'))
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

        return Inertia::render('Web/Store/Index', ['products' => $products, 'filters' => $filters]);
     }

     /**
      * @param obj Product $product
      */
     public function show(Product $product) {
        $media = $product->media()->get()->map->only('id', 'directory_name', 'full_url');

        return Inertia::render('Web/Store/Product', ['product' => $product, 'media' => $media]);
     }
}
