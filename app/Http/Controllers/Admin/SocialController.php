<?php

namespace App\Http\Controllers\Admin;

use App\Models\Socialmedia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SocialFormRequest;

class SocialController extends Controller
{
    public function index()
    {
        $socialmedia = Socialmedia::all();      
        return view('admin.socialmedia.index', compact('socialmedia'));
    }

    public function create()
    {
        return view('admin.socialmedia.create');
    }
    public function store(SocialFormRequest $request)
    {
        $validatedData = $request->validated();
        $socialmedia = new Socialmedia;
        $socialmedia->smname = $validatedData['smname'];
        $socialmedia->smurl = $validatedData['smurl'];
         
        $socialmedia->save();
        return redirect('admin/socialmedia')-> with('message', 'Socialmedia Added');
    }

    public function edit(Socialmedia $socialmedia ){
        return view('admin.socialmedia.edit', compact('socialmedia')) ;
    }

    public function update( SocialFormRequest $request, $socialmedia ){
        $validatedData = $request->validated();
        $socialmedia =  Socialmedia::findOrFail($socialmedia);
        $socialmedia->smname = $validatedData['smname'];
        $socialmedia->smurl = $validatedData['smurl'];   
        $socialmedia->update();
        return redirect('admin/socialmedia')-> with('message', 'Socialmedia Update');
    }
    public function destroy(int $socialmedia_id) {
        $socialmedia = Socialmedia::find($socialmedia_id);

        $socialmedia->delete();
        return redirect('admin/socialmedia')->with('message', 'Socialmedia Deleted Successfully');
    }
}
