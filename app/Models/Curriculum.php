<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    protected $table = 'curriculums';

    protected $fillable = [
        'title',
        'thumbnail',
        'description',
        'video_url',
        'always_delivery_flg',
        'grade_id',
    ];

    /**
     * 所属学年
     */
    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    /**
     * 受講履歴
     */
    public function curriculumProgresses()
    {
        return $this->hasMany(CurriculumProgress::class, 'curriculums_id');
    }
}