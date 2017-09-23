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
    return view('templates.register');
});

Route::get('login', 'UserController@getLogin')->name('getLogin');
Route::post('login', 'UserController@postLogin')->name('postLogin');
Route::get('product', 'ProductController@getProduct')->name('getProduct');
Route::get('batches', 'ProductController@getBatches')->name('getBatches');
Route::post('product', 'ProductController@createProduct')->name('createProduct');
Route::post('batches', 'ProductController@generateVerification')->name('generateVerification');
Route::post('signup', 'UserController@postSignup')->name('postSignup');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
