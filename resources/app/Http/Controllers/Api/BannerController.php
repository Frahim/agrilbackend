<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {

        $banners = Banner::all();
        return response()->json([
            "data" =>   $banners
        ]);
    }

    public function show($id)
    {
        $banner = Banner::find($id);

        if (!$banner) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return response()->json($banner);
    }
}
