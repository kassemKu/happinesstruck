<?php

use Illuminate\Support\Facades\Route;
/**
 * TODO:: To write better comment
 */
Route::name('web.')
    ->namespace('Web')
    ->group(function() {
        Route::get('/', 'LandingPageController@index')->name('landing');
});

/**
 * TODO:: To write better comment
 */
Route::name('manage.')
    ->prefix('manage')
    ->namespace('Manage')
    ->group(function () {
        Route::get('/dashboard', 'ManageDashboardController@index')->name('dashboard');
        // Categories routes
        Route::resource('/categories', 'ManageCategoriesController', ['parameters' => ['' => 'category']]);
});
