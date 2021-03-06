<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Liên hệ chúng tôi</title>
	<link rel='icon' href='{{ asset('pictures/logo/favicon.png') }}' type='image/png'/ >
  <link rel="stylesheet" href="{{asset('css/luan/contact.css')}}">
	<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
</head>
<body>

	<div class="myloader">
  {{-- <img src="{{ asset('pictures/luan/ajax-loader2.gif') }}" alt=""> --}}
	  <img src="" alt="">
	</div>
	
	<div class="contact-alert {{session('success_message') ? 'alert-animate' : '' }}">
		<div class="message baomoi">
			<p class="baomoi">{{session('success_message')}}</p>
		</div>
	</div>

	{{-- <div class="background"></div> --}}

	<div class="topnavroot">
    <div class="topnav wrapper-main">
      <ul class="navtop-menu">
        <li><a href="{{ route('trangchu') }}"><img style="vertical-align: middle;" width="30px;" height="25px" src="{{ asset('pictures/logo/favicon.png') }}" alt="logo LL"></a></li>
        <li><a href="{{ route('lienhe') }}">Liên hệ</a></li>
      </ul>
    </div>
  </div>

	<div class=" wrapper-main">
		<div class="contact-form-container">

	    <div class="contact-form-information">
	      <div class="title"><h1>Thông tin</h1></div>
				<div class="info">
					<ul>
						<li>
							<div class="info-icon"><i class="fa fa-map-marker"></i></div>

							<div>67, Huỳnh Thúc Kháng, Phường Bến Nghé, Quận 1, TP. HCM</div>
						</li>
						<li>
							<div class="info-icon"><i class="fa fa-phone"></i></div>

							<div>
								<p>098-177-0642</p>
								<p>01634-699-175</p>
							</div>
						</li>
						<li>
							<div class="info-icon"><i class="fa fa-envelope"></i></div>

							<div>
								<p>datn.ckc15@gmail.com</p>
							</div>
						</li>
					</ul>
				</div>
				{{-- <div class="social-button">
					<ul>
						<li><a href="#/"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#/"><i class="fa fa-instagram"></i></a></li>
						<li><a href="#/"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#/"><i class="fa fa-google-plus"></i></a></li>
					</ul>
				</div> --}}
	    </div>

		{{-- - - - - - - - - - - - - - - - - - - - - - - - - - --}}

	    <div class="contact-form-main">
	      <div class="title"><h1>Gửi tin nhắn đến chúng tôi</h1></div>
	      
				<div>
					<form id="contact-form" name="contact-form" action="{{ route('lienhe.post') }}" method="POST">
						@csrf
						<div>
							<label for="fullname">Họ và tên</label>
							<input data-info="1" type="text" id="fullname" name="fullname" value="{{Auth::check() ? Auth::user()->ho_ten_lot.' '.Auth::user()->ten : ''}}">
						</div>
						<div>
							<label for="email">Email</label>
							<input data-info="1" type="text" id="email" name="email" value="{{Auth::check() ? Auth::user()->email : ''}}">
						</div>
						<div>
							<label for="message">Tin nhắn</label>
							<textarea data-info="1" id="message" name="message" rows="5" cols="80"></textarea>
						</div>
						<div>
							<button class="send-message-button">Gửi</button>
						</div>
					</form>
				</div>
	    </div>


		</div>
  </div>





	<script src="{{asset('js/jquery/jquery3.3.1.js')}}"></script>
	<script src="{{asset('js/jquery/jquery-validate.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('js/globaljs/varglobal.js') }}"></script>
	<script src="{{asset('js/luan/contact.js')}}"></script>

	{{-- socket io here --}}
	<script src="{{ asset('node_modules/socket.io/node_modules/socket.io-client/dist/socket.io.js') }}"></script>
	



  <script>
    var loaderPath = "{{ asset('pictures/luan/ajax-loader2.gif') }}";
    $('.myloader img').attr('src', loaderPath);
    $(document).ready(function() {
    	
      $('.myloader').hide();
    });
  </script>


</body>
</html>
