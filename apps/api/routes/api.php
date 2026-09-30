<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;



//Route::get('categories', [CategoryController::class, 'index']);
//Route::post('categories', [CategoryController::class, 'store']);
//Route::get('categories/{id}', [CategoryController::class, 'show']);
//Route::put('categories/{id}', [CategoryController::class, 'update']);
//Route::delete('categories/{id}', [CategoryController::class, 'destroy']);

/*
Route::group([
    'prefix' => 'categories',
], function () {
    Route::get('', [CategoryController::class, 'index']);
    Route::post('', [CategoryController::class, 'store']);
    
    //Route::get('/{id}', [CategoryController::class, 'show']);
    //Route::put('/{id}', [CategoryController::class, 'update']);
    //Route::delete('/{id}', [CategoryController::class, 'destroy']);

    Route::group([
        'prefix' => '/{category}',  
    ], function () {
        Route::get('', [CategoryController::class, 'show']);
        Route::put('', [CategoryController::class, 'update']);
        Route::delete('', [CategoryController::class, 'destroy']);
    });
}); */

//registrar rota de login
Route::post('auth/login', [AuthController::class, 'login']);

//mover rotas de aplicação (CRUD) para o grupo protegido
Route::group([
    'middleware' => [
        'auth:sanctum',
    ]
], function() {
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('products', ProductController::class);
    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('orders', OrderController::class);
    Route::apiResource('reviews', ReviewController::class);
});