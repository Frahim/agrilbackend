<?php

namespace App\Http\Controllers\Admin;



use App\Models\Brands;
use App\Models\Employs;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployFormRequest;

class EmployController extends Controller
{
    public function index()
    {
       $employs = Employs::all();
       return view('admin.employ.index', compact('employs'));
    }
    public function create()
    {
        $brands = Brands::all();
        return view('admin.employ.create', compact('brands'));
    }

    public function store(EmployFormRequest $request)
    {
        $validatedData = $request->validated();

        $brand = Brands::findOrFail($validatedData['brand_id']);   

        $employ = new Employs;

        $employ->name = $validatedData['name'];       
        $employ->slug = Str::slug($validatedData['slug']);
        $employ->email = $validatedData['email'];
        $employ->phonenumber = $validatedData['phonenumber'];
        $employ->mobile = $validatedData['mobile'];
        $employ->bio = $validatedData['bio'];
        $employ->designeation = $validatedData['designeation'];
        $employ->department = $validatedData['department'];
        $employ->brand_id = $validatedData['brand_id'];

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/employ/', $filename);
            $employ->picture = $filename;
        }


        $employ->save();

        return redirect('admin/employ')->with('message', 'Employ Added');
    }

    public function edit(int $employ_id ){
        $brands = Brands::all();
        $employ = Employs::findOrFail($employ_id);
        return view('admin.employ.edit', compact('brands', 'employ')) ;
    }

    public function update( int $employ_id, EmployFormRequest $request){
        $validatedData = $request->validated();
        $employ = Employs::findOrFail($employ_id);
        if($employ)
        {
            $employ->update([                
                'name' => $validatedData['name'],
                'slug' => Str::slug($validatedData['slug']),
                'email'=> $validatedData['email'],
                'phonenumber'=> $validatedData['phonenumber'],  
                'mobile'=> $validatedData['mobile'],  
                'bio'=> $validatedData['bio'],
                'designeation'=> $validatedData['designeation'],  
                'department'=> $validatedData['department'],  
                'brand_id' => $validatedData['brand_id'],                            
            ]);

            if($request->hasFile('picture')){
                $uploadPath = 'uploads/employ/';        
                $i =1;
                foreach($request->file('picture') as $imageFile){
                    $extention = $imageFile-> getClientOriginalExtension();
                    $filename = time().$i++.'.'.$extention;
                    $imageFile-> move($uploadPath, $filename);
                    $finalImagePathName = $uploadPath.$filename;        
                    $employ->productImages()->create([
                        'employ_id' => $employ->id,
                        'picture' => $finalImagePathName,
                    ]);
                }
               }
        
               return redirect('admin/employ')->with('message','Update Sucessfilly');
        }
        else
        {
            return redirect('admin/employ')->with('message','No Such Employ ID found');
        }
    }

    public function destroy(int $employ_id) {
        $employ = Employs::find($employ_id);

        $employ->delete();
        return redirect('admin/employ')->with('message', 'Employ Deleted Successfully');
    }
}
