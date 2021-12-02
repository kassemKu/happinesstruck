<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCouponRequest;
use App\Models\Coupon;
use App\Models\Truck;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ManageCouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Inertia\Response
     */
    public function index(): Response
    {
        $coupons = Coupon::latest()
        ->paginate(10)
        ->transform(function($coupon) {
            return [
                'id' => $coupon->id,
                'code' => $coupon->code,
                'type' => $coupon->type,
                'deleted_at' => $coupon->deleted_at,
                'start_date' => $coupon->start_date->diffForHumans(),
                'expiry_date' => $coupon->expiry_date->diffForHumans(),
            ];
        });

        return Inertia::render('Manage/Coupons/Index', ['coupons' => $coupons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Inertia\Response
     */
    public function create(): Response
    {
        $collections = Truck::latest()->get()->unique('id');

        return Inertia::render('Manage/Coupons/Create', ['collections' => $collections]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Inertia\Response
     */
    public function store(StoreCouponRequest $request): RedirectResponse
    {
        $coupon = Coupon::create([
            'code' => $request->code,
            'value' => $request->value,
            'type' => $request->type,
            'start_date' => $request->date['start_date'],
            'expiry_date' => $request->date['expiry_date'],
        ]);

        return Redirect::route('manage.coupons.show', $coupon->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  object $coupon
     * @return Inertia\Response
     */
    public function show(Coupon $coupon): Response
    {
        return inertia('Manage/Coupons/Show', ['coupon' => $coupon]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  object $coupon
     * @return Inertia\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  object $coupon
     * @return Inertia\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  object $coupon
     * @return Inertia\Response
     */
    public function destroy($id)
    {
        //
    }
}
