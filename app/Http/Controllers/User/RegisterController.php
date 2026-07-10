<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest; 
use App\Models\User; 
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * ユーザー新規登録画面を表示する
     */
    public function showRegisterForm()
    {
        return view('user.register'); 
    }

    /**
     * 登録ボタンが押されたときの処理（バリデーション＆DB保存）
     */
    
    public function register(UserRegisterRequest $request)
    {
        

       // 2. DB処理（詳細設計書の「DB処理」確認）
          $user = User::create([
          'name'     => $request->username, 
          'kana'     => $request->kana,
          'email'    => $request->email,
          'password' => Hash::make($request->password),
        ]);

        // 3. 画面遷移（同じ画面に遷移する）
        return back()->with('success', 'ユーザー登録が完了しました！');
    }
}