@extends('layouts.usersecond')

@section('content')
<section class="companies-info">
    <div class="container">
        <div class="company-title">
            <h3>GoLoop Events <a href="{{route('MyEvents.index')}}" style="float: right;">My Events</a></h3>
        </div>
        <!--company-title end-->
        @if(isset($eventscategories))
        @if(count($eventscategories)>0)
        @foreach($eventscategories as $eventscategory)
        <div class="account-tabs-setting" style="padding: 5px 0px;">
            <div class="row" style="border-bottom: 5px solid white; padding-bottom: 10px;">
                <div class="col-md-4">
                    <div class="acc-leftbar">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active">{{$eventscategory->name}}</a>
                            <img src="{{ asset('/storage/EventCat/'.$eventscategory->catog_event_img)}}" class="img-fluid" width="100%">
                        </div>

                    </div>
                    <!--acc-leftbar end-->
                </div>
                <div class="col-md-4">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-acc" role="tabpanel" aria-labelledby="nav-acc-tab">
                            <div class="acc-setting">
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul class="list-group col-12" style="padding-right:0">
                                            <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-info">
                                                Event: {{$eventscategory->event->name}}
                                            </li>
                                            <li class="list-group-item d-flex ">
                                                Starting from <span class="badge badge-success badge-pill">{{$eventscategory->start_date}} </span> to
                                                <span class="badge badge-danger badge-pill">{{$eventscategory->end_date}}</span>
                                            </li>
                                            <li class="list-group-item d-flex  ">
                                                Application before :
                                                <span class="badge badge-primary badge-pill">{{$eventscategory->apply_before}}</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Event Description {{$eventscategory->event->description}}
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <a href="{{route('GoloopEvents.show', ['id'=>$eventscategory->id])}}" class="btn btn-info" style="width: 100%;">View Event Details</a>

                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                            <!--acc-setting end-->
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('/storage/Medal/'.$eventscategory->medal_img) }}" class="img-fluid" width="100%">
                </div>
            </div>
        </div>
        <!--account-tabs-setting end-->
        @endforeach
        @endif
        @endif
        <!-- end view product  -->



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
@endsection
