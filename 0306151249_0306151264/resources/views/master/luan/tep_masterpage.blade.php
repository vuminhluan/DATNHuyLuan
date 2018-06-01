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
			{{-- Sidebar menu --}}
			<div class="sidebar">
				<div class="">
					<h3 class="--title">Tệp của tôi</h3>
					<ul class="--files-menu">
						<li><a class="link-hover1 active" href="{{ route('trangcanhan.tep', [$username]) }}"><img class="--item-icon" src="{{asset('myicons/tep/all-files.svg')}}" alt="">Tất cả tệp</a></li>
						<li><a class="link-hover1" href="{{ route('trangcanhan.tep', [$username, 'congkhai']) }}"><img class="--item-icon" src="{{ asset('myicons/tep/share.svg') }}" alt="">Tệp công khai</a></li>
						<li><a class="link-hover1" href="{{ route('trangcanhan.tep', [$username, 'riengtu']) }}"><img class="--item-icon" src="{{ asset('myicons/tep/private-files.svg') }}" alt="">Tệp cá nhân</a></li>
						<li><a class="link-hover1" href="#/"><img class="--item-icon" src="{{ asset('myicons/tep/google-drive.svg') }}" alt="">Google Drive</a></li>
					</ul>
				</div>
			</div>
			{{-- End sidebar menu --}}

			<div class="main-content">
				<div class="library">

					<div class="head">
						<form action="javascript: void(0)">
							<div class="search-box">
								<input class="search-files-input" type="text" placeholder="Tìm tệp">
								<button class="search-files-button"><i class="fa fa-search"></i></button>
							</div>
						</form>


						<div >
							<button class="open-upload-modal">Thêm tệp mới</button>
						</div>
					</div>
					
					@yield('file_list')
					

				</div>
			</div>

		</div>
		
	</div>

	<div class="clear"></div>




	{{-- Modal upload file --}}
	
	<div class="upload-modal">
		<div class="upload-modal-content">
			<div class="header">
				<h2>Thêm tệp</h2>
			</div>
			<div class="body">
				<form action="{{ route('trangcanhan.tep.tailen', $username) }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div>
						<p class="mybutton upload-modal-files-button">
							<input type="file" id="upload-modal-files" name="uploads[]" required multiple>
							<span>Chọn tệp từ máy tính</span>
						</p>
					</div>
					<br>
					
					<ul id="upload-list">
						{{-- <li class="upload-item">
							<div class="item-name">Quasi odit nobis iure suscipit pariatur sit harum excepturi iste omnis at nihil fugit voluptate quo vel modi, minima, magni, enim ipsa hic quisquam sed neque deserunt?</div>
							<div class="item-message"><i class="fa fa-times" title=""></i><i class="fa fa-check"></i></div>
						</li> --}}
					</ul>
					<br><br>
					<button class="save-file">Thêm tệp</button>
				</form>
			</div>
			<div class="footer">
				<button class="remove-all">Xóa tất cả</button>
				<button class="cancel-upload">Thoát</button>
			</div>
		</div>
	</div>

	{{-- End modal upload file --}}





















	@include('includes.footer')

	
	<script type="text/javascript" src="{{ asset('js/globaljs/varglobal.js') }}" charset="utf-8"></script>
	<script src="{{ asset('js/luan/file.js') }}"></script>
	


	
</body>
</html>