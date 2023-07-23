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
        return response()->json($product_image);
    }

    public function show($identiProimg)
    {
        $productsimg = ProductImage::where('id', $identiProimg)->first();

        if (!$productsimg) {
            return response()->json(['error' => 'Brand not found'], 404);
        }

        return response()->json($productsimg);
    }
}
