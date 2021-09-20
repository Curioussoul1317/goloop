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
                        <i class="fas fa-users"></i>{{$eventscategories->name}} Participants
                    </h3>
                </div>
                <div class="au-inbox-wrap">
                    <div class="au-chat au-chat--border">
                        <div class="au-chat__title">
                            <div class="col-lg-12">
                                @if(isset($viewparticipants))
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card border border-secondary" style="margin-top: 15px;">
                                            <div class="card-header">
                                                <div class="btn-group float-right mt-1" role="group" aria-label="Basic example">
                                                    <a class="btn btn-primary btn-sm" href="{{route('AdminParticipants.show', ['id'=>$eventscategories->id])}}"> <i class="fa fa-undo"></i></a>
                                                    <a class="btn btn-success btn-sm " href="{{route('Adminprogress.show', ['id'=>$viewparticipants->id])}}"><i class="fa fa-line-chart"></i></a>
                                                    @if ($viewparticipants->code != "")
                                                    <button type="button" class="btn btn-danger btn-sm" disabled> <i class="fa fa-check-square"></i> Approved</button>
                                                    @else
                                                    <a class="btn btn-danger btn-sm" href="{{route('AdminParticipants.update', ['id'=>$viewparticipants->id,'update'=>$viewparticipants->id])}}"> <i class="fa fa-check-square"></i> Approve</a>
                                                    @endif
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="card border border-primary">
                                                            <div class="card-header">
                                                                <strong class="card-title">Event Participants Info</strong>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="card-header">
                                                                    <strong class="card-title">
                                                                        Full Name: </strong>{{$viewparticipants->users->full_name}}

                                                                </div>
                                                                <ul class="list-group list-group-flush">
                                                                    <li class="list-group-item">
                                                                        <strong class="card-title"> Address : </strong> {{$viewparticipants->users->city}}/
                                                                        {{$viewparticipants->users->address}}
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        <strong class="card-title"> Phone:</strong>{{$viewparticipants->users->phone}}
                                                                        <strong class="card-title"> Email : </strong>{{$viewparticipants->users->email}}
                                                                    </li>
                                                                </ul>
                                                                <div class="card-header">
                                                                    <strong class="card-title">Participation Info</strong>
                                                                </div>
                                                                <ul class="list-group list-group-flush">
                                                                    <li class="list-group-item">
                                                                        Applied as :<span class="badge badge-primary badge-pill">Individual</span>
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        Applied On :<span class="badge badge-success badge-pill">{{$viewparticipants->created_at}}
                                                                        </span>
                                                                        Status :<span class="badge badge-success badge-pill">{{$viewparticipants->status}}
                                                                        </span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="card border border-success">
                                                            <div class="card-header">
                                                                <strong class="card-title">Paymnet Info</strong>
                                                            </div>
                                                            <div class="card-body">
                                                                @if ($viewparticipants->payment_id != "")
                                                                <img class="card-img-top" src="{{ asset('/storage/Payments/'.$viewparticipants->payment->slip) }}">
                                                                @else
                                                                <span class="badge badge-danger">Not Paid</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if ($viewparticipants->code != "")
                                                    <style>
                                                        .codecontainer {
                                                            position: relative;
                                                            text-align: center;
                                                            color: white;
                                                        }

                                                        .centered {
                                                            position: absolute;
                                                            top: 50%;
                                                            left: 50%;
                                                            transform: translate(-50%, -50%);
                                                            font-size: 64px;
                                                            font-weight: bolder;
                                                            color: white;
                                                        }
                                                    </style>
                                                    <div class="col-md-3">
                                                        <div class="card border border-success">
                                                            <div class="card-header"><strong class="card-title">Code</strong><button id="btnSave">Save</button></div>
                                                            <div class="codecontainer" id="widget">
                                                                <img src="{{ asset('/storage/BibImage/'.$eventscategories->bib_img)}}" style="width:100%;">
                                                                <div class="centered">{{$viewparticipants->code}}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <script>
                                                        $("#btnSave").click(function() {
                                                            html2canvas($("#widget"), {
                                                                onrendered: function(canvas) {
                                                                    theCanvas = canvas;
                                                                    canvas.toBlob(function(blob) {
                                                                        saveAs(blob, "Dashboard.png");
                                                                    });
                                                                }
                                                            });
                                                        });
                                                    </script>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>@endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>@section('script') @endsection @endsection
