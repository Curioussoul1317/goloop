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
                        <i class="fas fa-list-ol"></i>Pending Delivery
                    </h3>
                </div>
                <div class="au-inbox-wrap">
                    <div class="au-chat au-chat--border">
                        @if(isset($vieworder))
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card border border-primary">
                                    <div class="card-header">
                                        <strong class="card-title">{{$vieworder->product->name}}

                                        </strong>
                                    </div>

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <img class="card-img-top" src="{{ asset('/storage/Products/'.$vieworder->product->img) }}">
                                            </div>
                                            <div class="col">
                                                <ul class="list-group list-group-flush">
                                                    <ul class="list-group col-12" style="padding-right:0">
                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                            Order By :<span class="badge badge-dark badge-pill">{{$vieworder->user->full_name}}</span>
                                                        </li>
                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                            Address :<span class="badge badge-success badge-pill">{{$vieworder->user->country}}/
                                                                {{$vieworder->user->city}}/
                                                                {{$vieworder->user->address}}
                                                            </span>
                                                        </li>
                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                            Phone: <span class="badge badge-primary badge-pill">{{$vieworder->user->phone}}</span>
                                                        </li>
                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                            Email :
                                                            <span class="badge badge-danger badge-pill">{{$vieworder->user->email}}</span>
                                                        </li>
                                                    </ul>
                                                    <p class="card-text"> Item Details
                                                    </p>

                                                    <ul class="list-group list-group-flush">
                                                        <ul class="list-group col-12" style="padding-right:0">
                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                Size :<span class="badge badge-dark badge-pill">{{$vieworder->size}}</span>
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                For :<span class="badge badge-success badge-pill">{{$vieworder->gender}}</span>
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                Quantity: <span class="badge badge-primary badge-pill">{{$vieworder->qty}}</span>
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                Total :
                                                                <span class="badge badge-danger badge-pill">{{$vieworder->total}}/-</span>
                                                            </li>
                                                        </ul>
                                                        <p class="card-text"> {{$vieworder->product->description}}
                                                        </p>
                                            </div>
                                            <div class="col">
                                                @if($vieworder->payment_id !="")
                                                <img class="card-img-top" src="{{ asset('/storage/Payments/'.$vieworder->slip->slip) }}">
                                                @else
                                                <ul class="list-group col-12" style="padding-right:0">
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        <span class="badge badge-danger badge-pill">No Payments made</span>
                                                    </li>
                                                </ul>
                                                @endif

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="au-chat__title">
                            <div class="au-chat-info">
                                <div class="col-lg-12">
                                    <!-- USER DATA-->
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Order By</th>
                                                <th scope="col">Product</th>
                                                <th scope="col">Gender</th>
                                                <th scope="col">Size</th>
                                                <th scope="col">Qty</th>
                                                <th scope="col">Paid amount</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($orders)>0)
                                            @foreach($orders as $order)
                                            <tr>
                                                <th scope="row">{{$order->user->full_name}}</th>
                                                <td>{{$order->product->name}}</td>
                                                <td>{{$order->gender}}</td>
                                                <td>{{$order->size}}</td>
                                                <td>{{$order->qty}}</td>
                                                <td>{{$order->total}}</td>
                                                <td>
                                                    <a class="btn btn-primary" href="{{route('AdminPurchase.show', ['id'=>$order->id])}}" style="width:100%">
                                                        <i class="fa fa-eye"></i> Details</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif

                                        </tbody>
                                    </table>
                                    <!-- END USER DATA-->
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
