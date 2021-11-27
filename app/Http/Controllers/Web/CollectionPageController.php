<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Truck;
use Inertia\Inertia;
use Inertia\Response;

class CollectionPageController extends Controller
{
    public function index (): Response {
        $trucks = Truck::latest()
            ->get()
            ->transform(function($truck) {
            return [
                'id' => $truck->id,
                'ar_name' => $truck->ar_name,
                'en_name' => $truck->en_name,
                'ar_short_description' => $truck->ar_short_description,
                'en_short_description' => $truck->en_short_description,
                'ar_description' => $truck->ar_description,
                'en_description' => $truck->en_description,
                'min_price_per_event' => $truck->min_price_per_event,
                'created_at' => $truck->created_at->diffForHumans(),
                'media' => $truck->media()->get()->map->only('id', 'directory_name', 'full_url'),
                'packages' => $truck
                    ->packages()
                    ->get()
                    ->unique('id')
                    ->transform(function($package) {
                        return [
                            'id' => $package->id,
                            'ar_name' => $package->ar_name,
                            'en_name' => $package->en_name,
                            'price_per_event' => $package->price_per_event,
                            'SKU' => $package->SKU,
                            'quantity' => $package->pivot->quantity,
                            'media' => $package->media()->get()->map->only('id', 'directory_name', 'full_url'),
                        ];
                })->toArray()
            ];
        });

        return Inertia::render('Web/Trucks/Index', ['trucks' => $trucks]);
    }
}
