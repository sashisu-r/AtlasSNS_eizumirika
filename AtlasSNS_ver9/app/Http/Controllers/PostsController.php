<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostsController extends Controller
{
    public function __construct()
    {
      // ログインしているユーザーのみアクセス可
      $this->middleware('auth');
    }

    public function index()
    {
    $posts = Post::orderBy('created_at', 'desc')->get();
    return view('posts.index', compact('posts'));
    }

    // 投稿処理用のcreateメソッド
    public function create(Request $request)
    {
      // バリデーション
      $request->validate([
        'post' => 'required|max:150',
      ]);

      // 投稿を保存
      Post::create([
        'user_id' => auth()->id(),
        'post' => $request->post,
      ]);

      // 投稿後、トップページへ戻る
      return redirect()->route('posts.index');
    }
}
