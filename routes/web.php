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

Route::name('manage')
    ->namespace('Manage')
    ->group(function () {
        Route::get('/manage/dashboard', 'ManageDashboardController@index')->name('dashboard');
});
