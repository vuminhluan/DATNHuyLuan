<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quên mật khẩu</title>
	<link rel='icon' href='{{ asset('pictures/logo/favicon.png') }}' type='image/png'/ >
	<link rel="stylesheet" type="text/css" href="{{asset('css/luan/settings/forget-password.css')}}">
  <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
</head>
<body>

  <div class="topnavroot">
    <div class="topnav" >
      <ul class="navtop-menu">
        <li><a href="{{route('trangchu')}}"><img style="vertical-align: middle;" width="30px;" height="25px" src="{{ asset('pictures/logo/favicon.png') }}" alt="logo LL"></a></li>
        <li><a href="#/">Quên mật khẩu</a></li>
      </ul>
    </div>
  </div>

  <div class="reset-password-container">
		<div class="reset-password-main">
			<div class="reset-password-form">
				<form action="{{ route('caidat.post.quen_matkhau') }}" id="forget-password-form" name="forget-password-form" method="POST">
					@csrf
					<div>
						<h2 style="position: relative;">Quên mật khẩu <span class="ajax-loader"><img src="{{asset('pictures/luan/ajax-loader.gif')}}"></span></h2>
					</div>

					@if (session('forget-password-message'))
						<div style="display: block;" class="myalert reset-password-alert">
							<div class="--content">
								<p style="font-family: 'Baomoi'">{{session('forget-password-message')}}</p>
							</div>
							<span class="--close fa fa-times"></span>
						</div>
					@endif
					

					<div>
						<p class="description"  >Để giúp bạn lấy lại mật khẩu, chúng tôi cần biết email mà bạn đã dùng để đăng kí.</p>
					</div>
					@if (Auth::check())
						<div class="authed-account">
							<img src="{{ asset('pictures/anh_dai_dien/'.Auth::user()->nguoi_dung->anh_dai_dien) }}" alt="">
							&nbsp;&nbsp;&nbsp;
							<p>{{Auth::user()->ten_tai_khoan}} <br> {{Auth::user()->email}}</p>
						</div>
						<p>Không phải bạn? Nhấn vào <a href="{{ route('caidat.quen_matkhau.khongphaitoi') }}">đây</a> để đăng xuất.</p>
					@else
						<div>
							<label for="username">Tên đăng nhập hoặc email</label>
							<input type="text" id="username" name="username" value="{{old('username')}}">
						</div>
					@endif
					
					<div>
						<button id="forget-password-button">Nhận email trợ giúp</button>
					</div>
				</form>
			</div>
		</div>

	</div>



	<script src="{{asset('js/jquery/jquery3.3.1.js')}}" charset="utf-8"></script>
  <script type="text/javascript" src="{{ asset('js/globaljs/varglobal.js') }}" charset="utf-8"></script>
	<script src="{{asset('js/jquery/jquery-validate.min.js')}}"></script>
	<script src="{{asset('js/luan/configpage.js')}}"></script>
</body>
</html>
