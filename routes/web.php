<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/post/{id}', [HomeController::class, 'show'])->name('home.show');
Route::get('/category/{id}', [HomeController::class, 'category'])->name('home.category');
Route::get('/tag/{id}', [HomeController::class, 'tag'])->name('home.tag');

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::resource('categories', CategoryController::class);
    Route::resource('posts', PostController::class);
    Route::resource('tags', TagController::class);
});
