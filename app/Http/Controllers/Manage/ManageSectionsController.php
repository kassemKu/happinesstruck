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
use Illuminate\Support\Facades\Request;

class ManageSectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index(): Response
    {
        $filters = Request::all('search', 'trashed');
        $sections = Section::paginate(10)
            // ->filter(Request::only('search', 'trashed'))
            ->transform(function($section) {
                return [
                    'id' => $section->id,
                    'ar_name' => $section->ar_name,
                    'en_name' => $section->en_name,
                    'created_at' => $section->created_at->diffForHumans(),
                    'deleted_at' => $section->deleted_at,
                    'published' => $section->published,
                ];
        });

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
        Section::create($request->all());

        return Redirect::route('manage.sections.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  obj  $section
     * @return \Inertia\Response
     */
    public function show(Section $section): Response
    {
        return Inertia::render('Manage/Sections/Show', ['section' => $section]);
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
