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
                    <button class="au-btn-plus" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        <i class="zmdi zmdi-plus"></i>
                    </button>
                </div>
                <div class="au-inbox-wrap">
                    <div class="au-chat au-chat--border">
                        <div class="au-chat__title">
                            <div class="au-chat-info">
                                <div class="collapse col-lg-12" id="collapseExample">
                                    <div class="col-lg-8">
                                        <div class="card">
                                            <div class="card-header">New Product</div>
                                            <div class="card-body">
                                                <form action="{{route('AdminProduct.store')}}" method="POST" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="cc-exp" class="control-label mb-1">Name</label>
                                                                <input type="text" id="name" name="name" placeholder="Name" required class="form-control">
                                                            </div>
                                                            <div class="row" style="padding-top:15px;">
                                                                <div class="col-12 col-md-12" style="margin-top:10px; margin-bottom:10px;">
                                                                    <textarea name="description" id="description" rows="2" placeholder="Description" class="form-control" style="width:100%"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <style>
                                                                    .image-upload>input {
                                                                        display: none;
                                                                    }
                                                                </style>
                                                                <div class="image-upload">
                                                                    <label for="file-input">
                                                                        <img src="{{ asset('defaultimg/upload.png') }}" id="output" />
                                                                    </label>
                                                                    <input id="file-input" type="file" onchange="loadFile(event)" name="UploadedFile" required />
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
                                                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                            <span id="payment-button-amount">Add to inventory</span>
                                                        </button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="container-fluid">
                                <div class="row">
                                    @if(count($products)>0)
                                    @foreach($products as $product)
                                    <div class="col-md-3">
                                        <div class="card border border-primary">
                                            <div class="card-header">
                                                <strong class="card-title">{{$product->name}}
                                                    <small>
                                                        <span class="badge badge-danger float-right mt-1"> <a class="btn btn-danger btn-sm" href="{{route('AdminProduct.show', ['id'=>$product->id])}}" style="width:100%">
                                                                <i class="fa fa-edit"></i></a></span>
                                                    </small>
                                                </strong>
                                            </div>
                                            <img class="card-img-top" src="{{ asset('/storage/Products/'.$product->img) }}">
                                            <div class="card-body">
                                                <p class="card-text"> {{$product->description}}
                                                </p>

                                                <table class="table table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Gender</th>
                                                            <th scope="col">Size</th>
                                                            <th scope="col">Qty</th>
                                                            <th scope="col">Price</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($product->infos as $info)
                                                        <tr>
                                                            <th scope="row">{{$info->gender}}</th>
                                                            <td> {{$info->size}}</td>
                                                            <td>{{$info->qty}}</td>
                                                            <td>{{$info->price}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>


                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif

                                </div>
                            </div>
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
