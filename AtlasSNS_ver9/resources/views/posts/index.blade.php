<x-login-layout>


  <h2>機能を実装していきましょう。</h2>

  <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <!-- ログインユーザーのアイコンを表示 -->
        <img src="{{ Auth::user()->profile_image }}" alt="User Icon" class="user-icon">
        <!-- 投稿内容の入力欄 -->
        <textarea name="content" rows="4" placeholder="今何を考えていますか？" required></textarea>
    </div>
    <!-- 投稿ボタン（用意された画像を使用） -->
    <button type="submit" class="post-button">
        <img src="{{ asset('images/post.png') }}" alt="投稿">
    </button>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

</form>


</x-login-layout>
