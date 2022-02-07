<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCouponRequest;
use App\Models\Booking;
use App\Models\Coupon;
use App\Models\Package;
use App\Models\Product;
use App\Models\Truck;
use App\Models\User;
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
        $collections = Truck::latest()->get()->unique('id')->transform(function ($collection) {
            return [
                'id' => $collection->id,
                'ar_name' => $collection->ar_name,
                'en_name' => $collection->en_name,
                'media' => $collection->media()->get()->map->only('id', 'directory_name', 'full_url')
            ];
        });

        $products = Product::latest()->get()->unique('id')->transform(function ($product) {
            return [
                'id' => $product->id,
                'ar_name' => $product->ar_name,
                'en_name' => $product->en_name,
                'media' => $product->media()->get()->map->only('id', 'directory_name', 'full_url')
            ];
        });
        $users = User::latest()->get()->unique('id')->transform(function ($product) {
            return [
                'id' => $product->id,
                'full_name' => $product->full_name,
            ];
        });

        return Inertia::render('Manage/Coupons/Create', ['collections' => $collections, 'products' => $products, 'users' => $users]);
    }

    /**
     * return model
     */
    private function getTargetModel(string $model, int $id) {
        if($model === 'product') {
            return Product::where('id', $id)->first();
        }
        elseif($model === 'collection') {
            return Truck::where('id', $id)->first();
        }
        elseif($model === 'user') {
            return User::where('id', $id)->first();
        }
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
            'isValid' => $request->isValid,
            'valid_for_times' => $request->valid_for_times,
            'start_date' => $request->date['start_date'],
            'expiry_date' => $request->date['expiry_date'],
        ]);

        if(!empty($request->relatedModels)) {
            foreach($request->relatedModels as $model) {
                $targetModel = $this->getTargetModel($request->related, $model);
                $coupon->update([$request->related . '_id' => $targetModel->id]);
            }
        }

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
