<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurriculumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $curriculums = [];

        for ($grade = 1; $grade <= 12; $grade++) {

            for ($lesson = 1; $lesson <= 5; $lesson++) {

                $curriculums[] = [
                    'title' => "授業タイトル{$lesson}",
                    'thumbnail' => null,
                    'description' => "授業タイトル{$lesson}の説明",
                    'video_url' => null,
                    'always_delivery_flg' => 1,
                    'grade_id' => $grade,
                ];
            }
        }

        DB::table('curriculums')->insert($curriculums);
    }
}