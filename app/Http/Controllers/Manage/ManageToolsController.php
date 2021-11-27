<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreToolRequest;
use App\Models\Item;
use App\Models\Media;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Str;
use App\Models\Tool;
use App\Models\Package;

class ManageToolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Inertia\Response
     */
    public function index(): Response
    {
        $tools = Tool::latest()
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
        return Inertia::render('Manage/Tools/Index', ['tools' => $tools]);
    }

    /**
     * Show the form for creating a new resource.
     *
     *  @return Inertia\Response
     */
    public function create(): Response
    {
        return Inertia::render('Manage/Tools/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreToolRequest  $request
     * @return Inertia\Response
     */
    public function store(StoreToolRequest $request)
    {
        $tool = Tool::create([
            'ar_name' => $request->ar_name,
            'ar_short_description' => $request->ar_short_description,
            'en_name' => $request->en_name,
            'en_short_description' => $request->en_short_description,
            'en_slug' => Str::slug($request->en_name),
            'ar_slug' => Str::slug($request->ar_name),
            'status' => $request->status,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'SKU' => $request->SKU,
        ]);

        if(!empty($request->mediaIds)) {
            Media::whereIn('id', $request->mediaIds)->update([
                'model_id' => $tool->id,
                'model_type' => Tool::class
            ]);
            $tool->update(['mediaIds' => $request->mediaIds]);
        }

        return Redirect::route('manage.tools.show', $tool->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  obj Tool $tool
     * @return Inertia\Response
     */
    public function show(Tool $tool): Response
    {
        return Inertia::render('Manage/Tools/Show', [
            'tool' => [
                'id' => $tool->id,
                'ar_name' => $tool->ar_name,
                'en_name' => $tool->en_name,
                'ar_short_description' => $tool->ar_short_description,
                'en_short_description' => $tool->en_short_description,
                'ar_description' => $tool->ar_description,
                'en_description' => $tool->en_description,
                'quantity' => $tool->quantity,
                'mediaIds' => $tool->mediaIds,
                'media' => $tool->media()->get()->map->only('id', 'directory_name', 'full_url')
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  obj Tool $tool
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
