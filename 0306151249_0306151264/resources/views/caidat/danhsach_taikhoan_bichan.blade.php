@extends('master.luan.caidat_masterpage')

@section('noidung_trangcaidat')
	<div class="setting-title">
		<h2>Danh sách tài khoản bị chặn</h2>
		<p>Dưới đây là danh sách các tài khoản đang bị chặn. Họ sẽ không thể nhìn thấy bài đăng của bạn, không thể vào <a href="profile.html">trang cá nhân của bạn</a>. Nhưng có thể nhìn thấy tên của bạn xuất hiện ở đâu đó. Bạn cũng không thể thấy bài đăng của họ, truy cập trang cá nhân của họ nhưng bạn có thể nhìn thấy tên của họ ở đâu đó.</p>
	</div>
	<div class="no-padding-content-setting-div">
		<ul class="blocked-account-list">
			<li>
				<div class="blocked-account-avatar">
					<a href="profile.html"><img src="{{asset('pictures/luan/test1.png')}}" alt=""></a>
				</div>

				<div class="blocked-account-name-and-username">
					<a href="profile.html">
						<span class="blocked-account-name">Người Dùng A</span>
						<span class="blocked-account-username">@nguoidunga</span>
					</a>
				</div>

				<div class="blocked-account-button-and-action">
					<button class="unblock-account-button js-show-button">Bỏ chặn</button>
					<button class="block-account-button">Chặn</button>
				</div>

			</li>

			<li>
				<div class="blocked-account-avatar">
					<a href="profile.html"><img src="{{asset('pictures/luan/test1.png')}}" alt=""></a>
				</div>

				<div class="blocked-account-name-and-username">
					<a href="profile.html">
						<span class="blocked-account-name">Người Dùng A</span>
						<span class="blocked-account-username">@nguoidunga</span>
					</a>
				</div>

				<div class="blocked-account-button-and-action">
					<button class="unblock-account-button js-show-button">Bỏ chặn</button>
					<button class="block-account-button">Chặn</button>
				</div>

			</li>

			<li>
				<div class="blocked-account-avatar">
					<a href="profile.html"><img src="{{asset('pictures/luan/test1.png')}}" alt=""></a>
				</div>

				<div class="blocked-account-name-and-username">
					<a href="profile.html">
						<span class="blocked-account-name">Người Dùng A</span>
						<span class="blocked-account-username">@nguoidunga</span>
					</a>
				</div>

				<div class="blocked-account-button-and-action">
					<button class="unblock-account-button js-show-button">Bỏ chặn</button>
					<button class="block-account-button">Chặn</button>
				</div>

			</li>
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
