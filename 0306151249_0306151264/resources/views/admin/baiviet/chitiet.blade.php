<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/lu/baiviet/baiviet.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/lu/baiviet/noidungbaiviet.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/includescss/navtopcss.css') }}">
	<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
	{{-- <link rel="stylesheet" href="{{asset('css/admin/admin-detail-post.css')}}"> --}}

	{{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/globalcss/cssglobal.css') }}"> --}}
	<style>
		.one-post {
			width: 560px;margin: 20px auto;
		}
	</style>
</head>
<body>

	<div class="mycontainer detail-post-container">
		<div class="detail-post-sidebar sidebar">a</div>
		<div class="one-post" style="background-color: transparent;">
			@for ($i = 0; $i < count($lstbaiviet) ; $i++)
				@include('includes.trangcanhan.post')
			@endfor
			{{-- <div>Xem thêm</div> --}}
		</div>
		<div class="detail-post-sidebar sidebar">a</div>

	</div>


	
	<script src="{{ asset('js/globaljs/varglobal.js') }}"></script>
	<script>
		// alert(link_host);
	</script>
</body>
</html>