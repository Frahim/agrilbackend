<?php

namespace App\Http\Controllers\Api;

use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductImageController extends Controller
{
    public function index()
    {
        $product_image = ProductImage::all();
        return response()->json([
            "data" => $product_image
        ]);
    }
}
