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
    return view('templates.register')->middleware('guest');
});

Route::get('login', 'UserController@getLogin')->name('getLogin')->middleware('guest');
Route::post('login', 'UserController@postLogin')->name('postLogin')->middleware('guest');
Route::get('product', 'ProductController@getProduct')->name('getProduct')->middleware('auth');
Route::get('batches', 'ProductController@getBatches')->name('getBatches')->middleware('auth');
Route::get('verify/{product_id}/{first_batch}/{last_batch}', 'ProductController@getTrackingJson')->name('getTrackingJson')->middleware('auth');
Route::post('product', 'ProductController@createProduct')->name('createProduct')->middleware('auth');
Route::post('batches', 'ProductController@generateVerification')->name('generateVerification')->middleware('auth');
Route::post('signup', 'UserController@postSignup')->name('postSignup')->middleware('guest');
Route::get('logout', 'UserController@logout')->name('logout')->middleware('auth');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

