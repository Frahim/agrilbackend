<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $pages = Pages::all();
        return response()->json($pages);
    }

    public function show($identifierpage)
    {
        $pages  = Pages::where('slug', $identifierpage)->orWhere('id', $identifierpage)->first();

        if (!$pages ) {
            return response()->json(['error' => 'Employ  not found'], 404);
        }

        return response()->json($pages);
    }
}
