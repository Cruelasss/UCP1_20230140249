<?php
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\AuthController;

// Rute Publik (Tanpa Login)
Route::post('/login', [AuthController::class, 'getToken']);

// Product - Publik (READ)
Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'show']);

// Category - Publik (READ)
Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category/{category}', [CategoryController::class, 'show']);

// Rute Privat (Wajib pakai Bearer Token)
Route::middleware('auth:sanctum')->group(function () {
    // CRUD Product (CREATE, UPDATE, DELETE)
    Route::post('/product', [ProductController::class, 'store']);
    Route::put('/product/{id}', [ProductController::class, 'update']);
    Route::delete('/product/{id}', [ProductController::class, 'destroy']);

    // CRUD Category (CREATE, UPDATE, DELETE)
    Route::post('/category', [CategoryController::class, 'store']);
    Route::put('/category/{category}', [CategoryController::class, 'update']);
    Route::delete('/category/{category}', [CategoryController::class, 'destroy']);
});