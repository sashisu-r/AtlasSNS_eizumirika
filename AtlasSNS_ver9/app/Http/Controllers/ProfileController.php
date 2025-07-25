<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{
    public function profile() {
    $user = Auth::user();
    return view('profiles.profile', compact('user'));
}

public function update(Request $request)
{
    $user = Auth::user();

    // バリデーション（必要に応じて）
    $request->validate([
        'username' => 'required|string|max:255',
        'email' => 'required|email',
        'password' => 'nullable|string|min:8|confirmed',
        'icon_image' => 'nullable|image|max:2048', // 画像ファイルのみ
    ]);

    // 入力内容を更新
    $user->username = $request->username;
    $user->email = $request->email;

    if ($request->filled('password')) {
        $user->password = bcrypt($request->password);
    }

    // アイコン画像の保存処理
    if ($request->hasFile('icon_image')) {
        $file = $request->file('icon_image');
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images'), $filename); // ← ここがポイント

        // 旧画像の削除処理（任意）
        if ($user->icon_image && file_exists(public_path('images/' . $user->icon_image))) {
            unlink(public_path('images/' . $user->icon_image));
        }

        $user->icon_image = $filename;
    }

    $user->save();

    return redirect()->route('profile')->with('success', 'プロフィールを更新しました');
}
}
