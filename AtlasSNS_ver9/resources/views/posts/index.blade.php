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

    {{-- 投稿者アイコンと名前（横並び） --}}
    <div class="post-user">
      <a href="{{ route('profile', ['id' => $post->user->id]) }}">
        <img src="{{ asset('images/' . ($post->user->icon_image ?? 'icon1.png')) }}" alt="アイコン" class="user-icon">

      </a>
      <span class="user-name">{{ $post->user->username }}</span>
    </div>

    {{-- 投稿内容 --}}
    <p>{!! nl2br(e($post->post)) !!}</p>
    <small>{{ $post->created_at->format('Y-m-d H:i') }}</small>

    {{-- 編集・削除ボタン --}}
    <div class="button-area">
      <button type="button" class="edit-btn" data-post-id="{{ $post->id }}" data-post-content="{{ $post->post }}">
        <img src="{{ asset('images/edit.png') }}" alt="編集アイコン" class="edit-icon">
      </button>

      <button type="button" class="delete-btn" data-post-id="{{ $post->id }}">
        <img src="{{ asset('images/trash-h.png') }}" alt="ゴミ箱アイコン" class="trash-icon">
      </button>
    </div>

  </div>
@endforeach

{{-- 編集モーダル --}}
<div id="editModal" class="modal">
  <div class="modal-content">
    <form id="editForm" method="POST" action="">
      @csrf
      @method('PUT')
      <textarea name="post" id="editPostContent" maxlength="150" required></textarea>
      <button type="submit">
        <img src="{{ asset('images/edit.png') }}" alt="編集アイコン" class="edit-icon">
      </button>
    </form>
  </div>
</div>

{{-- 削除モーダル --}}
<div id="deleteModal">
  <div class="modal-content">
    <p>この投稿を削除します。よろしいでしょうか？</p>
    <form id="deleteForm" method="POST">
      @csrf
      @method('DELETE')
      <button type="submit" class="ok-btn" id="confirmBtn">OK</button>
      <button type="button" id="cancelBtn" class="cancel-btn">キャンセル</button>
    </form>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.edit-btn');
    const editModal = document.getElementById('editModal');
    const editForm = document.getElementById('editForm');
    const editPostContent = document.getElementById('editPostContent');

    const deleteButtons = document.querySelectorAll('.delete-btn');
    const deleteModal = document.getElementById('deleteModal');
    const deleteForm = document.getElementById('deleteForm');
    const cancelBtn = document.getElementById('cancelBtn');
    const confirmBtn = document.getElementById('confirmBtn');

    let currentPostId = null;

    deleteButtons.forEach(button => {
      button.addEventListener('click', function () {
        currentPostId = this.dataset.postId;
        this.querySelector('.trash-icon').src = "{{ asset('images/trash.png') }}";
        deleteModal.style.display = 'flex';
      });
    });

    cancelBtn.addEventListener('click', function () {
      deleteModal.style.display = 'none';
      currentPostId = null;
      document.querySelectorAll('.trash-icon').forEach(icon => {
        icon.src = "{{ asset('images/trash-h.png') }}";
      });
    });

    confirmBtn.addEventListener('click', function () {
      if (currentPostId) {
        deleteForm.action = '/posts/' + currentPostId;
        deleteForm.submit();
      }
    });

    editButtons.forEach(button => {
      button.addEventListener('click', function () {
        const postId = this.dataset.postId;
        const postContent = this.dataset.postContent;
        editModal.style.display = 'flex';
        editPostContent.value = postContent;
        editForm.action = '/posts/' + postId;
      });
    });
  });
</script>

</x-login-layout>
