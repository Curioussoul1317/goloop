@extends('layouts.admin')

@section('content')

<!-- STATISTIC-->


<section>
    <div class="row">
        <div class="col-lg-12">
            <div class="au-card au-card--no-shadow au-card--no-pad m-b-40 au-card--border">
                <div class="au-card-title">
                    <div class="bg-overlay bg-overlay--blue"></div>
                    <h3>
                        <i class="fas fa-list-ol"></i>Products
                    </h3>
                </div>
                <div class="au-inbox-wrap">
                    <div class="au-chat au-chat--border">
                        <div class="au-chat__title">
                            @if(isset($editproduct))
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-6">
                                    <div class="card border border-primary">
                                        <div class="card-header">
                                            <strong class="card-title">Product Info</strong>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{route('AdminProduct.update')}}" method="POST" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="row">
                                                    <input type="hidden" id="id" name="id" value="{{$editproduct->id}}">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="cc-exp" class="control-label mb-1">Name</label>
                                                            <input type="text" id="name" name="name" value="{{$editproduct->name}}" required class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <textarea name="description" id="description" rows="2" placeholder="Description" class="form-control" style="width:100%"> {{$editproduct->description}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="hidden" id="editimage" name="editimage" value="{{$editproduct->img}}">
                                                        <div class="form-group">
                                                            <style>
                                                                .image-upload>input {
                                                                    display: none;
                                                                }
                                                            </style>
                                                            <div class="image-upload">
                                                                <label for="file-input">
                                                                    <img src="{{ asset('/storage/Products/'.$editproduct->img) }}" id="output" />
                                                                </label>
                                                                <input id="file-input" type="file" onchange="loadFile(event)" name="UploadedFile" />
                                                            </div>
                                                            <script>
                                                                var loadFile = function(event) {
                                                                    var output = document.getElementById('output');
                                                                    output.src = URL.createObjectURL(event.target.files[0]);
                                                                    output.onload = function() {
                                                                        URL.revokeObjectURL(output.src) // free memory
                                                                    }
                                                                };
                                                            </script>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <button id="payment-button" type="submit" class="btn btn-lg btn-danger btn-block">
                                                        <span id="payment-button-amount">Update</span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card border border-primary">
                                        <div class="card-header">
                                            <form action="{{route('AdminProductSize.store')}}" method="POST" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="input-group">
                                                    <input type="hidden" id="productid" name="productid" value="{{$editproduct->id}}">
                                                    <select class="custom-select" name="gender" required>
                                                        <option value="">Gender...</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                    <select class="custom-select" name="size" required>
                                                        <option value="">Size...</option>
                                                        <option value="xs">xs</option>
                                                        <option value="s">s</option>
                                                        <option value="m">m</option>
                                                        <option value="l">l</option>
                                                        <option value="xl">xl</option>
                                                        <option value="xxl">xxl</option>
                                                    </select>
                                                    <input type="number" class="form-control" name="price" placeholder="Price" required>
                                                    <input type="number" class="form-control" name="qty" placeholder="Qty" required>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-primary" type="submit">Add</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="card-body">
                                            @if(isset($productsizes))
                                            <div class="input-group">
                                                <select class="custom-select" name="gender" disabled>
                                                    <option value="">Gender...</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                                <select class="custom-select" name="size" disabled>
                                                    <option value="">Size...</option>
                                                    <option value="xs">xs</option>
                                                    <option value="s">s</option>
                                                    <option value="m">m</option>
                                                    <option value="l">l</option>
                                                    <option value="xl">xl</option>
                                                    <option value="xxl">xxl</option>
                                                </select>
                                                <input type="number" class="form-control" name="price" placeholder="Price" disabled>
                                                <input type=" number" class="form-control" name="qty" placeholder="Qty" disabled>
                                                <div class="input-group-append">
                                                    <button class="btn btn-danger" type="submit" disabled>Update</button>
                                                </div>
                                            </div>
                                            @if(count($productsizes)>0)
                                            @foreach($productsizes as $productsize)
                                            <form action="{{route('AdminProductSize.update')}}" method="POST" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="input-group">
                                                    <input type="hidden" id="id" name="id" value="{{$productsize->id}}">
                                                    <select class="custom-select" name="gender">
                                                        <option value="{{$productsize->gender}}">{{$productsize->gender}}</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                    <select class="custom-select" name="size">
                                                        <option value="{{$productsize->size}}">{{$productsize->size}}</option>
                                                        <option value="xs">xs</option>
                                                        <option value="s">s</option>
                                                        <option value="m">m</option>
                                                        <option value="l">l</option>
                                                        <option value="xl">xl</option>
                                                        <option value="xxl">xxl</option>
                                                    </select>
                                                    <input type="number" class="form-control" name="price" placeholder="Price" value="{{$productsize->price}}" required>
                                                    <input type=" number" class="form-control" name="qty" placeholder="Qty" value="{{$productsize->qty}}" required>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-danger" type="submit">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                            @endforeach
                                            @endif
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            @endif



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@section('script')

@endsection
@endsection
