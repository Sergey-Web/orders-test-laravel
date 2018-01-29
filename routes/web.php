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

Route::get('/', 'HomeController@index')->name('home');
Route::resource('/product', 'ProductsController', ['exerpt' => ['show']]);
Route::resource('/counterpaty', 'CounterpatiesController');
Route::post('/order/products', 'OrdersController@getProducts');
Route::resource('/order', 'OrdersController');
