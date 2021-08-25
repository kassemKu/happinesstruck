<?php

use Illuminate\Support\Facades\Route;

Route::name('web.')
    ->namespace('Web')
    ->group(function() {
        Route::get('/', 'LandingPageController@index')->name('landing');
});

