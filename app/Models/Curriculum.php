<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Curriculum extends Model
{
    use HasFactory;

    protected $table = 'curriculums';

    protected $fillable = [
        'category',
        'title',
        'description',
    ];

    public static function getGroupedByGrade(): Collection
    {
        $gradeOrder = [
            '小学1年生',
            '小学2年生',
            '小学3年生',
            '小学4年生',
            '小学5年生',
            '小学6年生',
            '中学1年生',
            '中学2年生',
            '中学3年生',
            '高校1年生',
            '高校2年生',
            '高校3年生',
        ];

        $curriculums = self::orderBy('id')
            ->get()
            ->groupBy('category');

        return collect($gradeOrder)->mapWithKeys(
            function (string $gradeName) use ($curriculums) {
                return [
                    $gradeName => $curriculums->get(
                        $gradeName,
                        collect()
                    ),
                ];
            }
        );
    }
}