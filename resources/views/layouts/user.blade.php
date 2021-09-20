 <!DOCTYPE html>
 <html>

 <head>
     <meta charset="UTF-8">
     <title>{{ config('app.name', 'Go Loop Maldives') }}</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="" />
     <meta name="keywords" content="" />
     <link rel="shortcut icon" href="{{ asset('landingassets/images/favicon.png') }}" type="image/png">
     <link href="{{ asset('UserUi/css/animate.css') }}" rel="stylesheet">
     <link href="{{ asset('UserUi/css/bootstrap.min.css') }}" rel="stylesheet">
     <link href="{{ asset('UserUi/css/line-awesome.css') }}" rel="stylesheet">
     <link href="{{ asset('UserUi/css/line-awesome-font-awesome.min.css') }}" rel="stylesheet">
     <link href="{{ asset('UserUi/css/font-awesome.min.css') }}" rel="stylesheet">
     <link href="{{ asset('UserUi/lib/slick/slick.css') }}" rel="stylesheet">
     <link href="{{ asset('UserUi/lib/slick/slick-theme.css') }}" rel="stylesheet">
     <link href="{{ asset('UserUi/css/style.css') }}" rel="stylesheet">
     <link href="{{ asset('UserUi/css/responsive.css') }}" rel="stylesheet">
 </head>


 <body>


     <div class="wrapper">
         @include('layouts.header')

         <main>
             <div class="main-section">
                 <div class="container">
                     <div class="main-section-data">
                         <div class="row">
                             <div class="col-lg-3 col-md-4 pd-left-none no-pd">
                                 <div class="main-left-sidebar no-margin">
                                     <div class="user-data full-width">
                                         <div class="user-profile">
                                             <div class="username-dt">
                                                 <div class="usr-pic">
                                                     @if($user->profile_pic =="")
                                                     <img src="{{ asset('defaultimg/profile_pic.png') }}" alt="" width="100" , height="100">
                                                     @else
                                                     <img src="{{ asset('/storage/ProfilePics/'.$user->profile_pic) }}" alt="" width="100" , height="100">
                                                     @endif
                                                 </div>
                                             </div>
                                             <!--username-dt end-->
                                             <div class="user-specs">
                                                 <a href="{{route('Userwall.index', ['id'=>$user->id])}}">
                                                     <h3>{{$user->full_name}}</h3>
                                                 </a>
                                             </div>
                                         </div>
                                         <!--user-profile end-->
                                         <ul class="user-fw-status">
                                             <li>
                                                 <h4>Following</h4>
                                                 <span>{{$following}}</span>
                                             </li>
                                             <li>
                                                 <h4>Followers</h4>
                                                 <span>{{$followers}}</span>
                                             </li>
                                             @if($user->account_of !="")
                                             <li>
                                                 <a href="{{route('AccountSwitch.index', ['id'=>$user->account_of])}}"> Main Profile</a>
                                             </li>
                                             @else
                                             @endif
                                         </ul>
                                     </div>
                                     <!--user-data end-->


                                 </div>
                                 <!--main-left-sidebar end-->
                             </div>
                             <!-- main container -->
                             <div class="col-lg-6 col-md-8 no-pd">
                                 <div class="flash-message">
                                     @foreach(['danger','warning','success','info'] as $msg)
                                     @if(Session::has('alert-'.$msg))
                                     <p class="alert alert-{{$msg}}">{{Session::get('alert-'.$msg)}}
                                         <a href="#" class="close" data-dismiss="alert" aria-lable="close">&times</a>
                                     </p>
                                     @endif
                                     @endforeach
                                 </div>
                                 @yield('content')
                             </div>
                             <!-- end main container  -->
                             <div class="col-lg-3 pd-right-none no-pd">
                                 <div class="right-sidebar">
                                     <div class="widget widget-about">
                                         <img src="images/wd-logo.png" alt="">
                                         <h3>GoLoop Products</h3>
                                         <div class="sign_link">
                                             <h3><a href="{{route('Product.index')}}" title="">Check</a></h3>
                                         </div>
                                     </div>
                                     <!--widget-about end-->
                                     <div class="widget widget-jobs">
                                         <div class="sd-title">
                                             <h3>Events</h3>
                                             <i class="la la-ellipsis-v"></i>
                                         </div>
                                         <div class="jobs-list">
                                             @if(count($events)>0)
                                             @foreach($events as $event)
                                             <div class="job-info">
                                                 <div class="job-details">
                                                     <h3>{{$event->event->name}}</h3>
                                                     <h3>{{$event->name}}</h3>
                                                     <p>{{$event->category}}</p>
                                                 </div>
                                                 <div class="hr-rate">
                                                     <span>{{$event->km}}/Km</span>
                                                 </div>
                                             </div>
                                             <!--job-info end-->
                                             @endforeach
                                             @else
                                             @endif
                                         </div>
                                         <!--jobs-list end-->
                                     </div>
                                     <!--widget-jobs end-->

                                     @if(count($suggestions)>0)
                                     <div class="widget widget-jobs">
                                         <div class="sd-title">
                                             <h3>Suggestions</h3>
                                             <i class="la la-ellipsis-v"></i>
                                         </div>
                                         <div class="jobs-list">
                                             @foreach($suggestions as $suggestion)
                                             <a href="{{route('Userwall.index', ['id'=>$suggestion->id])}}">
                                                 <div class="suggestion-usd">
                                                     @if($suggestion->profile_pic =="")
                                                     <img src="{{ asset('defaultimg/profile_pic.png') }}" alt="" width="35" , height="35">
                                                     @else
                                                     <img src="{{ asset('/storage/ProfilePics/'.$suggestion->profile_pic) }}" alt="" width="35" , height="35">
                                                     @endif
                                                     <div class="sgt-text">
                                                         <h4>{{$suggestion->full_name}}</h4>
                                                         <span>{{$suggestion->country}}</span>
                                                     </div>
                                                     <span><i class="la la-plus"></i></span>
                                                 </div>
                                             </a>
                                             @endforeach
                                         </div>
                                         <!--jobs-list end-->
                                     </div>
                                     <!--widget-jobs end-->
                                     @else
                                     @endif

                                 </div>
                                 <!--right-sidebar end-->
                             </div>
                         </div>
                     </div><!-- main-section-data end-->
                 </div>
             </div>
         </main>






     </div>
     <!--theme-layout end-->



     <script src="{{ asset('UserUi/js/jquery.min.js') }}"></script>
     <script src="{{ asset('UserUi/js/popper.js') }}" defer></script>
     <script src="{{ asset('UserUi/js/bootstrap.min.js') }}" defer></script>
     <script src="{{ asset('UserUi/lib/slick/slick.min.js') }}" defer></script>
     <script src="{{ asset('UserUi/js/script.js') }}" defer></script>

     <script>
         @yield('script')
     </script>

 </body>

 </html>
