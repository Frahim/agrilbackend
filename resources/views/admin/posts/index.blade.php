@extends ('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between py-3">
                    <h3 class="mb-0">All Post</h3>
                    <a href="{{ url('admin/posts/create') }}" class="btn btn-primary text-white float-end">Add Post</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table  table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Slug</th>                                   
                                    <th scope="col">Image</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->slug }}</td>                                      
                                        <td>
                                            <img src="{{ asset('/uploads/posts/' . $post->featured_image) }}"
                                                width="60px" height="60px" />
                                        </td>
                                       

                                        <td>
                                            <a href="{{ url('admin/posts/' . $post->id . '/edit') }}"
                                                class="btn btn-success">Edit</a>
                                            <form action="{{ url('admin/posts/' . $post->id . '') }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <input type="submit" class="btn btn-danger" value="Delete" />

                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                        <div class="col-12 my-3">
                            {{-- {{ $products->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
