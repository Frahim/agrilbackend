<?php

namespace App\Http\Controllers\Api;

use App\Models\Brands;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandsController extends Controller
{
    public function index()
    {
        $brands = Brands::all();
        return response()->json($brands);
    }

    public function show($identifier)
    {
        $brand = Brands::where('slug', $identifier)->orWhere('id', $identifier)->first();

        if (!$brand) {
            return response()->json(['error' => 'Brand not found'], 404);
        }

        return response()->json($brand);
    }
}
