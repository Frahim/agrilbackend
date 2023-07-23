<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Highlighter extends Model
{
    use HasFactory;
    protected $table = 'highlighter';
    protected $fillable =[
        'title',
        'number',
        'dilog',       
        'icon_image' 
    ];
}
