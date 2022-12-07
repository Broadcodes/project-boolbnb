<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('guests.homePage');
})->name('homePage');

Auth::routes();


Route::resource('apartments', 'apartmentsController')->middleware('auth');


Route::get('/homeUra', 'HomeController@index')->name('homeUra')->middleware('auth');


/*
Route::middleware('auth')
   ->namespace('Admin')
   ->name('admin.')
   ->prefix('admin')
   ->group(function () {
        Route::get('/homeUra', 'HomeController@index')->name('homeUra');

   });
  */

Route::get('{any?}', function () {
    return redirect()->route('homePage');
})->where('any', '.*');
