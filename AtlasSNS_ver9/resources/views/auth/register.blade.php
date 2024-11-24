<x-logout-layout>
    <!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/added','method' => 'POST']) !!}
@csrf

<h2>新規ユーザー登録</h2>

{{ Form::label('ユーザー名') }}
{{ Form::text('username', null, ['class' => 'input']) }}
@error('username')
    <div class="error">{{ $message }}</div>
@enderror

{{ Form::label('メールアドレス') }}
{{ Form::email('email', null, ['class' => 'input']) }}
@error('email')
    <div class="error">{{ $message }}</div>
@enderror

{{ Form::label('パスワード') }}
{{ Form::text('password', null, ['class' => 'input']) }}
@error('password')
    <div class="error">{{ $message }}</div>
@enderror

{{ Form::label('パスワード確認') }}
{{ Form::text('password_confirmation', null, ['class' => 'input']) }}
@error('password_confirmation')
    <div class="error">{{ $message }}</div>
@enderror

{{ Form::submit('登録') }}

<p><a href="login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


</x-logout-layout>
