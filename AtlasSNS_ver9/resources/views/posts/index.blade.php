<x-login-layout>

<div class="post-form">
  <form action="{{ route('post.create') }}" method="POST" style="width: 100%;">
    @csrf
    <textarea name="post" placeholder="投稿内容を入力してください" maxlength="150" required></textarea>
    <button type="submit" class="post-btn">
      <img src="{{ asset('images/post.png') }}" alt="投稿ボタン">
    </button>
  </form>
</div>

@foreach ($posts as $post)
  <div class="post-item">
    <p>{{ $post->content }}</p> {{-- 投稿内容表示 --}}
    <small>{{ $post->created_at->format('Y年m月d日 H:i') }}</small> {{-- 投稿日時表示 --}}
  </div>
@endforeach

</x-login-layout>
