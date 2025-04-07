        <div id="head">
            <h1><a href=""><img src="images/atlas.png"></a></h1>
            <div id="right">
                <div id="name_area">
                    <p>〇〇 さん</p>
                    <button class="accordion-toggle">
                        <span class="arrow"></span>
                    </button>
                    <img src="">
                </div>
                <ul class="accordion-menu">
                    <li><a href="">ホーム</a></li>
                    <li><a href="">プロフィール</a></li>
                    <li><a href="">ログアウト</a></li>
                </ul>
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
