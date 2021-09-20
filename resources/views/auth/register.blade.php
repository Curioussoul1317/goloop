
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
<link href="{{ asset('UserUi/intlTelInput.min.css') }}" rel="stylesheet">  
 
<script src="{{ asset('UserUi/jquery.min.js') }}" ></script>  
<script src="{{ asset('UserUi/intlTelInput.min.js') }}" ></script>  
<script src="{{ asset('UserUi/utils.js') }}" ></script>  
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
							<li data-tab="tab-1" ><a href="{{ route('login') }}"  >Sign in</a></li>				
							<li data-tab="tab-2" class="current"><a href="{{ route('register') }}"  >Sign up</a></li>							
								</ul>								

								<div class="sign_in_sec current" id="tab-1">

								<div class="flash-message"> 
									@foreach(['danger','warning','success','info'] as $msg)
									@if(Session::has('alert-'.$msg))
									<p class="alert alert-{{$msg}}">{{Session::get('alert-'.$msg)}}
										<a href="#" class="close" data-dismiss="alert" aria-lable="close">&times</a>
									</p>
									@endif
									@endforeach
								</div>

								<h3>Register</h3>
									<form method="POST" action="{{ route('register') }}">
                       					 @csrf
											<div class="row">
											<div class="col-lg-12 no-pdd" style="margin-bottom: 10px;">
											<input id="full_name" style="margin-bottom: 5px;" type="text" placeholder="Full Name" class="@error('full_name') is-invalid @enderror" name="full_name" value="{{ old('full_name') }}" required  autocomplete="full_name" autofocus>
									 
											@if ($errors->has('full_name'))
												<span class="text-danger">{{ $errors->first('full_name') }}</span>
											@endif
											</div> 

											<div class="col-lg-12 no-pdd" style="margin-bottom: 10px;">
											<input id="nic" style="margin-bottom: 5px;" placeholder="ID Number / Passport" type="text" class="form-control @error('nic') is-invalid @enderror" name="nic" value="{{ old('nic') }}" required autocomplete="nic" autofocus>
											
											@if ($errors->has('nic'))
												<span class="text-danger">{{ $errors->first('nic') }}</span>
											@endif
											</div>

											<div class="col-lg-12 no-pdd" style="margin-bottom: 10px;">
								 
											<input id="phone" style="margin-bottom: 5px;" placeholder="mobile number" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
											 
												@if ($errors->has('phone'))
												<span class="text-danger">{{ $errors->first('phone') }}</span>
											@endif
											</div>

											<div class="col-lg-12 no-pdd" style="margin-bottom: 10px;">
											<input id="email" style="margin-bottom: 5px;" placeholder="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
											@if ($errors->has('email'))
												<span class="text-danger">{{ $errors->first('email') }}</span>
											@endif
											</div>

											<div class="col-lg-12 no-pdd" style="margin-bottom: 10px;">
											<input id="password" style="margin-bottom: 5px;" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

											@if ($errors->has('password'))
												<span class="text-danger">{{ $errors->first('password') }}</span>
											@endif
											</div>

											<div class="col-lg-12 no-pdd" style="margin-bottom: 10px;">
											<input id="password-confirm" style="margin-bottom: 5px;" type="password" class="form-control" name="password_confirmation" placeholder="Repeat Password" required autocomplete="new-password">
											@error('password-confirm')
											<span class="error text-danger"> {{ $message }}</span>
											@enderror
											</div>
 
												
												<div class="col-lg-12 no-pdd">
													<div class="checky-sec">
														<div class="fgt-sec">
															<input type="radio" name="verify" id="veryfyemail" value="email"  >
															<label for="veryfyemail">
																<span></span>
															</label>
															<small>E-mail &nbsp; &nbsp;</small>
															<input type="radio" name="verify" id="veryfyphone" value="phone" checked>
															<label for="veryfyphone">
																<span></span>
															</label>
															<small>OTP verification</small>
														</div><!--fgt-sec end-->     
													</div>
												</div>
												 
												<div class="col-lg-12 no-pdd">
													<button type="submit" onclick="submitFunction()">Get Started</button>
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


<script> 
function submitFunction() {    
   var phone= document.getElementById("phone").value;
   var code =$('.iti__selected-dial-code').text(); 
    $('#phone').val(code+phone);
} 
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
        separateDialCode: true,
        customPlaceholder: function (
            selectedCountryPlaceholder,
            selectedCountryData
        ) {
            return "e.g. " + selectedCountryPlaceholder;
        },
    });
</script>

 
</body>
</html>