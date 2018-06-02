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

	<div class="file-alert {{session('message') ? 'alert-animate' : '' }}">
		<div class="message">
			<p class="baomoi">{{session('message')}}</p>
		</div>
	</div>
	
	<div class="main">
		<div class="container">
			{{-- Sidebar menu --}}
			<div class="sidebar">
				<div class="">
					<h3 class="--title" data-username = "{{Auth::user()->ten_tai_khoan}}">Tệp của tôi</h3>
					<ul class="--files-menu">
						<li><a  class="link-hover1 prevent-reload active" href="{{ route('nguoidung.tep.index', [Auth::user()->ten_tai_khoan]) }}"><img class="--item-icon" src="{{asset('myicons/tep/all-files.svg')}}" alt="">Tất cả tệp</a></li>
						<li><a  class="link-hover1 prevent-reload" href="{{ route('nguoidung.tep.index', [$username, 'congkhai']) }}"><img class="--item-icon" src="{{ asset('myicons/tep/share.svg') }}" alt="">Tệp công khai</a></li>
						<li><a  class="link-hover1 prevent-reload" href="{{ route('nguoidung.tep.index', [Auth::user()->ten_tai_khoan, 'riengtu']) }}"><img class="--item-icon" src="{{ asset('myicons/tep/private-files.svg') }}" alt="">Tệp cá nhân</a></li>
						<li><a  class="link-hover1 prevent-reload" href="#/"><img class="--item-icon" src="{{ asset('myicons/tep/google-drive.svg') }}" alt="">Google Drive</a></li>
					</ul>
				</div>
			</div>
			{{-- End sidebar menu --}}

			<div class="main-content">
				<div class="library">

					<div class="head">
						<form action="{{ route('nguoidung.tep.index', [Auth::user()->ten_tai_khoan]) }}">
							<div class="search-box">
								<input class="search-files-input" name="filename_keyword" type="text" placeholder="Tìm tệp">
								<input type="text" class="last-segment" name="mode" hidden>
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
				<form action="{{ route('nguoidung.tep.tailen', $username) }}" method="POST" enctype="multipart/form-data">
					@csrf
					<input type="text" class="last-segment" name="mode" hidden>
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


	<div class="change-name-modal">
		<div class="header">
			<h2>Đổi tên tệp <img style="vertical-align: middle; display: none;" src="{{asset('pictures/luan/ajax-loader.gif')}}" alt=""></h2>
			<span class="close-change-name-modal"><i class="fa fa-times"></i></span>
		</div>
		<div class="body">
			<form id="change-name-form" action="{{ route('nguoidung.tep.capnhat', ['taikhoan111', 'TEP0000001', 'doiten' ]) }}" method="GET">
				<input type="text" id="filename" name="new_filename" required>
				<button>Đổi tên</button>
			</form>
		</div>
	</div>





















	@include('includes.footer')

	
	<script type="text/javascript" src="{{ asset('js/globaljs/varglobal.js') }}" charset="utf-8"></script>
	<script src="{{ asset('js/luan/file.js') }}"></script>
	


	
</body>
</html>