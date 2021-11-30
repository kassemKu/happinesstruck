<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
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
        ->transform(function($category) {
            return [
                'id' => $category->id,
                'code' => $category->code,
                'type' => $category->type,
                'created_at' => $category->created_at->diffForHumans(),
                'deleted_at' => $category->deleted_at,
                'expire_at' => $category->expire_at->diffForHumans(),
            ];
        });

        return Inertia::render('Manage/Coupons/Index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Inertia\Response
     */
    public function create(): Response
    {
        return Inertia::render('Manage/Coupons/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Inertia\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Inertia\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return Inertia\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Inertia\Response
     */
    public function destroy($id)
    {
        //
    }
}
