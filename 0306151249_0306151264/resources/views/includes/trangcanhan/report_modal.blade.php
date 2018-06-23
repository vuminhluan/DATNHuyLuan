

<div class="report-modal">
	<div class="-content">
		<div class="-header">
			<h3>Báo cáo tài khoản <span class="-username">{{'@'.$taikhoan->ten_tai_khoan}}</span></h3>
		</div>

		<div class="-body">
			<span id="report-message"></span>
			<form action="{{ route('trangcanhan.taikhoan.baocao', [$taikhoan->ten_tai_khoan]) }}" method="POST" id="report-account-form">
				@csrf
				<label for="">Nội dung: </label>
				<input id="report-input" name="report_input" type="text">
				<input type="hidden" name="user_id" value="{{$taikhoan->ma_tai_khoan}}">
			</form>
		</div>
		<div class="-footer">
			<button id="submit-report-button" form="report-account-form">Gửi báo cáo</button>
			<button id="close-report-modal">Hủy</button>
		</div>
	</div>
</div>