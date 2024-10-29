<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\PostsController;

use Illuminate\Support\Facades\Route;

// ゲストミドルウェア
Route::middleware('guest')->group(function () {

    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('added');
    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('added');

    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('added', [RegisteredUserController::class, 'added'])->name('added');
    Route::post('added', [RegisteredUserController::class, 'added']);
    Route::post('added', [RegisteredUserController::class, 'store'])->name('register.store');

});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

    Route::post('/top',[PostsController::class, 'index']);

    Route::post('/post', [PostController::class, 'store'])->name('post.store');
