@extends('layouts.user')

@section('content')
<div class="main-ws-sec">
    <div class="post-topbar">
        <!-- <div class="post-st"> -->
        Your events Progress
        <!-- </div> -->
        <!--post-st end-->
    </div>
    <!--post-topbar end-->
    <div class="posts-section">
        @if(isset($eventsparticipate))
        @if(count($eventsparticipate)>0)
        @foreach($eventsparticipate as $participatedevent)
        <div class="posty">
            <div class="post-topbar">
                <div class="post-bar no-margin">
                    <div class="post_topbar">
                        <div class="usy-dt">
                            <div class="usy-name">
                                <h3>Total Progress made on {{$participatedevent->cat_event->name}} Event</h3>
                                <span><img src="images/clock.png" alt="">on {{$participatedevent->created_at}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!--post-bar end-->
                <div class="comment-section">
                    <div class="comment-sec">
                        @if (count($participatedevent->Progress)>0)
                        <?php
                        $totalprogress = 0;
                        ?>
                        @foreach($participatedevent->Progress as $progres)
                        <?php
                        $progress = $progres->event_progress;
                        $totalKm = $participatedevent->cat_event->km;
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
                        $totalprogress += $progress;
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
                        @else
                        <div class="card-header">
                            <strong class="card-title">No Progress made yet</strong>
                        </div>
                        @endif
                    </div>
                    <!--comment-sec end-->
                </div>
            </div>
        </div>
        <!--posty end-->
        @endforeach
        @else
        @endif
        @else
        @endif
        <!-- end posts  -->

    </div>
    <!--eventposts-section end-->

</div>
<!--main-ws-sec end-->




@endsection
