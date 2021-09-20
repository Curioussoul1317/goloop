<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard </title>
    <link rel="shortcut icon" href="{{ asset('landingassets/images/favicon.png') }}" type="image/png">
    <!-- Fontfaces CSS-->
    <link href="{{ asset('AdminUi/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('AdminUi/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('AdminUi/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('AdminUi/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('AdminUi/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset('AdminUi/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('AdminUi/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('AdminUi/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('AdminUi/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('AdminUi/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('AdminUi/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('AdminUi/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('AdminUi/vendor/vector-map/jqvmap.min.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('AdminUi/css/theme.css') }}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="{{route('home')}}">
                    <img src="{{ asset('AdminUi/images/logo-white.png') }}" />
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <h4 class="name">{{$user->full_name}}</h4>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-calendar"></i>Events
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{route('AdminEvents.index')}}">
                                        <i class="fas fa-list-ul"></i>Main Events</a>
                                </li>
                                <li>
                                    <a href="{{route('AdminEventCategory.index')}}">
                                        <i class="fas fa-list-ol"></i>Event category</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{route('AdminParticipants.index')}}">
                                <i class="fas fa-users"></i>Event Participants</a>
                        </li>
                        <li>
                            <a href="{{route('AdminProduct.index')}}">
                                <i class=" fas fa-shopping-basket"></i>Products</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-cart-plus "></i> </i>Orders
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{route('AdminPurchase.index')}}">
                                        <i class="fa fa-caret-square-o-up" aria-hidden="true"></i></i>Pending Deliveries</a>
                                </li>
                                <li>
                                    <a href="{{route('AdminPurchaseHistory.index')}}">
                                        <i class="far fa-check-square"></i>Sales History</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-users"></i>Users and teams
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{route('Adminteamanduser.index', ['type'=>1])}}">
                                        <i class="fas fa-user"></i>User</a>
                                </li>
                                <li>
                                    <a href="{{route('Adminteamanduser.index', ['type'=>2])}}">
                                        <i class="fas fa-users"></i>Teams</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{route('Partner.index')}}">
                                <i class=" fas fa-shopping-basket"></i>Partners</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>Go Loop
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{route('Slider.index')}}">
                                        <i class="fa fa-file-image-o"></i>Slider</a>
                                </li>
                                <li>
                                    <a href="{{route('About.index')}}">
                                        <i class="fas fa-info"></i>About GoLoop</a>
                                </li>
                                <li>
                                    <a href="{{route('PrivatePolicy.index')}}">
                                        <i class="fas fa-info"></i>Privacy Policy</a>
                                </li>
                                <li>
                                    <a href="{{route('TermsandCondition.index')}}">
                                        <i class="fas fa-info"></i>Terms and Condition</a>
                                </li>
                                <li>
                                    <a href="{{route('AdminFaq.index')}}">
                                        <i class="fas fa-info"></i>FAQ</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none">
                                <a href="#">
                                    <img src="{{ asset('AdminUi/images/logo-white.png') }}" />
                                </a>
                            </div>
                            <div class="header-button2">
                                <div class="header-button-item js-item-menu">
                                    <i class="zmdi zmdi-search"></i>
                                    <div class="search-dropdown js-dropdown">
                                        <form action="">
                                            <input class="au-input au-input--full au-input--h65" type="text" placeholder="Search for users " />
                                            <span class="search-dropdown__icon">
                                                <i class="zmdi zmdi-search"></i>
                                            </span>
                                        </form>
                                    </div>
                                </div>
                                <div class="header-button-item has-noti js-item-menu">
                                    <i class="zmdi zmdi-notifications"></i>
                                    <div class="notifi-dropdown js-dropdown">
                                        <div class="notifi__title">
                                            <p>You have {{count($notifications)}} Notifications</p>
                                        </div>
                                        @if(count($notifications)>0)
                                        @foreach($notifications as $notification)
                                        @if ($notification->participation_id != "")
                                        <a href="{{route('AdminPurchase.show', ['id'=>$notification->participation_id])}}">
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>{{$notification->users->full_name}} has participated..</p>
                                                    <span class="date">{{$notification->created_at}}</span>
                                                </div>
                                            </div>
                                        </a>
                                        @endif

                                        @if ($notification->cart_id != "")
                                        <a href="{{route('AdminPurchase.show', ['id'=>$notification->cart_id])}}">
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>{{$notification->users->full_name}} has made a purchase</p>
                                                    <span class="date">{{$notification->created_at}}</span>
                                                </div>
                                            </div>
                                        </a>
                                        @endif
                                        @endforeach
                                        @else
                                        @endif
                                        @if(count($faqnotfications)>0)
                                        @foreach($faqnotfications as $faqnotfication)
                                        <a href="{{route('AdminFaq.index')}}">
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>There is question that needs to be answered</p>
                                                    <span class="date">{{$faqnotfication->created_at}}</span>
                                                </div>
                                            </div>
                                        </a>
                                        @endforeach
                                        @endif
                                        <div class="notifi__footer">
                                            <a href="#">All notifications</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="header-button-item mr-0 js-sidebar-btn">
                                    <i class="zmdi zmdi-menu"></i>
                                </div>
                                <div class="setting-menu js-right-sidebar d-none d-lg-block">
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-account"></i>My Account</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="{{route('Admins.index')}}">
                                                <i class="zmdi zmdi-account"></i>Admins</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-notifications"></i>Notifications</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">
                <div class="logo">
                    <a href="#">
                        <img src="{{ asset('AdminUi/images/logo-white.png') }}" />
                    </a>
                </div>
                <div class="menu-sidebar2__content js-scrollbar2">
                    <div class="account2">
                        <h4 class="name">{{$user->full_name}}</h4>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                    <nav class="navbar-sidebar2">
                        <ul class="list-unstyled navbar__list">
                            <li class="active has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fa fa-calendar"></i>Events
                                    <span class="arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="{{route('AdminEvents.index')}}">
                                            <i class="fas fa-list-ul"></i>Main Events</a>
                                    </li>
                                    <li>
                                        <a href="{{route('AdminEventCategory.index')}}">
                                            <i class="fas fa-list-ol"></i>Event category</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{route('AdminParticipants.index')}}">
                                    <i class="fas fa-users"></i>Event Participants</a>
                            </li>
                            <li>
                                <a href="{{route('AdminProduct.index')}}">
                                    <i class="fas fa-shopping-basket"></i>Products</a>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-cart-plus "></i> </i>Orders
                                    <span class="arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="table.html">
                                            <i class="fa fa-caret-square-o-up" aria-hidden="true"></i></i>Pending Deliveries</a>
                                    </li>
                                    <li>
                                        <a href="{{route('AdminPurchaseHistory.index')}}">
                                            <i class="far fa-check-square"></i>Sales History</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-users"></i>Users and teams
                                    <span class="arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="login.html">
                                            <i class="fas fa-user"></i>User</a>
                                    </li>
                                    <li>
                                        <a href="register.html">
                                            <i class="fas fa-users"></i>Teams</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-desktop"></i>Go Loop
                                    <span class="arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="button.html">
                                            <i class="fa fa-file-image-o"></i>Slider</a>
                                    </li>
                                    <li>
                                        <a href="badge.html">
                                            <i class="fas fa-info"></i>Go loop Infomation</a>
                                    </li>
                                    <li>
                                        <a href="badge.html">
                                            <i class="fas fa-info"></i>Privacy Policy</a>
                                    </li>
                                    <li>
                                        <a href="badge.html">
                                            <i class="fas fa-info"></i>Terms and Condition</a>
                                    </li>
                                    <li>
                                        <a href="badge.html">
                                            <i class="fas fa-info"></i>FAQ</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <!-- END HEADER DESKTOP-->

            <!-- BREADCRUMB-->
            <section class="au-breadcrumb m-t-75">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="au-breadcrumb-content">
                                    <div class="au-breadcrumb-left">
                                        <span class="au-breadcrumb-span">You are here:</span>
                                        <ul class="list-unstyled list-inline au-breadcrumb__list">
                                            <li class="list-inline-item active">
                                                <a href="#">Home</a>
                                            </li>
                                            <li class="list-inline-item seprate">
                                                <span>/</span>
                                            </li>
                                            <li class="list-inline-item">Dashboard</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->


            <div>
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


            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <!-- Bootstrap JS-->
    <script src="{{ asset('AdminUi/vendor/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('AdminUi/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('AdminUi/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Vendor JS       -->
    <script src="{{ asset('AdminUi/vendor/slick/slick.min.js') }}"></script>
    <script src="{{ asset('AdminUi/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('AdminUi/vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('AdminUi/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <script src="{{ asset('AdminUi/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('AdminUi/vendor/counter-up/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('AdminUi/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('AdminUi/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('AdminUi/vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('AdminUi/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('AdminUi/vendor/vector-map/jquery.vmap.js') }}"></script>
    <script src="{{ asset('AdminUi/vendor/vector-map/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('AdminUi/vendor/vector-map/jquery.vmap.sampledata.js') }}"></script>
    <script src="{{ asset('AdminUi/vendor/vector-map/jquery.vmap.world.js') }}"></script>

    <!-- Main JS-->
    <script src="{{ asset('AdminUi/js/main.js') }}"></script>
    <script>
        @yield('script')
    </script>
</body>

</html>
<!-- end document-->
