<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Media;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Str;
use App\Models\Product;

class ManageProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index(): Response
    {
        $products = Product::latest()
            ->paginate()->transform(function($product) {
                return [
                    'id' => $product->id,
                    'ar_name' => $product->ar_name,
                    'en_name' => $product->en_name,
                    'created_at' => $product->created_at->diffForHumans(),
                    'en_slug' => $product->en_slug,
                    'ar_slug' => $product->ar_slug
                ];
            });

        return Inertia::render('Manage/Products/Index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create(): Response
    {
        return Inertia::render('Manage/Products/Create');
    }

    /**
     * TODO:: TO Implements this function as setModelAttribute function in Model
     * @param $quantity int
     * @returned string('in_stock', 'out_stock', 'low_in_stock')
     */
    private function getStockStatus($quantity) {
        if((int)$quantity <= 0) {
            return 'out_stock';
        } elseif((int)$quantity <= 10 ) {
            return 'low_in_stock';
        }

        return 'in_stock';
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreProductRequest $request
     * @return Illuminate\Http\RedirectResponse
     */
    public function store(StoreProductRequest $request): RedirectResponse
    {
        $product = Product::create([
            'ar_name' => $request->ar_name,
            'ar_short_description' => $request->ar_short_description,
            'ar_description' => $request->ar_description,
            'en_name' => $request->en_name,
            'en_short_description' => $request->en_short_description,
            'en_description' => $request->en_description,
            'en_slug' => Str::slug($request->en_name),
            'ar_slug' => Str::slug($request->ar_name),
            'published' => $request->published,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'supplier_percent_discount' => $request->supplier_percent_discount,
            'SKU' => $request->SKU,
            'stock_status' => $this->getStockStatus($request->quantity),
            'featured' => $request->featured,
            'quantity' => $request->quantity,
            'review' => $request->review,
            'category_id' => 1,
        ]);

        if(!empty($request->mediaIds)) {
            Media::whereIn('id', $request->mediaIds)->update([
                'model_id' => $product->id,
                'model_type' => Product::class
            ]);
            $product->update(['mediaIds' => $request->mediaIds]);
        }

        return Redirect::route('manage.products.show', $product->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  obj  Product $product
     * @return \Inertia\Response
     */
    public function show(Product $product): Response
    {
        return Inertia::render('Manage/Products/Show', ['product' => [
            'id' => $product->id,
            'ar_name' => $product->ar_name,
            'en_name' => $product->en_name,
            'ar_short_description' => $product->ar_short_description,
            'en_short_description' => $product->en_short_description,
            'ar_description' => $product->ar_description,
            'en_description' => $product->en_description,
            'mediaIds' => $product->mediaIds,
            'media' => $product->media()->get()->map->only('id', 'directory_name', 'full_url'),
         ]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  obj Product $product
     * @return \Inertia\Response
     */
    public function edit(Product $product): Response
    {
        return Inertia::render('Manage/Products/Edit', [
            'product' => [
                'id' => $product->id,
                'ar_name' => $product->ar_name,
                'ar_short_description' => $product->ar_short_description,
                'ar_description' => $product->ar_description,
                'en_name' => $product->en_name,
                'en_short_description' => $product->en_short_description,
                'en_description' => $product->en_description,
                'en_slug' => $product->en_name,
                'ar_slug' => $product->ar_name,
                'published' => $product->published,
                'price' => $product->price,
                'sale_price' => $product->sale_price,
                'supplier_percent_discount' => $product->supplier_percent_discount,
                'SKU' => $product->SKU,
                'stock_status' => $product->stock_status,
                'featured' => $product->featured,
                'quantity' => $product->quantity,
                'review' => $product->review,
                'mediaIds' => $product->mediaIds,
                'category_id' => $product->category_id,
                'media' => $product->media()->get()->map->only('id', 'directory_name', 'full_url', 'size', 'filename'),
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param  obj  Product $product
     * @param  App\Http\Requests\StoreProductRequest $request
     * @return Illuminate\Http\RedirectResponse
     */
    public function update(StoreProductRequest $request, Product $product): RedirectResponse
    {
        $product->update([
            'ar_name' => $request->ar_name,
            'ar_short_description' => $request->ar_short_description,
            'ar_description' => $request->ar_description,
            'en_name' => $request->en_name,
            'en_short_description' => $request->en_short_description,
            'en_description' => $request->en_description,
            'en_slug' => Str::slug($request->en_name),
            'ar_slug' => Str::slug($request->ar_name),
            'published' => $request->published,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'supplier_percent_discount' => $request->supplier_percent_discount,
            'SKU' => $request->SKU,
            'stock_status' => $this->getStockStatus($request->quantity),
            'featured' => $request->featured,
            'quantity' => $request->quantity,
            'review' => $request->review,
            'category_id' => 1,
        ]);

        if(!empty($request->mediaIds)) {
            Media::whereIn('id', $request->mediaIds)->update([
                'model_id' => $product->id,
                'model_type' => Product::class
            ]);
            $product->update(['mediaIds' => $request->mediaIds]);
        }

        return Redirect::route('manage.products.show', $product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  obj  $product
     * @return \Inertia\Response
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return Redirect::route('manage.products.index');
    }
}
