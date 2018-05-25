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
					</div>
					
					<ul class="file-list">
						<li>
							<span>Sắp xếp</span>
							<select name="sort" id="sort">
								<option value="1">Mới nhất</option>
								<option value="0">Cũ nhất</option>
							</select>
						</li>
						

						<li class="item link-hover1">
							<div>
								<img class="pos-absolute item-icon" src="{{asset('myicons/tep/file.svg')}}" alt="">
							</div>
							<div>
								<p><a href="#/">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, saepe?</a></p>
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
								<p><a href="#/">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, saepe?</a></p>
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
								<p><a href="#/">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, saepe?</a></p>
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


















	@include('includes.footer')


	<script src="{{ asset('js/luan/file.js') }}"></script>
	


	
</body>
</html>