<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'name_kana',
        'email',
        'password',
        'profile_image',
        'grade_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * 受講進捗
     */
    public function curriculumProgresses()
    {
        return $this->hasMany(
            CurriculumProgress::class,
            'users_id'
        );
    }

    /**
     * 所属学年
     */
    public function grade()
    {
        return $this->belongsTo(
            Grade::class,
            'grade_id'
        );
    }
}