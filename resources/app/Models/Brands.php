<?php

namespace App\Models;

use App\Models\Banner;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brands extends Model
{
    use HasFactory;
    protected $table = 'brands_tabils';

    protected $fillable =[
        'name',
        'slug',
        'logo',
        'about_brand',
        'description',
        'short_description',
        'bandr_image',
        'Vedio',
        'other_description',
        'address',
        'housenumber',
        'postalcode',
        'city',
        'phonenumber',
        'mobile',
        'email',
        'meta_title',
        'meta_keyword',
        'meta_description',     
      
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id', 'id');
    }
    public function banners()
    {
        return $this->hasMany(Banner::class, 'brand_id', 'id');
    }

    public function categorys()
    {
        return $this->belongsTo(Category::class, 'catetory_id', 'id');
    }
}

