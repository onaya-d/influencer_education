<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('articles')->updateOrInsert(
            ['id' => 1],
            [
                'title' => 'お知らせタイトル',
                'posted_date' => '2023-07-21 00:00:00',
                'article_contents' => 'お知らせの本文がここに入ります。テキストテキストテキストテキストテキストテキスト
テキストテキストテキストテキストテキストテキストテキストテキストテキスト
テキストテキストテキストテキストテキストテキストテキストテキストテキスト
テキストテキストテキストテキストテキストテキストテキストテキストテキスト
テキストテキストテキストテキストテキストテキストテキストテキストテキスト
テキストテキストテキストテキストテキストテキストテキストテキストテキスト
テキストテキストテキストテキストテキストテキストテキストテキストテキスト',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}