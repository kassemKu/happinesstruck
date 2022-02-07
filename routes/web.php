<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\WebDashboardController;
use App\Http\Controllers\Web\LandingPageController;
use App\Http\Controllers\Web\StorePageController;
use App\Http\Controllers\Web\PackagesPageController;
use App\Http\Controllers\Web\CollectionPageController;
use App\Http\Controllers\Web\CheckoutPageController;
use App\Http\Controllers\Web\MyCartPageController;
use App\Http\Controllers\Web\BookingPageController;
use App\Http\Controllers\Manage\ManageDashboardController;
use App\Http\Controllers\Manage\ManageSectionsController;
use App\Http\Controllers\Manage\ManageCategoriesController;
use App\Http\Controllers\Manage\ManageMediaController;
use App\Http\Controllers\Manage\ManageProductsController;
use App\Http\Controllers\Manage\ManageBannersController;
use App\Http\Controllers\Manage\ManageTrucksController;
use App\Http\Controllers\Manage\ManagePackagesController;
use App\Http\Controllers\Manage\ManageToolsController;
use App\Http\Controllers\Manage\ManageCouponsController;
use App\Http\Controllers\Manage\ManagePermissionsController;
use App\Http\Controllers\Manage\ManageRolesController;
use App\Http\Controllers\Web\CheckCouponsController;
use App\Http\Controllers\Web\OrdersController;
use App\Http\Controllers\Web\PayzahPayController;

/**
 * TODO:: To write better comment
 */
Route::name('web.')
    ->group(function() {
        /**
         * route not need auth
         */
        // landing page
        Route::get('/', [LandingPageController::class, 'index'])->name('landing');
        // store page
        Route::get('/our-store', [StorePageController::class, 'index'])->name('store');
        // product page
        Route::get('/our-store/{product}', [StorePageController::class, 'show'])->name('showProduct');
        // packages page
        Route::get('/our-packages', [PackagesPageController::class, 'index'])->name('packages');
        // packages page
        Route::get('/our-packages/{package}', [PackagesPageController::class, 'show'])->name('package');
        // collection of packages page
        Route::get('/our-packages-collections', [CollectionPageController::class, 'index'])->name('collections');
        // booking collection of packages page
        Route::get('/{collection}/booking', [BookingPageController::class, 'bookingPage'])->name('booking');
        // store booking
        Route::post('/collection/booking', [BookingPageController::class, 'store'])->name('storeBooking');
        // my-cart page
        Route::get('/my-cart', [MyCartPageController::class, 'index'])->name('mycart');
        // add to cart
        Route::post('/add-to-cart/{product}', [MyCartPageController::class, 'addToCart'])->name('addToCart');
        // update cart items @pram item id and quantity
        Route::post('/cart-update-quantity/{rowId}/{qty}', [MyCartPageController::class, 'updateCart'])->name('updateQuantity');
         // update cart total if has shipping cost or valid coupon
         Route::post('/cart-update-total/{shipping_cost}', [MyCartPageController::class, 'updateCartTotal'])->name('updateTotal');
        // remove item from cart
        Route::post('/cart-remove-item/{rowId}', [MyCartPageController::class, 'deleteCartItem'])->name('deleteCartItem');

        // routes web need auth
        Route::middleware(['auth:sanctum', 'verified', 'role:superadministrator|customer|entry'])
            ->group(function() {
                Route::get('/dashboard', [WebDashboardController::class, 'index'])->name('dashboard');
                // booking checkout
                Route::get('/booking/checkout', [BookingPageController::class, 'bookingCheckout'])->name('bookingCheckout');
                // check valid coupon
                Route::post('/check-coupon', CheckCouponsController::class)->name('checkCoupon');
                // checkout page
                Route::get('/checkout', [CheckoutPageController::class, 'index'])->name('checkout');
                /**
                 * urls begin with (/order) prefix
                 * names starts with web.order
                 * only Customer Auth user && Supper Admin can access this routes
                 */
                Route::name('orders.')
                ->prefix('orders')
                ->group(function() {
                    // orders routes
                    Route::post('/store', [OrdersController::class, 'store'])->name('store');
                    Route::get('/index', [OrdersController::class, 'index'])->name('index');
                    // payzah payment Controller
                    Route::get('/payzah/checkout/{order}', [PayzahPayController::class, 'checkout'])->name('payzah.checkout');
                });
        });
});

/**
 * TODO:: To write better comment
 */
Route::name('manage.')
    ->prefix('manage')
    ->middleware(['auth:sanctum', 'verified', 'role:superadministrator|administrator|entry'])
    ->group(function () {
        // app settings TODO
        Route::get('/dashboard', [ManageDashboardController::class, 'index'] )->name('dashboard');
        // permissions route
        Route::resource('/permissions', ManagePermissionsController::class, ['parameters' => ['' => 'permission']]);
        // roles route
        Route::resource('/roles', ManageRolesController::class, ['parameters' => ['' => 'role']]);
        // Sections routes
        Route::resource('/sections', ManageSectionsController::class, ['parameters' => ['' => 'section']]);
        // Categories routes
        Route::resource('/categories', ManageCategoriesController::class, ['parameters' => ['' => 'category']]);
        // Products routes
        Route::resource('/products', ManageProductsController::class, ['parameters' => ['' => 'product']]);
        // Banners routes
        Route::resource('/banners', ManageBannersController::class, ['parameters' => ['' => 'banner']]);
        // trucks routes
        Route::resource('/trucks', ManageTrucksController::class, ['parameters' => ['' => 'truck']]);
        // packages routes
        Route::resource('/packages', ManagePackagesController::class, ['parameters' => ['' => 'package']]);
        // package tools routes
        Route::resource('/tools', ManageToolsController::class, ['parameters' => ['' => 'tool']]);
        // coupons routes
        Route::resource('/coupons', ManageCouponsController::class, ['parameters' => ['' => 'coupon']]);
        // Media routes
        Route::resource('/media', ManageMediaController::class, ['parameters' => ['' => 'media']]);
});
