<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreItemRequest;
use App\Models\Media;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Str;
use App\Models\Item;
use App\Models\Package;

class ManageItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Inertia\Response
     */
    public function index(): Response
    {
        $items = Item::latest()
            ->paginate(10)->transform(function($item) {
                return [
                    'id' => $item->id,
                    'ar_name' => $item->ar_name,
                    'en_name' => $item->en_name,
                    'created_at' => $item->created_at->diffForHumans(),
                    'en_slug' => $item->en_slug,
                    'ar_slug' => $item->ar_slug
                ];
            });

        return Inertia::render('Manage/Items/Index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Inertia\Response
     */
    public function create(): Response
    {
        return Inertia::render('Manage/Items/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreItemRequest  $request
     * @return Inertia\Response
     */
    public function store(StoreItemRequest $request): RedirectResponse
    {
        $item = Item::create([
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
            'SKU' => $request->SKU,
        ]);

        if(!empty($request->mediaIds)) {
            Media::whereIn('id', $request->mediaIds)->update([
                'model_id' => $item->id,
                'model_type' => Item::class
            ]);
            $item->update(['mediaIds' => $request->mediaIds]);
        }

        return Redirect::route('manage.items.show', $item->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  obj $item
     * @return Inertia\Response
     */
    public function show(Item $item): Response
    {
        return Inertia::render('Manage/Items/Show', [ 'item' => [
            'id' => $item->id,
            'ar_name' => $item->ar_name,
            'en_name' => $item->en_name,
            'ar_short_description' => $item->ar_short_description,
            'en_short_description' => $item->en_short_description,
            'ar_description' => $item->ar_description,
            'en_description' => $item->en_description,
            'mediaIds' => $item->mediaIds,
            'media' => $item->media()->get()->map->only('id', 'directory_name', 'full_url')
        ]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  obj $item
     * @return Inertia\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\StoreItemRequest  $request
     * @param  obj $package
     * @return Inertia\Response
     */
    public function update(StoreItemRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  obj $package
     * @return Inertia\Response
     */
    public function destroy($id)
    {
        //
    }
}