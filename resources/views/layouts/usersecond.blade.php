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
     <script src="{{ asset('UserUi/js/jquery.min.js') }}"></script>
 </head>


 <body>
     <div class="wrapper">
         @include('layouts.header')
         <section class="profile-account-setting">
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
         </section>

     </div>
     <!--theme-layout end-->

     <script src="{{ asset('UserUi/js/popper.js') }}" defer></script>
     <script src="{{ asset('UserUi/js/bootstrap.min.js') }}" defer></script>
     <script src="{{ asset('UserUi/lib/slick/slick.min.js') }}" defer></script>
     <script src="{{ asset('UserUi/js/script.js') }}" defer></script>


     <script>
         @yield('script')
     </script>
 </body>

 </html>
