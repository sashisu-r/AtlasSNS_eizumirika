<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <!--IEブラウザ対策-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="ページの内容を表す文章" />
  <title></title>
  <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
  <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <!--スマホ,タブレット対応-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Scripts -->
  <!--サイトのアイコン指定-->
  <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
  <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
  <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
  <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
  <!--iphoneのアプリアイコン指定-->
  <link rel="apple-touch-icon-precomposed" href="画像のURL" />
  <!--OGPタグ/twitterカード-->
</head>

<body>
  <header>
    @include('layouts.navigation')
  </header>
  <!-- Page Content -->
  <div id="row">
    <div id="container">
      {{ $slot }}
    </div>
    <div id="side-bar">
      <div id="confirm">
        <p>◯◯さんの</p>
        <div class="follow_member">
          <p>フォロー数</p>
            <p>◯◯名</p>
        </div>

        <!-- フォローリストボタン -->
        <div class="btn-wrapper">
          <a href="{{ url('/followlist') }}" class="btn-side">フォローリスト</a>
        </div>
        <div class="follower_member">
          <p>フォロワー数</p>
          <p>◯◯名</p>
        </div>

        <!-- フォロワーリストボタン -->
        <div class="btn-wrapper">
          <a href="{{ url('/followerlist') }}" class="btn-side">フォロワーリスト</a>
        </div>

        <!-- 区切り線 -->
        <hr class="sidebar-separator">

        <!-- ユーザー検索ボタン -->
        <div class="search-btn">
          <a href="{{ url('/search') }}">ユーザー検索</a>
        </div>
      </div>
    </div>
  </div>
  <footer>
  </footer>
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="JavaScriptファイルのURL"></script>
  <script src="JavaScriptファイルのURL"></script>
</body>

</html>
