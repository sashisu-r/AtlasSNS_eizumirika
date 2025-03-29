<x-logout-layout>
  <div id="clear">
    <p>{{ session('username') }} さん</p>
    <p>ようこそ！AtlasSNSへ！</p>
    <p>ユーザー登録が完了しました。</p>
    <p>早速ログインをしてみましょう。</p>

    <a href="{{ url('/login') }}" class="btn">ログイン画面へ</a>

  </div>
</x-logout-layout>
