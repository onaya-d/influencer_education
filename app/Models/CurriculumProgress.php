<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurriculumProgress extends Model
{
    use HasFactory;

    // 対応するテーブル名を指定
    protected $table = 'curriculum_progress';

    // 一括保存を許可するカラム
    protected $fillable = [
        'user_id',
        'curriculum_id',
        'clear_flg',
    ];
}