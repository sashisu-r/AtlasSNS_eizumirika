<x-login-layout>

<div class="profile-container">
  {{-- 左カラム：プロフィール編集フォーム --}}
  <div class="profile-left">
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label>ユーザー名</label>
        <input type="text" name="username" >
      </div>

      <div class="form-group">
        <label>メールアドレス</label>
        <input type="email" name="email" >
      </div>

      <div class="form-group">
        <label>パスワード</label>
        <input type="password" name="password">
      </div>

      <div class="form-group">
        <label>パスワード確認</label>
        <input type="password" name="password_confirmation">
      </div>

      <div class="form-group">
        <label>自己紹介</label>
        <textarea>aaa</textarea>
      </div>

      <div class="form-group">
        <label>アイコン画像</label>
        <img src="{{ asset('images/' . ($user->icon_image ?? 'icon1.png')) }}" alt="アイコン" class="user-icon">

        <br>

        <input type="file" name="icon_image" accept="image/*">
      </div>

      <button type="submit" class="update-btn">更新</button>
    </form>
  </div>

</div>

</x-login-layout>
