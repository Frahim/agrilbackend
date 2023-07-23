@extends ('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between py-3">
                    <h3 class="mb-0">Edit Products</h3>
                    <a href="{{ url('admin/products') }}" class="btn btn-primary text-white float-end">Back</a>
                </div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li><a class="active" href="#info-pills" data-toggle="tab">Product Info</a></li>
                    <li class=""><a href="#variation-pills" data-toggle="tab">Description</a></li>
                    <li class=""><a href="#price-pills" data-toggle="tab">Price</a></li>
                    <li class=""><a href="#seo-pills" data-toggle="tab">SEO</a></li>
                </ul>

                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-warning mb-3">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    <form action="{{ url('admin/products/' . $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')


                        <div class="tab-content">
                            <div class="tab-pane fade in active show" id="info-pills">
                                <div class="my-3 row">
                                    <div class="col-sm-12 col-md-4">
                                        <label class="col-12">Product Name</label>
                                        <input type="text" name="name" value="{{ $product->name }}"
                                            class="form-control col-12" />
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <label>Product Slug</label>
                                        <input type="text" name="slug" value="{{ $product->slug }}"
                                            class="form-control col-12" />
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <label>Product Type</label>
                                        <input type="text" name="type" value="{{ $product->type }}"
                                            class="form-control col-12" />
                                    </div>
                                </div>

                                <div class="my-3 row">
                                    <div class="col-sm-12 col-md-4">
                                        <label class="col-12 me-3">Select Brand</label>
                                        <select name="brand_id" class="form-conrol p-2">
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <label class="col-12 me-3">Select Category</label>
                                        <select class="category col-12 border border-primary" name="category[]" multiple="multiple">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" @if(in_array($category->id, $selectedCategories)) selected @endif>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>                                    
                                </div>
                            <div class="my-3 row">
                                <div class="my-3 col-sm-12 col-md-4">
                                    <label class="col-form-label">Product Featured image</label>
                                    <div class="">
                                        <div class="input-group">
                                            <div class="col-12 mb-3">
                                            <input type="file" name="pf_image" class="form-control">
                                            </div>
                                            <div class="col-12 mb-3">
                                            <img src="{{ asset($product->pf_image) }}" width="150px" height="150px">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="my-3 col-sm-12 col-md-8">
                                    <div class="form-group">
                                        <label for="gallery_images">Product Gallery</label>
                                        <input type="file" name="image[]" class="form-control-file" multiple>
                                        <div class="my-3 gallery-view">
                                            @if ($product->productImages)
                                                @foreach ($product->productImages as $image)
                                                    <div class="glimg">
                                                        <img src="{{ asset($image->image) }}" alt="Product Iamge"
                                                            style="width: 100px; height:100px; object-fit:cover" />
                                                        <a class="btn btn-danger" href="{{ url('admin/product_image/'.$image->id.'/delete') }}"> Delet</a>
                                                    </div>
                                                @endforeach
                                            @else
                                                No image
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>


                            </div>

                            <div class="tab-pane fade in" id="variation-pills">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 my-3 ">
                                        <label> Product Description</label>
                                        <textarea rows="5" type="textarea" name="description" class="form-control">{{ $product->description }}</textarea>
                                    </div>

                                    <div class="col-sm-12 col-md-6 my-3 ">
                                        <label>Disease Resistance/Tolerance</label>
                                        <textarea rows="5" type="textarea" name="disease" class="form-control">{{ $product->disease }}</textarea>
                                    </div>

                                    <div class="col-sm-12 col-md-6 my-3 ">
                                        <label>Variety</label>
                                        <textarea rows="5" type="textarea" name="variety" class="form-control">{{ $product->variety }}</textarea>
                                    </div>
                                    <div class="col-sm-12 col-md-6 my-3 ">
                                        <label>Sorting</label>
                                        <textarea rows="5" type="textarea" name="sorting" class="form-control">{{ $product->sorting }}</textarea>
                                    </div>
                                    <div class="col-sm-12 col-md-6 my-3 ">
                                        <label>Pod</label>
                                        <textarea rows="5" type="textarea" name="pod" class="form-control">{{ $product->pod }}</textarea>
                                    </div>
                                    <div class="col-sm-12 col-md-6 my-3 ">
                                        <label>Plant</label>
                                        <textarea rows="5" type="textarea" name="plant" class="form-control">{{ $product->plant }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade in" id="price-pills">
                                <div class="my-3 row">
                                    <div class="col-sm-12 col-md-4">
                                        <label> Product Quantity</label>
                                        <input type="text" name="quantity" value="{{ $product->quantity }}"
                                            class="form-control" />
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <label> Product Regular Price</label>
                                        <input type="text" name="orginal_price" value="{{ $product->orginal_price }}"
                                            class="form-control" />
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <label> Product Selling Price</label>
                                        <input type="text" name="selling_price" value="{{ $product->selling_price }}"
                                            class="form-control" />
                                    </div>

                                </div>

                            </div>

                            <div class="tab-pane fade in" id="seo-pills">
                                <div class="my-3">
                                    <label> Product Meta Title</label>
                                    <input type="text" name="meta_title" value="{{ $product->meta_title }}"
                                        class="form-control" />
                                </div>
                                <div class="my-3">
                                    <label> Product Meta Keyword</label>
                                    <input type="text" name="meta_keyword" value="{{ $product->meta_keyword }}"
                                        class="form-control" />
                                </div>
                                <div class="my-3">
                                    <label> Product Meta Description</label>
                                    <input type="text" name="meta_description"
                                        value="{{ $product->meta_description }}" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
