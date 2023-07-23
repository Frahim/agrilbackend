@extends ('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between py-3">
                    <h3 class="mb-0">Add New Item</h3>
                    <a href="{{ url('admin/socialmedia/create') }}" class="btn btn-primary text-white float-end">Back</a>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-warning mb-3">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ url('admin/socialmedia') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-12">
                                    <label class="col-form-label">Social Media Item Name</label>
                                    <input type="text" name="smname" class="form-control">
                                    @error('smname')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="col-form-label">Social Media Item URL</label>
                                    <input type="text" name="smurl" class="form-control">
                                    @error('smurl')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
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
