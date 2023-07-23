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
                    <a href="{{ url('admin/highlighter/create') }}" class="btn btn-primary btn-sm float-end">Add Highlighter</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table  table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Number</th>
                                    <th scope="col">Dialoge</th>
                                    <th scope="col">Icon/Image</th>     
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $highlighters as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->title }}</td>                                       
                                        <td>{{ $item->number}}</td>
                                        <td>{{ $item->dilog }}</td>                                        
                                        <td>{{ $item->icon_image }}</td>                                       
                                        <td>
                                           
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/highlighter/' . $item->id . '/edit') }}"
                                                class="btn btn-success">Edit</a>
                                                <form action="{{ url('admin/highlighter/' . $item->id . '') }}" method="post">
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
                        {{-- {{ $Banners->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
