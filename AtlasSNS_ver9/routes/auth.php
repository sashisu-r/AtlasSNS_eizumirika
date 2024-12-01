<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {

    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('register', [RegisteredUserController::class, 'create']);
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('added', [RegisteredUserController::class, 'added']);
    Route::post('added', [RegisteredUserController::class, 'added']);
    Route::post('added', [RegisteredUserController::class, 'store']);

    Route::get('top', [PostsController::class, 'index']); //topページ表示ルーティング設定
    Route::post('top', [PostsController::class, 'index']);

    Route::get('profile', [ProfileController::class, 'profile']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('top', [PostsController::class, 'index'])->name('top');
    Route::get('profile', [ProfileController::class, 'profile'])->name('profile');
    Route::get('search', [UsersController::class, 'index'])->name('search');
    Route::get('followlist', [PostsController::class, 'index'])->name('follow.list');
    Route::get('followerlist', [PostsController::class, 'index'])->name('follower.list');
    Route::get('user/{id}', [UsersController::class, 'show'])->name('user.profile');
});
