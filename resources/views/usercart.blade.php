@extends('layouts.usersecond')

@section('content')
<script src="{{ asset('UserUi/jquery.min.js') }}"></script>
<div class="container">
    <div class="account-tabs-setting">
        <div class="row">
            <div class="col-lg-3">
                <div class="acc-leftbar">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link" href="{{route('Cart.show', ['id'=>1])}}" role="tab"><i class="la la-cart-plus"></i>Cart Items</a>
                        <a class="nav-item nav-link" href="{{route('Cart.show', ['id'=>2])}}" role="tab"><i class="la la-cart-arrow-down"></i>Paid Items</a>
                        <a class="nav-item nav-link" href="{{route('Cart.show', ['id'=>3])}}" role="tab"><i class="la la-cart-arrow-down"></i>Historys</a>
                    </div>
                </div>
                <!--acc-leftbar end-->
            </div>
            <div class="col-lg-9">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-acc" role="tabpanel" aria-labelledby="nav-acc-tab">
                        <div class="acc-setting">

                            @if(isset($items))
                            @if(count($items)>0)
                            <h3>Added Items</h3>
                            <div class="requests-list">
                                @foreach($items as $addeditem)
                                <!--request-detailse end-->
                                <div class="request-details">
                                    <div class="noty-user-img">
                                        <img src="{{ asset('/storage/Products/'.$addeditem->productsize->product->img) }}" width="35" height="35">
                                    </div>
                                    <div class="request-info">
                                        <a href="{{route('Product.show', ['id'=>$addeditem->products_id])}}" class="view-more-pro">
                                            <h3>{{$addeditem->productsize->product->name}}</h3>
                                        </a>
                                        <h3>Size:{{$addeditem->productsize->size}}</h3>
                                    </div>
                                    <div class="request-info">
                                        <h3>Gender: {{$addeditem->productsize->gender}}</h3>
                                        <h3>Qty :{{$addeditem->qty}}</h3>
                                    </div>
                                    <div class="request-info">
                                        <h3>Price: {{$addeditem->productsize->price}}</h3>
                                        <h3>Total :{{$addeditem->total}}</h3>
                                    </div>
                                    <div class="accept-feat">
                                        <ul>
                                            <li>
                                                <button data-toggle="modal" data-target="#paymentmodal" data-id="{{$addeditem->id}}" data-name="{{$addeditem->productsize->product->name}}" data-total="{{$addeditem->total}}" class="accept-req">Make Payment</button>
                                                <!-- <button type="submit" class="accept-req"></button> -->
                                            </li>
                                            <li><button type="button" data-toggle="modal" class="close-req" data-target="#itemdeletemodal" data-id="{{$addeditem->id}}">
                                                    <i class="la la-close"></i> </button> </li>
                                        </ul>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <!--requests-list end-->
                            @else
                            <h3>There are no Items Added</h3>
                            @endif
                            @endif
                            <!-- ////////////////////////////////  -->

                            @if(isset($itemspaid))
                            @if(count($itemspaid)>0)
                            <h3>Paid Items</h3>
                            <div class="requests-list">
                                @foreach($itemspaid as $addeditem)
                                <!--request-detailse end-->
                                <div class="request-details">
                                    <div class="noty-user-img">
                                        <img src="{{ asset('/storage/Products/'.$addeditem->productsize->product->img) }}" width="35" height="35">
                                    </div>
                                    <div class="request-info">
                                        <a href="{{route('Product.show', ['id'=>$addeditem->products_id])}}" class="view-more-pro">
                                            <h3>{{$addeditem->productsize->product->name}}</h3>
                                        </a>
                                        <h3>Size:{{$addeditem->productsize->size}}</h3>
                                    </div>
                                    <div class="request-info">
                                        <h3>Gender: {{$addeditem->productsize->gender}}</h3>
                                        <h3>Qty :{{$addeditem->qty}}</h3>
                                    </div>
                                    <div class="request-info">
                                        <h3>Price: {{$addeditem->productsize->price}}</h3>
                                        <h3>Total :{{$addeditem->total}}</h3>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <!--requests-list end-->
                            @else
                            <h3>There are no Paid Items</h3>
                            @endif
                            @endif

                            <!-- ////////////////////////////////  -->

                            @if(isset($itemsrecived))
                            @if(count($itemsrecived)>0)
                            <h3>Cart History</h3>
                            <div class="requests-list">
                                @foreach($itemsrecived as $addeditem)
                                <!--request-detailse end-->
                                <div class="request-details">
                                    <div class="noty-user-img">
                                        <img src="{{ asset('/storage/Products/'.$addeditem->productsize->product->img) }}" width="35" height="35">
                                    </div>
                                    <div class="request-info">
                                        <a href="{{route('Product.show', ['id'=>$addeditem->products_id])}}" class="view-more-pro">
                                            <h3>{{$addeditem->productsize->product->name}}</h3>
                                        </a>
                                        <h3>Size:{{$addeditem->productsize->size}}</h3>
                                    </div>
                                    <div class="request-info">
                                        <h3>Gender: {{$addeditem->productsize->gender}}</h3>
                                        <h3>Qty :{{$addeditem->qty}}</h3>
                                    </div>
                                    <div class="request-info">
                                        <h3>Price: {{$addeditem->productsize->price}}</h3>
                                        <h3>Total :{{$addeditem->total}}</h3>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <!--requests-list end-->
                            @else
                            <h3>There are no Items</h3>
                            @endif
                            @endif


                            <!--acc-setting end-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--account-tabs-setting end-->
    </div>

    <!-- modal delete file -->
    <div class="modal fade" id="itemdeletemodal" tabindex="-1" role="dialog" aria-labelledby="itemdeletemodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h4 class="modal-title" id="itemdeletemodalLabel">Confirm deletion</h4>
                    <form action="{{route('Cart.destroy')}}" method="POST" id="Postdeleteform" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" id="id">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- end modal delete file -->

    <div class="modal fade" id="paymentmodal" tabindex="-1" role="dialog" aria-labelledby="paymentmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h4 class="modal-title" id="paymentmodalLabel">Payment Slip Upload</h4>
                    <form action="{{route('Cart.update')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" id="id">
                        <input type="text" name="name" id="name">
                        <input type="text" name="total" id="total">
                        <div class="col-md-12">
                            <div class="form-group">
                                <style>
                                    .image-upload>input {
                                        display: none;
                                    }
                                </style>
                                <div class="image-upload">
                                    <label for="file-input">
                                        <img src="{{ asset('defaultimg/upload.png') }}" id="output" class="img-fluid" />
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Upload</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    @section('script')
    $('#itemdeletemodal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var val1 = button.data('id')
    var modal = $(this)
    modal.find('.modal-body #id').val(val1)
    })


    $('#paymentmodal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var val1 = button.data('id')
    var val2 = button.data('name')
    var val3 = button.data('total')
    var modal = $(this)
    modal.find('.modal-body #id').val(val1)
    modal.find('.modal-body #name').val(val2)
    modal.find('.modal-body #total').val(val3)
    })
    @endsection
    @endsection
