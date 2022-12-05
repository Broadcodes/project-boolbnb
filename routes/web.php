<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('guests.homePage');
})->name('homePage');

Auth::routes();

Route::get('{any?}', function () {
    return redirect()->route('homePage');
})->where('any', '.*');
