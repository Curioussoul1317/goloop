@extends('layouts.user')

@section('content')
<div class="main-ws-sec">

    <!--post-topbar end-->
    <div class="posts-section">

        <div class="post-topbar">
            <div class="widget widget-portfolio">
                <div class="wd-heady">
                    <h3>Medals won</h3>
                    <img src="images/photo-icon.png" alt="">
                </div>
                <div class="pf-gallery">
                    <ul>
                        <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                        <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                        <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                        <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                        <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                        <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                        <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                        <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                        <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                        <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                        <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                        <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                    </ul>
                </div>
                <!--pf-gallery end-->
            </div>
        </div>




        @if(isset($medals))
        @if(count($medals)>0)
        @foreach($medals as $medal)
        <div class="posty">
            <div class="post-bar no-margin">
                <div class="post_topbar">
                    <div class="usy-dt">
                        @if($medal->users->profile_pic=="")
                        <img src="{{ asset('defaultimg/profile_pic.png') }}" alt="" width="50" height="50">
                        @else
                        <img src="{{ asset('/storage/ProfilePics/'.$medal->users->profile_pic) }}" width="50" height="50">
                        @endif
                        <div class="usy-name">
                            <h3>{{$medal->users->full_name}}</h3>
                            <span><img src="images/clock.png" alt="">on {{$medal->created_at}}</span>
                        </div>
                    </div>
                    <div class="ed-opts">
                        @if($medal->user_id == $user->id)
                        <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                        <ul class="ed-options">
                            <li><a href=" " title="">Edit Post</a></li>
                            <li>
                                <button type="button" style="padding: 0; border: none; background: none;" data-toggle="modal" data-target="#Postdeletemodal" data-id="{{$medal->id}}">
                                    Delete Post
                                </button>
                            </li>
                        </ul>
                        @endif
                    </div>
                </div>
                <div class="job_descp">
                    <h3>{{$medal->title}}</h3>
                    @if($medal->cat_event !="")
                    <h4>You have won {{$medal->cat_event->category->medal_name}} Medal in {{$medal->cat_event->name}}
                        category</h4>
                    @endif
                    @if($medal->team_id !="")
                    <div class="epi-sec">
                        <ul class="descp">
                            #<li><span>{{$medal->team->name}}</span></li>
                        </ul>
                    </div>
                    @endif
                    <ul class="job-dt">
                        <li><a href="#" title="">Making a Progress of running</a></li>
                        <li><span>{{$medal->cat_event->category->km}} Km</span></li>
                    </ul>

                    <p> {{$medal->user_comment}}</p>
                    <img src="{{ asset('/storage/Medals/'.$medal->cat_event->category->medal_img) }}" class="img-fluid">
                </div>
                <div class="job-status-bar">
                    <ul class="like-com">

                        <li>
                            @if(isset($medal->like))
                            @if(count($medal->like)>0)
                            <button type="submit" style="padding: 0; border: none; background: none;"><i class="la la-heart" style="color: red;"></i></button> {{count($medal->like)}}
                            @else
                            @endif
                            @endif
                        </li>
                    </ul>
                    <a data-toggle="collapse" href="#{{$medal->id}}" role="button" aria-expanded="false" aria-controls="collapseComment">
                        Comment
                    </a>

                </div>
            </div>
            <!--post-bar end-->
            <div class="collapse" id="{{$medal->id}}">
                <div class="comment-section">
                    <div class="comment-sec">
                        @foreach($medal->comments as $comment)
                        <ul>
                            <li>
                                <div class="comment-list">
                                    <div class="bg-img">
                                        @if($comment->user->profile_pic=="")
                                        <img src="{{ asset('defaultimg/profile_pic.png') }}" alt="" width="40" height="40">
                                        @else
                                        <img src="{{ asset('/storage/ProfilePics/'.$medal->users->profile_pic) }}" width="40" height="40">
                                        @endif
                                    </div>
                                    <div class="comment">
                                        <h3>{{ $comment->user->full_name }}</h3>
                                        <span><img src="images/clock.png" alt=""> {{ $comment->created_at }}</span>
                                        <p>{{ $comment->comment }}</p>

                                    </div>
                                    @if( $comment->user->id ==
                                    Auth::user()->id)
                                    <button type="button" style="padding: 0; border: none; background: none;" data-toggle="modal" data-target="#Commentdeletemodal" data-id="{{$comment->id}}">
                                        <i class="fa fa-minus-circle text-danger" aria-hidden="true"></i>
                                    </button>
                                    @endif
                                </div>
                                <!--comment-list end-->
                            </li>
                        </ul>
                        @endforeach
                    </div>
                    <!--comment-sec end-->
                </div>
                <!--comment-section end-->
            </div>
        </div>
        <!--posty end-->
        @endforeach
        @else
        @endif
        @else
        @endif

        <!-- end medals  -->
        @if(isset($eventposts))
        @if(count($eventposts)>0)
        @foreach($eventposts as $post)
        <div class="posty">
            <div class="post-bar no-margin">
                <div class="post_topbar">
                    <div class="usy-dt">
                        @if($post->users->profile_pic=="")
                        <img src="{{ asset('defaultimg/profile_pic.png') }}" alt="" width="50" height="50">
                        @else
                        <img src="{{ asset('/storage/ProfilePics/'.$post->users->profile_pic) }}" width="50" height="50">
                        @endif
                        <div class="usy-name">
                            <h3>{{$post->users->full_name}}</h3>
                            <span><img src="images/clock.png" alt="">on {{$post->created_at}}</span>
                        </div>
                    </div>
                    <div class="ed-opts">
                        @if($post->user_id == $user->id)
                        <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                        <ul class="ed-options">
                            <li><a href=" " title="">Edit Post</a></li>
                            <li>
                                <button type="button" style="padding: 0; border: none; background: none;" data-toggle="modal" data-target="#Postdeletemodal" data-id="{{$post->id}}">
                                    Delete Post
                                </button>
                            </li>
                        </ul>
                        @endif
                    </div>
                </div>
                <div class="job_descp">
                    <h3>{{$post->title}}</h3>
                    @if($post->cat_event !="")
                    <h4>You have won {{$post->cat_event->category->medal_name}} Medal in {{$post->cat_event->name}}
                        category</h4>
                    @endif
                    @if($post->team_id !="")
                    <div class="epi-sec">
                        <ul class="descp">
                            #<li><span>{{$post->team->name}}</span></li>
                        </ul>
                    </div>
                    @endif
                    <ul class="job-dt">
                        <li><a href="#" title="">Making a Progress of running</a></li>
                        <li><span>{{$post->cat_event->category->km}} Km</span></li>
                    </ul>

                    <p> {{$post->user_comment}}</p>
                    <img src="{{ asset('/storage/UserPost/'.$post->img) }}" class="img-fluid">
                </div>
                <div class="job-status-bar">
                    <ul class="like-com">
                        <li>
                            @if(isset($post->like))
                            @if(count($post->like)>0)
                            <button type="submit" style="padding: 0; border: none; background: none;"><i class="la la-heart" style="color: red;"></i></button> {{count($post->like)}}
                            @else
                            @endif
                            @endif
                        </li>
                    </ul>
                    <a data-toggle="collapse" href="#{{$post->id}}" role="button" aria-expanded="false" aria-controls="collapseComment">
                        Comment
                    </a>

                </div>
            </div>
            <!--post-bar end-->
            <div class="collapse" id="{{$post->id}}">
                <div class="comment-section">
                    <div class="comment-sec">
                        @foreach($post->comments as $comment)
                        <ul>
                            <li>
                                <div class="comment-list">
                                    <div class="bg-img">
                                        @if($comment->user->profile_pic=="")
                                        <img src="{{ asset('defaultimg/profile_pic.png') }}" alt="" width="40" height="40">
                                        @else
                                        <img src="{{ asset('/storage/ProfilePics/'.$comment->users->profile_pic) }}" width="40" height="40">
                                        @endif
                                    </div>
                                    <div class="comment">
                                        <h3>{{ $comment->user->full_name }}</h3>
                                        <span><img src="images/clock.png" alt=""> {{ $comment->created_at }}</span>
                                        <p>{{ $comment->comment }}</p>

                                    </div>
                                    @if( $comment->user->id ==
                                    Auth::user()->id)
                                    <button type="button" style="padding: 0; border: none; background: none;" data-toggle="modal" data-target="#Commentdeletemodal" data-id="{{$comment->id}}">
                                        <i class="fa fa-minus-circle text-danger" aria-hidden="true"></i>
                                    </button>
                                    @endif
                                </div>
                                <!--comment-list end-->
                            </li>
                        </ul>
                        @endforeach
                    </div>
                    <!--comment-sec end-->
                </div>
                <!--comment-section end-->
            </div>
        </div>
        <!--posty end-->
        @endforeach
        @else
        @endif
        @else
        @endif


    </div>
    <!--eventposts-section end-->

</div>
<!--main-ws-sec end-->




@endsection
