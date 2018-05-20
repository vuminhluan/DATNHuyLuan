@extends('master.luan.caidat_masterpage')

@section('noidung_trangcaidat')

<div class="setting-title">
	<h2>Tài khoản</h2>
</div>

{{-- <div class="setting-alert js-change-password-alert alert-box success">
	<p>Bạn đã đổi mật khẩu thành công.</p>
	<span class="close-alert-box">&times;</span>
</div>
<div class="setting-alert js-change-password-alert alert-box failed">
	<p>Không thể đổi mật khẩu. Mật khẩu hiện tại không đúng.</p>
	<a href="#/">Quên mật khẩu ?</a>
	<span class="close-alert-box">&times;</span>
</div> --}}

<div>
	<form action="#" class="setting-form">
		
		<div>
			<label for="setting-password-form-current-password">Mật khẩu hiện tại</label>
			<input id="setting-password-form-current-password" type="text" value="">
		</div>

		<div>	
			<label for="setting-password-form-new-password">Mật khẩu mới</label>
			<input type="text" id="setting-password-form-new-password" value="">
		</div>

		<div>	
			<label for="setting-password-form-reenter-new-password">Xác nhận mật khẩu</label>
			<input type="text" id="setting-password-form-reenter-new-password" value="">
		</div>


		
		<div><button id="agree-change-password-button" type="submit">Lưu thay đổi</button></div>

		
	</form>
</div>

<div>
	<a href="{{route('caidat.vohieuhoa')}}" id="" class="another-link">Quên mật khẩu</a>
</div>

@endsection
