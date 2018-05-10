<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/luan/settings/reset-password.css')}}">
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
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
				<form action="#/" id="reset-password" name="reset-password" method="POST">

					<div>
						<h2>Đặt lại mật khẩu</h2>
					</div>

					<div>
						<p class="description">Để giúp bạn lấy lại mật khẩu, chúng tôi cần biết email mà bạn đã dùng để đăng kí.</p>
					</div>

					<div>
						<label for="reset-password-username">Tên đăng nhập hoặc email</label>
						<input type="text" id="reset-password-username" required>
					</div>
					<div>
						<button id="reset-passowrd-button">Đặt lại mật khẩu</button>
					</div>
				</form>
			</div>
		</div>

	</div>




  <script>
  </script>
</body>
</html>
