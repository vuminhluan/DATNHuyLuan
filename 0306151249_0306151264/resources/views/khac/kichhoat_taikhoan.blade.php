<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Kích hoạt tài khoản</title>
	<link rel='icon' href='{{ asset('pictures/logo/favicon.png') }}' type='image/png'/ >
	<link rel="stylesheet" type="text/css" href="{{asset('css/luan/settings/reset-password.css')}}">
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
</head>
<body>

  <div class="topnavroot">
    <div class="topnav" >
      <ul class="navtop-menu">
        <li><a href="#/"><img style="vertical-align: middle;" width="30px;" height="25px" src="{{ asset('pictures/logo/favicon.png') }}" alt="logo LL"></a></li>
        <li><a href="#/">Kích hoạt tài khoản</a></li>
      </ul>
    </div>
  </div>

  <div class="reset-password-container">
		<div class="reset-password-main">
			<div class="reset-password-form">
				<form action="{{route('kichhoat.gui_mail')}}" id="reset-password" name="reset-password" method="GET">

					<div>
						<h2>Kích hoạt tài khoản</h2>
						{{session('success_message')}}
					</div>

					<div>
						<p class="description">Chúng tôi đã gửi mail kích hoạt tài khoản tới email {{Auth::user()->email}} của bạn khi bạn đăng kí. Vui lòng kích hoạt tài khoản để có thể đăng nhập.</p>
					</div>
					<div>
						<button id="reset-passowrd-button">Gửi lại mail kích hoạt</button>
					</div>
					<div>
						<a href="{{route('dangxuat')}}">Bỏ qua</a>
					</div>
				</form>
			</div>
		</div>

	</div>




  <script>
  </script>
</body>
</html>
