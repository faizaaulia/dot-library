<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::prefix('admin')->middleware(['auth'])->group(function() {
    Route::resource('/books', 'BookController')->except(['post', 'update']);
    Route::post('books/{book?}', 'BookController@store')->name('books.store');
    Route::put('books/{book?}', 'BookController@store')->name('books.store');
});

