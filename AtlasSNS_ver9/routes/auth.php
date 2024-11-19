<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\PostsController;

use Illuminate\Support\Facades\Route;

// ゲストミドルウェア：未認証のユーザー専用ルート（新規ユーザー登録）
Route::middleware('guest')->group(function () {
    //ログイン関連
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login'); //loginと定義 ログインフォーム表示
    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.store'); //ルート名login.storeと定義 ログイン処理

    //新規登録関連
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register'); //ルート名registerと定義 新規登録ページ
    Route::post('register', [RegisteredUserController::class, 'store'])->name('register.store'); //ルート名register.storeと定義 新規登録ページ;

    Route::get('added', [RegisteredUserController::class, 'added'])->name('added'); //ルート名addedと定義 登録完了ページ
    Route::post('added', [RegisteredUserController::class, 'added']);
    Route::post('added', [RegisteredUserController::class, 'store'])->name('register.store');
});
