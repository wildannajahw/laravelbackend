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
    return view('welcome');
});

Auth::routes();
Route::match(["GET", "POST"], "/register", function(){
  return redirect("/login");
})->name("register");
Route::get('/home', 'HomeController@index')->name('home');
Route::resource("users","UserController");
Route::get('/categories/{id}/restore', 'CategoryController@restore')->name('categories.restore');
Route::get('/categories/trash', 'CategoryController@trash')->name('categories.trash');
Route::get('/ajax/categories/search','CategoryController@ajaxSearch');
Route::resource('categories', 'CategoryController');
Route::resource('products', 'ProductController');
