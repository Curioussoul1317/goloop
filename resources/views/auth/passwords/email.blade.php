 

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>{{ config('app.name', 'Go Loop Maldives') }}</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="" />
<meta name="keywords" content="" /> 
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


<body class="sign-in">
	

	<div class="wrapper">
		

		<div class="sign-in-page">
			<div class="signin-popup">
				<div class="signin-pop">
					<div class="row">
						<div class="col-lg-6">
							<div class="cmp-info">
								<div class="cm-logo">
								<img src="{{ asset('UserUi/images/golooopsignin-logo.png') }}" > 
									<p>We are on a mission to make fitness & running accessible to everyone in Maldives irrespective of where they live.</p>
								</div><!--cm-logo end-->
								<img src="{{ asset('UserUi/images/golooop-main-img.png') }}" > 		
							</div><!--cmp-info end-->
						</div>
						<div class="col-lg-6">
							<div class="login-sec">
							<ul class="sign-control">
							<li data-tab="tab-1" class="current"><a href="{{ route('login') }}"  >Sign in</a></li>				
							<li data-tab="tab-2"><a href="{{ route('register') }}"  >Sign up</a></li>							
								</ul>	 
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

								<div class="sign_in_sec current" id="tab-1">
									
								<h3>Reset Password</h3>
                                <form method="POST" action="{{ route('password.email') }}">
                                     @csrf
										<div class="row">

											<div class="col-lg-12 no-pdd" style="margin-bottom: 25px;">
												<div class="">  
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror 
												</div><!--sn-field end-->
											</div> 										 
									 
											 
											<div class="col-lg-12 no-pdd">
												<button type="submit" >Send Password Reset Link</button>
											</div>
										</div>
									</form>
								 
							 
								</div><!--sign_in_sec end-->
						 	
							</div><!--login-sec end-->
						</div>
					</div>		
				</div><!--signin-pop end-->
			</div><!--signin-popup end-->
			<div class="footy-sec">
				<div class="container">
					<ul> 
						<li><a href="#" title="">Privacy Policy</a></li>    
						<li><a href="#" title="">FAQ</a></li>
						<li><a href="#" title=""></a></li>
					</ul>
					<p><img src="images/copy-icon.png" alt="">Go Loop Maldives Copyright 2021</p>
				</div>
			</div><!--footy-sec end-->
		</div><!--sign-in-page end-->


	</div><!--theme-layout end-->


<script src="{{ asset('UserUi/js/jquery.min.js') }}" defer></script>
<script src="{{ asset('UserUi/js/popper.js') }}" defer></script>
<script src="{{ asset('UserUi/js/bootstrap.min.js') }}" defer></script>
<script src="{{ asset('UserUi/lib/slick/slick.min.js') }}" defer></script>
</body>
</html>

									
							  