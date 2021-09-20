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
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Participant</th>
                                            <th scope="col">Participated as</th>
                                            <th scope="col">Applied on</th>
                                            <th scope="col">code</th>
                                            <th scope="col">Payment</th>
                                            <th scope="col" class=""></th>
                                        </tr>
                                    </thead>
                                    <tbody>@if(count($participants)>0) @foreach($participants as $participant) <tr>
                                            <th scope="row"> {{ $participant->users->full_name}}
                                            </th>
                                            <td>
                                                @if ($participant->team_id !="")
                                                <span class="badge badge-warning  ">{{ $participant->team->name}}</span>
                                                @else
                                                <span class="badge badge-success  ">Individualy</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{ $participant->created_at}}
                                            </td>
                                            <td>
                                                {{$participant->code}}
                                            </td>
                                            <td>@if ($participant->payment_id !="") <span class="badge badge-success  ">Paid</span>@else <span class="badge badge-danger">Not Paid</span>@endif </td>
                                            <td>
                                                <div class="btn-group pull-right" role="group">
                                                    @if ($participant->team_id !="")
                                                    <a class="btn btn-primary btn-sm " href="{{route('TeamDetail.show', ['id'=>$participant->id, 'catid'=>$participant->cat_event_id])}}">Team<i class="fa fa-eye"></i></a>
                                                    <a class="btn btn-success btn-sm " href="{{route('AdminTeamprogress.show', ['id'=>$participant->team_id, 'catid'=>$participant->cat_event_id])}}"><i class="fa fa-line-chart"></i></a>
                                                    @endif
                                                    <a class="btn btn-primary btn-sm " href="{{route('ParticipentsDetail.show', ['id'=>$participant->id, 'catid'=>$participant->cat_event_id])}}"><i class="fa fa-eye"></i></a>
                                                    <a class="btn btn-success btn-sm " href="{{route('Adminprogress.show', ['id'=>$participant->id])}}"><i class="fa fa-line-chart"></i></a>
                                                </div>

                                            </td>
                                        </tr>@endforeach @endif </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>@section('script') @endsection @endsection
