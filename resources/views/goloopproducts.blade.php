@extends('layouts.usersecond')

@section('content')
<section class="companies-info">
    <div class="container">
        <div class="company-title">
            <h3>GoLoop Products <a href="{{route('Cart.show', ['id'=>1])}}" style="float: right;">My Cart</a></h3>
        </div>
        <!--company-title end-->
        @if(isset($item))
        <div class="account-tabs-setting" style="padding: 5px 0px;">
            <div class="row">
                <div class="col-lg-3">
                    <div class="acc-leftbar">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active">{{$item->name}}</a>
                            <img src="{{ asset('/storage/Products/'.$item->img) }}" class="img-fluid" width="100%">
                        </div>

                    </div>
                    <!--acc-leftbar end-->
                </div>
                <div class="col-lg-9">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-acc" role="tabpanel" aria-labelledby="nav-acc-tab">
                            <div class="acc-setting">
                                <div class="row">
                                    <table class="table">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">Gender</th>
                                                <th scope="col">Size</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Qty</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Add to cart</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($sizes)>0)
                                            @foreach($sizes as $size)
                                            <form action="{{route('Cart.store')}}" method="POST" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <tr>
                                                    <input type="hidden" name="id" value="{{$size->id}}">
                                                    <input type="hidden" name="pid" value="{{$size->product_id}}">
                                                    <th scope="row">{{$size->gender}}</th>
                                                    <td>{{$size->size}}</td>
                                                    <td><input type="hidden" name="price" id="p{{$size->id}}" value="{{$size->price}}">{{$size->price}}</td>
                                                    <td><input type="text" name="qty" id="q{{$size->id}}" placeholder="{{$size->qty}}" required class="form-control" style="width: 50px;"></td>
                                                    <td>
                                                        <script>
                                                            var typingTimer;
                                                            var doneTypingInterval = 500;
                                                            $('#q{{$size->id}}').keyup(function() {
                                                                clearTimeout(typingTimer);
                                                                if ($('#q{{$size->id}}').val()) {
                                                                    var price = $('#p{{$size->id}}').val();
                                                                    var qty = $('#q{{$size->id}}').val();
                                                                    $("#total{{$size->id}}").show().html('<h2>' + price * qty + ' /-</h2>');
                                                                }
                                                            });
                                                        </script>
                                                        <div id="total{{$size->id}}">
                                                            0 /-
                                                        </div>
                                                    </td>
                                                    <th scope="col">
                                                        <button type="submit" class="btn btn-primary btn-sm">
                                                            <i class="fa fa-dot-circle-o"></i> Add to Cart
                                                        </button>
                                                    </th>
                                                </tr>
                                            </form>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--acc-setting end-->
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--account-tabs-setting end-->
        @endif
        <!-- end view product  -->
        <div class="companies-list">
            <div class="row">
                @if(count($products)>0)
                @foreach($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="company_profile_info">
                        <div class="company-up-info">
                            <img src="{{ asset('/storage/Products/'.$product->img) }}" width="90" height="90">
                            <h3>{{$product->name}}</h3>
                        </div>
                        <a href="{{route('Product.show', ['id'=>$product->id])}}" class="view-more-pro">View Product</a>
                    </div>
                    <!--company_profile_info end-->
                </div>
                <!--user-profy end-->
                @endforeach
                @endif

            </div>
        </div>
        <!--companies-list end-->
        <div class="process-comm">
            <div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
        <!--process-comm end-->
    </div>
</section>
<!--companies-info end-->
@section('script')
@endsection
@endsection
