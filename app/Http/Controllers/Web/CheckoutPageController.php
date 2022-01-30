<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Country;

class CheckoutPageController extends Controller
{
    public function index (): Response {
        $countries = Country::all();
        $cities = Country::find(1)->cities()->with('areas')->get();

        return Inertia::render('Web/Checkout/Index', ['allCountries' => $countries, 'countryCities' => $cities]);
    }
}
