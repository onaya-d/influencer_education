<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * ログインボタンが押された時のイベント処理
     */
    public function login(Request $request)
    {
        // 1. バリデーションチェック
        $credentials = $request->validate([
            'email'    => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'max:32'],
        ], [
            'email.required'    => 'メールアドレスを入力してください。',
            'email.email'       => '有効なメールアドレスの形式で入力してください。',
            'password.required' => 'パスワードを入力してください。',
            'password.min'      => 'パスワードは半角英数字8〜32文字で入力してください。',
            'password.max'      => 'パスワードは半角英数字8〜32文字で入力してください。',
        ]);

        // 2. ログイン認証
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        // 3. 認証失敗時
        return back()->withErrors([
            'email' => 'メールアドレスまたはパスワードが正しくありません。',
        ])->onlyInput('email');
    }
}