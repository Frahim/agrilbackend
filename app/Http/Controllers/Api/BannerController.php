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
        return response()->json( $banners);
    }

    public function show($identity)
    {
        $banners = Banner::where('slug', $identity)->orWhere('id', $identity)->first();

        if (!$banners) {
            return response()->json(['error' => 'Brand not found'], 404);
        }

        return response()->json($banners);
    }
}
