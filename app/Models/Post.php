<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = "post";
    public static function getlistoptc($topicId)
    {
        return self::where('status', 1)
            ->where('topic_id', $topicId)
            ->orderBy('created_at', 'desc')
            ->limit(8)
            ->get();
    }
}
