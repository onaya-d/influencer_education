<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Curriculum;
use App\Models\CurriculumProgress;
use App\Models\User;

class ProgressController extends Controller
{
    public function index()
    {
        $user = User::getProgressUser();

        $gradeGroups = Curriculum::getGroupedByGrade();

        $completedCurriculums =
            CurriculumProgress::getCompletedCurriculumIds($user->id);

        return view('user.progress', [
            'user' => $user,
            'gradeGroups' => $gradeGroups,
            'completedCurriculums' => $completedCurriculums,
            'currentGradeName' => '小学1年生',
        ]);
    }
}