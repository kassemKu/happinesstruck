<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Truck;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class BookingPageController extends Controller
{
    /**
     * @param int $truck_id
     * @return Inertia\Response
     */
    public function bookingPage($id): Response {
        $collection = Truck::where('id', $id)
            ->get()
            ->transform(function($item) {
                return [
                    'id' => $item->id,
                    'ar_name' => $item->ar_name,
                    'en_name' => $item->en_name,
                    'ar_short_description' => $item->ar_short_description,
                    'en_short_description' => $item->en_short_description,
                    'ar_description' => $item->ar_description,
                    'en_description' => $item->en_description,
                    'price' => $item->price,
                    'mediaIds' => $item->mediaIds,
                    'media' => $item->media()->get()->map->only('id', 'directory_name', 'full_url'),
                    'packages' => $item
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
                    })
                ];
        });

        return Inertia::render('Web/Booking/Index', ['collection' => $collection]);
    }

    public function store(Request $request): Response
    {
        return Inertia::render('Web/Booking/Checkout');
    }

    public function bookingCheckout(Request $request): Response
    {
        return Inertia::render('Web/Booking/Checkout');
    }
}
