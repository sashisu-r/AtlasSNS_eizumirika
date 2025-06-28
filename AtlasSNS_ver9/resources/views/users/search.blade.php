<x-login-layout>

  {{-- 検索フォーム --}}
  <form action="{{ route('user.search') }}" method="GET" class="search">
    <input type="text" name="keyword" placeholder="ユーザー名" class="search-box"
           value="{{ old('keyword', $keyword ?? '') }}">
    <button type="submit">
      <img src="{{ asset('images/search.png') }}" alt="検索" class="search-png">
    </button>
  </form>

  {{-- 検索結果または全ユーザー一覧 --}}
  <div class="user-results">
    @if (isset($users) && $users->count())
      <ul>
        @foreach ($users as $user)
          <li>
            <a href="{{ url('/profile/'.$user->id) }}">
              {{-- ユーザーのアイコン（仮にimages/icon.png使用） --}}
              <img src="{{ asset('images/icon.png') }}" alt="アイコン" class="user-icon">
              {{ $user->username }}
            </a>
          </li>
        @endforeach
      </ul>
    @else
      <p>該当するユーザーが見つかりませんでした。</p>
    @endif
  </div>

</x-login-layout>
