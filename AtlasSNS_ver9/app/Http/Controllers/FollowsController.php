<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class FollowsController extends Controller
{
    // フォローリストを表示する
    public function followList()
    {
        $user = Auth::user(); // ログイン中のユーザー
        if (!$user) {
            return redirect()->route('login')->with('error', 'ログインしてください。');
        }

        // フォローしているユーザーを取得
        $followings = $user->followings;

        return view('follows.followList', compact('followings'));
    }

    // フォロワーリストを表示する
    public function followerList()
    {
        $user = Auth::user(); // ログイン中のユーザー
        if (!$user) {
            return redirect()->route('login')->with('error', 'ログインしてください。');
        }

        // 自分をフォローしているユーザーを取得
        $followers = $user->followers;

        return view('follows.followerList', compact('followers'));
    }
}
