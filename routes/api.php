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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:api')->get('/eddy', function (Request $request) {
    return $request->user();
});


Route::get('eddy', '\App\Http\Controllers\EddyController@index');
Route::get('eddy/{id}', '\App\Http\Controllers\EddyController@show');
Route::post('eddy', '\App\Http\Controllers\EddyController@store');
Route::put('eddy/{id}', '\App\Http\Controllers\EddyController@update');
Route::delete('eddy/{id}', '\App\Http\Controllers\EddyController@delete');
