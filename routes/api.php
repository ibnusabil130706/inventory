<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;       // Sesuaikan nama controller kamu
use App\Http\Controllers\CategoryController;   // Sesuaikan nama controller kamu

// Soal 4: Route Autentikasi (Public)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Soal 4 & 5: Route yang diproteksi Sanctum
Route::middleware('auth:sanctum')->group(function () {
    
    // --- BENTUK MANUAL (Sangat disarankan agar mempermudah pemisahan middleware role) ---
    
    // Route Items
    Route::get('/items', [ItemController::class, 'index']);          // Soal 6c (User & Admin bisa akses)
    Route::get('/items/{id}', [ItemController::class, 'show']);
    Route::post('/items', [ItemController::class, 'store']);
    Route::put('/items/{id}', [ItemController::class, 'update']);
    // Hanya Admin yang bisa DELETE (Skenario Soal 6d & 6e)
    Route::delete('/items/{id}', [ItemController::class, 'destroy'])->middleware('role:admin');

    // Route Categories
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/categories/{id}', [CategoryController::class, 'show']);
    Route::post('/categories', [CategoryController::class, 'store']);
    Route::put('/categories/{id}', [CategoryController::class, 'update']);
    // Hanya Admin yang bisa DELETE
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->middleware('role:admin');

});