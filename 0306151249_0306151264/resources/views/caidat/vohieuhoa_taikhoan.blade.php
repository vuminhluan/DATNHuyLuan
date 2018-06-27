@extends('master.luan.caidat_masterpage')

@section('noidung_trangcaidat')
	<div class="setting-title">
		<h2>Vô hiệu hóa tài khoản</h2>
	</div>

	<div class="myalert">
		<div class="--content" >
			<p>Thông báo ở đây</p>
		</div>
		<span class="--close fa fa-times"></span>
	</div>

	<div class="before-deactivate-account-info">
		<h3>Bạn cần đọc kĩ thông tin sau trước khi vô hiệu hóa tài khoản của mình:</h3>
		<ul>
			{{-- <li>Chúng tôi sẽ lưu trữ dữ liệu của bạn chỉ trong 30 ngày. Bạn có thể tái kích hoạt tài khoản bất cứ lúc nào bằng cách đăng nhập trở lại trong 30 ngày kể từ ngày vô hiệu hóa tài khoản.</li> --}}
			<li>Bạn không cần phải vô hiệu hóa tài khoản để <a href="setting-account.html">đổi tên tài khoản hay email</a>. Bạn có thể thay đổi trong phần <a href="setting-account.html">cài đặt</a>.</li>
			{{-- <li>Sau khi vô hiệu hóa, bạn có thể tạo tài khoản mới</li> --}}
			{{--<li>Nếu bạn muốn sử dụng lại tên tài khoản hiện tại <a href="profile.html">@nguoidunga</a> hoặc địa chỉ email hiện tại nguoidunga@gmail.com cho một tài khoản mới, bạn cần thay đổi nó trước khi vô hiệu hóa. Vì trong thời gian 30 ngày tiếp theo khi dữ liệu của bạn chưa bị xóa thì bạn không thể sử dụng lại chúng để tạo tài khoản mới.</li> --}}
		</ul>
	</div>
	<div>
		<form action="javascript: void(0)" class="setting-form" id="deactivate-form">
			@csrf
			<button id="validation-button" class="deactivate-account-button modal-open-button" data-modalid="js-confirm-change-by-password-modal"><span>Vô hiệu hóa</span> @nguoidunga</button>
		</form>
	</div>

	@include('includes.caidat.trangcaidat_modal')
@endsection
