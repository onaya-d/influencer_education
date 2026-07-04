<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * ユーザー新規登録画面を表示する
     */
    public function showRegisterForm()
    {
        // resources/views/user/register.blade.php を表示
        return view('user.register'); 
    }

    /**
     * 登録ボタンが押されたときの処理（バリデーション＆DB保存）
     */
    public function register(Request $request)
    {
        // 1. バリデーション（詳細設計書の「バリデーションルール」確認）
        $request->validate([
            // カナ（必須、全角カタカナ）
            'kana' => 'required|regex:/^[ア-ンヴー]*$/u', 

            // メールアドレス（必須、半角、メール形式、重複不可）
            'email' => 'required|email|unique:users,email', 

            // パスワード（必須、最小8文字、最大32文字、半角、確認用と一致）
            'password' => 'required|string|min:8|max:32|confirmed', 
        ]);

        // 2. DB処理（詳細設計書の「DB処理」確認）
        $user = User::create([
            'name' => $request->name,
            'kana' => $request->kana,
            'email' => $request->email,
            'password' => Hash::make($request->password), // ⚠️パスワードは絶対にそのまま保存してはだめ！Hash::makeで暗号化！

        ]);

        // 3. 画面遷移（詳細設計書の「イベント処理」確認）
        // 👇 修正後（行き先を、今ある登録画面 'user.show.register' に変更します）
        return redirect()->route('user.show.register')->with('success', 'ユーザー登録が完了しました！');
    }
}