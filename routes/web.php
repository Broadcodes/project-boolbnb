<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('guests.homePage');
})->name('homePage');

Auth::routes();

// Route::get('/homeUra', 'HomeController@index')->name('homeUra');

Route::middleware('auth')
    ->namespace('Ura')
    ->name('ura')
    ->prefix('ura')
    ->group(function () {
        Route::get('/', 'DashboardController@index')->name('home');
        Route::resource('apartments', "ApartmentController" );
    });

Route::get('{any?}', function () {
    return redirect()->route('homePage');
})->where('any', '.*');
