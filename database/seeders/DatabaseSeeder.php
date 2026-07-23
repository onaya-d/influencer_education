<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Curriculum;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 配信画面用の初期データを登録（runのカッコの中に書きます）
        Curriculum::create([
            'id'          => 1,
            'category'    => '小学校1年生',
            'title'       => '授業タイトル',
            'description' => "ここに講座の説明等が入ります\nテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト\nテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト",
        ]);
    }
}