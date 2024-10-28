        <div id="head">
            <h1><a href="/top"><img src="images/atlas.png"></a></h1>
            <div id="">
                <div id="">
                    <p>〇〇さん</p>
                    <span id="arrow" style="cursor: pointer;">▼</span> <!-- 下矢印 -->
                </div>
                <ul id="menu" style="display: none;"> <!-- 最初は非表示 -->
                    <li><a href="/top">ホーム</a></li>
                    <li><a href="/profile">プロフィール</a></li>
                    <li><a href="">ログアウト</a></li>
                </ul>
            </div>
        </div>

        <style>
        #menu {
          list-style-type: none; /* デフォルトのリストスタイルを削除 */
          padding: 0; /* パディングを削除 */
        }

        #menu li {
          margin: 5px 0; /* リストアイテムのマージン */
          }
          </style>

          <script>
          document.getElementById('arrow').addEventListener('click', function() {
            var menu = document.getElementById('menu');
            // メニューが表示されているかどうかを確認
            if (menu.style.display === 'none') {
            menu.style.display = 'block'; // 表示
            this.textContent = '▲'; // 上矢印に変更
            } else {
            menu.style.display = 'none'; // 非表示
            this.textContent = '▼'; // 下矢印に戻す
            }
        });
          </script>
