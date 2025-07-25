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
        // 投稿とその投稿者情報（user）を一緒に取得
        $posts = Post::with('user')->orderBy('created_at', 'desc')->get();

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

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', '投稿を削除しました');
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'post' => 'required|max:150',
        ]);

        $post->update([
            'post' => $request->post,
        ]);

        return redirect()->route('posts.index');
    }

}
