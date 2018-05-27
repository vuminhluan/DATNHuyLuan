<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Hướng dẫn</title>
	<link rel="stylesheet" href="https://baomoi-static.zadn.vn/web/styles/fonts/baomoi/2.0.2/baomoi-regular-2.0.2.woff2">

	<style>
		* {box-sizing: border-box; font-family: "Arial"}
		/*body {background-color: #eee}*/
		@font-face {
		  font-family: "Baomoi";
		  font-weight: 700;
		  src: url("https://baomoi-static.zadn.vn/web/styles/fonts/baomoi/2.0.2/baomoi-regular-2.0.2.woff2") format("woff2"), url("https://baomoi-static.zadn.vn/web/styles/fonts/baomoi/2.0.2/baomoi-regular-2.0.2.woff") format("woff");
		}

		.chucnang {
			display: grid;grid-gap: 10px;grid-template-columns: 6fr 6fr;width: 100%;
		}
		
		.baomoi {font-family: "Baomoi";}
		.chucnang > div {
			border: 1px solid #eee;
		}

		.title {
			text-align: center; font-size: 30px;
		}
		.list {
			list-style-type: none; padding: 0;
		}
		.list > li { padding: 10px; }
		.list > li:hover {
			background-color: #efefef;
			box-shadow: 2px 1px 3px rgba(0,0,0,0.5);
		}

	</style>
</head>
<body>


	<h1 style="text-align: center;">Hướng dẫn</h1>

	<ul>
		<li>
			<h3>Tài khoản:</h3>
			<p>1. Admin: </p>
			<span>&nbsp; &nbsp; tên tài khoản: vuminhluan</span> <br>
			<span>&nbsp; &nbsp; email: vuminhluan1407@gmail.com</span> <br>
			<span>&nbsp; &nbsp; mật khẩu: admin_123</span> <br>

			<p>2. Người dùng: </p>
			<span>&nbsp; &nbsp; tên tài khoản: taikhoan111</span> <br>
			<span>&nbsp; &nbsp; email: vuminhluantest1@gmail.com</span> <br>
			<span>&nbsp; &nbsp; mật khẩu: nguoidung_123</span> <br>
			<p>Hoặc có thể đăng kí khoản người dùng mới (Gmail, Yahoo)</p>
			<i>Chỉ tạo được tài khoản người dùng</i>

		</li>
		<li>
			<h3>Chức năng</h3>
			<div class="chucnang">
				{{-- Người dùng --}}
				<div>
					<h3 class="title baomoi">Người dùng</h3>
					<ul class="list">
						<li>
							<h3>Đăng nhập / Đăng kí</h3>
							<p> * Có kiểm tra dữ liệu = <a href="https://jqueryvalidation.org/" target="_blank">Javascript (Jquery Validation Plugin)</a></p>
							<p> * Kiểm tra các trường hợp (tài khoản đã được sử dụng, email đã được sử dụng, tài khoản này chưa kích hoạt, sai tên đăng nhập / sai mật khẩu, ...) <small><i>Còn thiếu....</i></small></p>
							<p> * Chức năng ghi nhớ đăng nhập <small><i>Hoạt động trên chrome, không hoạt động trên firefox</i></small></p>
						</li>

						<li>
							<h3>Trang cá nhân (Yêu cầu đăng nhập)</h3>
							<small><a href="{{ url('/taikhoan/taikhoan111') }}" target="_blank">link (@taikhoan111)</a></small>
							<p> * Xem / sửa thông tin cá nhân</p>
							<p> * Cập nhật ảnh bìa / ảnh đại diện (Chưa có cắt ảnh)</p>
						</li>

						<li>
							<h3>Trang cài đặt (Yêu cầu đăng nhập)</h3>
							<small><a href="{{ route('caidat.index') }}" target="_blank">link</a></small>
							<p> * Xem / sửa thông tin tài khoản (yêu cầu xác nhận mật khẩu) <br>
								<span>&nbsp;Cập nhật tên tài khoản, số điện thoại</span> <br>
								<span>&nbsp;Cập nhật email mới (có gửi mail giúp xác minh)</span>
							</p>
							<p> * Thay đổi mật khẩu <small><a href="{{ route('caidat.thaydoi_matkhau') }}" target="_blank">link</a></small><br>
								
							</p>
							<p> * Xem danh sách tài khoản bị chặn <small><a href="{{ route('caidat.chan_taikhoan') }}" target="_blank">link</a></small> (đăng nhập = taikhoan taikhoan111 để thấy rõ hơn) <br>
								
								<span>Bỏ chặn tài khoản</span><br>
								<span>Chặn lại tài khoản đó</span>
							</p>
						</li>

						<li>
							<h3>Quên mật khẩu / Đặt lại mật khẩu (Không yêu cầu đăng nhập)</h3>
							<small><a href="{{ route('caidat.quen_matkhau') }}" target="_blank">link</a></small>
							<p> * Gửi mail giúp đặt lại mật khẩu</p>
						</li>

						<li>
							<h3>Liên hệ (Không yêu cầu đăng nhập)</h3>
							<small><a href="{{ route('lienhe') }}" target="_blank">link</a></small>
							<p> * Gửi tin liên hệ tới quản trị viên</p>
						</li>

					</ul>
				</div>
				{{-- END người dùng --}}

				{{-- Admin --}}
				<div>
					<h3 class="title baomoi">Admin</h3>
					<ul class="list">
						<li>
							<h3>Giao diện (trên mạng)</h3>
						</li>
						<li>
							<h3>Chức năng</h3>
							<p>Liệt kê tất cả tài khoản</p>
							<p>Liệt kê phản hồi người dùng</p>
						</li>
					</ul>
				</div>
				{{-- END admin --}}
			</div>
		</li>
	</ul>

	
</body>
</html>