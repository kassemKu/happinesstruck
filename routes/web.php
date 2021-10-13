<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\WebDashboardController;
use App\Http\Controllers\Web\LandingPageController;
use App\Http\Controllers\Web\StorePageController;
use App\Http\Controllers\Manage\ManageDashboardController;
use App\Http\Controllers\Manage\ManageSectionsController;
use App\Http\Controllers\Manage\ManageCategoriesController;
use App\Http\Controllers\Manage\ManageMediaController;
use App\Http\Controllers\Manage\ManageProductsController;
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
        Route::get('/store', [StorePageController::class, 'index'])->name('store');
        // routes web needed auth
        Route::middleware(['auth:sanctum', 'verified'])
            ->group(function() {
                Route::get('/dashboard', [WebDashboardController::class, 'index'])->name('dashboard');
        });
});

/**
 * TODO:: To write better comment
 */
Route::name('manage.')
    ->prefix('manage')
    ->middleware(['auth:sanctum', 'verified', 'role:superadministrator|administrator'])
    ->group(function () {
        // app settings TODO
        Route::post('/settings/{locale}', [WebSettingsController::class, 'switchLanguage'])->name('languageSwitcher');
        Route::get('/dashboard', [ManageDashboardController::class, 'index'] )->name('dashboard');
        // Sections routes
        Route::resource('/sections', ManageSectionsController::class, ['parameters' => ['' => 'section']]);
        // Categories routes
        Route::resource('/categories', ManageCategoriesController::class, ['parameters' => ['' => 'category']]);
        // Products routes
        Route::resource('/products', ManageProductsController::class, ['parameters' => ['' => 'product']]);
        // Media routes
        Route::resource('/media', ManageMediaController::class, ['parameters' => ['' => 'media']]);
});
