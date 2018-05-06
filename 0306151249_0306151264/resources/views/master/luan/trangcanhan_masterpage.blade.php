@extends('master.masterpage')

@section('css')
	<link rel="stylesheet" href="{{asset('css/luan/trangcanhan_masterpage.css')}}">
@endsection

@section('main')

	<div class="profile-image">
		<div class="profile-banner">
			<img src="{{asset('pictures/luan/test2.png')}}" alt="">
			<div class="edit-profile-banner-button edit-profile-image">
				<div>
					<p class="fa fa-camera-retro -icon"></p>
					<p>Thay đổi ảnh bìa</p>
					<input type="file" class="uploader" id="upload-banner">
				</div>
			</div>
		</div>
		<div class="main">
			<div class="profile-avatar">
				<img src="{{asset('pictures/luan/test1.png')}}" alt="">
				<div class="edit-profile-avatar-button edit-profile-image">
					<div>
						<p class="fa fa-camera-retro -icon"></p>
						<p>Thay đổi ảnh đại diện</p>
						<input type="file" class="uploader" id="upload-avatar">
					</div>
				</div>
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
					<a class="luan_link" href="profile-all-group.html">
						<span>Nhóm</span><span>2</span>
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
					<h2>Người Dùng A</h2>
					<p><a class="luan_link" href="#">@nguoidunga</a></p>

				</div>
				<div class="profile-bio">
					<p>Giới thiệu bản thân ở đây. Tóm tắt khoảng 120 chữ </p>
				</div>
				<div class="profile-primary-info">
					<p>
						<i class="fa fa-map-marker"></i>
						&nbsp;
						<span>Hồ Chí Minh</span>
					</p>
					<p>
						<i class="fa fa-clock-o"></i>
						&nbsp;
						<span>Tham gia ngày 04/04/2018</span>
					</p>
					<p>
						<i class="fa fa-calendar"></i>
						&nbsp;
						<span>Ngày sinh: 14/07/1997</span>
					</p>
				</div>
				<div class="profile-some-images">
					<i class="fa fa-image"></i>
					&nbsp;
					<a class="luan_link" href="#/">Hình ảnh</a>
					<ul>
						<li><a class="luan_link" href="#/"><img src="{{asset('pictures/luan/test1.png')}}" alt=""></a></li>
						<li><a class="luan_link" href="#/"><img src="{{asset('pictures/luan/test1.png')}}" alt=""></a></li>
						<li><a class="luan_link" href="#/"><img src="{{asset('pictures/luan/test1.png')}}" alt=""></a></li>
						<li><a class="luan_link" href="#/"><img src="{{asset('pictures/luan/test1.png')}}" alt=""></a></li>
					</ul>
				</div>
				<div id="edit-profile-button">
					<p class="edit-profile edit-name">
						<i class="fa fa-edit"></i>
						&nbsp;
						<a class="luan_link" href="#/" onclick="openModal('js-edit-profile-modal')">Chỉnh sửa thông tin hiển thị trang cá nhân.</a>
					</p>
				</div>
			</div>
		</div>
		<!--  -->
		<div class="content">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum, veritatis.
		</div>
		<!--  -->
		<div class="rightnav-profile-masterpage sidebar">
		</div>

	</div>
	{{--  --}}





	@yield('noidung_trangcanhan')

@endsection
