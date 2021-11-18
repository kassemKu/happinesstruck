<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreTruckRequest;
use App\Models\Media;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Str;
use App\Models\Truck;

class ManageTrucksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Inertia\Response
     */
    public function index(): Response
    {
        $trucks = Truck::latest()
            ->paginate(10)->transform(function($truck) {
                return [
                    'id' => $truck->id,
                    'ar_name' => $truck->ar_name,
                    'en_name' => $truck->en_name,
                    'created_at' => $truck->created_at->diffForHumans(),
                    'en_slug' => $truck->en_slug,
                    'ar_slug' => $truck->ar_slug
                ];
            });

        return Inertia::render('Manage/Trucks/Index', ['trucks' => $trucks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Inertia\Response
     */
    public function create(): Response
    {
        return Inertia::render('Manage/Trucks/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreTruckRequest  $request
     * @return Inertia\Response
     */
    public function store(StoreTruckRequest $request): RedirectResponse
    {
        $truck = Truck::create([
            'ar_name' => $request->ar_name,
            'en_name' => $request->en_name,
            'ar_note' => $request->ar_note,
            'en_note' => $request->en_note,
            'en_type' => $request->en_type,
            'ar_type' => $request->ar_type,
            'size' => $request->size,
            'en_slug' => Str::slug($request->en_name),
            'ar_slug' => Str::slug($request->ar_name),
            'status' => $request->status,
        ]);

        if(!empty($request->mediaIds)) {
            Media::whereIn('id', $request->mediaIds)->update([
                'model_id' => $truck->id,
                'model_type' => Truck::class
            ]);
            $truck->update(['mediaIds' => $request->mediaIds]);
        }

        return Redirect::route('manage.trucks.show', $truck->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  obj $truck
     * @return Inertia\Response
     */
    public function show(Truck $truck)
    {
        dd($truck);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  obj $truck
     * @return Inertia\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\StoreTruckRequest  $request
     * @param  obj  $truck
     * @return Inertia\Response
     */
    public function update(StoreTruckRequest $request, $truck)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  obj  $truck
     * @return Inertia\Response
     */
    public function destroy($truck)
    {
        //
    }
}
