<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteSettingPage extends Model
{
    protected $table = 'site_page_setting';
    protected $fillable = [
        'id',
        'page_name',
        'content_name',
        'content',
        'img',
        'position',
        'allow',
        'number',
        'category_id',
        'link_to'
    ];
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
