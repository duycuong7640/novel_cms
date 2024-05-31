<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
app()->setLocale('en');

Route::prefix('v1')->group(function () {
    Route::get('healthy', [\Modules\Api\Http\Controllers\CommonController::class, 'healthy']);

    Route::middleware('throttle:20,15')->group(function () {
        Route::prefix('auth')->group(function () {
            Route::post('login', [\Modules\Api\Http\Controllers\AuthController::class, 'login']);
            Route::post('register', [\Modules\Api\Http\Controllers\AuthController::class, 'register']);
        });
    });

    Route::middleware('tokenApi')->group(function () {
        Route::prefix('auth')->group(function () {
            Route::get('me', [\Modules\Api\Http\Controllers\AuthController::class, 'me']);
            Route::patch('update', [\Modules\Api\Http\Controllers\AuthController::class, 'update']);
        });
    });

    Route::middleware('throttle:50,5')->group(function () {
        Route::prefix('products')->group(function () {
            Route::get('search', [\Modules\Api\Http\Controllers\ProductsController::class, 'search']);
        });
    });

    Route::middleware('throttle:500,5')->group(function () {
        Route::get('config', [\Modules\Api\Http\Controllers\SettingController::class, 'config']);

        Route::prefix('categories')->group(function () {
            Route::get('', [\Modules\Api\Http\Controllers\CategoriesController::class, 'index']);
            Route::get('{slug}', [\Modules\Api\Http\Controllers\CategoriesController::class, 'show']);
        });

        Route::prefix('products')->group(function () {
            Route::get('', [\Modules\Api\Http\Controllers\ProductsController::class, 'index']);
            Route::get('new-top', [\Modules\Api\Http\Controllers\ProductsController::class, 'newTop']);
            Route::get('sitebar-right-novel', [\Modules\Api\Http\Controllers\ProductsController::class, 'sitebarRightNovel']);
            Route::get('{slug}', [\Modules\Api\Http\Controllers\ProductsController::class, 'show']);
        });

        Route::middleware('tokenApi')->group(function () {
            Route::prefix('product-user-libraries')->group(function () {
                Route::get('', [\Modules\Api\Http\Controllers\ProductUserLibrariesController::class, 'index']);
                Route::post('create', [\Modules\Api\Http\Controllers\ProductUserLibrariesController::class, 'create']);
                Route::delete('delete/{id}', [\Modules\Api\Http\Controllers\ProductUserLibrariesController::class, 'delete']);
            });
        });
    });

    Route::middleware('throttle:200,5')->group(function () {
        Route::prefix('product-chapters')->group(function () {
            Route::get('{id}', [\Modules\Api\Http\Controllers\ProductChaptersController::class, 'show']);
        });
    });
});
