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

Auth::routes();

//Route::get("/search","NewsController@search");
Route::get("/search","KeywordsSearchController");

Route::post("/store","NewsStoreController");
//Route::delete('/delete/{favorite}',"NewsController@delete");
Route::delete('/delete/{favorite}',"NewsDeleteController");
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/favorite','FavoriteNewsController');
Route::get('/category',"CategorySearchController");
Route::get('/howToSearch',"HowToSearchController");
