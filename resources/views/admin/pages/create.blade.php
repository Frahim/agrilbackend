@extends ('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between py-3">
                    <h3 class="mb-0">Add New Page</h3>
                    <a href="{{ url('admin/pages/create') }}" class="btn btn-primary text-white float-end">Back</a>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-warning mb-3">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ url('admin/pages') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-12">
                                    <label class="col-form-label">Page Name</label>
                                    <input type="text" name="name" class="form-control">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="col-form-label">Page Slug</label>
                                    <input type="text" name="slug" class="form-control">
                                    @error('slug')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="col-form-label">Page Content</label>
                                    <textarea rows="5" name="page_content" class="form-control summernote"></textarea>
                                </div>
                                <div class="col-12">
                                    <label class="col-form-label">Other Content</label>
                                    <textarea rows="5" name="page_other_content" class="form-control summernote"></textarea>
                                </div>
                                <div class="col-12">
                                    <label class="col-form-label">Banner Picture</label>
                                    <input type="file" name="banner_image" class="form-control">

                                </div>
                                <div class="col-12">
                                    <label class="col-form-label">Video url</label>
                                    <input type="text" name="video_url" class="form-control">

                                </div>

                                <div class="row mb-3 mt-5">
                                    <div class="col-12 alert alert-danger">
                                        <h3>SEO Section</h3>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Meta Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="meta_title" value="Meta Title" class="form-control">
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Meta Keyword</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="meta_keyword" value="Meta Keyword" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Meta Description</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="meta_description" value="Meta Description"
                                            class="form-control">
                                    </div>
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
