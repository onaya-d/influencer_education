<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurriculumProgress extends Model
{
    use HasFactory;

    protected $table = 'curriculum_progress';

    protected $fillable = [
        'user_id',
        'curriculum_id',
        'clear_flg',
    ];

    public static function getCompletedCurriculumIds(int $userId): array
    {
        return self::where('user_id', $userId)
            ->where('clear_flg', 1)
            ->pluck('curriculum_id')
            ->toArray();
    }
}