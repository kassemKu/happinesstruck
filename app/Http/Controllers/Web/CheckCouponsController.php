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
        $coupon = Coupon::where('code', $request->code)->first();

        if($coupon) {
            return response()->json(
                [
                    'status' => 200,
                    'message' => 'checked successfully',
                    'coupon' => $coupon
                ]
            );
        }

        return  response()->json([
            'status' => 402,
            'message' => 'coupon not found Or invalid coupon',
        ]);
    }
}
