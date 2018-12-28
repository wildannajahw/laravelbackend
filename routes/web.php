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



Route::post('/products/{id}/proses', 'ProductController@proses')->name('products.proses');

Route::post('/products/{id}/finish', 'ProductController@finish')->name('products.finish');
Route::get('/admin/register', function () {
    return view('admin.register');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/collection', 'HomeController@collection')->name('collection');
Route::resource("users","UserController");
Route::get('/categories/{id}/restore', 'CategoryController@restore')->name('categories.restore');
Route::get('/categories/trash', 'CategoryController@trash')->name('categories.trash');
Route::get('/ajax/categories/search','CategoryController@ajaxSearch');
Route::resource('categories', 'CategoryController');
Route::get('/products/trash', 'ProductController@trash')->name('products.trash');
Route::post('/products/{id}/restore', 'ProductController@restore')->name('products.restore');
Route::post('/products/{id}/coba', 'ProductController@coba')->name('products.coba');
Route::delete('/products/{id}/delete-permanent','ProductController@deletePermanent')->name('products.delete-permanent');
Route::resource('products', 'ProductController');
Route::resource('orders', 'OrderController');
Route::resource('pesans', 'PesanController');
