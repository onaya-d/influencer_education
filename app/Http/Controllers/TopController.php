<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// ★ ログアウト処理に必要な設定（Auth）をここに追加しました
use Illuminate\Support\Facades\Auth;

class TopController extends Controller
{
    /**
     * トップ画面を表示する
     */
    public function index()
    {
        // 'top' という名前のビューファイル（画面）を表示する設定です
        return view('top');
    }

    /**
     * ★ 新しく追加：ログアウト処理を行う
     */
    public function logout(Request $request)
    {
        Auth::logout(); // ログイン状態を解除する

        $request->session()->invalidate(); // セッション（ログイン情報）を破棄する
        $request->session()->regenerateToken(); // セキュリティ用のトークンを再生成する

        return redirect('/login'); // ログイン画面（/login）に自動で移動させる
    }
}

