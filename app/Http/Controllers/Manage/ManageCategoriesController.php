<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Category;
use App\Models\Media;

class ManageCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  Inertia\Response
     */
    public function index(): Response
    {
        $filters = Request::all('search', 'trashed');
        // $categories = Category::latest()
        //     ->paginate(10)
        //     // ->filter(Request::only('search', 'trashed'))
        //     ->transform(function($category) {
        //         return [
        //             'id' => $category->id,
        //             'ar_name' => $category->ar_name,
        //             'en_name' => $category->en_name,
        //             'created_at' => $category->created_at->diffForHumans(),
        //             'deleted_at' => $category->deleted_at,
        //             'published' => $category->published,
        //         ];
        // });
        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                $query->where('en_name', 'LIKE', "%{$value}%")->orWhere('ar_name', 'LIKE', "%{$value}%");
            });
        });


        $categories = QueryBuilder::for(Category::class)
            ->paginate()
            ->withQueryString();

        return Inertia::render('Manage/Categories/Index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  Inertia\Response
     */
    public function create(): Response
    {
        return Inertia::render('Manage/Categories/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreSectionRequest $request
     * @return Illuminate\Http\RedirectResponse
     */
    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        $category = Category::create([
            'ar_name' => $request->ar_name,
            'ar_summary' => $request->ar_summary,
            'en_name' => $request->en_name,
            'en_summary' => $request->ar_summary,
            'published' => $request->published,
            'is_parent' => $request->is_parent,
        ]);

        if(!empty($request->mediaIds)) {
            Media::whereIn('id', $request->mediaIds)->update([
                'model_id' => $category->id,
                'model_type' => Category::class
            ]);
            $category->update(['mediaIds' => $request->mediaIds]);
        }

        return Redirect::route('manage.categories.show', $category->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  obj $category
     * @return \Inertia\Response
     */
    public function show(Category $category): Response
    {
        return Inertia::render('Manage/Categories/Show', [
            'category' =>  [
                'id' => $category->id,
                'ar_name' => $category->ar_name,
                'en_name' => $category->en_name,
                'mediaIds' => $category->mediaIds,
                'media' => $category->media()->get()->map->only('id', 'directory_name', 'full_url'),
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  obj  $category
     * @return \Inertia\Response
     */
    public function edit(Category $category): Response
    {
        return Inertia::render('Manage/Categories/Edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  obj  $category
     * @param App\Http\Requests\UpdateCategoryRequest $request
     * @return Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCategoryRequest $request, Category $category): RedirectResponse
    {
        $category->update([
            'ar_name' => $request->ar_name,
            'ar_summary' => $request->ar_ar_summary,
            'en_name' => $request->en_name,
            'ar_summary' => $request->en_ar_summary,
            'published' => $request->published
        ]);

        return Redirect::route('manage.categories.show', $category->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  obj  $category
     * @return Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();

        return Redirect::route('manage.categories.index');
    }
}
