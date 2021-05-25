<?php

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
    return view('auth/login');
});

Route::get("/api","NewsController@index");
Route::get("/search","NewsController@search");
Auth::routes();
Route::get("/store","NewsController@store");
Route::get('/home', 'HomeController@index')->name('home');
