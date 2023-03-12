<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/**
 * Получение товара по id
 */
Route::get('reviews/product/{productId}', [\App\Http\Controllers\ProductController::class, 'getProductById']);

/**
 * Получить список товаров с сортировкой
 */
Route::get('reviews/product/{rating}/{sort}', [\App\Http\Controllers\ProductController::class, 'getProductRatingList']);

/**
 * Получить список товаров авторизованного пользователя
 */
Route::get('reviews/auth-user', [\App\Http\Controllers\ProductController::class, 'getAuthUserRatings']);

/**
 * Получить данные для формы поиска
 */
Route::post('reviews/create', [\App\Http\Controllers\ProductController::class, 'getAuthUserRatings'])
    ->middleware(['auth']);

/**
 * Получить данные для формы поиска
 */
Route::post('reviews/edit', [\App\Http\Controllers\ProductController::class, 'getAuthUserRatings'])
    ->middleware(['auth']);

/**
 * Получить данные для формы поиска
 */
Route::post('reviews/delete', [\App\Http\Controllers\ProductController::class, 'getAuthUserRatings'])
    ->middleware(['auth']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
