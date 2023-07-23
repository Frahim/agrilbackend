@extends ('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between py-3">
                <h3 class="mb-0">All Employs</h3>
                <a href="{{ url('admin/employ/create')}}" class="btn btn-primary text-white float-end">Add Employ</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table  table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>                               
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Bio</th>
                                <th scope="col">Designeation</th>  
                                <th scope="col">Department</th> 
                                <th scope="col">brand_id</th>  
                                <th scope="col">picture</th> 
                                <th scope="col">Seting</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employs as $employ)
                                <tr>                                    
                                    <td>{{ $employ->name }} <br/><small>ID:{{$employ->id}}</small></td>                                    
                                    <td>{{ $employ->email }}</td>
                                    <td>{{ $employ->phonenumber }}</td>                                   
                                    <td>{{ $employ->mobile }}</td>
                                    <td>{{ $employ->bio }}</td>
                                    <td>{{ $employ->designeation }}</td>
                                    <td>{{ $employ->department }}</td>
                                    <td>{{ $employ->brand_id }}</td>
                                    <td>
                                        <img src="{{ asset('/uploads/employ/' . $employ->picture) }}" width="60px"
                                            height="60px" />
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/employ/' . $employ->id . '/edit') }}"
                                            class="btn btn-success">Edit</a>                                       
                                            <form action="{{ url('admin/employ/' . $employ->id . '') }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <input type="submit" class="btn btn-danger" value="Delete" />
                                            </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection