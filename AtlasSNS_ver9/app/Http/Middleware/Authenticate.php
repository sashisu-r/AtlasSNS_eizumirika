<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

//use App\Http\Controllers\TopPageController;
use App\Http\Controllers\ProfileController;
//use App\Http\Controllers\UserSearchController;
use App\Http\Controllers\FollowsListController;
//use App\Http\Controllers\FollowerListController;

Route::middleware('auth')->group(function () {
    // トップページ
    Route::get('/top', [TopPageController::class, 'index'])->name('top');

    // プロフィール編集ページ
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

    // ユーザー検索ページ
    Route::get('/search', [UserSearchController::class, 'index'])->name('user.search');

    // フォローリストページ
    Route::get('/follows', [FollowListController::class, 'index'])->name('follows.list');

    // フォロワーリストページ
    Route::get('/followers', [FollowerListController::class, 'index'])->name('followers.list');

    // 相手ユーザーのプロフィールページ
    Route::get('/user/{id}', [ProfileController::class, 'show'])->name('user.profile');
});


class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
