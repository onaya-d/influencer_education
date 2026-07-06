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
        Schema::create('curricurum_progress', function (Blueprint $table) {
            $table->id();
            $table->integer('curriculums_id'); // 2. カリキュラムid
            $table->integer('users_id');       // 3. ユーザーid
            $table->tinyInteger('clear_flg');  // 4. クリアフラグ
            
            $table->timestamps(); // 5,6. created_at / updated_at
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curricurum_progress');
    }
};
