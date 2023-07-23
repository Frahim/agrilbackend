<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employs;
use Illuminate\Http\Request;

class EmployController extends Controller
{
    public function index()
    {
        $employ = Employs::all();
        return response()->json($employ);
    }

    public function show($identifieremp)
    {
        $employ  = Employs::where('slug', $identifieremp)->orWhere('id', $identifieremp)->first();

        if (!$employ ) {
            return response()->json(['error' => 'Employ  not found'], 404);
        }

        return response()->json($employ );
    }
}
