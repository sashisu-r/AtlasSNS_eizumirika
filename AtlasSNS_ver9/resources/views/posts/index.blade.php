<x-login-layout>


  <h2>機能を実装していきましょう。</h2>

  <div class="post-container">
    <form method="POST" class="post-form">
      <textarea name="content" placeholder="投稿内容を入力してください (1〜150文字)" required maxlength="150" class="post-textarea"></textarea>
      <button type="submit" class="post-btn">
        <img src="images/post.png" alt="投稿ボタン">
      </button>
    </form>
  </div>

  <style>
    .post-container {
      display: flex;
      align-items: flex-start;
      gap: 10px;
      margin: 20px;
    }

    .post-form {
      position: relative;
      width: 100%;
    }

    .post-textarea {
      width: 100%;
      height: 100px;
      padding: 10px;
      font-size: 14px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }

    .post-btn {
      position: absolute;
      bottom: 10px;
      right: 10px;
      background: none;
      border: none;
      padding: 0;
      cursor: pointer;
    }

    .post-btn img {
      width: 40px;
      height: 40px;
    }
  </style>

</x-login-layout>
