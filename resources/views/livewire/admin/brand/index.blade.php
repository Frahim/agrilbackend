<div>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Brand Delete</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent='destroyBrand'>
                    <div class="modal-body">
                        <h4>Are you Sure you want to delete the Brand</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>





    <div class="row">
        @if (session('message'))
            <div class="col-md-10 alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center py-2">
                    <h3 class="m-0 align-middle">Brands</h3>
                    <a href="{{ url('admin/brand/create') }}" class="btn btn-primary btn-sm float-end">Add Brand</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Logo</th>
                                <th scope="col">Description</th>
                                <th scope="col">Satus</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $brand)
                                <tr>

                                    <td>{{ $brand->id }}</td>
                                    <td>{{ $brand->name }}</td>
                                    <td>
                                        <img src="{{ asset('/uploads/brand/' . $brand->logo) }}" width="60px"
                                            height="60px" />
                                    </td>
                                    <td>{{ $brand->description }}</td>
                                    <td>{{ $brand->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                    <td>
                                        <div class="editDelet">
                                        <a href="{{ url('admin/brand/' . $brand->id . '/edit') }}"
                                            class="btn btn-success">Edit</a>
                                        {{-- <a href="#" wire.click="deleteBrand({{ $brand->id }})"
                                            data-bs-toggle="modal" data-bs-target="#deleteModal"
                                            class="btn btn-danger">Delete</a> --}}
                                      <form action="{{ url('admin/brand/'.$brand->id.'',  ) }}" method="post">
                                        @csrf
                                        @method('delete')                                       
                                            <input type="submit" class="btn btn-danger " value="Delete" />
                                        
                                    </div>
                                      </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                    <div class="col-12 my-3">
                        {{ $brands->links() }}
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</div>
