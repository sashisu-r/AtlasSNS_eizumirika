<?php

// app/Http/Controllers/UsersController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    // 検索画面＋ユーザー一覧表示
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        if (!empty($keyword)) {
            $users = User::where('username', 'like', "%{$keyword}%")->get();
        } else {
            $users = User::all(); // キーワードが空なら全件表示
        }

        return view('users.search', compact('users', 'keyword'));
    }
}
