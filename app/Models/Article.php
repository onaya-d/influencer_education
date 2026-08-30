<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';

    protected $fillable = [
        'posted_date',
        'title',
        'article_contents',
    ];

    protected $casts = [
        'posted_date' => 'date',
    ];

    public static function getNoticeList()
    {
        return self::orderBy('posted_date', 'desc')->get();
    }
}