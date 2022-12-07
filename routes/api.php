<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::resource('uraHome','apiUra\apiUraController',['only'=>['index','show']])->middleware('auth');
//Route::resource('uraHome','apiUra\apiUraController',['only'=>['index','show']])->middleware('auth.basic');

Route::middleware('auth')->resource('uraHome','apiUra\apiUraController',['only'=>['index', 'show']]);
Route::resource('guestHome', 'apiGuest\apiGuestController', ['only'=>['index', 'show']]);
