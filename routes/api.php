<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;

Route::prefix('v1')->group(function () {

    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {

        Route::apiResource('categories', CategoryController::class)
            ->except(['destroy']);

        Route::delete(
            'categories/{category}',
            [CategoryController::class, 'destroy']
        );

        Route::apiResource('items', ItemController::class)
            ->except(['destroy']);

        Route::delete(
            'items/{item}',
            [ItemController::class, 'destroy']
        );

        Route::post('logout', [AuthController::class, 'logout']);
    });
});