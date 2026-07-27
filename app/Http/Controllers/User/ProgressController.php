<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\User;
use App\Models\CurriculumProgress;

class ProgressController extends Controller
{
    /**
     * 授業進捗画面
     */
    public function index()
    {
        // テストユーザー取得
        $user = User::with([
            'grade',
            'curriculumProgresses',
        ])->findOrFail(1);

        // 全学年とカリキュラム取得
        $grades = Grade::with('curriculums')->get();

        // 受講済みカリキュラムID一覧
       $completedCurriculums = CurriculumProgress::getCompletedCurriculumIds($user->id);

        return view('user.progress', [
            'user' => $user,
            'grades' => $grades,
            'completedCurriculums' => $completedCurriculums,
        ]);
    }
}