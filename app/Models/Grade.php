<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $table = 'grades';

    protected $fillable = [
        'name',
    ];

    /**
     * 学年に属するカリキュラム
     */
    public function curriculums()
    {
        return $this->hasMany(Curriculum::class, 'grade_id');
    }

    /**
     * 学年に所属するユーザー
     */
    public function users()
    {
        return $this->hasMany(User::class, 'grade_id');
    }
}