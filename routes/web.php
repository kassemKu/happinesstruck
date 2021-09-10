<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebSettingsController;
use App\Http\Controllers\Manage\ManageCategoriesController;
use App\Http\Controllers\Manage\ManageDashboardController;
use App\Http\Controllers\Manage\ManageSectionsController;
use App\Http\Controllers\Web\WebDashboardController;
use App\Http\Controllers\Web\LandingPageController;
/**
 * TODO:: To write better comment
 */
Route::name('web.')
    ->group(function() {
        // landing page
        Route::get('/', [LandingPageController::class, 'index'])->name('landing');
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
    ->group(function () {
        // app settings TODO
        Route::post('/settings/{locale}', [WebSettingsController::class, 'switchLanguage'])->name('languageSwitcher');
        Route::get('/dashboard', [ManageDashboardController::class, 'index'] )->name('dashboard');
        // Sections routes
        Route::resource('/sections', ManageSectionsController::class, ['parameters' => ['' => 'section']]);
        // Categories routes
        Route::resource('/categories', ManageCategoriesController::class, ['parameters' => ['' => 'category']]);
});
