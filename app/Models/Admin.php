<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    // テーブル名
    protected $table = 'admins';

    // 入力可能なカラム
    protected $fillable = [
        'name',
        'kana',
        'email',
        'password',
    ];

    // パスワードを隠す
    protected $hidden = [
        'password',
    ];
}