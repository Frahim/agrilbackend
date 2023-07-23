<?php

namespace App\Http\Controllers\Admin;




use App\Models\AllPages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Pages extends Controller
{
    public function index()
    {
       $pages = Pages::all();
       return view('admin.employ.index', compact('employs'));
    }
    

}
