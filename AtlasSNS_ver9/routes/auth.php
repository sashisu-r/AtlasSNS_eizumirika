<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/added', [RegisteredUserController::class, 'added']);
    Route::post('/added', [RegisteredUserController::class, 'added']);
    Route::post('/added', [RegisteredUserController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    // GETメソッドのみ残す
    Route::get('/index', [PostsController::class, 'index'])->name('posts.index');

    // 投稿処理
    Route::post('/posts/create', [PostsController::class, 'create'])->name('post.create');
    Route::get('/profile', [ProfileController::class, 'profile']);
    Route::delete('/posts/{post}', [PostsController::class, 'destroy'])->name('post.destroy');
    Route::put('/posts/{post}', [PostsController::class, 'update'])->name('post.update');

    // フォローリスト表示用ルート
    Route::get('/followlist', [FollowsController::class, 'followList'])->name('follow.list');

    // フォロワーリスト表示用ルート
    Route::get('/followerlist', [FollowsController::class, 'followerList'])->name('follower.list');

    // 検索画面
    Route::get('/search', [UsersController::class, 'search'])->name('user.search');

    // プロフィール編集画面
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');

    // プロフィール更新処理（ここが必要！）
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
});
