@extends('master.three-col_layout_masterpage')

@section('title')
	<title>Chi tiết nhóm</title>
@endsection

@section('css')
	<link rel="stylesheet" href="{{asset('css/admin/admin-detail-group.css')}}">
@endsection


{{-- Left sidebar --}}
@section('sidebar-col-left')
	
	<div class="detail-group-sidebar">

		<div class="card card-group">
			<div class="card__header card-group__header">
				{{-- <img src="{{ asset('pictures/anh_bia/default-banner.png') }}" alt=""> --}}
				<img src="{{ asset($group->anh) }}" alt="">
			</div>
			<div class="card__body card-group__body">
				<h4 class="card-group__name">{{$group->ten_nhom}}</h4><br>
				<small class="card-group__total-members"><span class="badge">{{$group->hasManyThanhVien->count()}}</span> thanh vien</small> |
				<small class="card-group__total-members"><span class="badge">{{$group->hasManyBaiViet->count()}}</span> bài viết</small>
				<div class="card-group__description">
					<p>Giới thiệu <i class="fa fa-caret-down text-6667a6 mybtn" rel="js-show-more-description__button"></i></p>
					<p rel="js-show-more-description__target">{{$group->gioi_thieu_nhom}}</p>
				</div>
			</div>
		</div>
		
		<div class="group-info">
			<span class="group-info__creator">Người tạo: {{'@'.$group->belongsToTaiKhoan->ten_tai_khoan}}</span><br>
			<span class="group-info__created_at" style="cursor: help;" title="03:03:03">Thời gian tạo: {{date_format($group->thoi_gian_tao,'d/m/Y')}}</span><br>
			<span class="group-info__kind">Loại: {{$group->ma_loai_nhom == "LN01" ? "Nhóm công khai" : "Nhóm kín"}}</span><br>
			<span class="group-info__kind">Mã gia nhập: {{$group->ma_gia_nhap}}</span><br>
			<span class="group-info__status">Trạng thái: 
				@if ($group->trang_thai == 1)
					<i title="Đang hoạt động" class="fa fa-check text-success"></i>
				@elseif($group->trang_thai == 0)
					<i title="Đã xóa" class="fa fa-times text-danger"></i>
				@elseif($group->trang_thai == 2)
					<i title="Bị khóa do vi phạm" class="fa fa-ban text-danger"></i>
				@endif
			</span><br>
		</div>

		<div class="block block__group-question">
			<div class="block__header" rel="js-toggle-block">
				<h4>Câu hỏi gia nhập nhóm</h4>
			</div>
			<div class="block__body block--padding block__body--hide" rel="js-toggle-block__target">
				<input class="form-control" rel="js-search-input" type="text" placeholder="Tìm..."><br>
				@php
					$questions = $group->hasManyCauHoiGiaNhap;
				@endphp
				<ul class="list-group block__list block__list--hover-overflow" rel="js-search-list">
			    @foreach ($questions as $question)
			    	<li class="list-group-item">{{$question->noi_dung_cau_hoi}}</li>
			    @endforeach
			  </ul> 
			</div>
		</div>
		
		<div class="block">
			<ul class="block__next-previous">
				

				@if ($next_and_prev_group_id['previous'])
					<li><a href="{{ route('admin.nhom.xem', [$next_and_prev_group_id['previous']]) }}"><i class="fa fa-chevron-left fa-2x"></i></a></li>
				@endif
				<li><a href="{{ route('trangchu') }}"><i class="fa fa-home fa-2x"></i></a></li>
				@if ($next_and_prev_group_id['next'])
					<li><a href="{{ route('admin.nhom.xem', [$next_and_prev_group_id['next']]) }}"><i class="fa fa-chevron-right fa-2x"></i></a></li>
				@endif
			</ul>
		</div>

	</div>
@endsection

