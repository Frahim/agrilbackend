@extends ('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between py-3">
                <h3 class="mb-0">All Category</h3>
                <a href="{{ url('admin/category/create')}}" class="btn btn-primary text-white float-end">Add Category</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    {{-- <table class="table  table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Description</th>
                                <th scope="col">Image</th>
                                <th scope="col">Meta Title</th>
                                <th scope="col">Meta Keyword</th>  
                                <th scope="col">Meta Description</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>                                    
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>{{ $category->meta_title }}</td>
                                    <td>{{ $category->meta_keyword }}</td>
                                    <td>{{ $product->meta_description }}</td>
                                    <td>
                                        <img src="{{ asset('/uploads/category/' . $category->image) }}" width="60px"
                                            height="60px" />
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/category/' . $category->id . '/edit') }}"
                                            class="btn btn-success">Edit</a>
                                        <a href="#" wire.click="deleteproduct({{ $category->id }})"
                                            data-bs-toggle="modal" data-bs-target="#deleteModal"
                                            class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table> --}}

                    <div class="col-12 my-3">
                    {{-- {{ $products->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
