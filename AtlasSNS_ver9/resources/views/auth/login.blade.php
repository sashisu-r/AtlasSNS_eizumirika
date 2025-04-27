<x-logout-layout>
  <!-- ログインフォームを '/login' に送信する -->
  {!! Form::open(['url' => route('login'), 'method' => 'POST']) !!}

  <p class="welcome">AtlasSNSへようこそ</p>

  {{ Form::label('email', 'メールアドレス') }}
  {{ Form::text('email', null, ['class' => 'input']) }}
  {{ Form::label('password', 'パスワード') }}
  {{ Form::password('password', ['class' => 'input']) }}

  {{ Form::submit('ログイン', ['class' => 'btn']) }}

  <p><a href="{{ route('register') }}">新規ユーザーの方はこちら</a></p>

  {!! Form::close() !!}

</x-logout-layout>
