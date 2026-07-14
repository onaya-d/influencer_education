<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest; 
use App\Models\User; 

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('user.register'); 
    }

    public function register(UserRegisterRequest $request)
    {
        // 💡 DBへの保存処理をモデルに任せる！
        $user = User::register($request->all());

        return back()->with('success', 'ユーザー登録が完了しました！');
    }
}