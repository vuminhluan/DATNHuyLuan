@extends('master.masterpage')



@section('css')
	<link rel="stylesheet" href="{{asset('css/luan/profile/profile_masterpage.css')}}">
	<link rel="stylesheet" href="{{asset('css/luan/confirm-modal.css')}}">
	@yield('profile_css')
@endsection

@section('main')
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
			<ul>
				<li>
					<a class="luan_link" href="#">
						<span>Bài viết</span><span>12</span>
					</a>
				</li>
				<li>
					<a class="luan_link" href="#">
						<span>Thích</span><span>0</span>
					</a>
				</li>
				<li>
					<a class="luan_link" href="#">
						<span>Lưu</span><span>0</span>
					</a>
				</li>
				<li>
					<a class="luan_link" href="{{route('trangcanhan.nhom', ['username'=>'vuminhluan'])}}">
						<span>Nhóm</span><span>2</span>
					</a>
				</li>
				<li>
					<a class="luan_link" href="{{route('trangcanhan.nhom', ['username'=>'vuminhluan'])}}">
						<span>Tệp</span><span>2</span>
					</a>
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
					<p><a class="luan_link" href="{{route('trangcanhan.index', ['username'=>'vuminhluan'])}}">{{'@'.$taikhoan->ten_tai_khoan}}</a></p>

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
					<p>
						<i class="fa fa-clock-o"></i>
						&nbsp;
						<span>Tham gia ngày: {{date_format($taikhoan->thoi_gian_tao, "d/m/Y")}}</span>
					</p>
					@if (Auth::user()->nguoi_dung->ngay_sinh != null)
					<p>
						<i class="fa fa-calendar"></i>
						&nbsp;
						<span>Ngày sinh:
							{{date_format(date_create($taikhoan->hasNguoiDung->ngay_sinh), "d/m/Y")}}
						</span>
					</p>
					@endif
				</div>
				<div class="profile-some-images">
					<i class="fa fa-image"></i>
					&nbsp;
					<a class="luan_link" href="#/">Hình ảnh</a>
					<ul>
						<li><a class="luan_link" href="{{asset('pictures/luan/test1.png')}}" target="_blank"><img src="{{asset('pictures/luan/test1.png')}}" alt=""></a></li>
						<li><a class="luan_link" href="{{asset('pictures/luan/test1.png')}}"><img src="{{asset('pictures/luan/test1.png')}}" alt=""></a></li>
						<li><a class="luan_link" href="{{asset('pictures/luan/test1.png')}}"><img src="{{asset('pictures/luan/test1.png')}}" alt=""></a></li>
						<li><a class="luan_link" href="{{asset('pictures/luan/test1.png')}}"><img src="{{asset('pictures/luan/test1.png')}}" alt=""></a></li>
					</ul>
				</div>
				@if (Auth::user()->ten_tai_khoan == $taikhoan->ten_tai_khoan)
					<div id="edit-profile-button">
						<p class="edit-profile edit-name">
							<i class="fa fa-edit"></i>
							&nbsp;
							<a class="luan_link modal-open-button" href="#/" onclick="openModal('js-edit-profile-modal')">Chỉnh sửa thông tin hiển thị trang cá nhân.</a>
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

@endsection

@section('javascript')
	<script src="{{asset('js/luan/utilities/auto_expand_textarea.js')}}"></script>
	<script src="{{asset('js/luan/utilities/drag_to_scroll.js')}}"></script>
	<script src="{{asset('js/luan/utilities/open_close_modal.js')}}"></script>
	<script src="{{asset('js/jquery/jquery-validate.min.js')}}"></script>
	<script src="{{ asset('js/globaljs/varglobal.js') }}" charset="utf-8"></script>
	<script src="{{asset('js/luan/profile.js')}}"></script>

	@yield('trang_canhan_javascript')
@endsection
