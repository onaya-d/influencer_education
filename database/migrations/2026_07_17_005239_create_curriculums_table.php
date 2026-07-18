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
        $table->string('category')->nullable();    // 小学校1年生 などのカテゴリ用
        $table->string('title');                  // 授業のタイトル用
        $table->text('description')->nullable();   // 講座内容（説明文）用
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
