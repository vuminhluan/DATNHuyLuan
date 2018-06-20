@extends('master.luan.caidat_masterpage')

@section('noidung_trangcaidat')
	
	<div class="slidedown-alert {{session('slidemessage') ? 'slidedown-alert-animation' : '' }}">
    <div class="--content">
      <p class="baomoi">Thông báo: {{session('slidemessage')}}</p>
    </div>
  </div>

	<div class="setting-title">
		<h2>Danh sách tài khoản bị chặn</h2>
		<p>Dưới đây là danh sách các tài khoản đang bị chặn. Họ sẽ không thể nhìn thấy bài đăng của bạn, không thể vào <a href="profile.html">trang cá nhân của bạn</a>. Nhưng có thể nhìn thấy tên của bạn xuất hiện ở đâu đó. Bạn cũng không thể thấy bài đăng của họ, truy cập trang cá nhân của họ nhưng bạn có thể nhìn thấy tên của họ ở đâu đó.</p>
	</div>
	<div class="myalert reset-password-alert">
		<div class="--content">
			<p style="font-family: 'Baomoi'">Thong bao o day</p>
		</div>
		<span class="--close fa fa-times"></span>
	</div>
	<div class="no-padding-content-setting-div">
		<ul class="blocked-account-list">
			@foreach ($locked_accounts as $locked_account)
			<li>
				<div class="blocked-account-avatar">
					<a href="{{ route('trangcanhan.index', $locked_account->ten_tai_khoan) }}"><img src="{{asset('pictures/anh_dai_dien/'.$locked_account->anh_dai_dien)}}" alt=""></a>
				</div>

				<div class="blocked-account-name-and-username">
					<a href="{{ route('trangcanhan.index', $locked_account->ten_tai_khoan) }}">
						<span class="blocked-account-name">{{$locked_account->hoten_nguoi_bichan}}</span>
						<span class="blocked-account-username">{{'@'.$locked_account->ten_tai_khoan}}</span>
					</a>
				</div>

				<div class="blocked-account-button-and-action">
					<button class="unblock-account-button js-show-button" data-id="{{$locked_account->ma_tai_khoan}}" data-username="{{$locked_account->ten_tai_khoan}}">Bỏ chặn</button>
					<button class="block-account-button" data-id="{{$locked_account->ma_tai_khoan}}" data-username="{{$locked_account->ten_tai_khoan}}">Chặn</button>
				</div>

			</li>
			@endforeach
		</ul>
	</div>
@endsection

@section('settings_javascript')
	<script type="text/javascript">
		$(document).ready(function() {

			$('.unblock-account-button').click(function() {
				$(this).removeClass('js-show-button');
				$(this).parent().find('.block-account-button').addClass('js-show-button');
			});

			$('.block-account-button').click(function() {
				$(this).removeClass('js-show-button');
				$(this).parent().find('.unblock-account-button').addClass('js-show-button');
			});

		});
	</script>
@endsection
