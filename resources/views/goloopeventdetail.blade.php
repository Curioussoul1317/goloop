@extends('layouts.usersecond')

@section('content')
<section class="companies-info">
    <div class="container">
        <div class="company-title">
            <h3>GoLoop Events <a href="{{route('MyEvents.index')}}" style="float: right;">My Events</a></h3>
        </div>
        <!--company-title end-->
        @if(isset($eventcategory))
        <div class="account-tabs-setting" style="padding: 5px 0px;">
            <div class="row" style="border-bottom: 5px solid white; padding-bottom: 10px;">
                <div class="col-md-4">
                    <div class="acc-leftbar">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active">{{$eventcategory->name}}</a>
                            <img src="{{ asset('/storage/EventCat/'.$eventcategory->catog_event_img)}}" class="img-fluid" width="100%">
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
                                                Event: {{$eventcategory->event->name}}
                                            </li>
                                            <li class="list-group-item d-flex ">
                                                Starting from <span class="badge badge-success badge-pill">{{$eventcategory->start_date}} </span> to
                                                <span class="badge badge-danger badge-pill">{{$eventcategory->end_date}}</span>
                                            </li>
                                            <li class="list-group-item d-flex  ">
                                                Application before :
                                                <span class="badge badge-primary badge-pill">{{$eventcategory->apply_before}}</span>
                                            </li>

                                            @if ($eventcategory->category == "Team")
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Event Category Type {{$eventcategory->category}}
                                            </li>
                                            @endif
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Event Description {{$eventcategory->event->description}}
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                @if ($eventcategory->category == "Team")
                                                @if ($team !== null)
                                                <form method="POST" action="{{ route('GoloopEvents.store') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="slipControlFile1">Please upload the slip</label>
                                                        <input type="file" class="form-control-file" id="slipControlFile1" name="slip">
                                                        <input type="hidden" name="id" value="{{$eventcategory->id}} ">
                                                        <input type="hidden" name="teamid" value="{{$team->id}} ">
                                                        <input type="hidden" name="type" value="team">
                                                    </div>
                                                    <button type="submit" class="btn btn-success" style="width: 100%;">Particpate as {{$team->team->name}} Team</button>
                                                </form>
                                                @else
                                                <button>You are not in a team to participate this </button>
                                                @endif

                                                @else
                                                <form method="POST" action="{{ route('GoloopEvents.store') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="slipControlFile1">Please upload the slip</label>
                                                        <input type="file" class="form-control-file" id="slipControlFile1" name="slip">
                                                        <input type="hidden" name="id" value="{{$eventcategory->id}} ">
                                                        <input type="hidden" name="type" value="individual">
                                                    </div>
                                                    <button type="submit" class="btn btn-success" style="width: 100%;">Particpate</button>
                                                </form>
                                                @endif

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
                    <img src="{{ asset('/storage/Medal/'.$eventcategory->medal_img) }}" class="img-fluid" width="100%">
                </div>
            </div>
        </div>
        <!--account-tabs-setting end-->
        @endif
        <!-- end view product  -->


    </div>
</section>
<!--companies-info end-->
@endsection
