<?php

namespace App\Models;

use App\Models\Brands;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employs extends Model
{
    use HasFactory;
    protected $table = 'employs';
    protected $fillable = [
        'name',
        'slug',
        'email',
        'phonenumber',
        'mobile',
        'bio',
        'designeation',
        'department',
        'picture', 
        'brand_id',              
    ];

    public function brand()
    {
        return $this->belongsTo(Brands::class, 'brand_id', 'id');
    }
}
