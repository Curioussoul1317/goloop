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
								

								<div class="sign_in_sec current" id="tab-1">
								<div class="flash-message"> 
									@foreach(['danger','warning','success','info'] as $msg)
									@if(Session::has('alert-'.$msg))
									<p class="alert alert-{{$msg}}">{{Session::get('alert-'.$msg)}}
									<p class="alert alert"> 
										<a href="#" class="close" data-dismiss="alert" aria-lable="close">&times</a>
									</p>
									@endif
									@endforeach
								</div>
								<h3>Sign in</h3>
									<form method="POST" action="{{ route('login') }}">
                                     @csrf
										<div class="row">
										
											<div class="col-lg-12 no-pdd" style="margin-bottom: 25px;">
												<div class=""> 
												<input id="email" type="email" style="margin-bottom: 10px;" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
																							 
												@error('email')
												<span class="error text-danger">{{ $message }}</span>
												@enderror  
												  
												</div><!--sn-field end-->
											</div> 

											<div class="col-lg-12 no-pdd">
												<div class=""> 
													<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"  placeholder="Password">												
													
												@error('password')
												<span class="error text-danger">{{ $message }}</span>
												@enderror  
												</div><!--sn-field end-->
											</div>
									 
											<div class="col-lg-12 no-pdd">
												<div class="checky-sec">
													<div class="fgt-sec">														
													<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

													<label for="remember">
													<span></span>	
													</label>
													<small>{{ __('Remember Me') }}</small> 
													</div><!--fgt-sec end-->
													@if (Route::has('password.request'))
													<a  href="{{ route('password.request') }}">
														{{ __('Forgot Your Password?') }}
													</a>
												@endif
												</div>
											</div>
											<div class="col-lg-12 no-pdd">
												<button type="submit" value="submit">Sign in</button>
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

									
							  