<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return response()->json($category);
    }

    public function show($identiCat)
    {
        $category = Category::where('slug', $identiCat)->orWhere('id', $identiCat)->first();

        if (!$category) {
            return response()->json(['error' => 'Brand not found'], 404);
        }

        return response()->json($category);
    }
}
