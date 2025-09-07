<div id="head">
    <h1>
        <a href="{{ route('posts.index') }}">
            <img src="{{ asset('images/atlas.png') }}">
        </a>
    </h1>
    <div id="right">
        <div id="name_area">
            <p>{{ Auth::user()->username }} さん</p>
            <button class="accordion-toggle">
                <span class="arrow"></span>
            </button>
            <img src="{{ asset('images/' . (Auth::user()->icon_image ?? 'icon1.png')) }}">
        </div>
        <ul class="accordion-menu">
            <li><a href="{{ route('posts.index') }}">ホーム</a></li>
            <li><a href="{{ route('profile') }}">プロフィール編集</a></li>
            <li><a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                ログアウト</a>
            </li>
        </ul>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function () {
  $('.accordion-toggle').click(function (e) {
    e.stopPropagation();

    $('.accordion-menu').slideToggle();

    // toggleでopenクラスを追加/削除
    $(this).toggleClass('open');
  });

  // メニュー以外クリックで閉じる
  $(document).click(function () {
    $('.accordion-menu').slideUp();
    $('.accordion-toggle').removeClass('open'); // ボタン状態戻す
  });
});
</script>
