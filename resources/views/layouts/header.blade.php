<header>
    <div class="container">
        <div class="header-data">
            <div class="logo">
                <a href="{{route('home')}}" title="">
                    <img src="{{ asset('UserUi/images/logo.png') }}" alt="" width="100" height="50">
                </a>
            </div>
            <!--logo end-->
            <div class="search-bar">
                <!-- <form>
							<input type="text" name="search" placeholder="Search...">
							<button type="submit"><i class="la la-search"></i></button>
						</form> -->
            </div>
            <!--search-bar end-->
            <nav>
                <ul>
                    <li>
                        <a href="{{route('home')}}" title="">
                            <span><img src="images/icon1.png" alt=""></span>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="#" title="">
                            <span><img src="images/icon5.png" alt=""></span>
                            Achivements
                        </a>
                        <ul>
                            <li><a href="{{route('Achievements.index', ['id'=>'0',])}}" title="">Event Progress</a></li>
                            <li><a href="{{route('Achievements.index', ['id'=>'1',])}}" title="">My Medals</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" title="">
                            <span><img src="images/icon4.png" alt=""></span>
                            Kids Profiles
                        </a>
                        <ul>
                            @if(count($profiles)>0)
                            @foreach($profiles as $profile)
                            <li>
                                <a href="{{route('AccountSwitch.index', ['id'=>$profile->id])}}">
                                    {{$profile->full_name}}
                                </a>
                            </li>
                            @endforeach
                            @else
                            <li>
                                <a href="#" title="">No Profiles yet</a>
                            </li>
                            @endif
                        </ul>
                    </li>
                    <li>
                        <a href="#" title="">
                            <span><img src="images/icon2.png" alt=""></span>
                            Events
                        </a>
                        <ul>
                            <li><a href="{{route('Achievements.index', ['id'=>'0',])}}" title="">My Events</a></li>
                            <li><a href="{{route('GoloopEvents.index')}}" title="">GoLoop Events</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href=" " title="">
                            <span><img src="images/icon2.png" alt=""></span>
                            Shopping
                        </a>
                        <ul>
                            <li><a href="{{route('Cart.show', ['id'=>1])}}" title="">My Cart</a></li>
                            <li><a href="{{route('Product.index')}}" title="">GoLoop Products</a></li>
                        </ul>
                    </li>
                    <!-- <li>
                        <a href="" title="">
                            <span><img src="images/icon3.png" alt=""></span>
                            My Team
                        </a>
                    </li> -->
                    <li>
                        <a href="#" title="" class="not-box-open">
                            <span><img src="images/icon7.png" alt=""></span>
                            Notifications
                        </a>
                        <div class="notification-box">
                            <div class="nt-title">
                                <a href="#" title="">Clear all</a>
                            </div>
                            <div class="nott-list">
                                @if(isset($notifications))
                                @if(count($notifications)>0)
                                @foreach($notifications as $notification)
                                <div class="notfication-details">
                                    <div class="noty-user-img">
                                        <img src="images/resources/ny-img2.png" alt="">
                                    </div>
                                    @if($notification->follow_id !="")
                                    <div class="notification-info">
                                        <h3><a href="{{$notification->id}}"></a>{{$notification->user->full_name}} has sent a request .</h3><br>
                                        <span>On :{{$notification->created_at}}</span>
                                    </div>
                                    @else
                                    @endif
                                    <!--notification-info -->
                                </div>

                                @endforeach
                                @endif
                                @endif

                                <div class="view-all-nots">
                                    <a href="#" title="">View All Notification</a>
                                </div>
                            </div>
                            <!--nott-list end-->
                        </div>
                        <!--notification-box end-->
                    </li>
                </ul>
            </nav>
            <!--nav end-->
            <div class="menu-btn">
                <a href="#" title=""><i class="fa fa-bars"></i></a>
            </div>
            <!--menu-btn end-->
            <div class="user-account">
                <div class="user-info">
                    @if($user->profile_pic =="")
                    <img src="{{ asset('defaultimg/profile_pic.png') }}" alt="" width="30" height="30">
                    @else
                    <img src="{{ asset('/storage/ProfilePics/'.$user->profile_pic) }}" alt="" width="30" height="30">
                    @endif

                    <a href="#" title="">Info</a>
                    <i class="la la-sort-down"></i>
                </div>
                <div class="user-account-settingss">
                    <h3>Setting</h3>
                    <ul class="us-links">
                        <li><a href="{{route('UserAccount.index')}}" title="">Account Setting</a></li>
                    </ul>
                    <h3 class="tc"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a></h3>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
                <!--user-account-settingss end-->
            </div>
        </div>
        <!--header-data end-->
    </div>
</header>
<!--header end-->
