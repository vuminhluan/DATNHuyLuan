@extends('master.masterpage')

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

@yield('noidung_trangcanhan')

@endsection
