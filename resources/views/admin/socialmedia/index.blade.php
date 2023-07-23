@extends ('layouts.admin')

@section('content')
    <div class="row">
        @if (session('message'))
            <div class="col-md-10 alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center py-2">
                    <h3 class="m-0 align-middle">All Socialmedia Item</h3>
                    <a href="{{ url('admin/socialmedia/create') }}" class="btn btn-primary btn-sm float-end">Add New Item</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table  table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">List Of Item</th>
                                    <th scope="col"> Settings</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($socialmedia as $social)
                                    <tr>
                                        <td>
                                            <h2 class="mb-0">{{ $social->smname }}</h2><br />
                                            <small class="my-2">ID= {{ $social->id }}</small><br />
                                           
                                        </td>
                                        <td>
                                            <div class="editDelet">
                                                <a href="{{ url('admin/socialmedia/' . $social->id . '/edit') }}"
                                                    class="btn btn-success">Edit</a>
                                                <form action="{{ url('admin/socialmedia/' . $social->id . '') }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="submit" class="btn btn-danger" value="Delete" />
                                                </form>
                                            </div>
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
