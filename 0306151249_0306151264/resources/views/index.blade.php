<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/luan/login.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
</head>
<body>

	{{-- Alert notification  --}}
	{{-- <div class="myalert fail" id="login-signup-alert">
		<p>Đăng kí thất bại</p>
	</div> --}}
	{{-- End alert notification  --}}

	<div class="container">

		<div class="main">
			<div class="sign-up">
				<div class="section">
					<form action="{{route('post_dangki')}}" id="sign-up-form" method="POST">
						@csrf
						<div>
							<h1 style="text-align: center;">Đăng ký</h1>
						</div>

						<div class="sign-up-tab">
							<div>
								<label for="sign-up-lastname">Họ và tên đệm
									<span class="help-mark">&#63;

										<span class="help-mark-text">
											Họ và tên đệm chỉ chứa các kí tự là chữ cái (có dấu)
										</span>

									</span>

								</label>
								<input type="text" id="sign-up-lastname" name="sign-up-lastname">
							</div>

							<div>
								<label for="sign-up-firstname">Tên
									<span class="help-mark">&#63;

										<span class="help-mark-text">
											Tên chỉ chứa các kí tự là chữ cái (có dấu)
										</span>

									</span>

								</label>
								<input type="text" id="sign-up-firstname" name="sign-up-firstname">
							</div>
						</div>

						<div class="sign-up-tab">
							<div>
								<label for="sign-up-username">Tên tài khoản
									<span class="help-mark">&#63;

										<span class="help-mark-text">
											Tên tài khoản có độ dài tối thiểu 6 kí tự, chỉ chứa các chữ cái in thường không dấu, các chữ số và dấu gạch dưới " _ "
										</span>

									</span>

								</label>
								<input type="text" id="sign-up-username" name="sign-up-username">
							</div>

							<div>
								<label for="sign-up-email">Email
									<span class="help-mark">&#63;

										<span class="help-mark-text">
											Tên tài khoản hoặc email không được để trống, có độ dài từ 6 tới 20 kí tự gồm các chữ số và chữ cái in thường không dấu.
										</span>

									</span>

								</label>
								<input type="text" id="sign-up-email" name="sign-up-email">
							</div>

							<div>
								<label for="sign-up-password">Mật khẩu
									<span class="help-mark">&#63;

										<span class="help-mark-text">
											Tên tài khoản hoặc email không được để trống, có độ dài từ 6 tới 20 kí tự gồm các chữ số và chữ cái in thường không dấu.
										</span>

									</span>

								</label>
								<input type="password" id="sign-up-password" name="sign-up-password">
							</div>
						</div>

						<!-- Controll next or previous button -->
						<div class="sign-up-controllers">
							<button id="sign-up-prev-btn" >Quay lại</button>
							<button id="sign-up-next-btn" >Tiếp theo</button>
						</div>

						<div id="ajax-loader" style="text-align: center; display: none">
							<img width="40px" height="40px" src="{{asset('pictures/luan/ajax-loader.gif')}}" alt="">
						</div>

					</form>
				</div>
			</div>

			<div class="sign-in">
				<!-- Form đăng nhập -->
				<div class="section sign-in-form">
					<form action="#/" id="sign-in-form" method="POST">
						{{-- {{route('post_dangnhap')}} --}}
						{{ csrf_field() }}
						<div>
							<h1 style="text-align: center;">
								DATN
							</h1>
						</div>
						<div>
							<label for="sign-in-username">Tên tài khoản hoặc email
								<span class="help-mark">&#63;

									<span class="help-mark-text">
										Tên tài khoản có độ dài tối thiểu 6 kí tự, chỉ chứa các chữ cái in thường không dấu, các chữ số và dấu gạch dưới " _ ". <br>
										Email phải hợp lệ.
									</span>

								</span>

							</label>
							<input type="text" id="sign-in-username" name="username" value="">
						</div>
						<div>
							<label for="sign-in-password">Mật khẩu
								<span class="help-mark">&#63;
									<span class="help-mark-text">
										Mật khẩu không được để trống, có độ dài từ 6 tới 30 kí tự gồm các chữ số các chữ cái in thường không dấu và dấu gạch dưới " _ ".
									</span>

								</span>

							</label>
							<input type="password" id="sign-in-password" name="password" value="">
						</div>
						<div>
							<input type="checkbox" class="" id="sign-in-remember" name="remember">
							<label for="sign-in-remember">Ghi nhớ đăng nhập</label>
						</div>
						<div>
							<button type="submit" id="sign-in-form-button" class="form-button">Đăng nhập</button>
						</div>
						<div class="sign-in-linethrough">
							<span>Hoặc</span>
						</div>
						<div style="text-align: center;">
							<p class="google-sign-in-button"><i class="fa fa-google"></i> Đăng nhập với google</p>
						</div>
						<div style="text-align: right;">
							<a href="{{route('caidat.quen_matkhau')}}">Quên mật khẩu ?</a>
						</div>
					</form>
				</div>
				<!-- End Form đăng nhập -->

			</div>


		</div>

	</div>


	<div style="clear: both;"></div>
	<footer class="login-footer">
		<ul>
			<li><h2><a href="{{ route('huongdan') }}">Hướng dẫn</a></h2></li>
			<li>lorem</li>
			<li>lorem</li>
			<li>lorem</li>
			<li>lorem</li>
			<li>lorem</li>
			<li>lorem</li>
			<li>lorem</li>
			<li>lorem</li>
			<li>lorem</li>
			<li>lorem</li>
			<li>lorem</li>
			<li>lorem</li>
			<li>lorem</li>
			<li>lorem</li>
			<li>lorem</li>
			<li>&copy; 2018 ĐATN</li>
		</ul>
	</footer>

	<script src="{{asset('js/jquery/jquery3.3.1.js')}}" charset="utf-8"></script>
	<script src="{{asset('js/jquery/jquery-validate.min.js')}}" charset="utf-8"></script>
	<script type="text/javascript" src="{{ asset('js/globaljs/varglobal.js') }}" charset="utf-8"></script>
  <script src="js/luan/login.js"></script>


  <script>
  </script>
</body>
</html>
