<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;



Route::post('/register', [RegisterController::class, 'store'])->name('api.v1.register');
Route::post('/login', [LoginController::class, 'store'])->name('api.v1.login');

// Route::get('/categories', [CategoryController::class, 'index'])->name('api.v1.categories.index');
// Route::post('/categories/{category}', [CategoryController::class, 'store'])->name('api.v1.categories.store');
// Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('api.v1.categories.update');
// Route::delete('/categories/{category}', [CategoryController::class, 'delete'])->name('api.v1.categories.delete');

Route::apiResource('categories',CategoryController::class)->names('api.v1.register');
Route::apiResource('posts',PostController::class)->names('api.v1.posts');
