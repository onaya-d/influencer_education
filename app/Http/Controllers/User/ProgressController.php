<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Curriculum;
use App\Models\CurriculumProgress;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProgressController extends Controller
{
    public function index()
    {
        $user = User::firstOrCreate(
            [
                'email' => 'test@example.com',
            ],
            [
                'name' => '山田太郎',
                'kana' => 'ヤマダタロウ',
                'password' => Hash::make('password'),
            ]
        );

        $gradeGroups = Curriculum::getGroupedByGrade();

        $completedCurriculums =
            CurriculumProgress::getCompletedCurriculumIds($user->id);

        $currentGradeName = '小学1年生';

        return view('user.progress', [
            'user' => $user,
            'gradeGroups' => $gradeGroups,
            'completedCurriculums' => $completedCurriculums,
            'currentGradeName' => $currentGradeName,
        ]);
    }
}