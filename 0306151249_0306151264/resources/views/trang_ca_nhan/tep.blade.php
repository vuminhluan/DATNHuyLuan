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
						<li><a class="link-hover1 active" href="#/"><img class="--item-icon" src="{{asset('myicons/tep/all-files.svg')}}" alt="">Tất cả tệp</a></li>
						<li><a class="link-hover1" href="#/"><img class="--item-icon" src="{{ asset('myicons/tep/share.svg') }}" alt="">Tệp công khai</a></li>
						<li><a class="link-hover1" href="#/"><img class="--item-icon" src="{{ asset('myicons/tep/private-files.svg') }}" alt="">Tệp cá nhân</a></li>
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
					
					
					<ul class="file-list">
						
						<li>
							<span>Sắp xếp</span>
							<select name="sort" id="sort">
								{{-- des - giảm => Ngày gần nhất -> ngày xa hơn (mới nhất) --}}
								{{-- asc - tăng => Ngày cũ nhất -> ngày mới hơn (cũ nhất)--}}
								<option value="desc" selected>Mới nhất</option>
								<option value="asc" >Cũ nhất</option>
							</select>
						</li>
						<li id="bbb" class="item link-hover1">
							<div>
								<img class="pos-absolute item-icon" src="{{asset('myicons/tep/file.svg')}}" alt="">
							</div>
							<div>
								<p><a href="#/">aaa.rar</a></p>
							</div>
							<div class="item-date-created" data-date="2018-05-25"><p>25/05/2018</p></div>
							<div class="item-action">
								<span>
									<i class="fa fa-chevron-down"></i>
									<div class="action">
										<ul>

											<li>Đổi tên</li>
											<li>Đăng bài viết với tệp này</li>
											<li>Tải</li>
											<li>Xóa</li>
											<li>Công khai</li>
											<li>Riêng tư</li>
										</ul>
									</div>

								</span>
							</div>
						</li>

						<li id="aaa" class="item link-hover1">
							<div>
								<img class="pos-absolute item-icon" src="{{asset('myicons/tep/file.svg')}}" alt="">
							</div>
							<div>
								<p><a href="#/">Lorem_ipsum_dolor.txt</a></p>
							</div>
							<div class="item-date-created" data-date="2018-05-10"><p>10/05/2018</p></div>
							<div class="item-action">
								<span>
									<i class="fa fa-chevron-down"></i>
									<div class="action">
										<ul>
											<li>Đổi tên</li>
											<li>Đăng bài viết với tệp này</li>
											<li>Tải</li>
											<li>Xóa</li>
											<li>Công khai</li>
											<li>Riêng tư</li>
										</ul>
									</div>

								</span>
							</div>
						</li>

						<li class="item link-hover1">
							<div>
								<img class="pos-absolute item-icon" src="{{asset('myicons/tep/file.svg')}}" alt="">
							</div>
							<div>
								<p><a href="#/">xxx.rar</a></p>
							</div>
							<div class="item-date-created" data-date="2018-04-10"><p>10/04/2018</p></div>
							<div class="item-action">
								<span>
									<i class="fa fa-chevron-down"></i>
									<div class="action">
										<ul>
											<li>Đổi tên</li>
											<li>Đăng bài viết với tệp này</li>
											<li>Tải</li>
											<li>Xóa</li>
											<li>Công khai</li>
											<li>Riêng tư</li>

										</ul>
									</div>

								</span>
							</div>
						</li>

					</ul>
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
				<form action="{{ route('trangcanhan.tep.tailen') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div>
						<p class="mybutton upload-modal-files-button">
							<input type="file" id="upload-modal-files" name="uploads[]" multiple>
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