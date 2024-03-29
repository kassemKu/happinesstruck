<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Country;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ManageLocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Inertia\Response
     */
    public function index(): Response
    {
        // $locations = Country::latest()
        //     ->paginate()
        //     ->through(fn($location) => [
        //         'id' => $location->id,
        //         'ar_name' => $location->ar_name,
        //         'en_name' => $location->en_name,
        //         'states' => $location->states()->with('areas')
        // ]);

        $locations = Country::latest()
            ->get()
            ->transform(function($location) {
                return [
                    'id' => $location->id,
                    'ar_name' => $location->ar_name,
                    'en_name' => $location->en_name,
                    'status' => $location->status,
                    'shipping_cost' => $location->shipping_cost,
                    'states' => $location->states()->with('areas')->get()
                ];
            });

        return Inertia::render('Manage/Locations/Index', ['allLocations' => $locations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Inertia\Response
     */
    public function create(): Response
    {
        return Inertia::render('Manage/Locations/Create');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateCountry(Request $request, $id)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  object  $location
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
