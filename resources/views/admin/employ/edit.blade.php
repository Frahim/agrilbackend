@extends ('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between py-3">
                <h3 class="mb-0">Add New Employs</h3>
                <a href="{{ url('admin/employ/create')}}" class="btn btn-primary text-white float-end">Back</a>
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-warning mb-3">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
                <form action="{{ url('admin/employ/'. $employ->id) }}"  method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-md-6 col-sm-12">                            
                            <div class="col-12">
                                <label class="col-form-label">Name</label>
                                <input type="text" name="name" value="{{ $employ->name }}" class="form-control">
                                @error('name')
                                <small class="text-danger">{{$message}}</small>    
                                @enderror
                            </div>
                           <div class="col-12">
                                <label class="col-form-label">Slug</label>
                                <input type="text" name="slug" value="{{ $employ->slug }}" class="form-control">   
                                @error('slug')
                                <small class="text-danger">{{$message}}</small>    
                                @enderror                            
                            </div> 
                            <div class="col-12">
                                <label class="col-form-label">Email</label>
                                <input type="text" name="email" value="{{ $employ->email }}" class="form-control">
                                @error('email')
                                <small class="text-danger">{{$message}}</small>    
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="col-form-label">Phone Number</label>
                                <input type="text" name="phonenumber"  value="{{ $employ->phonenumber }}" class="form-control">
                                @error('phonenumber')
                                <small class="text-danger">{{$message}}</small>    
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="col-form-label">Mobile Number</label>
                                <input type="text" name="mobile" value="{{ $employ->mobile }}" class="form-control">
                                @error('mobile')
                                <small class="text-danger">{{$message}}</small>    
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="col-form-label">Designeation</label>
                                <input type="text" name="designeation" value="{{ $employ->designeation }}"  class="form-control">
                                @error('designeation')
                                <small class="text-danger">{{$message}}</small>    
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="col-form-label">Department</label>
                                <input type="text" name="department" value="{{ $employ->department }}"  class="form-control">
                                @error('department')
                                <small class="text-danger">{{$message}}</small>    
                                @enderror
                            </div>
                            
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="col-12">
                                <label class="col-form-label">Prifile Picture</label>
                                <input type="file" name="picture" class="form-control">     
                                <img src="{{ asset('/uploads/employ/' . $employ->picture) }}" width="40px"
                                                height="40px" />
                            </div>
                            <div class="col-12 mb-3">
                                <label class="col-form-label">Bio</label>
                                <textarea rows="5" name="bio" class="form-control">{{ $employ->bio }}</textarea>
                            </div>
                            <div class="col-12">
                            <label class="me-3">Brand</label>
                            <select name="brand_id" class="form-conrol p-2">
                                @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}" {{ $brand->id == $employ->brand_id ? 'selected':''}}>
                                    {{ $brand->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        </div>
                       
                    </div>    
                    

                    <div class="row mb-3">
                        <div class="col-12 ">
                            <button type="submit" class="btn btn-primary text-white float-end">Save</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>

@endsection