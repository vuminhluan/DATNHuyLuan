@extends('master.luan.caidat_masterpage')

@section('noidung_trangcaidat')
<div class="setting-title">
	<h2>Tài khoản</h2>
</div>
<div>
	<form action="javascript: void(0)" method="POST" class="setting-form" id="setting-account-form">
		@csrf
		<div>
			<label for="username">Tên tài khoản</label>
			<input type="text" id="username" data-info="1" name="username"  value="{{Auth::user()->ten_tai_khoan}}">
		</div>

		<div>
			<label for="email">Email</label>
			<input type="text" id="email" data-info="1" name="email" value="{{Auth::user()->email}}">
		</div>

		<div>
			<label for="phone">Số điện thoại</label>
			<input type="text" id="phone" data-info="1" name="phone" value="{{Auth::user()->so_dien_thoai}}">
		</div>

		<div><button type="submit" id='validation-button' class="save-change-by-password-button" data-modalid="js-confirm-change-by-password-modal">Lưu thay đổi</button></div>
		{{-- class="modal-open-button" --}}
	</form>
</div>
<div>
	<a href="{{route('caidat.vohieuhoa')}}" id="deactivate-account-link" class="another-link">Vô hiệu hóa tài khoản</a>
</div>

@include('includes.caidat.trangcaidat_modal')

@endsection
