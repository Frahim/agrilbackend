<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use App\Models\Brands;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BannerFormRequest;

class BannerController extends Controller
{

    public function index()
    {
       $banners = Banner::all();
       return view('admin.banners.index', compact('banners'));
    }

    
    public function create()
    {
        $brands = Brands::all();
        return view('admin.banners.create', compact('brands'));
    }

    public function store(BannerFormRequest $request)
    {
        $validatedData = $request->validated();

        $brand = Brands::findOrFail($validatedData['brand_id']);     
       
        $banner = new Banner;
        $banner->brand_id = $validatedData['brand_id'];
        $banner->name = $validatedData['name'];
        $banner->slug = Str::slug($validatedData['slug']);
        $banner->description = $validatedData['description'];
        $banner->other_description = $validatedData['other_description'];
        $banner->video_url = $validatedData['video_url'];
        if($request-> hasFile('video')){
            $file = $request->file('video');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;            
            $file->move('uploads/banner/', $filename);
            $banner->video = $filename;
        }  
 
        $banner->save();

        return redirect('admin/banner')-> with('message', 'Banner Added');
    }


    public function edit(int $banner_id ){
        $brands = Brands::all();
        $banner = Banner::findOrFail($banner_id);
        return view('admin.banners.edit', compact('brands', 'banner')) ;
    }


    public function update( int $banner_id, BannerFormRequest $request){
        $validatedData = $request->validated();
        $banner = Brands::findOrFail($validatedData['brand_id'])
        ->banners()->where('id', $banner_id)->first();
        if($banner)
        {
            $banner->update([
                'brand_id' => $validatedData['brand_id'],
                'name' => $validatedData['name'],
                'slug' => Str::slug($validatedData['slug']),
                'description'=> $validatedData['description'],
                'other_description'=> $validatedData['other_description'],  
                'video_url'=> $validatedData['video_url'],                  
            ]);

            if($request->hasFile('video')){
                $uploadPath = 'uploads/banner/';        
                $i =1;
                foreach($request->file('video') as $imageFile){
                    $extention = $imageFile-> getClientOriginalExtension();
                    $filename = time().$i++.'.'.$extention;
                    $imageFile-> move($uploadPath, $filename);
                    $finalImagePathName = $uploadPath.$filename;        
                    $banner->productImages()->create([
                        'banner_id' => $banner->id,
                        'video' => $finalImagePathName,
                    ]);
                }
               }
        
               return redirect('admin/banner')->with('message','Product Update Sucessfilly');
        }
        else
        {
            return redirect('admin/banner')->with('message','No Such Product ID found');
        }
    }

    public function destroy(int $banner_id)
    {
       $banner = Banner::find($banner_id) ;
      
       $banner->delete();
       return redirect('admin/banner')->with('message', 'Banner Deleted Successfully');
    }
}
