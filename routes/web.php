<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\WebDashboardController;
use App\Http\Controllers\Web\LandingPageController;
use App\Http\Controllers\Web\StorePageController;
use App\Http\Controllers\Web\PackagesPageController;
use App\Http\Controllers\Web\CheckoutPageController;
use App\Http\Controllers\Web\MyCartPageController;
use App\Http\Controllers\Manage\ManageDashboardController;
use App\Http\Controllers\Manage\ManageSectionsController;
use App\Http\Controllers\Manage\ManageCategoriesController;
use App\Http\Controllers\Manage\ManageMediaController;
use App\Http\Controllers\Manage\ManageProductsController;
use App\Http\Controllers\Manage\ManageBannersController;
use App\Http\Controllers\Manage\ManageTrucksController;
use App\Http\Controllers\Manage\ManagePackagesController;
use App\Http\Controllers\Manage\ManagePackageItemsController;
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
        // packages page
        Route::get('/our-packages', [PackagesPageController::class, 'index'])->name('packages');
        // routes web needed auth
        Route::middleware(['auth:sanctum', 'verified'])
            ->group(function() {
                Route::get('/dashboard', [WebDashboardController::class, 'index'])->name('dashboard');
        });
        // my-cart page
        Route::get('/my-cart', [MyCartPageController::class, 'index'])->name('mycart');
         // checkout page
         Route::get('/checkout', [CheckoutPageController::class, 'index'])->name('checkout');
});

/**
 * TODO:: To write better comment
 */
Route::name('manage.')
    ->prefix('manage')
    ->middleware(['auth:sanctum', 'verified', 'role:superadministrator|administrator'])
    ->group(function () {
        // app settings TODO
        Route::get('/dashboard', [ManageDashboardController::class, 'index'] )->name('dashboard');
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
        // package items routes
        Route::resource('/items', ManagePackageItemsController::class, ['parameters' => ['' => 'item']]);
        // Media routes
        Route::resource('/media', ManageMediaController::class, ['parameters' => ['' => 'media']]);
});
