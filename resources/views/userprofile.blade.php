@extends('layouts.usersecond')

@section('content')


<section class="cover-sec">
    @if ($userinfo->wall_pic =="")
    <img src="http://via.placeholder.com/1600x400" alt="">
    @else
    <img src="{{ asset('/storage/wallPicture/'.$userinfo->wall_pic)}}" id="outputtwo" width="1600" height="400" />
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
                                    <!-- <img src="http://via.placeholder.com/170x170" alt=""> -->
                                    <style>
                                        .avatar-upload {
                                            position: relative;
                                            max-width: 205px;
                                            margin: 50px auto;
                                        }

                                        .avatar-edit {
                                            position: absolute;
                                            right: 12px;
                                            z-index: 1;
                                            top: 10px;
                                        }

                                        /* input {
                                            display: none;
                                        } */

                                        #imglable {
                                            display: inline-block;
                                            width: 34px;
                                            height: 34px;
                                            margin-bottom: 0;
                                            border-radius: 100%;
                                            background: #FFFFFF;
                                            border: 1px solid transparent;
                                            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
                                            cursor: pointer;
                                            font-weight: normal;
                                            transition: all .2s ease-in-out;
                                        }

                                        #imglable:hover {
                                            background: #f1f1f1;
                                            border-color: #d6d6d6;
                                        }

                                        #imglable:after {
                                            content: "\f040";
                                            font-family: 'FontAwesome';
                                            color: #757575;
                                            position: absolute;
                                            top: 10px;
                                            left: 0;
                                            right: 0;
                                            text-align: center;
                                            margin: auto;
                                        }


                                        .avatar-preview {
                                            width: 192px;
                                            height: 192px;
                                            position: relative;
                                            border-radius: 100%;
                                            border: 6px solid #F8F8F8;
                                            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
                                        }

                                        #imagePreview {
                                            width: 100%;
                                            height: 100%;
                                            border-radius: 100%;
                                            background-size: cover;
                                            background-repeat: no-repeat;
                                            background-position: center;
                                        }
                                    </style>

                                    <div class="avatar-upload">
                                        <!-- <div class="avatar-preview"> -->
                                        <!-- @if($userinfo->profile_pic =="")
                                            <div id="imagePreview" style="background-image: url({{url('defaultimg/profile_pic.png')}});">
                                            </div> @else

                                            <div id="imagePreview" style="background-image: url('{{ Storage::url('/storage/ProfilePics/'.$userinfo->profile_pic) }}');">
                                            </div> -->
                                        <!-- <img src="{{ asset('/storage/ProfilePics/cute-hamster-eating-vector-icon-260nw-1670664694_1626984340.jpg') }}"> -->
                                        @if ($userinfo->profile_pic =="")
                                        <img class="avatar-preview" src="{{ asset('defaultimg/profile_pic.png') }}">
                                        @else
                                        <img class="avatar-preview" src="{{ asset('/storage/ProfilePics/'.$userinfo->profile_pic) }}">
                                        @endif

                                        <!-- @endif -->

                                        <!-- </div> -->
                                    </div>
                                </div>

                                <!--user-pro-img end-->
                                <div class="user_pro_status">
                                    @if($userinfo->id == $user->id)
                                    @else
                                    @if($followtrue === null)
                                    <ul class="flw-hr">
                                        <li><a href="{{route('Follow.index', ['id'=>$userinfo->id])}}" title="" class="flww"><i class="la la-plus"></i> Follow</a></li>
                                    </ul>
                                    @elseif($followtrue->status == 0)
                                    <ul class="flw-hr">
                                        <li><a href="" title="" class="flww"><i class="la la-plus"></i> Requested</a></li>
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
                                <!--user_pro_status end-->

                            </div>
                            <!--user_profile end-->

                        </div>
                        <!--main-left-sidebar end-->
                    </div>
                    <!-- Main section  -->

                    <!-- Navigation  -->
                    <div class="col-lg-6">
                        <div class="main-ws-sec">
                            <div class="user-tab-sec">
                                <h3>{{$userinfo->full_name}}</h3>
                                <div class="star-descp">
                                    <span>{{$userinfo->nick_name}}</span>
                                </div>
                                <!--star-descp end-->

                                <div class="post-topbar">
                                    <div class="post-st">
                                        <ul>
                                            <li><a class="active" data-toggle="collapse" href="#collapsePost" role="button" aria-expanded="false" aria-controls="collapsePost">New Post</a></li>
                                        </ul>
                                    </div>
                                    <!--post-st end-->
                                </div>
                                <!-- post  -->
                                <div class="collapse" id="collapsePost">
                                    <div class="card card-body">
                                        <div class="post-project-fields">
                                            <form method="POST" action="{{ route('UserPost.store') }}" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="posttype" value="1">
                                                <div class="row">
                                                    @if(count($teams)>0)
                                                    <div class="col-lg-12">
                                                        <div class="inp-field">
                                                            <select name="team">
                                                                <option vlaue="0">Select Your team</option>
                                                                @foreach($teams as $team)
                                                                <option value="{{$team->team->id}}">{{$team->team->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    @else
                                                    @endif
                                                    <div class="col-lg-12">
                                                        <input type="text" id="title" name="title" placeholder="Title" required>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="inp-field">
                                                            <select name="event">
                                                                <option vlaue="">Please select a event</option>
                                                                @if(count($userevents)>0)
                                                                @foreach($userevents as $userevent)
                                                                <option value="{{$userevent->cat_event_id}}">{{$userevent->cat_event->name}}</option>
                                                                @endforeach
                                                                @else
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <input type="file" id="Image" name="Image" placeholder="Image" required>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="price-sec">
                                                            <div class="price-br">
                                                                <input type="number" name="Km" placeholder="Progressed Km" required>
                                                            </div>
                                                            <div class="price-br">
                                                                <input type="date" name="date" placeholder="Date" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <ul>
                                                            <li><button class="active" type="submit">Upload</button></li>
                                                            <li><a href="#" title="">Cancel</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- tab-feed end-->
                            </div>
                            <!--user-tab-sec end-->
                        </div>
                        <!--main-ws-sec end-->

                        @if(isset($Progress))
                        @if(count($Progress)>0)
                        @foreach($Progress as $Progres)
                        <div class="posty">
                            <div class="post-bar no-margin">
                                <div class="post_topbar">
                                    <div class="usy-dt">
                                        @if($userinfo->profile_pic=="")
                                        <img src="{{ asset('defaultimg/profile_pic.png') }}" alt="" width="50" height="50">
                                        @else
                                        <img src="{{ asset('/storage/ProfilePics/'.$post->users->profile_pic) }}" width="50" height="50">
                                        @endif
                                        <div class="usy-name">
                                            <h3>{{$userinfo->nick_name}}</h3>
                                            <span><img src="{{ asset('defaultimg/clock.png') }}" alt="">on {{$Progres->created_at}}</span>
                                        </div>
                                    </div>
                                    <div class="ed-opts">
                                        <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                        @if($Progres->user_id == $userinfo->id)
                                        <ul class="ed-options">
                                            <li>
                                                <button type="button" style="padding: 0; border: none; background: none;" data-toggle="modal" data-target="#Postdeletemodal" data-id="{{$Progres->id}}">
                                                    Delete Post
                                                </button>
                                            </li>
                                        </ul>
                                        @else
                                        @endif

                                    </div>
                                </div>

                                <div class="job_descp">
                                    <h3>{{$Progres->title}}</h3>
                                    <ul class="job-dt">
                                        <li><a href="#" title="">Progressed</a></li>
                                        <li><span>{{$Progres->event_progress}} Km on {{$Progres->progress_date}}</span></li>
                                        <h4>In {{$Progres->cat_event->id}}
                                            category on {{$Progres->cat_event->name}}</h4>
                                    </ul>
                                    @if($Progres->team_id !="")
                                    <div class="epi-sec">
                                        <ul class="descp">
                                            with the # <li><span>{{$Progres->team->name}}</span></li> team
                                        </ul>
                                    </div>
                                    @endif
                                    <img src="{{ asset('/storage/Progres/'.$Progres->img) }}" class="img-fluid" width="100%">

                                </div>
                                <div class="job-status-bar">

                                </div>
                            </div>
                            <!--post-bar end-->

                        </div>
                        @endforeach
                        @endif
                        @endif
                        <!-- @if($userinfo->id == $user->id) -->

                        <!-- FOR THE USER  -->
                        <!-- POST  -->

                        <!-- END OF POST  -->
                        <!-- INFO  -->

                        <!-- END INFO  -->

                        <!-- @endif -->














                    </div>
                    <!-- End Navigation  -->



                    <!-- END FOR THE USER  -->









                    <!-- FOR FOLLOWER
                    END FOR FOLLOWER -->




                    <!-- End main Section  -->

                    <div class="col-lg-3">
                        <div class="right-sidebar">
                            <div class="widget widget-portfolio">
                                <div class="wd-heady">
                                    <h3>Event Progress</h3>
                                    <img src="images/photo-icon.png" alt="">
                                </div>
                                <div class="pf-gallery">
                                    <ul>
                                        @if(isset($posts))
                                        @if(count($posts)>0)
                                        @foreach($posts as $post)
                                        @if($post->posttype == "1")
                                        <li><a href="#" title=""><img src="{{ asset('/storage/UserPost/'.$post->img) }}" width="70px" height="70px"></a></li>
                                        @else
                                        @endif

                                        @endforeach
                                        @endif
                                        @endif
                                    </ul>
                                </div>
                                <!--pf-gallery end-->
                                <!-- Teams  -->
                                <div class="wd-heady">
                                    <h3>Team Members</h3>
                                    <img src="images/photo-icon.png" alt="">
                                </div>
                                <div class="pf-gallery">
                                    <ul>
                                        @if(isset($teams))
                                        @if(count($teams)>0)
                                        @foreach($teams as $team)
                                        <li><a href="#" title=""></a>{{$team->member_id}}</li>

                                        @endforeach
                                        @endif
                                        @endif
                                    </ul>
                                </div>
                                <!-- Teams  -->
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
