@extends ('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between py-3">
                    <h3 class="mb-0">Add New Post</h3>
                    <a href="{{ url('admin/posts/create') }}" class="btn btn-primary text-white float-end">Back</a>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-warning mb-3">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ url('admin/posts/' . $posts->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-sm-12 col-md-6">
                                <label class="col-form-label">Post Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" value="{{ $posts->title }}" class="form-control">
                                    @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label class="col-form-label">Post Slug</label>
                                <div class="col-sm-10">
                                    <input type="text" name="slug" value="{{ $posts->slug }}" class="form-control">
                                    @error('slug')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                      

                        <div class="row mb-3">
                            <div class="col-sm-12 col-md-12">
                                <label class="col-form-label">Content</label>
                                <div class="col-sm-10">
                                    <textarea rows="5" name="content" class="form-control summernote"> {{ $posts->content }}</textarea>
                                </div>
                            </div>                            
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Featured Iamge</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <img src="{{ asset('/uploads/posts/' . $posts->featured_image) }}" width="60px"
                                    height="60px" />  
                                    <input type="file" name="featured_image" value="{{ $posts->featured_image }}" class="form-control">
                                   
                                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">SEO Title</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" name="seo_title" value="{{ $posts->seo_title }}" class="form-control">                               
                                </div>
                            </div>
                        </div> 
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">SEO Description</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" name="seo_description"  value="{{ $posts->seo_description }}" class="form-control">                               
                                </div>
                            </div>
                        </div>    
                       
                        <div class="row mb-3">
                            <div class="col-12 ">
                                <button type="submit" class="btn btn-primary text-white">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
