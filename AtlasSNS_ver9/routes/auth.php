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

    Route::get('login', [AuthenticatedSessionController::class, 'create']);
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('register', [RegisteredUserController::class, 'create']);
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('added', [RegisteredUserController::class, 'added']);
    Route::post('added', [RegisteredUserController::class, 'added']);
    Route::post('added', [RegisteredUserController::class, 'store']);

    Route::get('top', [PostsController::class, 'index']); //topページ表示ルーティング設定
    Route::post('top', [PostsController::class, 'index']);

});

Route::middleware('auth')->group(function () { //制限
    Route::get('top', [PostsController::class, 'index']);
    Route::get('profile', [ProfileController::class, 'profile']);
    Route::get('search', [UsersController::class, 'index']);
    Route::get('follow-list', [PostsController::class, 'index']);
    Route::get('follower-list', [PostsController::class, 'index']);
    Route::get('user/{id}', [UsersController::class, 'show']); // 相手ユーザーのプロフィールページ
});
