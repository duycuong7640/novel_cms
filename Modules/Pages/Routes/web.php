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
Route::get('/', 'HomeController@index')->name('client.home');
//Route::prefix('')->group(function() {
//    Route::get('/', 'HomeController@index')->name('client.home');
//
//    Route::get('/cate', 'CategoriesController@index')->name('client.category.index');
//    Route::get('/cate/new', 'CategoriesController@index');
//    Route::get('/cate/library', 'CategoriesController@library');
//    Route::get('/cate/ranking', 'CategoriesController@ranking');
//    Route::get('/cate/categories', 'CategoriesController@categories');
//
//    Route::get('/cate/detail/{slug}', 'ProductsController@show')->name('client.product.detail');
//    Route::get('/cate/read/{slug}', 'ProductsController@read')->name('client.product.detail.read');
//    Route::get('/cate/new/detail/{slug}', 'PostsController@show')->name('client.post.detail');
//});
