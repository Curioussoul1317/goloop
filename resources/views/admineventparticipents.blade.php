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
                        <i class="fas fa-users"></i>Event Participants
                    </h3>
                </div>
                <div class="au-inbox-wrap">
                    <div class="au-chat au-chat--border">
                        <div class="row">
                            @if(count($events)>0)
                            @foreach($events as $event)
                            <div class="col-md-3">
                                <div class="card" style="margin-top: 10px;">
                                    <div class="card-header">
                                        <strong class="card-title mb-3">{{$event->name}}</strong>
                                        @if(date("Y-m-d") < $event->end_date)
                                            <span class="badge badge-success float-right mt-1">Active</span>
                                            @else
                                            <span class="badge badge-danger float-right mt-1">In Active</span>
                                            @endif
                                    </div>
                                    <div class="card-body">
                                        <div class="mx-auto d-block">
                                            <img class="mx-auto d-block" src="{{ asset('/storage/Event/'.$event->event_img)}}">
                                            <h5 class="text-sm-center mt-2 mb-1">Categoryies</h5>
                                            <table class="table table-sm">
                                                @foreach($event->catevents as $catevent)
                                                <tr>
                                                    <th scope="row">{{$catevent->name}}</th>
                                                    <td>
                                                        <a class="float-right" href="{{route('AdminParticipants.show', ['id'=>$catevent->id])}}">
                                                            <i class="fas fa-users"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>

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
</section>

@section('script')

@endsection
@endsection
