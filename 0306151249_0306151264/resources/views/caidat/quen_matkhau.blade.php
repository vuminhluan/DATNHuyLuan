<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/luan/settings/reset-password.css')}}">
  <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
</head>
<body>

  <div class="topnavroot">
    <div class="topnav" >
      <ul class="navtop-menu">
        <li><a href="#/">Logo here</a></li>
        <li><a href="#/">Quên mật khẩu</a></li>
      </ul>
    </div>
  </div>

  <div class="reset-password-container">
		<div class="reset-password-main">
			<div class="reset-password-form">
				<form action="javascript: void(0)" id="forget-password-form" name="forget-password-form" method="POST">
					@csrf
					<div>
						<h2>Quên mật khẩu</h2>
					</div>
					<div style="display: block;" class="myalert reset-password-alert">
						<div class="--content" >
							<p>Thông báo ở đây</p>
						</div>
						<span class="--close fa fa-times"></span>
					</div>

					<div>
						<p class="description">Để giúp bạn lấy lại mật khẩu, chúng tôi cần biết email mà bạn đã dùng để đăng kí.</p>
					</div>

					<div>
						<label for="reset-password-username">Tên đăng nhập hoặc email</label>
						<input type="text" id="username" name="username">
					</div>
					<div>
						<button id="forget-password-button">Đặt lại mật khẩu</button>
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
