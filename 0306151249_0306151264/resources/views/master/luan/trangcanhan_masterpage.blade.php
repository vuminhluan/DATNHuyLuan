@extends('master.masterpage')



@section('css')
	<link rel="stylesheet" href="{{asset('css/luan/profile/profile_masterpage.css')}}">
	<link rel="stylesheet" href="{{asset('css/luan/confirm-modal.css')}}">
	<link rel="stylesheet" href="{{asset('css/luan/loader_slidemessage.css')}}">
	@yield('profile_css')
@endsection



@section('main')

	@include('includes/loader_and_slidemessage')

	<div class="profile-image">
		<div class="profile-banner">
			<img src="{{asset('pictures/anh_bia/'.$taikhoan->hasNguoiDung->anh_bia)}}" alt="">
			@if (Auth::user()->ten_tai_khoan == $taikhoan->ten_tai_khoan)
				<div class="edit-profile-banner-button edit-profile-image">
					<div>
						<p class="fa fa-camera-retro -icon"></p>
						<p>Thay đổi ảnh bìa </p>
						<form class="uploader" action="{{route('post_taikhoan.anh.capnhat', 'anh_bia')}}" method="POST" enctype="multipart/form-data">
							@csrf
							<input type="file" name="upload_banner" id="upload-banner">
						</form>
					</div>
				</div>
			@endif
		</div>
		<div class="main">
			<div class="profile-avatar">
				<img src="{{asset('pictures/anh_dai_dien/'.$taikhoan->hasNguoiDung->anh_dai_dien)}}" alt="">
				@if (Auth::user()->ten_tai_khoan == $taikhoan->ten_tai_khoan)
					<div class="edit-profile-avatar-button edit-profile-image">
						<div>
							<p class="fa fa-camera-retro -icon"></p>
							<p>Thay đổi ảnh đại diện</p>
							<form class="uploader" action="{{route('post_taikhoan.anh.capnhat', 'anh_dai_dien')}}" method="POST" enctype="multipart/form-data">
								@csrf
								<input type="file" name="upload_avatar" id="upload-avatar">
							</form>
						</div>
					</div>
				@endif
			</div>
		</div>
	</div>
	<!-- End profile image (banner and avatar) -->


	<!-- Profile navbar -->
	<div class="profile-navbar">
		<div class="main">
			<ul class="navbar-list">
				{{-- profile-link-active --}}
				<li class="{{Request::is('taikhoan/'.$taikhoan->ten_tai_khoan) ? 'profile-link-active' : ''}}">
					<a class="luan_link" href="{{ route('trangcanhan.index', [$taikhoan->ten_tai_khoan]) }}">
						<span>Bài viết</span><span></span>
					</a>
				</li>
				{{-- @if (Auth::user()->ma_tai_khoan == $taikhoan->ma_tai_khoan)
					<li>
						<a class="luan_link" href="#">
							<span>Thích</span><span>0</span>
						</a>
					</li>
				@endif --}}
				
				<li class="{{Request::is('taikhoan/'.$taikhoan->ten_tai_khoan.'/nhom*') ? 'profile-link-active' : ''}}">
					<a class="luan_link" href="{{route('trangcanhan.nhom', ['username'=>$taikhoan->ten_tai_khoan])}}">
						<span>Nhóm</span><span></span>
					</a>
				</li>
				<li>
					<a class="luan_link" href="{{route('nguoidung.tep.index',[$taikhoan->ten_tai_khoan])}}">
						<span>Tệp</span>
						{{-- <span>2</span> --}}
					</a>
				</li>
				@if (Auth::user()->ma_tai_khoan != $taikhoan->ma_tai_khoan)
				<li style="float: right">
					<a id="report-this-account-button" class="luan_link" href="#/">
						<span>Báo cáo</span>
					</a>
				</li>
				<li style="float: right">
					<a id="block-this-account-button" class="luan_link" href="#/">
						<span>Chặn</span>
					</a>
				</li>
				@endif
				<li style="float: right">
					<a class="luan_link js-user-chat-button" href="javascript:void(0)">
						<span class="">Nhắn tin</span>
					</a>
					<div class="user-chat-info-box">
							@if (Auth::user()->ma_tai_khoan != $taikhoan->ma_tai_khoan)
								<div>
									<a class="js-send-message-to-this-person-button" href="javascript:void(0)" data-userid = {{$taikhoan->ma_tai_khoan}}>Nhắn tin với {{'@'.$taikhoan->ten_tai_khoan}}</a>
								</div>
							@endif
							
							{{-- <div class="texting-user-list">
								<h3>Danh sách đang nhắn tin</h3>
								<div>
									<p><a href="">a</a></p>
									<p><a href="">as</a></p>
									<p><a href="">asdasd</a></p>
									<p><a href="">asdasdasdasd</a></p>
									<p><a href="">asdasdasdasdasd</a></p>
								</div>
							</div> --}}
						</div>
				</li>
				
			</ul>
		</div>
	</div>
	<!-- End profile navbar -->

	{{--  body --}}
	<div class="contentmain main">

		<div class="leftnav-profile-masterpage leftnav-profile sidebar">
			<div>
				<div class="profile-name">
					<h2>{{$taikhoan->hasNguoiDung->ho_ten_lot.' '.$taikhoan->hasNguoiDung->ten}}</h2>
					<p><a id="username-userid" data-userid = "{{$taikhoan->ma_tai_khoan}}" data-username = "{{$taikhoan->ten_tai_khoan}}" class="luan_link" href="{{route('trangcanhan.index', ['username'=>$taikhoan->ten_tai_khoan])}}">{{'@'.$taikhoan->ten_tai_khoan}}</a></p>

				</div>
				<div class="profile-bio">
					<p>{{$taikhoan->hasNguoiDung->gioi_thieu}} </p>
				</div>
				<div class="profile-primary-info">
					{{-- <p>
						<i class="fa fa-map-marker"></i>
						&nbsp;
						<span>Hồ Chí Minh</span>
					</p> --}}
					@if (Auth::user()->ma_tai_khoan == $taikhoan->ma_tai_khoan)
						<p>
							<i class="fa fa-user-secret"></i>
							&nbsp;
							<span>Tên ẩn danh:
								{{$taikhoan->hasNguoiDung->ten_an_danh}}
							</span>
						</p>
					@endif
					<p>
						<i class="fa fa-clock-o"></i>
						&nbsp;
						<span>Tham gia ngày: {{date_format($taikhoan->thoi_gian_tao, "d/m/Y")}}</span>
					</p>
					@if ($taikhoan->hasNguoiDung->ngay_sinh != null)
					<p>
						<i class="fa fa-calendar"></i>
						&nbsp;
						<span>Ngày sinh:
							{{date_format(date_create($taikhoan->hasNguoiDung->ngay_sinh), "d/m/Y")}}
						</span>
					</p>
					@endif
				</div>
				@if (Auth::user()->ten_tai_khoan == $taikhoan->ten_tai_khoan)
					<div id="edit-profile-button">
						<p class="edit-profile edit-name">
							<i class="fa fa-edit"></i>
							&nbsp;
							<a class="luan_link modal-open-button" href="#/" onclick="openModal('js-edit-profile-modal')">Chỉnh sửa thông tin hiển thị</a>
						</p>
					</div>
				@endif
			</div>
		</div>
		<!--  -->

		{{-- Nội dung chính (cột ở giữa) của trang cá nhân  --}}

		@yield('noidung_trangcanhan')

		{{-- End Nội dung chính (cột ở giữa) của trang cá nhân  --}}


		<!--  -->
		<div class="rightnav-profile-masterpage sidebar profile-group-rightnav">
			@yield('righnav-profile-masterpage')
		</div>

	</div>
	{{--  --}}
	<div class="clear"></div>

	@include('includes/trangcanhan/trangcanhan_modal')
	@include('includes/trangcanhan/upload_avatar_banner_modal')

	{{-- report modal --}}
	@include('includes/trangcanhan/report_modal')
	{{-- End report modal --}}


	{{-- user-chat-box --}}
	
	<div class="user-chat-box__modal">
		<div class="user-chat-box">
			<div class="user-chat-box__header">
				<h4>Chat với <span id="js-receiver" data-receiver-id=""></span> <i style="float: right;vertical-align: middle;" class="fa fa-times user-chat-box__modal__close-button"></i></h4>
			</div>
			<div class="user-chat-box__body">
				{{-- <div class="chat-item">
					<div class="chat-item__wrapper chat-item__right">
						<div class="chat-item__header"><h4>Ten ng gui</h4></div>
						<div class="chat-item__body">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis, voluptatum.</div>
					</div>
				</div>

				<div class="chat-item">
					<div class="chat-item__wrapper chat-item__left">
						<div class="chat-item__header"><h4>Ten ng gui</h4></div>
						<div class="chat-item__body">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis, voluptatum.</div>
					</div>
				</div>
				
				<div class="chat-item">
					<div class="chat-item__wrapper chat-item__right">
						<div class="chat-item__header"><h4>Ten ng gui</h4></div>
						<div class="chat-item__body">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis, voluptatum.</div>
					</div>
				</div>
				<div class="chat-item">
					<div class="chat-item__wrapper chat-item__left">
						<div class="chat-item__header"><h4>Ten ng gui</h4></div>
						<div class="chat-item__body">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis, voluptatum.</div>
					</div>
				</div> --}}

			</div>
			<div class="user-chat-box__footer">
				<textarea class="user-chat-box__footer__text-area" name="" placeholder="Nhập tin nhắn"></textarea>
				<button class="user-chat-box__footer__send-message-button user-chat-box__footer__button">Gửi tin nhắn</button>
				<button class="user-chat-box__footer__clear-message-button user-chat-box__footer__button" data-toID="">Xóa trò chuyện</button>
			</div>
		</div>
	</div>

	{{--  --}}

@endsection



@section('javascript')

	<script>
		var loaderPath = "{{ asset('pictures/luan/ajax-loader2.gif') }}";
    $('.myloader img').attr('src', loaderPath);
	</script>


	<script src="{{asset('js/luan/utilities/auto_expand_textarea.js')}}"></script>
	<script src="{{asset('js/luan/utilities/drag_to_scroll.js')}}"></script>
	<script src="{{asset('js/luan/utilities/open_close_modal.js')}}"></script>
	<script src="{{asset('js/jquery/jquery-validate.min.js')}}"></script>
	{{-- <script src="{{ asset('js/globaljs/varglobal.js') }}" charset="utf-8"></script> --}}
	<script src="{{asset('js/luan/profile.js')}}"></script>
	{{-- <script src="{{ asset('node_modules/socket.io/node_modules/socket.io-client/dist/socket.io.js') }}"></script> --}}
	<script src="{{asset('js/user-chat.js')}}" charset="utf-8"></script>
	
	@yield('trang_canhan_javascript')
@endsection
