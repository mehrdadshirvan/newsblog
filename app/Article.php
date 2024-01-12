<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article';
    protected $fillable = [
        'id',
        'user_id',
        'title',
        'title_url',
        'content',
        'avatar',
        'writer',
        'read_time',
        'jdate',
        'time',
        'cat_id',
        'seo_title',
        'seo_des',
        'seo_key',
        'views',
        'publish',
        'del',
    ];
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
