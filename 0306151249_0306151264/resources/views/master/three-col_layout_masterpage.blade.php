<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	@yield('title')
	
	<link href="{{asset('css/bootstrap3.min.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/includescss/navtopcss.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/three-col-layout.css') }}">
	@yield('css')
</head>
<body>


	<div class="three-col-layout">
		<div class="sidebar-col">
			@yield('sidebar-col-left')
		</div>
		<div class="middle-col">
			@yield('middle-col')
		</div>
		<div class="sidebar-col">
			@yield('sidebar-col-right')
		</div>
	</div>


	<script type="text/javascript" src="{{asset('js/jquery/jquery3.3.1.js')}}"></script>
  <script src="{{asset('js/jquery/jquery-validate.min.js')}}" charset="utf-8"></script>
  <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{ asset('js/globaljs/varglobal.js') }}"></script>
	@yield('js')
</body>
</html>