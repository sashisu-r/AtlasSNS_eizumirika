<x-login-layout>


  <h2>機能を実装していきましょう。</h2>

  <ul>
    @foreach ($followings as $following)
        <li>{{ $following->name }}</li>
    @endforeach
  </ul>

</x-login-layout>
