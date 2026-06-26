<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;

Route::middleware('throttle:60,1')->group(function () {

    Route::apiResource('items', ItemController::class);

    Route::apiResource('categories', CategoryController::class);

});