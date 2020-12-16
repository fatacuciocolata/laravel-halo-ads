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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/search', 'App\Http\Controllers\HomeController@search')->name('search');

Route::resource('category', 'App\Http\Controllers\CategoryController');

// for future
// Route::get('/category', 'App\Http\Controllers\CategoryController@show');
// Route::get('/category/{slug}', 'App\Http\Controllers\CategoryController@show');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('ads', 'App\Http\Controllers\AdController', ['except' => ['show']]);
});
Route::resource('ads', 'App\Http\Controllers\AdController', ['only' => ['show']]);

Route::get('register', 'App\Http\Controllers\Auth\RegisterController@register')->name('register');
Route::post('register', 'App\Http\Controllers\Auth\RegisterController@store');
Route::get('login', 'App\Http\Controllers\Auth\LoginController@login')->name('login');
Route::post('login', 'App\Http\Controllers\Auth\LoginController@authenticate');
Route::get('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('profile', 'App\Http\Controllers\Auth\ProfileController@index')->name('profile');
Route::get('profile/edit', 'App\Http\Controllers\Auth\ProfileController@edit');

