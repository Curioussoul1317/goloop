<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title>{{ config('app.name', 'Go Loop Maldives') }}</title>
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('landingassets/images/favicon.png') }}" type="image/png">
    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{ asset('landingassets/css/bootstrap.min.css') }}">
    <!--====== Line Icons css ======-->
    <link rel="stylesheet" href="{{ asset('landingassets/css/LineIcons.css') }}">
    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="{{ asset('landingassets/css/magnific-popup.css') }}">
    <!--====== Slick css ======-->
    <link rel="stylesheet" href="{{ asset('landingassets/css/slick.css') }}">
    <!--====== Animate css ======-->
    <link rel="stylesheet" href="{{ asset('landingassets/css/animate.css') }}">
    <!--====== Default css ======-->
    <link rel="stylesheet" href="{{ asset('landingassets/css/default.css') }}">
    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{ asset('landingassets/css/style.css') }}">
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->


</head>

<body>

    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->

    <!--====== NAVBAR PART START ======-->

    <section class="header-area">
        <div class="navbar-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="#">
                                <img src="{{ asset('landingassets/images/logo.png') }}" alt="Logo">
                            </a>

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarEight" aria-controls="navbarEight" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarEight">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="page-scroll" href="#home">HOME</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#about">ABOUT</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#ourevents">EVENTS</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#ourproducts">our products</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#ourpartners">Our Partners</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#contact">CONTACT</a>
                                    </li>
                                    @if (Route::has('login'))
                                    @auth
                                    <li class="nav-item">
                                        <a href="{{ url('/home') }}">MY ACCOUNT</a>
                                    </li>
                                    @else
                                    @if (Route::has('login'))
                                    @auth
                                    @else
                                    <li class="nav-item">
                                        <a href="{{ route('login') }}">MY ACCOUNT</a>
                                    </li>
                                    @endauth
                                    @endif
                                    @endauth
                                    @endif
                                </ul>
                            </div>
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navbar area -->


        @if(isset($slides))
        @if(count($slides)>0)
        <div id="home" class="slider-area">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach($slides as $slide)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @foreach($slides as $slide)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <img class="d-block w-100" src="{{ asset('/storage/Slides/'.$slide->img) }}" alt="First slide">
                    </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        @else
        @endif
        @endif
    </section>

    <!--====== NAVBAR PART ENDS ======-->


    <!--====== ABOUT PART START ======-->

    <section id="about" class="about-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="about-image text-center wow fadeInUp" data-wow-duration="1.5s" data-wow-offset="100">
                        @if(isset($about))
                        <img src="{{ asset('/storage/Aboutus/'.$about->goloop_pic) }}" alt="go loop maldives">
                        @endif
                    </div>
                    <div class="section-title text-center mt-30 pb-40">
                        <h4 class="title wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.6s">Go Loop Maldives
                        </h4>
                        @if(isset($about))
                        <p class="text wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1s">{{$about->aboutus}}
                        </p>
                        @endif
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->

        </div> <!-- container -->
    </section>

    <!--====== ABOUT PART ENDS ======-->

    <!--====== ourevents PART START ======-->
    @if(isset($events))
    @if(count($events)>0)
    <section id="ourevents" class="ourevents-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center pb-20">
                        <h3 class="title">Our events</h3>
                        <p class="text">We are on a mission to make fitness & running accessible to everyone in Maldives
                        </p>
                    </div> <!-- row -->
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="ourevents-menu pt-30 text-center">
                        <ul>
                            <li data-filter="*" class="active">All the Events</li>
                            @foreach($events as $event)
                            <li data-filter=".{{$event->id}}">{{$event->name}}</li>
                            @endforeach
                        </ul>
                    </div> <!-- ourevents menu -->
                </div>
            </div> <!-- row -->
            <div class="row grid">
                @if(isset($event_categories))
                @if(count($event_categories)>0)
                @foreach($event_categories as $event_categorie)
                <div class="col-lg-4 col-sm-6 {{$event_categorie->event_id}}">
                    <div class="single-ourevents mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.2s">
                        <div class="ourevents-image">
                            <img src="{{ asset('/storage/EventCat/'.$event_categorie->catog_event_img) }}" alt="go loop maldives">
                            <div class="ourevents-overlay d-flex align-items-center justify-content-center">
                                <div class="ourevents-content">
                                    <div class="ourevents-icon">
                                        <a class="image-popup" href="{{ asset('/storage/EventCat/'.$event_categorie->catog_event_img) }}"><i class="lni-zoom-in"></i></a>
                                    </div>
                                    <div class="ourevents-icon">
                                        <a href="{{route('GoloopEvents.show', ['id'=>$event_categorie->id])}}"><i class="lni-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ourevents-text">
                            <h4 class="ourevents-title"><a href="#">{{$event_categorie->name}}</a></h4>
                            <p class="text">{{$event_categorie->event->description}}</p>
                        </div>
                    </div> <!-- single ourevents -->
                </div>
                @endforeach
                @else
                @endif
                @endif

            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    @else
    @endif
    @endif
    <!--====== ourevents PART ENDS ======-->

    @if(isset($products))
    @if(count($products)>0)
    <!--====== PRINICNG STYLE EIGHT START ======-->
    <section id="ourproducts" class="ourproducts-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center pb-20">
                        <h3 class="title">Our Products</h3>
                        <p class="text">dsfgsdgs bla bla bla </p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="row ourpartners-active">
                        @foreach($products as $product)
                        <div class="col-lg-4">
                            <div class="single-ourpartners mt-30 mb-30 text-center">
                                <div class="ourpartners-image">
                                    <img src="{{ asset('/storage/Products/'.$product->img) }}" alt="go loop maldives">
                                </div>
                                <div class="ourpartners-content">
                                    <p class="text">{{$product->name}}</p>
                                    <h6 class="author-name">mvr {{$product->price}} /-</h6>
                                    <a href="{{route('Product.show', ['id'=>$product->id])}}" class="view-more-pro">View More</a>
                                </div>
                            </div> <!-- single ourpartners -->
                        </div>
                        @endforeach
                    </div> <!-- row -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    <!--====== PRINICNG STYLE EIGHT ENDS ======-->
    @else
    @endif
    @endif
    <!--====== CALL TO ACTION TWO PART START ======-->

    <section id="call-action" class="call-action-area" style="border-bottom-style: solid; border-bottom-color: red; border-bottom-width: 6px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="call-action-content mt-45">
                        <h3 class="action-title">Get latest updates!</h3>
                        <p class="text">Subscribe now</p>
                    </div> <!-- call action content -->
                </div>
                <div class="col-lg-7">
                    <span class="subsuccess" style="color:green; margin-top:10px; margin-bottom: 10px;"></span>
                    <div class="call-action-form mt-50">
                        <form id="ajaxsubscribe">
                            @csrf
                            <input type="text" placeholder="Enter your email" name="subscribeemail">
                            <div class="action-btn rounded-buttons">
                                <button class="main-btn rounded-three subscribe-data">subscribe</button>
                            </div>
                        </form>
                    </div> <!-- call action form -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== CALL TO ACTION TWO PART ENDS ======-->



    <!--====== ourpartners LOGO PART START ======-->

    @if(isset($partners))
    @if(count($partners)>0)
    <section id="ourpartners" class="client-logo-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center pb-20">
                        <h3 class="title">our partners</h3>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row client-active">
                @foreach($partners as $partner)
                <div class="col-lg-3">
                    <div class="single-client text-center">
                        <img src="{{ asset('/storage/Partners/'.$partner->img) }}">
                    </div> <!-- single client -->
                </div>
                @endforeach
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    @else
    @endif
    @endif
    <!--====== CLIENT LOGO PART ENDS ======-->

    <!--====== CONTACT TWO PART START ======-->

    <section id="contact" class="contact-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center pb-20">
                        <h3 class="title">Get in touch</h3>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row">
                @if(isset($about))
                <div class="col-lg-6">
                    <div class="contact-two mt-50 wow fadeIn" data-wow-duration="1.5s" data-wow-delay="0.2s">
                        <h4 class="contact-title">Contact Us any time </h4>
                        <p class="text">{{$about->aboutus}}</p>
                        <ul class="contact-info">
                            <li><i class="lni-money-location"></i> {{$about->address}}</li>
                            <li><i class="lni-phone-handset"></i> {{$about->phone}}</li>
                            <li><i class="lni-envelope"></i> {{$about->email}}</li>
                        </ul>
                    </div> <!-- contact two -->
                </div>
                @endif
                <div class="col-lg-6">

                    <span class="success" style="color:green; margin-top:10px; margin-bottom: 10px;"></span>
                    <div class="contact-form form-style-one mt-35 wow fadeIn" data-wow-duration="1.5s" data-wow-delay="0.5s">
                        <form id="ajaxform">
                            @csrf
                            <div class="form-input mt-15">
                                <label>Name</label>
                                <div class="input-items default">
                                    <input type="text" placeholder="Name" name="name">
                                    <i class="lni-user"></i>
                                </div>
                            </div> <!-- form input -->
                            <div class="form-input mt-15">
                                <label>Email</label>
                                <div class="input-items default">
                                    <input type="email" placeholder="Email" name="email">
                                    <i class="lni-envelope"></i>
                                </div>
                            </div> <!-- form input -->
                            <div class="form-input mt-15">
                                <label>Massage</label>
                                <div class="input-items default">
                                    <textarea placeholder="Massage" name="massage"></textarea>
                                    <i class="lni-pencil-alt"></i>
                                </div>
                            </div> <!-- form input -->
                            <p class="form-message"></p>
                            <div class="form-input rounded-buttons mt-20">
                                <button type="submit" class="main-btn rounded-three save-data">Submit</button>
                            </div> <!-- form input -->
                        </form>
                    </div> <!-- contact form -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== CONTACT TWO PART ENDS ======-->

    <!--====== FOOTER FOUR PART START ======-->

    <footer id="footer" class="footer-area">
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-link">
                            <img src="{{ asset('landingassets/images/logo.png') }}" alt="Logo">
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-3 col-sm-6">

                    </div>
                    <div class="col-lg-3 col-sm-6">

                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-link">
                            <h6 class="footer-title">Help & Suuport</h6>
                            <ul>
                                <li>
                                    <button data-toggle="modal" data-target="#PrivacyPolicy">Privacy Policy
                                    </button>
                                </li>
                                <li>
                                    <button data-toggle="modal" data-target="#faqmodal">FAQ
                                    </button>
                                </li>
                                <li><button data-toggle="modal" data-target="#termsconditions">Terms & Conditions
                                    </button>
                                </li>
                            </ul>
                            <!-- Button trigger modal -->

                        </div> <!-- footer link -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer widget -->

        <div class="footer-copyright">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="copyright text-center text-lg-left mt-10">
                            <p class="text"> All Rights Reserved. © 2021 Go Loop Maldives</p>
                        </div> <!--  copyright -->
                    </div>
                    <div class="col-lg-2">

                    </div>
                    <div class="col-lg-5">
                        <ul class="social text-center text-lg-right mt-10">
                            <li><a href="https://www.facebook.com/goloopmaldives/"><i class="lni-facebook-filled"></i></a></li>
                            <li><a href="https://twitter.com/goloopmaldives?s=11"><i class="lni-twitter-original"></i></a></li>
                            <li><a href="https://instagram.com/goloopmaldives?igshid=1366k3uupprpe"><i class="lni-instagram-original"></i></a>
                            </li>
                        </ul> <!-- social -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer copyright -->
    </footer>

    <!--====== FOOTER FOUR PART ENDS ======-->
    <!--FAQ Modal -->
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="faqmodal" tabindex="-1" role="dialog" aria-labelledby="faqmodal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">FAQ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row">
                    <div class="col col-12">
                        <span class="faqsuccess" style="margin-left:10px; width:95%; color:green; margin-top:10px; margin-bottom: 5px;"></span>
                        <form id="ajaxfaq">
                            @csrf
                            <div class="input-group" style="margin-left:10px; width:95%;  ">
                                <input type="text" placeholder="Enter your question" name="question" class="form-control" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary faq-data" type="button">Ask</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-body">
                    @if(isset($faqs))
                    @if(count($faqs)>0)
                    @foreach($faqs as $faq)
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item list-group-item-info" style="overflow-wrap: break-word"><b>Q.
                            </b>{{$faq->id}}
                            <p>{{$faq->questions}}</p>
                        </li>
                        <li class="list-group-item text-wrap" style="overflow-wrap: break-word"><b>A.
                            </b>{{$faq->answers}}</li>
                    </ul>
                    @endforeach
                    @else
                    @endif
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!--PrivacyPolicy Modal -->
    <div class="modal fade" id="PrivacyPolicy" tabindex="-1" role="dialog" aria-labelledby="PrivacyPolicyTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="PrivacyPolicyLongTitle">Privacy Policy</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if(isset($private_policy))
                    {{$private_policy->privacypolicies}}
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!--Terms and Conditions Modal -->
    <div class="modal fade" id="termsconditions" tabindex="-1" role="dialog" aria-labelledby="termsconditionsTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="termsconditionsLongTitle">Terms and Conditions</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if(isset($tms))
                    {{$tms->tandc}}
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!--====== BACK TOP TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>

    <!--====== BACK TOP TOP PART ENDS ======-->

    <!--====== PART START ======-->



    <!--====== PART ENDS ======-->








    <!-- Scripts -->
    <!--====== jquery js ======-->
    <script src="{{ asset('landingassets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('landingassets/js/vendor/jquery-1.12.4.min.js') }}"></script>

    <!--====== Bootstrap js ======-->
    <script src="{{ asset('landingassets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('landingassets/js/popper.min.js') }}"></script>

    <!--====== Slick js ======-->
    <script src="{{ asset('landingassets/js/slick.min.js') }}"></script>

    <!--====== Isotope js ======-->
    <script src="{{ asset('landingassets/js/isotope.pkgd.min.js') }}"></script>

    <!--====== Images Loaded js ======-->
    <script src="{{ asset('landingassets/js/imagesloaded.pkgd.min.js') }}"></script>

    <!--====== Magnific Popup js ======-->
    <script src="{{ asset('landingassets/js/jquery.magnific-popup.min.js') }}"></script>

    <!--====== Scrolling js ======-->
    <script src="{{ asset('landingassets/js/scrolling-nav.js') }}"></script>
    <script src="{{ asset('landingassets/js/jquery.easing.min.js') }}"></script>

    <!--====== wow js ======-->
    <script src="{{ asset('landingassets/js/wow.min.js') }}"></script>

    <!--====== Main js ======-->
    <script src="{{ asset('landingassets/js/main.js') }}"></script>

