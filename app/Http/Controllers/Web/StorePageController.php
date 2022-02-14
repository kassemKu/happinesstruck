<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;

class StorePageController extends Controller
{
    /**
     * @return Inertia/Response
     */
     public function index(Request $request): Response {
        $filters = $request->all('search', 'category', 'sort');
        $allSections = Section::with('categories')->get();

        $products = Product::latest()
            ->filter($request->only('search', 'category'))
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

        return Inertia::render('Web/Store/Index', ['products' => $products, 'filter' => $filters, 'allSections' => $allSections]);
     }

     /**
      * @param obj Product $product
      */
     public function show(Product $product) {
        $media = $product->media()->get()->map->only('id', 'directory_name', 'full_url');

        return Inertia::render('Web/Store/Product', ['product' => $product, 'media' => $media]);
     }
}
