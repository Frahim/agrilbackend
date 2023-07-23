<?php

namespace App\Http\Controllers\Api;

use App\Models\Highlighter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Highlighters extends Controller
{
    public function index()
    {
        $highlighters = Highlighter::all();
        return response()->json($highlighters);
    }
}
