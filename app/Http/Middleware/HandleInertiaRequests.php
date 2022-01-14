<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Gloudemans\Shoppingcart\Facades\Cart;
use \Illuminate\Support\Facades\Auth;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {
        $user = Auth::user();

        return array_merge(parent::share($request), [
            'config' => collect(config('app'))->only('name', 'url', 'asset_url', 'locale'),
            'locale' => [
                'accounting' => __('accounting'),
                'app' => __('app'),
                'inventory' => __('inventory'),
                'invoicing' => __('invoicing'),
            ],
            'isAdmins' =>  $user ? $user->hasRole(['superadministrator', 'administrator', 'entry']) : null,
            'isDataEntry' => $user ? $user->hasRole('entry') : null,
            'cartCount' => Cart::count(),
            'cart' => Cart::content(),
            'cartSubtotal' => Cart::subtotal(),
            'cartTotal' => Cart::total()
        ]);
    }
}
