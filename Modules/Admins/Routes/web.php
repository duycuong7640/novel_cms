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

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['admin']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::prefix('admin')->group(function () {
    Route::get('/sign-in', 'Auth\LoginController@login')->name('admin.login');
    Route::post('/sign-in', 'Auth\LoginController@postLogin');

    Route::group(['middleware' => 'admin'], function () {
        Route::get('/sign-out', 'Auth\LoginController@index')->name('admin.logout');
        Route::get('/', 'AdminsController@index')->name('admin.index');

        Route::prefix('categories')->group(function () {
            Route::get('/', 'CategoriesController@index')->name('admin.category.index');
            Route::get('/create', 'CategoriesController@create')->name('admin.category.create');
            Route::post('/create', 'CategoriesController@store');
            Route::get('/edit/{id}', 'CategoriesController@edit')->name('admin.category.edit');
            Route::post('/edit/{id}', 'CategoriesController@update');
            Route::get('/status/{id}/{field}', 'CategoriesController@status')->name('admin.category.status');
            Route::get('/show/{id}', 'CategoriesController@show')->name('admin.category.show');
            Route::get('/destroy/{id}', 'CategoriesController@destroy')->name('admin.category.destroy');
        });

        Route::prefix('products')->group(function () {
            Route::get('/', 'ProductsController@index')->name('admin.product.index');
            Route::get('/create', 'ProductsController@create')->name('admin.product.create');
            Route::post('/create', 'ProductsController@store');
            Route::get('/edit/{id}', 'ProductsController@edit')->name('admin.product.edit');
            Route::post('/edit/{id}', 'ProductsController@update');
            Route::get('/status/{id}/{field}', 'ProductsController@status')->name('admin.product.status');
            Route::get('/show/{id}', 'ProductsController@show')->name('admin.product.show');
            Route::get('/destroy/{id}', 'ProductsController@destroy')->name('admin.product.destroy');
        });

        Route::prefix('posts')->group(function () {
            Route::get('/', 'PostsController@index')->name('admin.post.index');
            Route::get('/create', 'PostsController@create')->name('admin.post.create');
            Route::post('/create', 'PostsController@store');
            Route::get('/edit/{id}', 'PostsController@edit')->name('admin.post.edit');
            Route::post('/edit/{id}', 'PostsController@update');
            Route::get('/status/{id}/{field}', 'PostsController@status')->name('admin.post.status');
            Route::get('/show/{id}', 'PostsController@show')->name('admin.post.show');
            Route::get('/destroy/{id}', 'PostsController@destroy')->name('admin.post.destroy');
        });

        Route::prefix('points')->group(function () {
            Route::get('/', 'PointsController@index')->name('admin.point.index');
            Route::get('/create', 'PointsController@create')->name('admin.point.create');
            Route::post('/create', 'PointsController@store');
            Route::get('/edit/{id}', 'PointsController@edit')->name('admin.point.edit');
            Route::post('/edit/{id}', 'PointsController@update');
            Route::get('/status/{id}/{field}', 'PointsController@status')->name('admin.point.status');
            Route::get('/show/{id}', 'PointsController@show')->name('admin.point.show');
            Route::get('/destroy/{id}', 'PointsController@destroy')->name('admin.point.destroy');
        });

        Route::prefix('photos')->group(function () {
            Route::get('/', 'PhotosController@index')->name('admin.photo.index');
            Route::get('/create', 'PhotosController@create')->name('admin.photo.create');
            Route::post('/create', 'PhotosController@store');
            Route::get('/edit/{id}', 'PhotosController@edit')->name('admin.photo.edit');
            Route::post('/edit/{id}', 'PhotosController@update');
            Route::get('/status/{id}/{field}', 'PhotosController@status')->name('admin.photo.status');
            Route::get('/show/{id}', 'PhotosController@show')->name('admin.photo.show');
            Route::get('/destroy/{id}', 'PhotosController@destroy')->name('admin.photo.destroy');
        });

        Route::get('/setting/{id}', 'SettingsController@edit')->name('admin.setting.update');
        Route::post('/setting/{id}', 'SettingsController@update');

    });

});
