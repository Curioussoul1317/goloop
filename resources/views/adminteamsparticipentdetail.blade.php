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
                        <i class="fas fa-users"></i>{{$eventscategories->name}} Event Category {{$team->name}} Members
                    </h3>
                </div>
                <div class="au-inbox-wrap">
                    <div class="au-chat au-chat--border">
                        <div class="au-chat__title">
                            <div class="col-lg-12">
                                @if(isset($viewparticipants))
                                <div class="row">
                                    <div class="col-lg-12">


                                        @if(isset($team))
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Full Name</th>
                                                    <th scope="col">Phone No</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Payment Status</th>
                                                    <th scope="col">Bib No</th>
                                                    <th scope="col">
                                                        <div class="btn-group pull-right" role="group">
                                                            <a class="btn btn-success btn-sm " href="{{route('AdminTeamprogress.show', ['id'=>$team->id, 'catid'=>$eventscategories->id])}}"><i class="fa fa-line-chart"></i></a>
                                                            <a class="btn btn-primary btn-sm float-right" href="{{route('AdminParticipants.show', ['id'=>$eventscategories->id])}}"> <i class="fa fa-undo"></i></a>
                                                        </div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($team_members)>0)
                                                @foreach($team_members as $members)
                                                <tr>
                                                    <td>{{$members->member->full_name}}</td>
                                                    <td>{{$members->member->phone}}</td>
                                                    <td>{{$members->member->email}}</td>
                                                    <td>{{$members->participant->id}}</td>
                                                    <td>{{$members->participant->code}}</td>
                                                    <td>
                                                        <div class="btn-group pull-right" role="group">
                                                            <a class="btn btn-primary btn-sm " href="{{route('ParticipentsDetail.show', ['id'=>$members->participant->id, 'catid'=>$eventscategories->id])}}"><i class="fa fa-eye"></i></a>
                                                            <a class="btn btn-success btn-sm " href="{{route('Adminprogress.show', ['id'=>$members->participant->id])}}"><i class="fa fa-line-chart"></i></a>
                                                            @if ($members->participant->code != "")
                                                            <button type="button" class="btn btn-danger btn-sm" disabled> <i class="fa fa-check-square"></i> Approved</button>
                                                            @else
                                                            <a class="btn btn-danger btn-sm" href="{{route('AdminParticipants.update', ['id'=>$viewparticipants->id,'update'=>$viewparticipants->id])}}"> <i class="fa fa-check-square"></i> Approve</a>
                                                            @endif

                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @else
                                                @endif
                                            </tbody>
                                        </table>oloop.test/ParticipentsDetail/6/1?uid=6
                                        @endif
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
