<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMediaRequest;
use App\Models\Media;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ManageMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Illuminate\Http\JsonResponse
     */
    public function store(StoreMediaRequest $request): JsonResponse
    {
        $file = $request->file('file');
        $file->store('uploaded/' . $request->directory_name . '/' . now()->format('Y') . '/' . now()->format('m'), 'public');

        $media = Media::create([
            'filename' => $file->hashName(),
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize(),
            'directory_name' => $request->directory_name,
            'user_id' => $request->user()->id,
            'category_id' => $request->category_id,
            'section_id' => $request->section_id,
            'product_id' => $request->product_id
        ]);

        return response()->json([
            'id' => $media->id,
            'directory_name' => $media->directory_name,
            'success' => true,
            'message' => 'file/s uploaded successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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
     * @param  obj Media $media
     * @return Illuminate\Http\JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $media = Media::find($id);
        Storage::disk('public')->delete('uploaded/' . $media->directory_name . '/' . now()->format('Y') . '/' . now()->format('m') . '/' . $media->filename );
        $media->delete();

        return response()->json([
            'success' => true,
            'message' => 'file deleted successfully'
        ]);
    }
}
