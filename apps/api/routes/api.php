<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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

Route::apiResource('categories', CategoryController::class);