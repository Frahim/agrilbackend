<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Socialmedia;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function index()
    {
        $socialmedia = Socialmedia::all();
        return response()->json($socialmedia);
    }

    public function show($identiSocial)
    {
        $socialmedia = Socialmedia::where('id', $identiSocial)->first();
        if (!$socialmedia) {
            return response()->json(['error' => 'Socialmedia not found'], 404);
        }
        return response()->json($socialmedia);
    }
}
