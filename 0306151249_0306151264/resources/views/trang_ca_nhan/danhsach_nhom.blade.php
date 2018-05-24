@extends('master.luan.trangcanhan_masterpage')

@section('title')
	<title>{{'@'.$taikhoan->ten_tai_khoan}} - Tất cả các nhóm tham gia</title>
@endsection

@section('profile_css')
	<link rel="stylesheet" href="{{asset('css/luan/profile/profile_all_groups.css')}}">

@endsection

@section('noidung_trangcanhan')

	<div class="content profile-all-group-content">

		<div id="profile-all-group-list">

			<!-- pinned group -->
			<div id="">
				<div>
					<h3 class="-kind-name">Nhóm được ghim <!-- <button class="-kind-list-action-button"></button> --></h3>
				</div>
				<div>
					<ul class="group-list" >
						<li>
							<div class="profile-group-card">
								<a href="#/"><img src="{{asset('pictures/luan/test1.png')}}" alt=""></a>
								<div class="group-name-and-unread-post-counter">
									<a href="" class="luan_link">
										<h3>Tên group Tên group Tên group Tên group Tên group Tên group Tên group</h3>
										<span>11.999 thành viên</span>
										<span>9 bài đăng mới chưa đọc</span>
									</a>
								</div>

								<div class="group-description">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore laborum sit, laboriosam ducimus molestias beatae unde sint perferendis officiis iusto.
								</div>
								<button class="group-action-button"></button>
								<div class="group-list-context-menu">
									<span class="caret caret-outer"></span>
									<span class="caret caret-inner"></span>
									<ul>
										<li>Bỏ ghim</li>
										<li>Rời khỏi nhóm</li>
										<li>Chặn nhóm</li>
									</ul>
								</div>

							</div>
						</li>

						<li>
							<div class="profile-group-card">
								<a href="#/"><img src="{{asset('pictures/luan/test1.png')}}" alt=""></a>
								<div class="group-name-and-unread-post-counter">
									<a href="" class="luan_link">
										<h3>Tên group Tên group Tên group Tên group Tên group Tên group Tên group</h3>
										<span>11.999 thành viên</span>
										<span>9 bài đăng mới chưa đọc</span>
									</a>
								</div>
								<div class="group-description">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore laborum sit, laboriosam ducimus molestias beatae unde sint perferendis officiis iusto.
								</div>
								<button class="group-action-button"></button>
								<div class="group-list-context-menu">
									<span class="caret caret-outer"></span>
									<span class="caret caret-inner"></span>
									<ul>
										<li>Bỏ ghim</li>
										<li>Rời khỏi nhóm</li>
										<li>Chặn nhóm</li>
									</ul>
								</div>

							</div>
						</li>

						<li>
							<div class="profile-group-card">
								<a href="#/"><img src="{{asset('pictures/luan/test1.png')}}" alt=""></a>
								<div class="group-name-and-unread-post-counter">
									<a href="" class="luan_link">
										<h3>Tên group Tên group Tên group Tên group Tên group Tên group Tên group</h3>
										<span>11.999 thành viên</span>
										<span>9 bài đăng mới chưa đọc</span>
									</a>
								</div>
								<div class="group-description">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore laborum sit, laboriosam ducimus molestias beatae unde sint perferendis officiis iusto.
								</div>
								<button class="group-action-button"></button>
								<div class="group-list-context-menu">
									<span class="caret caret-outer"></span>
									<span class="caret caret-inner"></span>
									<ul>
										<li>Bỏ ghim</li>
										<li>Rời khỏi nhóm</li>
										<li>Chặn nhóm</li>
									</ul>
								</div>

							</div>
						</li>

						<li>
							<div class="profile-group-card">
								<a href="#/"><img src="{{asset('pictures/luan/test1.png')}}" alt=""></a>
								<div class="group-name-and-unread-post-counter">
									<a href="" class="luan_link">
										<h3>Tên group Tên group Tên group Tên group Tên group Tên group Tên group</h3>
										<span>11.999 thành viên</span>
										<span>9 bài đăng mới chưa đọc</span>
									</a>
								</div>
								<div class="group-description">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore laborum sit, laboriosam ducimus molestias beatae unde sint perferendis officiis iusto.
								</div>
								<button class="group-action-button"></button>
								<div class="group-list-context-menu">
									<span class="caret caret-outer"></span>
									<span class="caret caret-inner"></span>
									<ul>
										<li>Bỏ ghim</li>
										<li>Rời khỏi nhóm</li>
										<li>Chặn nhóm</li>
									</ul>
								</div>

							</div>
						</li>

						<li>
							<div class="profile-group-card">
								<a href="#/"><img src="{{asset('pictures/luan/test1.png')}}" alt=""></a>
								<div class="group-name-and-unread-post-counter">
									<a href="" class="luan_link">
										<h3>Tên group Tên group Tên group Tên group Tên group Tên group Tên group</h3>
										<span>11.999 thành viên</span>
										<span>9 bài đăng mới chưa đọc</span>
									</a>
								</div>
								<div class="group-description">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore laborum sit, laboriosam ducimus molestias beatae unde sint perferendis officiis iusto.
								</div>
								<button class="group-action-button"></button>
								<div class="group-list-context-menu">
									<span class="caret caret-outer"></span>
									<span class="caret caret-inner"></span>
									<ul>
										<li>Bỏ ghim</li>
										<li>Rời khỏi nhóm</li>
										<li>Chặn nhóm</li>
									</ul>
								</div>

							</div>
						</li>

					</ul>
				</div>

			</div>
			<!-- End pinned group -->

			<!-- admin group -->
			<div id="">
				<div>
					<h3>Nhóm bạn làm quản trị</h3>
				</div>
				<div>
					<ul class="group-list">

						<li>
							<div class="profile-group-card">
								<a href="#/"><img src="{{asset('pictures/luan/test1.png')}}" alt=""></a>
								<div class="group-name-and-unread-post-counter">
									<a href="" class="luan_link">
										<h3>Tên group Tên group Tên group Tên group Tên group Tên group Tên group</h3>
										<span>11.999 thành viên</span>
										<span>9 bài đăng mới chưa đọc</span>
									</a>
								</div>
								<div class="group-description">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore laborum sit, laboriosam ducimus molestias beatae unde sint perferendis officiis iusto.
								</div>
								<button class="group-action-button"></button>
								<div class="group-list-context-menu">
									<span class="caret caret-outer"></span>
									<span class="caret caret-inner"></span>
									<ul>
										<li>Bỏ ghim</li>
										<li>Rời khỏi nhóm</li>
										<li>Chặn nhóm</li>
									</ul>
								</div>

							</div>
						</li>

					</ul>
				</div>

			</div>
			<!-- End admin group -->


			<!-- joined group -->
			<div id="">
				<div>
					<h3>Nhóm bạn tham gia</h3>
				</div>
				<div>
					<ul class="group-list">

						<li>
							<div class="profile-group-card">
								<a href="#/"><img src="{{asset('pictures/luan/test1.png')}}" alt=""></a>
								<div class="group-name-and-unread-post-counter">
									<a href="" class="luan_link">
										<h3>Tên group Tên group Tên group Tên group Tên group Tên group Tên group</h3>
										<span>11.999 thành viên</span>
										<span>9 bài đăng mới chưa đọc</span>
									</a>
								</div>
								<div class="group-description">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore laborum sit, laboriosam ducimus molestias beatae unde sint perferendis officiis iusto.
								</div>
								<button class="group-action-button"></button>
								<div class="group-list-context-menu">
									<span class="caret caret-outer"></span>
									<span class="caret caret-inner"></span>
									<ul>
										<li>Bỏ ghim</li>
										<li>Rời khỏi nhóm</li>
										<li>Chặn nhóm</li>
									</ul>
								</div>

							</div>
						</li>

					</ul>
				</div>

			</div>
			<!-- End joined group -->

		</div>

	</div>



	@section('righnav-profile-masterpage')
		<!-- Create group -->
		<div class="profile-create-groups">
			<div>
				<h3>Tạo nhóm mới</h3>
			</div>
			<div>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis, consequatur!</p>
				<!-- <a href="#/" class="create-group-button">Tạo nhóm</a> -->
			</div>
			<div>
				<a href="#/" class="create-group-button">Tạo nhóm</a>
			</div>
		</div>
		<!-- End Create group -->

		<!-- offered group -->
		<div class="profile-offered-groups">
			<div>
				<h3>Nhóm đề xuất</h3>
			</div>
			<div>
				<ul>
					<li>
						<a href="#/"><img class="-banner" src="{{asset('pictures/luan/test2.png')}}" alt=""></a>
						<div>
							<div class="-name">
								<p ><a href="#/">Tên nhóm tên nhóm tên nhóm tên nhóm tên nhóm tên nhóm tên nhóm tên nhóm tên nhóm tên nhóm tên nhóm</a></p>
								<span>1590 thành viên</span>
							</div>
							<div class="-join-button"><a href="#/"><i class="fa fa-plus"></i> Tham gia</a></div>
						</div>
					</li>
					<li>
						<a href="#/"><img class="-banner" src="{{asset('pictures/luan/test2.png')}}" alt=""></a>
						<div>
							<div class="-name">
								<p ><a href="#/">Tên nhóm tên nhóm tên nhóm tên nhóm tên nhóm</a></p>
								<span>1590 thành viên</span>
							</div>
							<div class="-join-button"><a href="#/" ><i class="fa fa-plus"></i> Tham gia</a></div>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<!-- offered group -->


	@endsection

@endsection
