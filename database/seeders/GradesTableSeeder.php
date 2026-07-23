<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grades')->insert([
            [
                'id' => 1,
                'name' => '小学1年生',
            ],
            [
                'id' => 2,
                'name' => '小学2年生',
            ],
            [
                'id' => 3,
                'name' => '小学3年生',
            ],
            [
                'id' => 4,
                'name' => '中学1年生',
            ],
            [
                'id' => 5,
                'name' => '中学2年生',
            ],
            [
                'id' => 6,
                'name' => '中学3年生',
            ],
            [
                'id' => 7,
                'name' => '高校1年生',
            ],
            [
                'id' => 8,
                'name' => '高校2年生',
            ],
            [
                'id' => 9,
                'name' => '高校3年生',
            ],
        ]);
    }
}