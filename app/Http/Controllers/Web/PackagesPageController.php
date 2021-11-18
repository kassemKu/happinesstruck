<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Package;

class PackagesPageController extends Controller
{
    /**
     * @return Inertia/Response
     */

    public function index(): Response {
        $packages = Package::latest()
        ->paginate()->transform(function($package) {
            return [
                'id' => $package->id,
                'ar_name' => $package->ar_name,
                'en_name' => $package->en_name,
                'ar_short_description' => $package->ar_short_description,
                'en_short_description' => $package->en_short_description,
                'ar_description' => $package->ar_description,
                'en_description' => $package->en_description,
                'created_at' => $package->created_at->diffForHumans(),
                'media' => $package->media()->get()->map->only('id', 'directory_name', 'full_url')
            ];
        });

        return Inertia::render('Web/Packages/Index', ['packages' => $packages]);
     }
}
