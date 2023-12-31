<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socialmedia extends Model
{
    protected $table = 'socialmedia';
    protected $fillable =[
        'smname',
        'smurl',  
        'socialicon',        
    ];
}
