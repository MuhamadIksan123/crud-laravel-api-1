<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return "Test User";
});

Route::get('/todos', [TodoController::class, 'index']);
Route::get('/todos/{id}', [TodoController::class, 'show']);
Route::post('/todos', [TodoController::class, 'store'])->middleware(['auth:sanctum', 'can:post-todo']); // Vendor
Route::patch('/todos/{id}', [TodoController::class, 'update'])->middleware(['auth:sanctum', 'can:edit-todo']); // Editor
Route::delete('/todos/{id}', [TodoController::class, 'destroy'])->middleware(['auth:sanctum', 'can:delete-todo']); //admin

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::patch('/categories/{id}', [CategoryController::class, 'update']);
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

Route::prefix('auth')->group(function() {
    Route::post('/login', [AuthController::class, "login"]);
    Route::get('/logout', [AuthController::class, "logout"])->middleware('auth:sanctum');
});
