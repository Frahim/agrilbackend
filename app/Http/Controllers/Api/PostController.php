<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return response()->json($posts);
    }

    public function show($identiPost)
    {
        $posts = Post::where('id', $identiPost)->first();
        if (!$posts) {
            return response()->json(['error' => 'Post not found'], 404);
        }
        return response()->json($posts);
    }
}