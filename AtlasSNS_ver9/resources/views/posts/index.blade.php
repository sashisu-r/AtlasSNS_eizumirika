<x-login-layout>

<div class="post-form">
  <form action="{{ url('/posts/create') }}" method="POST" style="width: 100%;">
    @csrf
    <textarea name="post" placeholder="投稿内容を入力してください" maxlength="150" required></textarea>
    <button type="submit" class="post-btn">
      <img src="{{ asset('images/post.png') }}" alt="投稿ボタン">
    </button>
  </form>
</div>

@foreach ($posts as $post)
  <div class="post-item">
    <p>{{ $post->post }}</p> {{-- 投稿内容表示 --}}
    <small>{{ $post->created_at->format('Y-m-d H:i') }}</small> {{-- 投稿日時表示 --}}
    <div class="button-area">
      <!-- 編集ボタン追加 -->
      <button type="button" class="edit-btn" data-post-id="{{ $post->id }}" data-post-content="{{ $post->post }}">
        <img src="{{ asset('images/edit.png') }}" alt="編集アイコン" class="edit-icon">
      </button>
      <!-- ゴミ箱ボタン追加 -->
      <button type="button" class="delete-btn" data-post-id="{{ $post->id }}">
        <img src="{{ asset('images/trash-h.png') }}" alt="ゴミ箱アイコン" class="trash-icon">
      </button>
    </div>
  </div>
@endforeach

<!-- 編集用モーダル -->
<div id="editModal" class="modal" style="display:none;">
  <div class="modal-content">
    <form id="editForm" method="POST" action="">
      @csrf
      @method('PUT')
      <textarea name="post" id="editPostContent" maxlength="150" required></textarea>
      <button type="submit"><img src="{{ asset('images/edit.png') }}" alt="編集アイコン" class="edit-icon">
      </button>
    </form>
  </div>
</div>

<!-- 削除モーダル -->
<div id="deleteModal" class="modal" style="display: none;">
  <div class="modal-content">
    <p>この投稿を削除します。よろしいでしょうか？</p>
    <div class="modal-buttons">
      <button id="confirmBtn">OK</button>
      <button id="cancelBtn">キャンセル</button>
    </div>
    <!-- Laravelのdelete用 -->
    <form id="deleteForm" method="POST">
      @csrf
      @method('DELETE')
    </form>
  </div>
</div>


<script>
document.addEventListener('DOMContentLoaded', function () {
  // ===== 編集ボタン関連 =====
  const editButtons = document.querySelectorAll('.edit-btn');
  const editModal = document.getElementById('editModal');
  const editForm = document.getElementById('editForm');
  const editPostContent = document.getElementById('editPostContent');
  const editCancelBtn = document.getElementById('editCancelBtn');

  // ===== 削除ボタン関連 =====
  const deleteButtons = document.querySelectorAll('.delete-btn');
  const deleteModal = document.getElementById('deleteModal');
  const deleteForm = document.getElementById('deleteForm');
  const cancelBtn = document.getElementById('cancelBtn');
  const confirmBtn = document.getElementById('confirmBtn');

  let currentPostId = null; // 削除対象の投稿IDを保持

  deleteButtons.forEach(button => {
    button.addEventListener('click', function () {
      const postId = this.dataset.postId;
      currentPostId = postId;

      // アイコン変更（視覚的なフィードバック）
      const icon = this.querySelector('.trash-icon');
      if (icon) {
        icon.src = "{{ asset('images/trash.png') }}";
      }

      // モーダル表示
      deleteModal.style.display = 'flex';
    });
  });

  // キャンセルボタンでモーダル閉じる
  cancelBtn.addEventListener('click', function () {
    deleteModal.style.display = 'none';
    currentPostId = null;

    // アイコンを元に戻す
    const icons = document.querySelectorAll('.trash-icon');
    icons.forEach(icon => {
      icon.src = "{{ asset('images/trash-h.png') }}";
    });
  });

  // OKボタン押したら削除フォーム送信
  confirmBtn.addEventListener('click', function () {
    if (currentPostId) {
      deleteForm.action = '/posts/' + currentPostId;
      deleteForm.submit();
    }
  });

  // ===== 編集モーダルの表示 =====
  editButtons.forEach(button => {
    button.addEventListener('click', function () {
      const postId = this.dataset.postId;
      const postContent = this.dataset.postContent;

      editModal.style.display = 'block';
      editPostContent.value = postContent;
      editForm.action = '/posts/' + postId;
    });
  });

  // 編集モーダルのキャンセル
  editCancelBtn.addEventListener('click', function () {
    editModal.style.display = 'none';
  });
});
</script>


</x-login-layout>
