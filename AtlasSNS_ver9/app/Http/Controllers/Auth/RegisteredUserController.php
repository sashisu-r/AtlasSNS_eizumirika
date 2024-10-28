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
        'username' => 'required|string|min:2|max:12',
        'email' => 'required|string|email|min:5|max:40|unique:users,email',
        'password' => 'required|string|min:8|max:20|regex:/^[a-zA-Z0-9]+$/|confirmed',
        ], [
        'username.required' => 'ユーザー名は必須です。',
        'username.min' => 'ユーザー名は2文字以上である必要があります。',
        'username.max' => 'ユーザー名は12文字以内である必要があります。',
        'email.required' => 'メールアドレスは必須です。',
        'email.email' => '有効なメールアドレスを入力してください。',
        'email.unique' => 'このメールアドレスは既に使用されています。',
        'password.required' => 'パスワードは必須です。',
        'password.min' => 'パスワードは少なくとも8文字でなければなりません。',
        'password.max' => 'パスワードは20文字以内である必要があります。',
        'password.regex' => 'パスワードは英数字のみで構成される必要があります。',
        'password.confirmed' => 'パスワードが一致しません。',
        ]);

        //ユーザー作成
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //セッションにユーザー名保存
        session(['username' =>$user->username]);

        return redirect()->route('added')->with('username', $user->username);
    }

    public function added(): View
    {
        return view('auth.added');
    }
}
