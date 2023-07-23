<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $table = 'pages';

    protected $fillable =[
        'name',
        'slug',
        'page_content',
        'page_other_content',       
        'banner_image',
        'video_url',   
        'meta_title',
        'meta_keyword',
        'meta_description'     
    ];
}
