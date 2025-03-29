<x-logout-layout>
{!! Form::open(['url' => '/added','method' => 'POST']) !!}
@csrf
<h2 class="welcome">新規ユーザー登録</h2>

{{ Form::label('username' ,'ユーザー名') }}
{{ Form::text('username', null, ['class' => 'input']) }}
@error('username')
    <div class="error">{{ $message }}</div>
@enderror

{{ Form::label('email','メールアドレス') }}
{{ Form::email('email', null, ['class' => 'input']) }}
@error('email')
    <div class="error">{{ $message }}</div>
@enderror

{{ Form::label('password','パスワード') }}
{{ Form::password('password',['class' => 'input']) }}
@error('password')
    <div class="error">{{ $message }}</div>
@enderror

{{ Form::label('password_confirmation','パスワード確認') }}
{{ Form::password('password_confirmation', ['class' => 'input']) }}
@error('password_confirmation')
    <div class="error">{{ $message }}</div>
@enderror

{{ Form::submit('新規登録',['class' => 'btn']) }}

<p><a href="login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


</x-logout-layout>
