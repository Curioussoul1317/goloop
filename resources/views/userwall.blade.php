@extends('layouts.usersecond')

@section('content')


<section class="cover-sec">
    @if ($userinfo->wall_pic =="")
    <img src="http://via.placeholder.com/1600x400" alt="">
    @else
    <img src="{{ asset('/storage/wallPicture/'.$userinfo->wall_pic)}}" id="outputtwo" width="1600" height="400" />
    @endif
    @if($userinfo->id == $user->id)
    <a href="#" title=""><i class="fa fa-camera"></i> Change Image</a>
    @endif
</section>


<main>
    <div class="main-section">
        <div class="container">
            <div class="main-section-data">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="main-left-sidebar">
                            <div class="user_profile">
                                <div class="user-pro-img">
                                    @if($userinfo->id == $user->id)
                                    <a href="#" title=""><i class="fa fa-camera"></i></a>
                                    @endif
                                    @if ($userinfo->profile_pic =="")
                                    <img class="avatar-preview" src="{{ asset('defaultimg/profile_pic.png') }}" width="170" height="170">
                                    @else
                                    <img class="avatar-preview" src="{{ asset('/storage/ProfilePics/'.$userinfo->profile_pic) }}" width="170" height="170">
                                    @endif

                                </div>
                                <!--user-pro-img end-->


                                <div class="user_pro_status">
                                    @if($userinfo->id == $user->id)
                                    <ul class="flw-hr">
                                        <li><a href="{{route('home')}}" title="" class="flww">Home</a></li>
                                    </ul>
                                    @else
                                    @if($followtrue === null)
                                    <ul class="flw-hr">
                                        <li><a href="{{route('Follow.index', ['id'=>$userinfo->id])}}" title="" class="flww"><i class="la la-plus"></i> Follow</a></li>
                                        <li><a href="{{route('home')}}" title="" class="hre">Home</a></li>
                                    </ul>
                                    @elseif($followtrue->status == 0)
                                    <ul class="flw-hr">
                                        <li><a href="" title="" class="flww"><i class="la la-plus"></i> Requested</a></li>
                                        <li><a href="{{route('home')}}" title="" class="hre">Home</a></li>
                                    </ul>
                                    @endif
                                    @endif
                                    <ul class="flw-status">
                                        <li>
                                            <span>Following</span>
                                            <b>{{$userfollowing}}</b>
                                        </li>
                                        <li>
                                            <span>Followers</span>
                                            <b>{{$userfollowers}}</b>
                                        </li>
                                    </ul>
                                </div>




                                @if(count($useracounts)>0)
                                <!--user_pro_status end-->
                                <ul class="social_links">
                                    @foreach($useracounts as $useracount)
                                    <li>
                                        <a href="{{route('AccountSwitch.index', ['id'=>$useracount->id])}}">
                                            {{$useracount->full_name}}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                            <!--user_profile end-->
                            @if(count($teams)>0)
                            @foreach($teams as $team)
                            <div class="suggestions full-width">
                                <div class="sd-title">
                                    <h3>{{$team->name}}</h3>
                                    <i class="la la-ellipsis-v"></i>
                                </div>
                                <!--sd-title end-->
                                <div class="suggestions-list">
                                    @foreach($team->members as $member)
                                    <div class="suggestion-usd">
                                        <img src="{{ asset('/storage/ProfilePics/'.$member->member->profile_pic) }}" width="35" height="35">
                                        <div class="sgt-text">
                                            <h4>{{$member->member->full_name}}</h4>
                                            @if ($member->participant_id != null)
                                            <span>{{$member->participant->cat_event->name}}</span>
                                            @endif
                                        </div>
                                        <span><i class="la la-plus"></i></span>
                                    </div>
                                    @endforeach
                                </div>
                                <!--suggestions-list end-->
                            </div>
                            @endforeach
                            @else
                            <!-- <div class="suggestions full-width">
                                <div class="sd-title">
                                    <h3></h3>
                                    <i class="la la-ellipsis-v"></i>
                                </div>
                        </div> -->
                            @endif

                            <!--suggestions end-->
                        </div>
                        <!--main-left-sidebar end-->
                    </div>
                    <div class="col-lg-6">
                        <div class="main-ws-sec">
                            <div class="user-tab-sec">
                                <h3>{{$userinfo->full_name}}</h3>
                                <div class="star-descp">
                                    <span>{{$userinfo->nick_name}}</span>
                                </div>
                                @if($userinfo->id == $user->id)
                                <div class="post-topbar">
                                    <div class="post-st">
                                        <ul>
                                            <li><a class="active" data-toggle="collapse" href="#collapsePost" role="button" aria-expanded="false" aria-controls="collapsePost">New Progress</a></li>
                                        </ul>
                                    </div>
                                </div>
                                @endif

                                <!--billing-method end-->
                                @if($userinfo->id == $user->id)
                                <div class="collapse" id="collapsePost">
                                    @if(count($userevents)>0)
                                    <div class="add-billing-method" style="margin-bottom: 25px;">
                                        <h3>Progress Updates</h3>
                                        <h4><img src="images/dlr-icon.png" alt=""><span>Add a new progreess that you made </span></h4>
                                        <div class="payment_methods">
                                            <form method="POST" action="{{ route('Progress.store') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="filter-dd">
                                                            <select name="event" required>
                                                                <option vlaue="">Please select a event</option>
                                                                @foreach($userevents as $events)
                                                                <option value="{{$events->id}}">{{$events->cat_event->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                        </div>
                                                        <div class="cc-head">
                                                            <h5>Title</h5>
                                                        </div>
                                                        <div class="inpt-field">
                                                            <input type="text" name="title" placeholder="">
                                                        </div>
                                                        <!--inpt-field end-->
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="cc-head">
                                                            <h5>Progress made</h5>
                                                        </div>
                                                        <div class="rowwy">
                                                            <div class="row">
                                                                <div class="col-lg-6 pd-right-none no-pd">
                                                                    <div class="inpt-field">
                                                                        <input type="number" name="progress" placeholder="km" required>
                                                                    </div>
                                                                    <!--inpt-field end-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="cc-head">
                                                            <h5>Date</h5>
                                                        </div>
                                                        <div class="inpt-field">
                                                            <input type="date" name="date" placeholder="" required>
                                                        </div>
                                                        <!--inpt-field end-->
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <style>
                                                                #progressfile-input {
                                                                    display: none;
                                                                }
                                                            </style>
                                                            <div class="image-uploadprogress">
                                                                <label for="progressfile-input">
                                                                    <img src="{{ asset('defaultimg/upload.png') }}" id="progressoutput" class="img-fluid" />
                                                                </label>
                                                                <input id="progressfile-input" type="file" onchange="progressloadFile(event)" name="progressUploadedFile" />
                                                            </div>
                                                            <script>
                                                                var progressloadFile = function(event) {
                                                                    var progressoutput = document.getElementById('progressoutput');
                                                                    progressoutput.src = URL.createObjectURL(event.target.files[0]);
                                                                    progressoutput.onload = function() {
                                                                        URL.revokeObjectURL(progressoutput.src) // free memory
                                                                    }
                                                                };
                                                            </script>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <button type="submit">Up Date</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    @else
                                    <div class="add-billing-method" style="margin-bottom: 25px;">
                                        <h3>You havent particpated in any events</h3>
                                        <h4><span>Get Particpate in a event</span></h4>
                                    </div>
                                    @endif
                                </div>
                                <!--add-billing-method end-->
                                @endif

                                <!-- New Team  -->

                                @if($userinfo->id == $user->id)
                                <div class="collapse" id="collapseNewTeam">
                                    <div class="add-billing-method" style="margin-bottom: 25px;">
                                        <h3>Create a new team</h3>
                                        <div class="payment_methods">
                                            <h4>Team Name</h4>
                                            <form action="{{route('TeamController.store')}}" method="POST" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="inpt-field ">
                                                            <input type="text" name="name" placeholder="Team name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <style>
                                                                .image-upload>input {
                                                                    display: none;
                                                                }
                                                            </style>
                                                            <div class="image-upload">
                                                                <label for="file-input">
                                                                    <img src="{{ asset('defaultimg/upload.png') }}" id="output" class="img-fluid" />
                                                                </label>
                                                                <input id="file-input" type="file" onchange="loadFile(event)" name="UploadedFile" required />
                                                            </div>
                                                            <script>
                                                                var loadFile = function(event) {
                                                                    var output = document.getElementById('output');
                                                                    output.src = URL.createObjectURL(event.target.files[0]);
                                                                    output.onload = function() {
                                                                        URL.revokeObjectURL(output.src) // free memory
                                                                    }
                                                                };
                                                            </script>
                                                        </div>
                                                    </div>
                                                    <!--inpt-field end-->

                                                    <div class="col-lg-12">
                                                        <button type="submit">Create</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--add-billing-method end-->
                                @endif
                                <!-- End New Team  -->

                            </div>
                            <!--user-tab-sec end-->
                            <div class="product-feed-tab current" id="feed-dd">

                                <div class="posts-section">

                                    @if(isset($Progress))
                                    @if(count($Progress)>0)
                                    @foreach($Progress as $Progres)
                                    <div class="post-bar">
                                        <div class="post_topbar">
                                            <div class="usy-dt">
                                                @if($userinfo->profile_pic=="")
                                                <img src="{{ asset('defaultimg/profile_pic.png') }}" alt="" width="50" height="50">
                                                @else
                                                <img src="{{ asset('/storage/ProfilePics/'.$userinfo->profile_pic) }}" width="50" height="50">
                                                @endif
                                                <div class="usy-name">
                                                    <h3>{{$userinfo->nick_name}}</h3>
                                                    <span><img src="images/clock.png" alt="">on {{$Progres->created_at}}</span>
                                                </div>
                                            </div>
                                            <div class="ed-opts">
                                                <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                <ul class="ed-options">
                                                    <li><a href="#" title="">Edit Post</a></li>
                                                    <li><a href="#" title="">Delete</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="epi-sec">
                                            <ul class="skill-tags">
                                                <li><a href="#" title=""> {{$Progres->cat_event->name}}</a></li>
                                            </ul>
                                        </div>
                                        <div class="job_descp">
                                            <h3>{{$Progres->title}}</h3>
                                            <ul class="job-dt">
                                                <li><span>{{$Progres->event_progress}} Km on {{$Progres->progress_date}}</span></li>
                                            </ul>
                                            <img src="{{ asset('/storage/Progres/'.$Progres->img) }}" class="img-fluid" width="100%">
                                        </div>
                                        <div class="job-status-bar">

                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                    @endif
                                    <!--post-bar end-->
                                    <!--process-comm end-->
                                </div>
                                <!--posts-section end-->
                            </div>
                            <!--product-feed-tab end-->



                            <!--product-feed-tab end-->
                        </div>
                        <!--main-ws-sec end-->
                    </div>
                    <div class="col-lg-3">
                        <div class="right-sidebar">
                            @if($userinfo->id == $user->id)
                            @if ($ownteame === null && $teameligible === null)
                            <div class="message-btn">
                                <a data-toggle="collapse" href="#collapseNewTeam" role="button" aria-expanded="false" aria-controls="collapseNewTeam"><i class="fa fa-users"></i> Create New Team</a>
                            </div>
                            @elseif ($ownteame !== null)
                            <div class="message-btn">
                                <a href="{{route('TeamController.show', ['id'=>$ownteame->id])}}" title=""><i class="fa fa-users"></i> My Team</a>
                            </div>
                            @else
                            <div class="message-btn">
                                <a href="#" title=""><i class="fa fa-users"></i> Our Team</a>
                            </div>
                            @endif
                            @endif




                            <div class="widget widget-portfolio">
                                <div class="wd-heady">
                                    <h3>Medals won</h3>
                                    <img src="images/photo-icon.png" alt="">
                                </div>
                                @if(isset($UserMedals))
                                @if(count($UserMedals)>0)
                                <div class="pf-gallery">
                                    <ul>
                                        @foreach($UserMedals as $UserMedal)
                                        <li>
                                            <a href="#" title=""> <img src="{{ asset('/storage/Medal/'.$UserMedal->cat_event->medal_img) }}" class="img-fluid" width="70" height="70">
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                @endif
                                <!--pf-gallery end-->
                            </div>
                            <!--widget-portfolio end-->


                        </div>
                        <!--right-sidebar end-->
                    </div>
                </div>
            </div><!-- main-section-data end-->
        </div>
    </div>
</main>

@endsection