{{-- Middle content --}}
@section('middle-col')
	<div class="middle-content">
		<div class="block block__middle block__group-members">
			<div class="block__header">
				<h4>Thành viên</h4>
			</div>
			<div class="block__body block--padding">
				<input class="form-control" id="search" type="text" placeholder="Tìm..">
			  <br>
			  <div class="block__list--hover-overflow">
			  	<table class="table table-bordered table-striped">
				    <thead>
				      <tr>
				        <th>Họ và tên</th>
				        <th>Tài khoản</th>
				        <th>Ngày vào</th>
				        <th>Số bài viết</th>
				      </tr>
				    </thead>
				    <tbody class="for-search">
				    	@php
								$members = $group->hasManyThanhVien;
							@endphp
							@foreach ($members as $member)
								@php
									$post_count = $member->where('ma_tai_khoan', $member->ma_tai_khoan)->first()->belongsToTaiKhoan->hasManyBaiViet->where('ma_chu_bai_viet', $group->ma_nhom)->count();
								@endphp
								<tr>
					        <td class="td-search">{{$member->belongsToTaiKhoan->hasNguoiDung->ho_ten_lot." ".$member->belongsToTaiKhoan->hasNguoiDung->ten}}</td>
					        <td>{{'@'.$member->belongsToTaiKhoan->ten_tai_khoan}}</td>
					        <td>{{date_format($member->thoi_gian_vao_nhom,'d/m/Y')}}</td>
					        <td>{{$post_count}}</td>
					      </tr>
							@endforeach
				      
				    </tbody>
				  </table>
			  </div>
			</div>
		</div>

		{{-- <div class="block block__middle block__posts">
			<div class="block__header">
				<h4>Bài viết</h4>
			</div>
			<div class="block__body block--padding">
				<input class="form-control" id="myInput" type="text" placeholder="Tìm..">
			  <br>
			  <div class="block__list--hover-overflow">
			  	<table class="table table-bordered table-striped">
				    <thead>
				      <tr>
				        <th>Họ và tên</th>
				        <th>Tài khoản</th>
				        <th>Ngày vào</th>
				        <th>Số bài viết</th>
				      </tr>
				    </thead>
				    <tbody id="myTable">
				    	@php
								$posts = $group->hasManyBaiViet;
							@endphp
							@foreach ($posts as $post)
								<tr>
					        <td>{{$post->ma_nguoi_viet}}</td>
					        <td>@taikhoan111</td>
					        <td>30/12/2018</td>
					        <td>10</td>
					      </tr>
							@endforeach
				      
				    </tbody>
				  </table>
			  </div>
			</div>
		</div> --}}

	</div>
@endsection


{{-- Right sidebar --}}
@section('sidebar-col-right')
	<div class="detail-group-sidebar">

		<div class="block block__adnmin-list">
			<div class="block__header" rel="js-toggle-block">
				<h4>Quản trị viên</h4>
			</div>
			<div class="block__body block--padding" rel="js-toggle-block__target">
				<input class="form-control" rel="js-search-input" type="text" placeholder="Tìm..."><br>
				{{-- @php
					$admins = $group->hasManyThanhVien->where('ma_chuc_vu', 'CV01');
				@endphp --}}
				<ul class="list-group block__list block__list--hover-overflow" rel="js-search-list">
			    
			    @foreach ($operators as $operator)
			    	@if ($operator->ma_chuc_vu == "CV02")
			    		<li class="list-group-item">{{$operator->ho_ten_lot." ".$operator->ten}}</li>
			    	@endif
			    	
			    @endforeach
			  </ul> 
			</div>
		</div>
		
		@php
			$censors_post = $group->hasManyThanhVien->where('ma_chuc_vu', 'CV04');
		@endphp
		<div class="block block__censor-post-list">
			<div class="block__header"  rel="js-toggle-block">
				<h4>Người phê duyệt bài viết</h4>
			</div>
			<div class="block__body block--padding block__body--hide" rel="js-toggle-block__target">
				<input class="form-control" rel="js-search-input" type="text" placeholder="Tìm..."><br>
				<ul class="list-group block__list block__list--hover-overflow" rel="js-search-list">
			    @foreach ($operators as $operator)
			    	@if ($operator->ma_chuc_vu == "CV04")
			    		<li class="list-group-item">{{$operator->ho_ten_lot." ".$operator->ten}}</li>
			    	@endif
		    	
		    	@endforeach
			  </ul>
			</div>

		</div>
		@php
			$censors_member = $group->hasManyThanhVien->where('ma_chuc_vu', 'CV04');
		@endphp
		<div class="block block__censor-member-list">
			<div class="block__header"  rel="js-toggle-block">
				<h4>Người phê duyệt thành viên</h4>
			</div>
			<div class="block__body block--padding block__body--hide" rel="js-toggle-block__target">
			
				<input class="form-control" rel="js-search-input" type="text" placeholder="Tìm..."><br>
				<ul class="list-group block__list block__list--hover-overflow" rel="js-search-list">
			    @foreach ($operators as $operator)
			    	@if ($operator->ma_chuc_vu == "CV03")
			    		<li class="list-group-item">{{$operator->ho_ten_lot." ".$operator->ten}}</li>
			    	@endif
			    	
			    @endforeach
			  </ul> 
				
			</div>

		</div>

	</div>
@endsection


@section('js')
	<script>
		$(document).ready(function() {

			$('[rel=js-show-more-description__button]').click(function() {
				$('[rel=js-show-more-description__target]').slideToggle('fast');
			});

			$('[rel=js-toggle-block]').click(function() {
				$(this).next('.block__body').slideToggle('fast');
			});

			$("[rel=js-search-input]").on("keyup", function() {
		    var value = $(this).val().toLowerCase();
		    $(this).parent().find("[rel=js-search-list] li").filter(function() {
		      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		    });
		  });


			$("#search").on("keyup", function() {
		    var value = $(this).val().toLowerCase();
		    $(".for-search tr").filter(function() {
		      // $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		      $(this).toggle($(this).find('td.td-search').text().toLowerCase().indexOf(value) > -1)
		    });
		  });

		});
	</script>
@endsection