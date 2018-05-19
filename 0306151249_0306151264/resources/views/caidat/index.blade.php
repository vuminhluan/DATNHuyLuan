@extends('master.luan.caidat_masterpage')

@section('noidung_trangcaidat')
	<div class="setting-title">
		<h2>Tài khoản</h2>
	</div>
	<div>
		<form action="#/" class="setting-form">
			<table>
				<tr>
					<td><label for="setting-account-form-username">Tên tài khoản</label></td>
					<td><div><input id="setting-account-form-username" type="text" value="{{Auth::user()->ten_tai_khoan}}"></div></td>
				</tr>
				<tr>
					<td><label for="setting-account-form-email">Email</label></td>
					<td><div><input type="text" id="setting-account-form-email" value="{{Auth::user()->email}}"></div></td>
				</tr>
				<tr>
					<td><label for="setting-account-form-phone">Số điện thoại</label></td>
					<td><div><input type="text" id="setting-account-form-phone" value="{{Auth::user()->so_dien_thoai}}"></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div><button type="submit" class="save-change-by-password-button modal-open-button" data-modalid="js-confirm-change-by-password-modal">Lưu thay đổi</button></div></td>
				</tr>
			</table>
		</form>
	</div>
	<div>
		<a href="{{route('caidat.vohieuhoa')}}" id="deactivate-account-link">vô hiệu hóa tài khoản</a>
	</div>

	@include('includes.caidat.trangcaidat_modal')


@endsection
