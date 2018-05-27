@extends('master.masterpage')

@section('title')
	<title>Trang chủ</title>
@endsection

@section('css')
	<link rel="stylesheet" href="css/trangchu.css">
@endsection

@section('main')
	
	{{-- Hiện thông báo khi kích hoạt tài khoản thành công, cập nhật email mới thành công, (....) --}}
	<div class="home-alert {{session('success_message') ? 'alert-animate' : '' }}">
		<div class="message baomoi">
			<p class="baomoi">Thông báo: {{session('success_message')}}</p>
		</div>
	</div>
	{{-- END Hiện thông báo khi kích hoạt tài khoản thành công, cập nhật email mới thành công, (....) --}}

	<h1 class="haha">
		<p>Trang chủ</p>
	</h1>
	


@endsection
