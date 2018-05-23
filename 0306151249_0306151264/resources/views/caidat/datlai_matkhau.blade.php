<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quên mật khẩu</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/luan/settings/forget-password.css')}}">
  <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
</head>
<body>

  <div class="topnavroot">
    <div class="topnav" >
      <ul class="navtop-menu">
        <li><a href="{{route('trangchu')}}">Logo here</a></li>
        <li><a href="#/">Đặt lại mật khẩu</a></li>
      </ul>
    </div>
  </div>

  <div class="reset-password-container">
		<div class="reset-password-main">
			<div class="reset-password-form">
				<form action="{{ route('caidat.post.quen_matkhau.datlai') }}" id="reset-password-form" method="POST">
					@csrf
					<div>
						<h2 style="position: relative;">Đặt lại mật khẩu</h2>
					</div>
	
					<div>
						<p class="description">Để đặt lại mật khẩu, bạn hãy chọn cho mình một mật khẩu mới.</p>
					</div>
					@if (Auth::check())
						<div class="authed-account">
							<img src="{{ asset('pictures/anh_dai_dien/'.Auth::user()->nguoi_dung->anh_dai_dien) }}" alt="">
							&nbsp;&nbsp;&nbsp;
							<p>{{Auth::user()->ten_tai_khoan}} <br> {{Auth::user()->email}}</p>
						</div>
					@endif

					<div>
						<label for="new_password">Mật khẩu mới</label>
						<input type="password" id="new_password" name="new_password">
					</div>
					<div>
						<label for="confirm_password">Nhập lại mật khẩu mới</label>
						<input type="password" id="confirm_password" name="confirm_password">
					</div>
					
					<div>
						<button id="reset-password-button">Đặt lại mật khẩu</button>
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
