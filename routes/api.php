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

Route::prefix('v1/books')->group(function() {
    Route::get('/{id}', 'API\BookController@show');
    Route::get('/{search?}', 'API\BookController@index');
    Route::post('/store', 'API\BookController@store');
});
Route::prefix('v1/authors')->group(function() {
    Route::post('/store', 'API\AuthorController@store');
    Route::delete('/{id}', 'API\AuthorController@destroy');
    Route::put('/{id}', 'API\AuthorController@update');
});