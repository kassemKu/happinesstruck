<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckCouponRequest;
use App\Models\Coupon;
use Illuminate\Http\JsonResponse;

class CheckCouponsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param App\Http\Requests\CheckCouponRequest  $request
     * @return Illuminate\Http\JsonResponse
     */
    public function __invoke(CheckCouponRequest $request): JsonResponse
    {
        $coupon = Coupon::valid()->where('code', $request->code)->first();

        if($coupon) {
            $coupon->decrement('valid_for_times', 1);


            return response()->json(
                [
                    'status' => 200,
                    'success' => true,
                    'message' => 'checked successfully',
                    'coupon' => $coupon
                ]
            );
        }

        return  response()->json([
            'status' => 402,
            'success' => false,
            'message' => 'coupon not found Or invalid coupon',
        ]);
    }
}
