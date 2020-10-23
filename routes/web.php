<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
	Route::get('profile', '\App\Http\Controllers\UserController@profile')->name('profile');
	Route::group(['middleware' => ['role']], function() {
		Route::get('admin', '\App\Http\Controllers\UserController@admin')->name('admin');
		Route::get('users', '\App\Http\Controllers\UserController@users')->name('users');
		Route::get('adduser', '\App\Http\Controllers\UserController@adduser')->name('adduser');
		Route::post('createuser', '\App\Http\Controllers\UserController@createuser')->name('createuser');
		Route::get('createrole', '\App\Http\Controllers\UserController@createrole')->name('createrole');
		Route::post('addrole', '\App\Http\Controllers\UserController@addrole')->name('addrole');		
		Route::get('updaterole/{id}', '\App\Http\Controllers\UserController@updaterole')->name('updaterole');		
		Route::post('updateroleaction', '\App\Http\Controllers\UserController@updateroleaction')->name('updateroleaction');		
		Route::get('useredit/{id}', '\App\Http\Controllers\UserController@useredit')->name('useredit');		
		Route::get('userdelete/{id}', '\App\Http\Controllers\UserController@userdelete')->name('userdelete');	
		Route::post('userupdateaction', '\App\Http\Controllers\UserController@userupdateaction')->name('userupdateaction');		
	});
});

