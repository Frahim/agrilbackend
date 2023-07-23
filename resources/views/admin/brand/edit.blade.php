@extends ('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between py-3">
                    <h3 class="mb-0">Edit Brand</h3>
                    <a href="{{ url('admin/brand/create') }}" class="btn btn-primary text-white float-end">Back</a>
                </div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li><a class="active" href="#home-pills" data-toggle="tab">Basick Info</a>
                    </li>
                    <li class=""><a href="#profile-pills" data-toggle="tab">Media</a>
                    </li>
                    <li class=""><a href="#messages-pills" data-toggle="tab">Address</a>
                    </li>
                    <li class=""><a href="#settings-pills" data-toggle="tab">SEO</a>
                    </li>
                </ul>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-warning mb-3">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ url('admin/brand/' . $brand->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active show" id="home-pills">
                                <h4>Basick Information</h4>
                                <div class="row mb-3">
                                    <label class="col-sm-12 col-form-label">Brand Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="name" value="{{ $brand->name }}"
                                            class="form-control">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6 col-sm-12">
                                    <label class="col-sm-12 col-form-label">Brand Slug</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="slug" value="{{ $brand->slug }}"
                                            class="form-control">
                                        @error('slug')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label class="col-sm-12 col-form-label">Select Catagories/ Services</label>
                                        <div class="col-sm-12">    
                                            <select class="category col-12 border border-primary" name="category[]" multiple="multiple">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" @if(in_array($category->id, $selectedCategories)) selected @endif>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-12 col-form-label">About Brand</label>
                                    <div class="col-sm-12">
                                        <textarea rows="5" name="about_brand" class="form-control">{{ $brand->about_brand }}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-12 col-form-label">Brand Description</label>
                                    <div class="col-sm-12">
                                        <textarea rows="5" name="description" class="form-control">{{ $brand->description }}</textarea>
                                    </div>
                                </div>
                               
                                <div class="row mb-3">
                                    <label class="col-sm-12 col-form-label">Other Description</label>
                                    <div class="col-sm-12">
                                        <textarea rows="5" name="other_description" class="form-control"> {{ $brand->other_description }} </textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="profile-pills">
                                <h4>Media</h4>
                                <div class="row mb-3">
                                    <label class="col-sm-12 col-form-label">Brand Logo</label>
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <input type="file" name="logo" class="form-control">
                                            <img src="{{ asset('/uploads/brand/' . $brand->logo) }}" width="40px"
                                                height="40px" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-12 col-form-label">Brand Image</label>
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <input type="file" name="bandr_image" class="form-control">
                                            <img src="{{ asset('/uploads/brand/' . $brand->bandr_image) }}" width="40px"
                                                height="40px" />
                                        </div>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label class="col-sm-12 col-form-label">Banner Video URL</label>
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <input type="text" name="Vedio" value="{{ $brand->Vedio }}" class="form-control">                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-12 col-form-label">Banner Text</label>
                                    <div class="col-sm-12">
                                        <textarea rows="5" name="short_description" class="form-control">{{ $brand->short_description }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="messages-pills">
                                <h4>Address</h4>
                                <div class="row mb-3">
                                    <div class="col-md-6 col-sm-12">
                                        <label class="col-sm-12 col-form-label">Phone Number</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="phonenumber" value="{{ $brand->phonenumber }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label class="col-sm-12 col-form-label">Mobile</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="mobile" value="{{ $brand->mobile }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6 col-sm-12">
                                        <label class="col-sm-12 col-form-label">Email</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="email" value="{{ $brand->email }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">

                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6 col-sm-12">
                                        <label class="col-sm-12 col-form-label">Address</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="address" value="{{ $brand->address }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label class="col-sm-12 col-form-label">House Number</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="housenumber" value="{{ $brand->housenumber }}"
                                                class="form-control">
                                        </div>
                                    </div>


                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6 col-sm-12">
                                        <label class="col-sm-12 col-form-label">City</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="city" value="{{ $brand->city }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label class="col-sm-12 col-form-label">Postalcode</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="postalcode" value="{{ $brand->postalcode }}"
                                                class="form-control">
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="tab-pane fade" id="settings-pills">
                                <div class="row mb-3">
                                    <label class="col-sm-12 col-form-label">Meta Title</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="meta_title" value="{{ $brand->meta_title }}"
                                            class="form-control">
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label class="col-sm-12 col-form-label">Meta Keyword</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="meta_keyword" value="{{ $brand->meta_keyword }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-12 col-form-label">Meta Description</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="meta_description"
                                            value="{{ $brand->meta_description }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12  text-right">
                                <button type="submit" class="btn btn-primary btn-lg text-white">Update</button>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
@endsection
