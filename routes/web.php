<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [IndexController::class, "login"])->name('login');
Route::get('/register', [IndexController::class, "register"]);

Route::middleware(['auth'])->group(function () {
    Route::get('/', [IndexController::class, "dashboard"]);
    Route::get('/product', [IndexController::class, "product"]);
    Route::get('/logs', [IndexController::class, "logs"]);
    Route::get('/stock', [IndexController::class, "stock"]);
    Route::get('/user', [IndexController::class, "user"]);
    Route::get('/manage_division/{id}', [IndexController::class, "manage_division"]);
    Route::get('/product/{id}/edit', [IndexController::class, "editProduct"]);
});

//route user
Route::post('/login', [UserController::class, "login"]);
Route::post('/register', [UserController::class, "register"]);
Route::post('/logout', [UserController::class, "logout"]);
Route::post('/manage_division/{id}', [UserController::class, "manage_division"]);

//route products
Route::post('/product', [ProductController::class, "store"]);
Route::put('/product/{id}/edit', [ProductController::class, "update"]);
Route::delete('/product/{id}', [ProductController::class, "destroy"]);

//route stocks
Route::post('/stock', [ProductController::class, "stock"]);