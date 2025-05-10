<x-login-layout>

  {{-- フォロー中のユーザーのアイコン表示 --}}
  <div class="follow-list-top">
    <h3>フォローリスト</h3>
      <a href="#">
        <img src="images/icon2.png" class="follow-list-icon">
      </a>
  </div>

  {{-- フォロー中ユーザーの投稿一覧表示 --}}
  <div class="follow-list-all">
      <div class="follow-list-content">
        <a href="#">
          <img src="images/icon2.png" class="follow-list-icon">
        </a>
        <div class="follow-text">
          <h4>ユーザー名</h4>
          <p>投稿内容</p>
        </div>
      </div>
  </div>

</x-login-layout>
