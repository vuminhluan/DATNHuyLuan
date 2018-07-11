@extends('master.luan.trangcanhan_masterpage')

@section('title')
	<title>{{'@'.$taikhoan->ten_tai_khoan}} - Tất cả các Nhóm</title>
@endsection

@section('profile_css')
	<link rel="stylesheet" href="{{asset('css/luan/profile/profile_all_groups.css')}}">

@endsection

@section('noidung_trangcanhan')

	<div class="content profile-all-group-content">

		<div id="profile-all-group-list">
			
			@php
				$total = count($tatca_nhom);
				// echo "<pre>";
				// print_r($tatca_nhom);
			@endphp
			@if (count($tatca_nhom['CV02']) <= 0 && count($tatca_nhom['CV07']) <= 0 )
				<p>Hiện tại bạn chưa có nhóm nào</p>
			@endif
			@foreach ($tatca_nhom as $nhom_theo_chucvu)
				@if (count($nhom_theo_chucvu) > 0)

					<div class="groups-by-member-role">
						<div class="role-title">
							@if ($taikhoan->ma_tai_khoan != Auth::user()->ma_tai_khoan)
								<h3>Nhóm {{$taikhoan->hasNguoiDung->ten}} làm {{$nhom_theo_chucvu[0]->ten_chuc_vu}} <span class="collapse-groups-box-button"><i class="fa fa-bars"></i></span></h3>
							@else
								<h3>Nhóm tôi làm {{$nhom_theo_chucvu[0]->ten_chuc_vu}} <span class="collapse-groups-box-button"><i class="fa fa-bars"></i></span></h3>
							@endif
						</div>
						<div class="groups-box">
							<ul class="group-list">
								@for ($i = 0; $i < count($nhom_theo_chucvu); $i++)
									<li>
										<div class="profile-group-card">
											@if ($nhom_theo_chucvu[$i]->anh != null && $nhom_theo_chucvu[$i]->anh != "no")
												<a href="{{ route('nhom.index', [$nhom_theo_chucvu[$i]->ma_nhom]) }}"><img src="{{asset($nhom_theo_chucvu[$i]->anh)}}" alt=""></a>
											@else
												<a href="#/"><img src="{{asset('pictures/anh_bia/default-banner.png')}}" alt=""></a>
											@endif
											
											<div class="group-name-and-unread-post-counter">
												<a href="{{ route('nhom.index', [$nhom_theo_chucvu[$i]->ma_nhom]) }}" class="luan_link">
													<h3>{{$nhom_theo_chucvu[$i]->ten_nhom}}</h3>
													<span>{{$nhom_theo_chucvu[$i]->soluong_thanhvien}} thành viên</span>
													{{-- <span>9 bài đăng mới chưa đọc</span> --}}
												</a>
											</div>
											<div class="group-description">
												{{$nhom_theo_chucvu[$i]->gioi_thieu_nhom}}
											</div>
											{{-- <button class="group-action-button"></button>
											<div class="group-list-context-menu">
												<span class="caret caret-outer"></span>
												<span class="caret caret-inner"></span>
												<ul>
													<li>Rời khỏi nhóm</li>
												</ul>
											</div> --}}

										</div>
									</li>
								@endfor
							</ul>
						</div>
					</div>


					{{-- @for ($i = 0; $i < count($nhom_theo_chucvu); $i++)
						{{$nhom_theo_chucvu[$i]->ten_nhom}}
					@endfor
					<br> --}}
				@endif
			@endforeach
			<!-- admin group -->
			{{-- <div id="">
				<div>
					<h3>Nhóm bạn làm quản trị</h3>
				</div>
				<div>
					<ul class="group-list">

						<li>
							<div class="profile-group-card">
								<a href="#/"><img src="{{asset('pictures/anh_bia/default-banner.png')}}" alt=""></a>
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

			</div> --}}
			<!-- End admin group -->


			<!-- joined group -->
			{{-- <div id="">
				<div>
					<h3>Nhóm bạn tham gia</h3>
				</div>
				<div>
					<ul class="group-list">

						<li>
							<div class="profile-group-card">
								<a href="#/"><img src="{{asset('pictures/anh_bia/default-banner.png')}}" alt=""></a>
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

			</div> --}}
			<!-- End joined group -->

		</div>

	</div>



	@section('righnav-profile-masterpage')
		<!-- Create group -->
		{{-- <div class="profile-create-groups">
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
		</div> --}}
		<!-- End Create group -->

		<!-- offered group -->
		{{-- <div class="profile-offered-groups">
			<div>
				<h3>Nhóm đề xuất</h3>
			</div>
			<div>
				<ul>
					<li>
						<a href="#/"><img class="-banner" src="{{asset('pictures/anh_bia/default-banner.png')}}" alt=""></a>
						<div>
							<div class="-name">
								<p ><a href="#/">Tên nhóm tên nhóm tên nhóm tên nhóm tên nhóm tên nhóm tên nhóm tên nhóm tên nhóm tên nhóm tên nhóm</a></p>
								<span>1590 thành viên</span>
							</div>
							<div class="-join-button"><a href="#/"><i class="fa fa-plus"></i> Tham gia</a></div>
						</div>
					</li>
					<li>
						<a href="#/"><img class="-banner" src="{{asset('pictures/anh_bia/default-banner.png')}}" alt=""></a>
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
		</div> --}}
		<!-- offered group -->


	@endsection

@endsection

@section('trang_canhan_javascript')
	<script>
		$(document).ready(function() {
			$('.role-title').click(function() {
				var collapsedDiv = $(this).parents('.groups-by-member-role').find('.groups-box');
				$(collapsedDiv).slideToggle('fast');
			});
		});
	</script>
@endsection
