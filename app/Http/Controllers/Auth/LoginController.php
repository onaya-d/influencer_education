<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest; 
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * ログインボタンが押された時のイベント処理
     */
    public function login(LoginRequest $request) 
    {
        // 1. バリデーション済みのデータを取得する
        // フォームリクエスト（LoginRequest）側でチェックが終わった安全なデータだけが取得できます
        $credentials = $request->validated();

        // 2. ログイン認証
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // 正常にログインできたら、トップ画面（/home）に遷移させる
            return redirect('/home'); 
        }

        // 3. 認証失敗時
        return back()->withErrors([
            'email' => 'メールアドレスまたはパスワードが正しくありません。',
        ])->onlyInput('email');
    }
}