@extends('master.masterpage')

@section('title')
	<title>Trang chủ</title>
@endsection

@section('css')
	<link rel="stylesheet" href="css/trangchu.css">
@endsection

@section('main')


	<h1 class="haha">
		<p>Trang chủ</p>
	

		{{-- test message, mốt thấy nhớ XÓA dùm tao nha :))) --}}
		@if(session('update_email_message'))
			<br><br><br>
			<p>{{session('update_email_message')}}</p>
		@endif
		

	</h1>
	<div class="contact-alert {{session('success_message') ? 'alert-animate' : '' }}">
		<div class="message baomoi">
			<p class="baomoi">Thông báo ở đây{{session('success_message')}}</p>
		</div>
	</div>


@endsection
