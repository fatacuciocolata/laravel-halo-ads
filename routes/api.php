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

// sunt curios de merge
Route::get('search', 'App\Http\Controllers\ApiAdsController@search');

Route::get('ads', 'App\Http\Controllers\ApiAdsController@index');
Route::get('ads/{id}', 'App\Http\Controllers\ApiAdsController@show');
Route::post('ads', 'App\Http\Controllers\ApiAdsController@store');
Route::get('categories', 'App\Http\Controllers\ApiCategoryController@index');
