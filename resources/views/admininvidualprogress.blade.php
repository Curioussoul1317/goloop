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
                        <i class="fas fa-users"></i> Participants
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
                                                    <a class="btn btn-primary btn-sm" href="{{route('AdminParticipants.show', ['id'=>$viewparticipants->cat_event_id])}}"> <i class="fa fa-undo"></i></a>
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
                                                                        @if ($viewparticipants->team_id !="")
                                                                        As a <span class="badge badge-primary badge-pill">{{$viewparticipants->team->name}}</span> team
                                                                        @else
                                                                        Applied as :<span class="badge badge-primary badge-pill">Individual</span>
                                                                        @endif
                                                                        Applied On :<span class="badge badge-success badge-pill">{{$viewparticipants->created_at}}
                                                                        </span>
                                                                        Status :<span class="badge badge-success badge-pill">{{$viewparticipants->status}}
                                                                        </span>
                                                                    </li>
                                                                </ul>
                                                                <div class="card-header">
                                                                    <strong class="card-title">Event Info</strong>
                                                                </div>
                                                                <ul class="list-group list-group-flush">
                                                                    <li class="list-group-item">
                                                                        Event : {{$viewparticipants->cat_event->name}}
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        Event Km: {{$viewparticipants->cat_event->km}}
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        Ends On : {{$viewparticipants->cat_event->end_date}}
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <div class="card border border-success">
                                                            <div class="card-header">
                                                                <strong class="card-title">Progress</strong>
                                                            </div>
                                                            <div class="card-body">
                                                                @if (count($progress)>0)
                                                                @foreach($progress as $progres)
                                                                <?php
                                                                $progress = $progres->event_progress;
                                                                $totalKm = $viewparticipants->cat_event->km;
                                                                $KmPercent = $progress / $totalKm * 100;
                                                                if ($KmPercent <= 25) {
                                                                    echo '<p class="muted">
                                                                    <code>' . $progres->progress_date . '</code>
                                                                </p>
                                                                <div class="progress mb-3">
                                                                    <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar" style="width: ' . $KmPercent . '%" aria-valuenow="' . $KmPercent . '" aria-valuemin="0" aria-valuemax="' . $totalKm . '">' . $KmPercent . '%</div>
                                                                </div>';
                                                                } elseif ($KmPercent >= 26 && $KmPercent <= 50) {
                                                                    echo '<p class="muted">
                                                                    <code>' . $progres->progress_date . '</code>
                                                                </p>
                                                                <div class="progress mb-3">
                                                                    <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width: ' . $KmPercent . '%" aria-valuenow="' . $KmPercent . '" aria-valuemin="0" aria-valuemax="' . $totalKm . '">' . $KmPercent . '%</div>
                                                                </div>';
                                                                } elseif ($KmPercent >= 51 && $KmPercent <= 75) {
                                                                    echo '<p class="muted">
                                                                    <code>' . $progres->progress_date . '</code>
                                                                </p>
                                                                <div class="progress mb-3">
                                                                    <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar" style="width: ' . $KmPercent . '%" aria-valuenow="' . $KmPercent . '" aria-valuemin="0" aria-valuemax="' . $totalKm . '">' . $KmPercent . '%</div>
                                                                </div>';
                                                                } elseif ($KmPercent >= 76 && $KmPercent <= 100) {
                                                                    echo '<p class="muted">
                                                                    <code>' . $progres->progress_date . '</code>
                                                                </p>
                                                                <div class="progress mb-3">
                                                                    <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: ' . $KmPercent . '%" aria-valuenow="' . $KmPercent . '" aria-valuemin="0" aria-valuemax="' . $totalKm . '">' . $KmPercent . '%</div>
                                                                </div>';
                                                                }

                                                                ?>

                                                                @endforeach
                                                                <p class="muted">
                                                                    <code>Progress Up to {{date("Y/m/d")}}</code>
                                                                </p>
                                                                <?php
                                                                $ToatlKmPercent = $totalprogress / $totalKm * 100;
                                                                if ($ToatlKmPercent <= 25) {
                                                                    echo '<p class="muted">

                                                                </p>
                                                                <div class="progress mb-3">
                                                                    <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar" style="width: ' . $ToatlKmPercent . '%" aria-valuenow="' . $ToatlKmPercent . '" aria-valuemin="0" aria-valuemax="' . $totalKm . '">' . $ToatlKmPercent . '%</div>
                                                                </div>';
                                                                } elseif ($ToatlKmPercent >= 26 && $KmPercent <= 50) {
                                                                    echo '<p class="muted">

                                                                </p>
                                                                <div class="progress mb-3">
                                                                    <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width: ' . $ToatlKmPercent . '%" aria-valuenow="' . $ToatlKmPercent . '" aria-valuemin="0" aria-valuemax="' . $totalKm . '">' . $ToatlKmPercent . '%</div>
                                                                </div>';
                                                                } elseif ($ToatlKmPercent >= 51 && $KmPercent <= 75) {
                                                                    echo '<p class="muted">

                                                                </p>
                                                                <div class="progress mb-3">
                                                                    <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar" style="width: ' . $ToatlKmPercent . '%" aria-valuenow="' . $ToatlKmPercent . '" aria-valuemin="0" aria-valuemax="' . $totalKm . '">' . $ToatlKmPercent . '%</div>
                                                                </div>';
                                                                } elseif ($ToatlKmPercent >= 76 && $ToatlKmPercent <= 100) {
                                                                    echo '<p class="muted">

                                                                </p>
                                                                <div class="progress mb-3">
                                                                    <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: ' . $ToatlKmPercent . '%" aria-valuenow="' . $ToatlKmPercent . '" aria-valuemin="0" aria-valuemax="' . $totalKm . '">' . $ToatlKmPercent . '%</div>
                                                                </div>';
                                                                }
                                                                ?>
                                                                @if($totalprogress >= $totalKm)
                                                                <form action="{{route('Medals.store')}}" method="POST" enctype="multipart/form-data">
                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" name="participantid" value="{{$viewparticipants->id}}">
                                                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                                        <span id="payment-button-amount">Give Medal</span>
                                                                    </button>
                                                                </form>
                                                                @endif
                                                                @else
                                                                <div class="card-header">
                                                                    <strong class="card-title">No Progress made yet</strong>
                                                                </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

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
</section>@section('script') @endsection @endsection
