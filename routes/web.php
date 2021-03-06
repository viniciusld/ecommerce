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
})->name('/');

Auth::routes();
Route::get('/verify/{token}', 'Auth\RegisterController@verify')->name('verify_account');

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function () {
    Route::resource('products', 'Admin\ProductController', ['except' => 'destroy']);
    Route::get('products/{product}/destroy', 'Admin\ProductController@destroy')->name('products.destroy');

    Route::resource('brands', 'Admin\BrandController', ['except' => 'destroy']);
    Route::get('brands/{brand}/destroy', 'Admin\BrandController@destroy')->name('brands.destroy');
});
