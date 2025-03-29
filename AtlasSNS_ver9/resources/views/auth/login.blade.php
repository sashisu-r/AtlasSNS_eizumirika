<x-logout-layout>

  <!-- 適切なURLを入力してください -->
  {!! Form::open(['url' => '/index']) !!}

  <p class="welcome">AtlasSNSへようこそ</p>

  {{ Form::label('email','メールアドレス') }}
  {{ Form::text('email',null,['class' => 'input']) }}
  {{ Form::label('password','パスワード') }}
  {{ Form::password('password',['class' => 'input']) }}

  {{ Form::submit('ログイン',['class' => 'btn']) }}

  <p><a href="register">新規ユーザーの方はこちら</a></p>

  {!! Form::close() !!}

</x-logout-layout>
