<x-logout-layout>
  <!-- 適切なURLを入力してください ルーティング -->
  {!! Form::open(['url' => '/top']) !!}
<!-- /top を開く -->

  <p>AtlasSNSへようこそ</p>

  {{ Form::label('email') }}
  {{ Form::text('email',null,['class' => 'input']) }}
  {{ Form::label('password') }}
  {{ Form::password('password',['class' => 'input']) }}

  {{ Form::submit('ログイン') }}

  <p><a href="register">新規ユーザーの方はこちら</a></p>

  {!! Form::close() !!}

</x-logout-layout>
