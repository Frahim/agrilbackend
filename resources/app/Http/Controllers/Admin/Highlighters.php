<?php

namespace App\Http\Controllers\Admin;

use App\Models\Highlighter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\HighlighterFormRequest;

class Highlighters extends Controller
{
    public function index()
    {
        $highlighters = Highlighter::all();
        return view('admin.highlighter.index', compact('highlighters'));
    }
    public function create()
    {
        return view('admin.highlighter.create');
    }

    public function store(HighlighterFormRequest $request)
    {
        $validatedData = $request->validated();
        $highlighter = new Highlighter;

        $highlighter->title = $validatedData['title'];
        $highlighter->number = $validatedData['number'];
        $highlighter->dilog = $validatedData['dilog'];

        if ($request->hasFile('icon_image')) {
            $file = $request->file('icon_image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/highlighter/', $filename);
            $highlighter->icon_image = $filename;
        }


        $highlighter->save();

        return redirect('admin/highlighter')->with('message', 'Highlighter Added');
    }


    public function edit(int $highlighter_id)
    {      
        $highlighter = Highlighter::findOrFail($highlighter_id);
        return view('admin.highlighter.edit', compact('highlighter'));
    }

   

    public function update( HighlighterFormRequest $request, $highlighter ){
        $validatedData = $request->validated();
        $highlighter =  Highlighter::findOrFail($highlighter);

        $highlighter->title = $validatedData['title'];
        $highlighter->number =$validatedData['number'];
        $highlighter->dilog = $validatedData['dilog']; 
        if($request-> hasFile('icon_image')){
            $path = 'uploads/highlighter/'.$highlighter->icon_image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('icon_image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            
            $file->move('uploads/highlighter/', $filename);
            $highlighter->icon_image = $filename;
        }        
         
 
        $highlighter->update();

        return redirect('admin/highlighter')-> with('message', 'Highlighter Update');
    }

}
