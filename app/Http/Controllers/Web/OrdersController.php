<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Redirect;

class OrdersController extends Controller
{
    public function store(StoreOrderRequest $request) {
        $order = new Order();

        $order->order_number = uniqid('#');

        $order->shipping_full_name = $request->shipping_full_name;
        $order->shipping_country = $request->shipping_country;
        $order->shipping_state = $request->shipping_state;
        $order->shipping_city = $request->shipping_city;
        $order->shipping_area = $request->shipping_area;
        $order->shipping_avenue = $request->shipping_avenue;
        $order->shipping_address = $request->shipping_address;
        $order->shipping_phone = $request->shipping_phone;
        $order->shipping_zip_code = $request->shipping_zip_code;

        $order->payment_method = $request->payment_method;

        $order->billing_full_name = $request->billing_full_name;
        $order->country_id = $request->country_id;
        $order->billing_state = $request->billing_state;
        $order->city_id = $request->city_id;
        $order->area_id = $request->area_id;
        $order->billing_avenue = $request->billing_avenue;
        $order->billing_address = $request->billing_address;
        $order->billing_phone = $request->billing_phone;
        $order->billing_zip_code = $request->billing_zip_code;

        $order->grand_total = Cart::total();
        $order->item_count = Cart::count();

        $order->user_id = auth()->id();

        $order->save();

         //save order items
         $cartItems = Cart::content();

         foreach($cartItems as $item) {
            $order->items()->attach($item->id, ['price'=> $item->price, 'quantity'=> $item->qty]);
        }

        return Redirect::route('web.orders.payzah.checkout',  $order->id);

        $order->is_paid = true;

        Cart::destroy();

        // send email to user

    }
}
