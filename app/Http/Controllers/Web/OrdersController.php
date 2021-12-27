<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;

class OrdersController extends Controller
{
    public function store(StoreOrderRequest $request) {
        $order = new Order();

        $order->order_number = uniqid('#');

        $order->shipping_full_name = $request->shipping_full_name;
        $order->shipping_state = $request->shipping_state;
        $order->shipping_city = $request->shipping_city;
        $order->shipping_address = $request->shipping_address;
        $order->shipping_phone = $request->shipping_phone;
        $order->shipping_zip_code = $request->shipping_zip_code;

        $order->payment_method = $request->payment_method;

        $order->billing_full_name = $request->billing_full_name;
        $order->billing_state = $request->billing_state;
        $order->billing_city = $request->billing_city;
        $order->billing_address = $request->billing_address;
        $order->billing_phone = $request->billing_phone;
        $order->billing_zip_code = $request->billing_zip_code;

        $order->grand_total = Cart::total();
        $order->item_count = Cart::count();

        $order->user_id = auth()->id();

        $order->save();

        dd($order);
    }
}
