<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\JsonResponse;
use Inertia\Inertia;
use Inertia\Response;
use Ramsey\Uuid\Type\Integer;
use Symfony\Component\HttpFoundation\Request;

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
     * @param string $type
     * @return Illuminate\Http\JsonResponse;
     */
    public function updateCart(String $rowId, Request $request) {
        Cart::update($rowId, [
            'qty' => $request->qty
        ]);

        return response()->json([
            "status" => 201,
            'message' => 'cart updated successfully',
        ]);
    }
}
