<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	@yield('title')
	{{-- Biểu tượng icon cho trang web --}}
	<link rel='icon' href='favicon.ico' type='image/x-icon'/ >

	<link rel="stylesheet" type="text/css" href="{{ asset('css/navtop.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	@yield('css')

</head>
<body>

	@include('includes.navtop')

	@yield('main')



	@include('includes.footer')
	{{-- Chưa có footer :D --}}

	<script src="{{asset('js/jquery/jquery3.3.1.js')}}" charset="utf-8"></script>
	@yield('javascript')


</body>
</html>
