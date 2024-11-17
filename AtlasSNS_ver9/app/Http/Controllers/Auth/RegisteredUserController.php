<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
    //バリデーション
      $request->validate([
        // required：必須項目 string：文字列指定 max：最大文字数 min：最低文字数 email：メールアドレス形式 unique:テーブル名 カラム名：テーブル名のカラムで重複不可 'regex:/^[a-zA-Z0-9]+$/'：英数字のみ confirmed：同じ名前の入力フィールドと一致する必要あり
        'username' => 'required|string|min:2|max:12', // 入力必須 / 2文字以上12文字以下
        'email' => 'required|string|email|min:5|max:40|unique:users,email', // 入力必須 / メールアドレス形式 / 5文字以上40文字以内 / 登録済みメールアドレス使用不可
        'password' => [
            'required',
            'string',
            'min:8',
            'max:20',
            'regex:/^[a-zA-Z0-9]+$/',
            'confirmed', // 入力必須 / 8文字以上20文字以内 / 英数字のみ /パスワード欄とパスワード確認欄一致
        ],
        ], [
            //入力時エラーの場合のメッセージ
            'username.required' => 'ユーザー名は必須です。',
            'username.min' => 'ユーザー名は2文字以上で入力してください。',
            'username.max' => 'ユーザー名は12文字以内で入力してください。',
            'email.required' => 'メールアドレスは必須です。',
            'email.min' => 'メールアドレスは5文字以上で入力してください。',
            'email.max' => 'メールアドレスは40文字以内で入力してください。',
            'email.unique' => 'このメールアドレスは既に登録されています。',
            'email.email' => '正しいメールアドレス形式で入力してください。',
            'password.required' => 'パスワードは必須です。',
            'password.regex' => 'パスワードは英数字のみで入力してください。',
            'password.min' => 'パスワードは8文字以上で入力してください。',
            'password.max' => 'パスワードは20文字以内で入力してください。',
            'password.confirmed' => 'パスワードが一致しません。',
            ]);

        //ユーザー作成
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('added')->with('username',$user->username); //新規ユーザー登録画面で登録したユーザー名を/addedで表示するためにデータを渡す
    }

    public function added(): View
    {
        return view('auth.added');
    }
}
