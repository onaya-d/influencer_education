<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request; 👈 これは使わないのでコメントアウトか削除でOK
use App\Http\Requests\UserRegisterRequest; // 💡 追加：作成したリクエストファイルを読み込む
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
    // 💡 修正：引数を Request から UserRegisterRequest に変更します
    public function register(UserRegisterRequest $request)
    {
        // 💡 修正：ここにあった $request->validate([...]) は丸ごと削除します。
        // 引数を変更した時点で、裏側で自動的にバリデーションが実行されます。

       // 2. DB処理（詳細設計書の「DB処理」確認）
          $user = User::create([
       // ❌ 修正前: 'username' => $request->username,
          'name'     => $request->username, // ⭕ 修正後: 左側を 'name' に戻します！
          'kana'     => $request->kana,
          'email'    => $request->email,
          'password' => Hash::make($request->password),
        ]);

        // 3. 画面遷移（同じ画面に遷移する）
        // 💡 修正：back() にすることで、ルート名に関係なく「要求元の画面」へ安全に戻せます
        return back()->with('success', 'ユーザー登録が完了しました！');
    }
}