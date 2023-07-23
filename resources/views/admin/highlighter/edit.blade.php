@extends ('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between py-3">
                    <h3 class="mb-0">Add New Highlighter</h3>
                    <a href="{{ url('admin/highlighter/create') }}" class="btn btn-primary text-white float-end">Back</a>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-warning mb-3">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ url('admin/highlighter/' . $highlighter->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-sm-12 col-md-6">
                                <label class="col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" value="{{ $highlighter->title }}" class="form-control">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label class="col-form-label">Number</label>
                                <div class="col-sm-10">
                                    <input type="text" name="number" value="{{ $highlighter->number }}" class="form-control">
                                    @error('slug')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>                       

                        <div class="row mb-3">
                            <div class="col-sm-12 col-md-6">
                                <label class="col-form-label">Doalog</label>
                                <div class="col-sm-10">
                                    <textarea rows="5" name="dilog" class="form-control"> {{ $highlighter->dilog }}</textarea>
                                </div>
                            </div>                           
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Icon/ Image</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="file" name="icon_image" class="form-control">     
                                    <img src="{{ asset('/uploads/highlighter/' . $highlighter->icon_image) }}" width="40px"
                                    height="40px" />                             
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
