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
    ->name('ura.')
    ->prefix('ura')
    ->group(function () {
        Route::get('/', 'DashboardController@index')->name('home');
        Route::resource('apartments', "ApartmentController" )->parameters(['apartments' => 'apartment:apartment_slug']);
        Route::get('/sponsor{id}', 'SponsorController@sponsorIndex')->name('sponsor');
        Route::get('/apartment/{id}/summary/{sponsor_id}', 'SponsorController@paymentIndex')->name('summary');
        Route::get('/payment/{id}/{sponsor_id}', 'SponsorController@getToken')->name('token');
        Route::get('/payment/process/{id}/{sponsor_id}', 'SponsorController@process')->name('process');
    });

Route::get('{any?}', function () {
    return redirect()->route('homePage');
})->where('any', '.*');
