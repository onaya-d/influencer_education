<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert([
    [
        'id' => 1,
        'name' => '山田太郎',
        'name_kana' => 'ヤマダタロウ',
        'email' => 'test@example.com',
        'password' => Hash::make('password'),
        'profile_image' => 'profile.png',
        'grade_id' => 1,
    ],
]);
    }
}