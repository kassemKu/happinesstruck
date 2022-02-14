<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Section;
use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\UpdateSectionRequest;
use App\Models\Media;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

class ManageSectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index(): Response
    {
        $filters = Request::all('search', 'categories');

        $sections = Section::latest()
            ->filter(Request::only('search', 'categories'))
            ->paginate(3)
            ->withQueryString()
            ->through(fn ($section) => [
                'id' => $section->id,
                'ar_name' => $section->ar_name,
                'en_name' => $section->en_name,
                'created_at' => $section->created_at->diffForHumans(),
                'deleted_at' => $section->deleted_at,
                'published' => $section->published,
                'media' => $section->media()->get()->map->only('id', 'directory_name', 'full_url'),
        ]);

        return Inertia::render('Manage/Sections/Index', ['sections' => $sections, 'filters' => $filters,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create(): Response
    {
        return Inertia::render('Manage/Sections/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreSectionRequest $request
     * @return Illuminate\Http\RedirectResponse
     */
    public function store(StoreSectionRequest $request): RedirectResponse
    {
        $section = Section::create([
            'ar_name' => $request->ar_name,
            'ar_description' => $request->ar_description,
            'en_name' => $request->en_name,
            'en_description' => $request->en_description,
            'en_slug' => Str::slug($request->en_name),
            'ar_slug' => Str::slug($request->ar_name),
            'published' => $request->published,
        ]);

        if(!empty($request->mediaIds)) {
            Media::whereIn('id', $request->mediaIds)->update([
                'model_id' => $section->id,
                'model_type' => Section::class
            ]);
            $section->update(['mediaIds' => $request->mediaIds]);
        }

        return Redirect::route('manage.sections.show', $section->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  obj  $section
     * @return \Inertia\Response
     */
    public function show(Section $section): Response
    {
        return Inertia::render('Manage/Sections/Show',
            ['section' => [
                'id' => $section->id,
                'ar_name' => $section->ar_name,
                'en_name' => $section->en_name,
                'ar_description' => $section->ar_description,
                'en_description' => $section->en_description,
                'created_at' => $section->created_at->diffForHumans(),
                'updated_at' => $section->updated_at ? $section->updated_at->diffForHumans() : null,
                'deleted_at' => $section->deleted_at ? $section->deleted_at->diffForHumans() : null,
                'published' => $section->published,
                'media' => $section->media()->get()->map->only('id', 'directory_name', 'full_url'),
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  obj  $section
     * @return \Inertia\Response
     */
    public function edit(Section $section): Response
    {
        return Inertia::render('Manage/Sections/Edit', ['section' => $section]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  obj  $section
     * @param App\Http\Requests\UpdateSectionRequest $request
     * @return Illuminate\Http\RedirectResponse
     */
    public function update(UpdateSectionRequest $request, Section $section): RedirectResponse
    {
        $section->update([
            'ar_name' => $request->ar_name,
            'ar_description' => $request->ar_description,
            'en_name' => $request->en_name,
            'en_description' => $request->en_description,
            'published' => $request->published
        ]);

        return Redirect::route('manage.sections.show', $section->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  obj  $section
     * @return Illuminate\Http\RedirectResponse
     */
    public function destroy(Section $section): RedirectResponse
    {
        $section->delete();

        return Redirect::route('manage.sections.index');
    }
}
