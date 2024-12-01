        <div id="head">
            <a href="{{ url('top') }}"> <!-- 'top' へのリンクを追加 -->
                <h1><a><img src="images/atlas.png" alt="Atlas Logo"></a></h1>
            <div id="menu"> <!-- div名付ける -->
                <div id="user-info">
                    <p>〇〇さん</p>
                </div>
                <div class="accordion">
                    <button class="accordion-toggle">
                        メニュー <span class="arrow">V</span>
                    </button>
                    <ul class="accordion-content">
                        <li><a href="{{ url('top') }}">ホーム</a></li>
                        <li><a href="{{ url('profile') }}">プロフィール編集</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                @csrf
                                <button type="submit" style="background: none; border: none; color: blue; cursor: pointer; padding: 0;">ログアウト</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- CSSを直接埋め込む -->
        <style>
        .accordion {
            position: relative;
            display: inline-block;
        }

        .accordion-toggle {
            background: none;
            border: none;
            font-size: 16px;
            cursor: pointer;
            display: flex;
            align-items: center;
        }

        .accordion-toggle .arrow {
            margin-left: 5px;
            transition: transform 0.3s ease;
        }

        .accordion-content {
            display: none;
            list-style: none;
            padding: 0;
            margin: 0;
            background-color: #f4f4f4;
            border: 1px solid #ccc;
        }

        .accordion-content li {
            padding: 8px 12px;
        }

        .accordion-content li a {
            text-decoration: none;
            color: #333;
        }

        .accordion-content li:hover {
            background-color: #ddd;
        }

        .accordion.active .arrow {
            transform: rotate(180deg);
        }

        </style>

        <!-- JavaScriptを直接埋め込む -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const toggleButton = document.querySelector('.accordion-toggle');
                const content = document.querySelector('.accordion-content');
                const accordion = document.querySelector('.accordion');

                toggleButton.addEventListener('click', function () {
                    content.style.display = content.style.display === 'block' ? 'none' : 'block';
                    accordion.classList.toggle('active');
                });
            });
        </script>
