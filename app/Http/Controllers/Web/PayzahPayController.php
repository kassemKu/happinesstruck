<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Redirect;

class PayzahPayController extends Controller
{
    public function checkout(String $orderId) {
        $checkoutData =  $this->checkoutData();
        $collection = collect($checkoutData);

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://payzah.net/production770/ws/paymentgateway/index",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $collection,
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                "Authorization: YTQ3NWRjN2RlMjdlZjVlNzFhZWU2NzFiYzYxNDlhZjMzMzQ5MjU4Yw=="
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $json = json_decode($response);

            if (Request::inertia()) {
                return response('', 409)
                    ->header('X-Inertia-Location', url()->current());
            }

            return redirect($json->data->PaymentUrl . '?PaymentID=' . $json->data->PaymentID);
        }
    }

    public function checkoutData() {
        $checkoutData = [
            "trackid" => uniqid(),
            "amount" => 0.100,
            "success_url" => route("web.landing"),
            "error_url" => route("web.landing"),
            "language" => "ARA",
            "currency" => 414,
            "payment_type" => 1
        ];

        return $checkoutData;
    }
}
