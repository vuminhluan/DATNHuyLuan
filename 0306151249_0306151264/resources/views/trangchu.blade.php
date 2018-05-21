@extends('master.masterpage')

@section('title')
	<title>Trang chủ</title>
@endsection

@section('css')
	{{-- <link rel="stylesheet" href="css/luan.css"> --}}
@endsection

@section('main')


	<h1 class="haha">
		Trang chủ
	

		{{-- test message, mốt thấy nhớ XÓA dùm tao nha :))) --}}
		@if(session('update_email_message'))
			<br><br><br>
			<p>{{session('update_email_message')}}</p>
		@endif


	</h1>
@endsection
