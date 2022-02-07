<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePermissionRequest;
use App\Models\Permission;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class ManagePermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Inertia\Response
     */
    public function index(): Response
    {
        $permissions = Permission::all()
            ->transform(function($permission) {
                return [
                    'id' => $permission->id,
                    'name' => $permission->name,
                    'display_name' => $permission->display_name,
                    'created_at' => $permission->created_at->diffForHumans(),
                ];
            });

        return Inertia::render('Manage/Permissions/Index', ['permissions' => $permissions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Inertia\Response
     */
    public function create(): Response
    {
        return Inertia::render('Manage/Permissions/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StorePermissionRequest  $request
     * @return Illuminate\Http\RedirectResponse
     */
    public function store(StorePermissionRequest $request): RedirectResponse
    {
        $permission = Permission::create($request->all());

        return Redirect::route('manage.permissions.show', $permission->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  object $permission
     * @return Inertia\Response
     */
    public function show(Permission $permission): Response
    {
        return Inertia::render('Manage/Permissions/Show', ['permission' => [
            'id' => $permission->id,
            'display_name' => $permission->display_name,
            'name' => $permission->name,
            'description' => $permission->description,
            'created_at' => $permission->created_at->diffForHumans(),
            'updated_at' => $permission->updated_at->diffForHumans(),
        ]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  object $permission
     * @return Inertia\Response
     */
    public function edit(Permission $permission): Response
    {
        return Inertia::render('Manage/Permissions/Edit', ['permission' => $permission]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\StorePermissionRequest  $request
     * @param object Permission $permission
     * @return Illuminate\Http\RedirectResponse
     */
    public function update(StorePermissionRequest $request, Permission $permission): RedirectResponse
    {
        $permission->update($request->all());
        return Redirect::route('manage.permissions.show', $permission->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  object Permission $permission
     * @return Illuminate\Http\RedirectResponse
     */
    public function destroy(Permission $permission): RedirectResponse
    {
        $permission->delete();
        return Redirect::route('manage.permissions.index');
    }
}
