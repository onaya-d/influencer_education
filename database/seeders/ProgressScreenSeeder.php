<?php

namespace Database\Seeders;

use App\Models\Curriculum;
use App\Models\CurriculumProgress;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ProgressScreenSeeder extends Seeder
{
    public function run()
    {
        $grades = [
            '小学1年生',
            '小学2年生',
            '小学3年生',
            '小学4年生',
            '小学5年生',
            '小学6年生',
            '中学1年生',
            '中学2年生',
            '中学3年生',
            '高校1年生',
            '高校2年生',
            '高校3年生',
        ];

        foreach ($grades as $grade) {
            for ($number = 1; $number <= 5; $number++) {
                Curriculum::updateOrCreate(
                    [
                        'category' => $grade,
                        'title' => '授業タイトル' . $number,
                    ],
                    [
                        'description' => null,
                    ]
                );
            }
        }

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

        $completedCurriculums = Curriculum::where('category', '小学1年生')
            ->orderBy('id')
            ->take(2)
            ->get();

        foreach ($completedCurriculums as $curriculum) {
            CurriculumProgress::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'curriculum_id' => $curriculum->id,
                ],
                [
                    'clear_flg' => 1,
                ]
            );
        }
    }
}