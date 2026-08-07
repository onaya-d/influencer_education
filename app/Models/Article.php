<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';

    protected $fillable = [
        'title',
        'posted_date',
        'article_contents',
    ];

    protected $casts = [
        'posted_date' => 'datetime',
    ];

    public static function getNoticeList(): Collection
    {
        return self::orderByDesc('posted_date')
            ->orderByDesc('id')
            ->get();
    }
}