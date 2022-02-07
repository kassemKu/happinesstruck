<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;
use Inertia\Response;

class ManageBannersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @returnInertia\Response
     */
    public function index(): Response
    {
        $banners = Banner::latest()
            ->paginate()
            ->transform(function($banner) {
                return [
                    'id' => $banner->id,
                    'ar_title' => $banner->ar_title,
                    'en_title' => $banner->en_title,
                    'created_at' => $banner->created_at->diffForHumans(),
                    'en_slug' => $banner->en_slug,
                    'ar_slug' => $banner->ar_slug
                ];
            });

        return Inertia::render('Manage/Banners/Index', ['banners' => $banners]);
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
