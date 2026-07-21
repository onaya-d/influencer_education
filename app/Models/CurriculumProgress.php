<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CurriculumProgress extends Model
{
    protected $table = 'curriculum_progress';

    protected $fillable = [
        'curriculums_id',
        'users_id',
        'clear_flg',
    ];

    /**
     * ユーザー
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    /**
     * カリキュラム
     */
    public function curriculum()
    {
        return $this->belongsTo(Curriculum::class, 'curriculums_id');
    }
}