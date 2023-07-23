@extends ('layouts.admin')

@section('content')
    <div class="row">
        @if (session('message'))
            <div class="col-md-10 alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center py-2">
                    <h3 class="m-0 align-middle">Highlighter</h3>
                    <a href="{{ url('admin/highlighter') }}" class="btn btn-primary btn-sm float-end">Back</a>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-warning mb-3">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ url('admin/highlighter') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-sm-12 col-md-6">
                                <label class="col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control">
                                    @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label class="col-form-label">Number</label>
                                <div class="col-sm-10">
                                    <input type="text" name="number" class="form-control">
                                    @error('number')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-12 col-md-6">
                                <label class="col-form-label">Dilog</label>
                                <div class="col-sm-10">
                                    <textarea rows="5" name="dilog" class="form-control"></textarea>
                                    @error('dilog')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Icon/ Image</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="file" name="icon_image" class="form-control">                                   
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-12 ">
                                <button type="submit" class="btn btn-primary text-white">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
