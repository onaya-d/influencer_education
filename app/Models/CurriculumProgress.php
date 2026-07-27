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

    public static function getCompletedCurriculumIds($userId)
{
    return self::where('users_id', $userId)
        ->where('clear_flg', 1)
        ->pluck('curriculums_id')
        ->toArray();
}

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