<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\JsonResponse;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Product;

class MyCartPageController extends Controller
{
    /**
     *
     */
    public function index (): Response {
        return Inertia::render('Web/MyCart/Index');
    }

    /**
     *
     */
    public function addToCart (Product $product): JsonResponse {
        // add the product to cart
        $cartItem = Cart::add(array(
            'id' => $product->id,
            'name' => $product->ar_name,
            'e_name' => $product->en_name,
            'ar_description' => $product->ar_description,
            'e_description' => $product->en_description,
            'price' => $product->price,
            'qty' => 1,
            'options' => [
                'en_name' => $product->en_name,
                'ar_name' => $product->ar_name,
                'en_short_description' => $product->en_short_description,
                'ar_short_description' => $product->ar_short_description,
                'en_description' => $product->en_description,
                'ar_description' => $product->ar_description,
                'SKU' => $product->SKU,
                'image' => $product->media()->latest()->take(1)->get(),
            ],
            'attributes' => array(),

        ));

        $cartItem->associate('Product');

        return response()->json([
            'status' => 200,
            'message' => 'item added to cart successfully',
            'count' => Cart::count(),
        ]);
    }

    /**
     * @param string $rowId
     * @param int $qty
     * @return Illuminate\Http\RedirectResponse;
     */
    public function updateCart(String $rowId, Int $qty): JsonResponse {
        $item = Cart::update($rowId, $qty);

        return response()->json([
            'status' => 200,
            'message' => 'item updated to cart successfully',
            'item' => $item,
            'count' => Cart::count(),
            'subtotal' => Cart::subtotal(),
            'total' => Cart::total()
        ]);
    }

    /**
     * @param string $rowId
     * @return Illuminate\Http\RedirectResponse;
     */
    public function deleteCartItem(String $rowId): JsonResponse {
        Cart::remove($rowId);

        return response()->json([
            'status' => 200,
            'message' => 'item updated to cart successfully',
            'count' => Cart::count(),
            'subtotal' => Cart::subtotal(),
            'total' => Cart::total(),
        ]);
    }
}
