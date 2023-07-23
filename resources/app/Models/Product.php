<?php

namespace App\Models;

use App\Models\Brands;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'slug',
        'type',
        'category',
        'description',
        'orginal_price',
        'selling_price',
        'quantity', 
        'disease', 
        'variety', 
        'sorting',
        'pod',
        'plant',    
        'pf_image',          
        'meta_title',
        'meta_keyword',
        'meta_description',        
    ];

    public function brand()
    {
        return $this->belongsTo(Brands::class, 'brand_id', 'id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }
   
}
