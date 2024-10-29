<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
    public function index(){
        return view('posts.index');
    }

    public function store(Request $request)
{
    $request->validate([
        'content' => 'required|string|min:1|max:150',
    ]);

    // 新規投稿を保存する
    $post = new Post();
    $post->user_id = auth()->id();
    $post->content = $request->input('content');
    $post->save();

    return redirect()->route('top')->with('success', '投稿が完了しました！');
}

}
