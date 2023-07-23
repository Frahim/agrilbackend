<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pages;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PageFormRequest;
use Illuminate\Support\Facades\File;
class PagesController extends Controller
{
    public function index()
    {
       $pages = Pages::all();
       return view('admin.pages.index', compact('pages'));
    }

    public function create()    {        
        return view('admin.pages.create');
    }

    public function store( PageFormRequest $request)
    {
        $validatedData = $request->validated();       

        $page = new Pages;
        $page->name = $validatedData['name'];       
        $page->slug = Str::slug($validatedData['slug']);
        $page->page_content = $validatedData['page_content'];
        $page->page_other_content = $validatedData['page_other_content'];
        $page->video_url = $validatedData['video_url'];
        $page->meta_title = $validatedData['meta_title'];
        $page->meta_keyword = $validatedData['meta_keyword'];
        $page->meta_description = $validatedData['meta_description'];   
        if ($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/pages/', $filename);
            $page->banner_image = $filename;
        }      
        $page->save();
        return redirect('admin/pages')->with('message', 'Page Added');
    }

    public function edit(int $page_id ){     
        $page= Pages::findOrFail($page_id);
        return view('admin.pages.edit', compact('page')) ;
    }

    public function update( int $page_id, PageFormRequest $request){
        $validatedData = $request->validated();
        $page = Pages::findOrFail($page_id);
        if($page)
        {
            if ($request->hasFile('banner_image')) {
                $path = 'uploads/pages/' . $page->banner_image;
                if (File::exists($path)) {
                    File::delete($path);
                }
                $file = $request->file('banner_image');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $file->move('uploads/pages/', $filename);
                $page->banner_image = $filename;
            }
            $page->update([                
                'name' => $validatedData['name'],
                'slug' => Str::slug($validatedData['slug']),
                'page_content'=> $validatedData['page_content'],
                'page_other_content'=> $validatedData['page_other_content'],                 
                'video_url'=> $validatedData['video_url'],  
                'meta_title'=> $validatedData['meta_title'],
                'meta_keyword'=> $validatedData['meta_keyword'],  
                'meta_description'=> $validatedData['meta_description'],                                              
            ]);
                  
               return redirect('admin/pages')->with('message','Update Sucessfilly');
        }
        else
        {
            return redirect('admin/pages')->with('message','No Such Page or ID found');
        }
    }

    public function destroy(int $page_id) {
        $page = Pages::find($page_id);

        $page->delete();
        return redirect('admin/pages')->with('message', 'Page Deleted Successfully');
    }
}
