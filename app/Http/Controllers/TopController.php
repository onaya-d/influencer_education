<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}