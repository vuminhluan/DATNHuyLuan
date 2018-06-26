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
			<button class="btn btn-primary">A</button>	
		</div>
		<div class="middle-col">
			middle
		</div>
		<div class="sidebar-col">
			sidebar2
		</div>
	</div>



	<script src="{{ asset('js/globaljs/varglobal.js') }}"></script>
	@yield('js')
</body>
</html>