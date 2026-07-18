<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Curriculum;
use Illuminate\Support\Facades\DB; 

class LessonController extends Controller
{
    // 授業詳細画面を表示
    public function show($id)
    {
        $lesson = Curriculum::findOrFail($id);
        return view('lesson', compact('lesson'));
    }

    // 受講完了ボタンを押したときの処理
    public function complete($id)
    {
        // ログインしているユーザーのIDを取得
        $userId = auth()->id() ?? 1;

        // ★ マイグレーション側のカラム名
        DB::table('curriculum_progress')->updateOrInsert(
            [
                'users_id' => $userId,          // user_id から変更
                'curriculums_id' => $id,        // curriculum_id から変更
            ],
            [
                'clear_flg' => 1,               // is_clear から変更
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        return redirect()->back()->with('success', '受講を完了しました！');
    }
}