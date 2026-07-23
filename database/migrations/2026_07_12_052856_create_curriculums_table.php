<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('curriculums', function (Blueprint $table) {
        $table->id();

        // カリキュラムタイトル
        $table->string('title', 255);

        // サムネイル画像
        $table->string('thumbnail', 255)->nullable();

        // 説明文
        $table->longText('description')->nullable();

        // 動画URL
        $table->mediumText('video_url')->nullable();

        // 常時公開フラグ
        $table->tinyInteger('always_delivery_flg')->default(0);

        // 学年ID
        $table->unsignedBigInteger('grade_id');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curriculums');
    }
};