</body>


<script>
    $(".save-data").click(function(event) {
        event.preventDefault();

        let name = $("input[name=name]").val();
        let email = $("input[name=email]").val();
        let message = $("textarea[name=massage]").val();
        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: "/message-request",
            type: "POST",
            data: {
                name: name,
                email: email,
                message: message,
                _token: _token
            },
            success: function(response) {
                console.log(response);
                if (response) {
                    $('.success').text(response.success);
                    $("#ajaxform")[0].reset();
                }
            },
        });
    });


    $(".subscribe-data").click(function(event) {
        event.preventDefault();

        let email = $("input[name=subscribeemail]").val();
        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: "/subscribe-request",
            type: "POST",
            data: {
                email: email,
                _token: _token
            },
            success: function(response) {
                console.log(response);
                if (response) {
                    $('.subsuccess').text(response.success);
                    $("#ajaxsubscribe")[0].reset();
                }
            },
        });
    });

    $(".faq-data").click(function(event) {
        event.preventDefault();

        let question = $("input[name=question]").val();
        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: "/Faq-request",
            type: "POST",
            data: {
                question: question,
                _token: _token
            },
            success: function(response) {
                console.log(response);
                if (response) {
                    $('.faqsuccess').text(response.success);
                    $("#ajaxfaq")[0].reset();
                }
            },
        });
    });
</script>

</html>
