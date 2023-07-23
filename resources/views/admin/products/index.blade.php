@extends ('layouts.admin')

@section('content')
    <div class="row">
        @if (session('message'))
            <div class="col-md-10 alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center py-2">
                    <h3 class="m-0 align-middle">Products</h3>
                    <a href="{{ url('admin/product/create') }}" class="btn btn-primary btn-sm float-end">Add Product</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table  table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Brand</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Price</th>                                    
                                    <th scope="col">Quantity</th>
                                    <th scope="col"><small>Disease Resistance/<br/>Tolerance</small></th>
                                    <th scope="col">Variety</th>
                                    <th scope="col">Sorting</th>
                                    <th scope="col">Pod</th>
                                    <th scope="col">plant</th>
                                    <th scope="col">Image</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->name }}<br /><small>{{ $product->id }}</small><br /><small>{{ $product->slug }}</small>
                                        </td>
                                        <td>
                                            @if ($product->brand)
                                                {{ $product->brand->name }}
                                            @else
                                                No Brand Silected
                                            @endif
                                        </td>
                                        <td>
                                            @if ($product->category)
                                                {{ $product->category }}
                                            @else
                                                No Category Silected
                                            @endif
                                        </td>
                                        <td>{{ $product->description }}</td>
                                        <td>
                                            Orginal Price: {{ $product->orginal_price }}
                                            <br />
                                            Selling Price: {{ $product->selling_price }}
                                        </td>
                                        
                                        <td>{{ $product->quantity }}</td>

                                        <td>{{ $product->disease }}</td>
                                        <td>{{ $product->variety }}</td>
                                        <td>{{ $product->sorting }}</td>
                                        <td>{{ $product->pod }}</td>
                                        <td>{{ $product->plant }}</td>
                                        <td>
                                            <img src="{{ asset($product->pf_image) }}" width="60px"
                                                    height="60px">
                                            {{-- @if($product->productImages)
                                                @foreach ($product->productImages as $image)
                                                <img src="{{ asset($image->image) }}" width="60px"
                                                    height="60px">
                                                @endforeach
                                            @else
                                            {{-- <img src="{{ asset('/img/placeholder.jpg') }}" width="60px"
                                            height="60px">                                            
                                            @endif --}}

                                        </td>
                                        <td>
                                            <a href="{{ url('admin/products/' . $product->id . '/edit') }}"
                                                class="btn btn-success">Edit</a>
                                            <a href="{{ url('admin/products/' . $product->id . '/delete') }}"                                                
                                                class="btn btn-danger">Delete</a>
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
