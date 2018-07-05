<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	@yield('title')
	{{-- Biểu tượng icon cho trang web --}}
	<link rel='icon' href='{{ asset('pictures/logo/favicon.png') }}' type='image/png'/ >

	<link rel="stylesheet" type="text/css" href="{{ asset('css/includescss/navtopcss.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/lu/baiviet/baiviet.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/globalcss/cssglobal.css') }}">

	{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
	<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
	{{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script> --}}
	<script type="text/javascript" src="{{ asset('js/globaljs/varglobal.js') }}" charset="utf-8"></script>
	<script src="{{asset('js/jquery/jquery3.3.1.js')}}" charset="utf-8"></script>
	<script src="https://unpkg.com/ionicons@4.1.2/dist/ionicons.js"></script>
	{{-- <script src="{{ asset('js/libs/ionicons.js') }}"></script> --}}
	
	{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}

	@yield('css')

</head>
<body id="bodymaster">
	@include('includes.navtop')

	@yield('main')

	<div class="clear"></div>
	@include('includes.footer')
	{{-- Chưa có footer :D --}}
	{{-- <script src="{{ asset('node_modules/socket.io/node_modules/socket.io-client/dist/socket.io.js') }}"></script> --}}
	<script>
		// alert('asd');
		// history.pushState(null, null, document.URL);
		// window.addEventListener('popstate', function () {
		//     history.pushState(null, null, document.URL);
		// });
	</script>
	<script type="text/javascript" src="{{asset('js/libs/moment.min.js')}}"></script>
	@yield('javascript')

  <!-- Modal content -->
 {{-- @include ('includes.content-menu-popup'); --}}

	{{-- <div id="masterpopup" style="display: block;" class="modal"></div> --}}
	@extends('master.nodeserver_masterpage')
</body>
</html>
