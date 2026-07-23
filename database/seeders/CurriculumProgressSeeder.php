<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurriculumProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('curriculum_progress')->insert([
            [
                'curriculums_id' => 1,
                'users_id' => 1,
                'clear_flg' => 1,
            ],
            [
                'curriculums_id' => 2,
                'users_id' => 1,
                'clear_flg' => 0,
            ],
            [
                'curriculums_id' => 3,
                'users_id' => 1,
                'clear_flg' => 0,
            ],
            [
                'curriculums_id' => 4,
                'users_id' => 1,
                'clear_flg' => 0,
            ],
            [
                'curriculums_id' => 5,
                'users_id' => 1,
                'clear_flg' => 1,
            ],
        ]);
    }
}