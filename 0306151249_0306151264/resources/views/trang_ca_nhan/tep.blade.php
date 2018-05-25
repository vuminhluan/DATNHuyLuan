<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/includescss/navtopcss.css') }}">
	<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{ asset('css/luan/profile/file.css') }}">
	<script src="{{asset('js/jquery/jquery3.3.1.js')}}" charset="utf-8"></script>
</head>
<body>

	@include('includes.navtop')
	
	<div class="main">
		<div class="container">
			<div class="sidebar">
				<div class="">
					<h3 class="--title">Tệp</h3>
					<ul class="--files-menu">
						<li><a href="#/"><i class="fa fa-car"></i>Tất cả tệp</a></li>
						<li><a href="#/"><i class="fa fa-car"></i>Tệp được chia sẻ</a></li>
						<li><a href="#/"><i class="fa fa-car"></i>Tệp cá nhân</a></li>
						<li><a href="#/"><i class="fa fa-car"></i>Google Drive</a></li>
					</ul>
				</div>
			</div>
			<div class="files">asd</div>
		</div>
		<div class="clear"></div>
	</div>


















	@include('includes.footer')
	


	
</body>
</html>