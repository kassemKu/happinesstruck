<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StorePackageRequest;
use App\Models\Media;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Str;
use App\Models\Package;
use App\Models\Tool;

class ManagePackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Inertia\Response
     */
    public function index(): Response
    {
        $packages = Package::latest()
            ->paginate(10)->transform(function($package) {
                return [
                    'id' => $package->id,
                    'ar_name' => $package->ar_name,
                    'en_name' => $package->en_name,
                    'created_at' => $package->created_at->diffForHumans(),
                    'en_slug' => $package->en_slug,
                    'ar_slug' => $package->ar_slug
                ];
            });

        return Inertia::render('Manage/Packages/Index', ['packages' => $packages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Inertia\Response
     */
    public function create(): Response
    {
        $tools = Tool::latest()->get()->transform(function($tool) {
            return [
                'id' => $tool->id,
                'ar_name' => $tool->ar_name,
                'en_name' => $tool->en_name,
                'quantity' => $tool->quantity,
                'price' => $tool->price,
                'media' => $tool->media()->get()->map->only('id', 'directory_name', 'full_url'),
            ];
        });

        return Inertia::render('Manage/Packages/Create', ['tools' => $tools]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Inertia\Response
     */
    public function store(StorePackageRequest $request): RedirectResponse
    {
        $package = Package::create([
            'ar_name' => $request->ar_name,
            'ar_short_description' => $request->ar_short_description,
            'ar_description' => $request->ar_description,
            'en_name' => $request->en_name,
            'en_short_description' => $request->en_short_description,
            'en_description' => $request->en_description,
            'en_slug' => Str::slug($request->en_name),
            'ar_slug' => Str::slug($request->ar_name),
            'status' => $request->status,
            'price_per_event' => $request->price_per_event,
            'truck_id' => $request->truck_id,
        ]);

        if(!empty($request->mediaIds)) {
            Media::whereIn('id', $request->mediaIds)->update([
                'model_id' => $package->id,
                'model_type' => Package::class
            ]);
            $package->update(['mediaIds' => $request->mediaIds]);
        }


        if(!empty($request->tools)) {
            foreach ($request->tools as $i) {
               $tool = Tool::where('id', $i['id'])->firstOrFail();
               $package->tools()->attach($tool->id, ['price' => $tool->price, 'quantity' => $i['quantity_per_package']]);
            }
        }

        return Redirect::route('manage.packages.show', $package->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  obj $package
     * @return Inertia\Response
     */
    public function show(Package $package): Response
    {
        return Inertia::render('Manage/Packages/Show', [ 'packg' => [
            'id' => $package->id,
            'ar_name' => $package->ar_name,
            'en_name' => $package->en_name,
            'ar_short_description' => $package->ar_short_description,
            'en_short_description' => $package->en_short_description,
            'ar_description' => $package->ar_description,
            'en_description' => $package->en_description,
            'price_per_event' => $package->price_per_event,
            'mediaIds' => $package->mediaIds,
            'media' => $package->media()->get()->map->only('id', 'directory_name', 'full_url'),
            'tools' => $package->tools()->get()->unique('id')
        ]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  obj $package
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
     * @return \Illuminate\Http\Response
     */
    public function update(StorePackageRequest $request, $id)
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
