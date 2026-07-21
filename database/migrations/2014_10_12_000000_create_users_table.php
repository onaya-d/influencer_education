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
       Schema::create('users', function (Blueprint $table) {
    $table->id();

    // ユーザー名
    $table->string('name');

    // ユーザー名カナ
    $table->string('name_kana');

    // メールアドレス
    $table->string('email')->unique();

    // パスワード
    $table->string('password');

    // プロフィール画像
    $table->string('profile_image')->nullable();

    // 学年ID
    $table->unsignedBigInteger('grade_id');

    $table->rememberToken();

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
        Schema::dropIfExists('users');
    }
};