@extends('master.three-col_layout_masterpage')

@section('title')
	<title>group detail</title>
@endsection

@section('css')
	<link rel="stylesheet" href="{{asset('css/admin/admin-detail-group.css')}}">
@endsection


{{-- Left sidebar --}}
@section('sidebar-col-left')
	<div class="detail-group-sidebar">

		<div class="card card-group">
			<div class="card__header card-group__header">
				<img src="{{ asset('pictures/anh_bia/default-banner.png') }}" alt="">
			</div>
			<div class="card__body card-group__body">
				<h4 class="card-group__name">Group name</h4>
				<small class="card-group__total-members"><span class="badge">10</span> thanh vien</small> |
				<small class="card-group__total-members"><span class="badge">100</span> bài viết</small>
				<div class="card-group__description">
					<p>Giới thiệu <i class="fa fa-caret-down text-6667a6 mybtn" rel="js-show-more-description__button"></i></p>
					<p rel="js-show-more-description__target"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. In voluptatem non, perspiciatis cum dolor, odit doloremque assumenda debitis blanditiis ex. Animi amet et blanditiis provident earum quia commodi nobis. Pariatur cumque earum, sequi deleniti atque laudantium ducimus. Nulla maxime, est repellat labore nihil, dolore animi excepturi doloremque quod! Soluta eveniet voluptatem impedit ipsum id aspernatur, quos quis placeat explicabo, nulla, possimus perspiciatis quasi recusandae voluptatibus. Error cupiditate fugit doloribus officiis pariatur aspernatur harum similique dolore odit molestiae nisi numquam neque perferendis, vel facilis debitis magnam esse, sapiente dolores amet itaque magni voluptas alias ipsa. Vitae expedita facere maiores dolore sequi!.</p>
				</div>
			</div>
		</div>

		<div class="group-info">
			<span class="group-info__creator">Người tạo: @taikhoan111</span><br>
			<span class="group-info__created_at" style="cursor: help;" title="03:03:03">Thời gian tạo: 20/06/2018</span><br>
			<span class="group-info__kind">Loại: Nhóm kín</span><br>
			<span class="group-info__kind">Mã gia nhập: 0000</span><br>
			<span class="group-info__status" title="Đang hoạt động">Trạng thái: <i class="fa fa-check text-success"></i></span><br>
		</div>

		<div class="block block__group-question">
			<div class="block__header" rel="js-toggle-block">
				<h4>Câu hỏi gia nhập nhóm</h4>
			</div>
			<div class="block__body block--padding block__body--hide" rel="js-toggle-block__target">
				<input class="form-control" rel="js-search-input" type="text" placeholder="Tìm..."><br>
				<ul class="list-group block__list block__list--hover-overflow" rel="js-search-list">
			    <li class="list-group-item">First item</li>
			    <li class="list-group-item">Second item</li>
			    <li class="list-group-item">Third item</li>
			    <li class="list-group-item">Fourth</li>
			    <li class="list-group-item">First item</li>
			    <li class="list-group-item">Second item</li>
			    <li class="list-group-item">Third item</li>
			    <li class="list-group-item">Fourth</li>
			    <li class="list-group-item">First item</li>
			    <li class="list-group-item">Second item</li>
			    <li class="list-group-item">Third item</li>
			    <li class="list-group-item">Fourth</li>
			  </ul> 
			</div>
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
				      <tr>
				        <td>Ho va ten Ho va ten Ho va ten Ho va ten</td>
				        <td>@taikhoan111</td>
				        <td>30/12/2018</td>
				        <td>10</td>
				      </tr>
				    </tbody>
				  </table>
			  </div>
			</div>
		</div>
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
				<ul class="list-group block__list block__list--hover-overflow" rel="js-search-list">
			    <li class="list-group-item">First item</li>
			    <li class="list-group-item">Second item</li>
			    <li class="list-group-item">Third item</li>
			    <li class="list-group-item">Fourth</li>
			    <li class="list-group-item">First item</li>
			    <li class="list-group-item">Second item</li>
			    <li class="list-group-item">Third item</li>
			    <li class="list-group-item">Fourth</li>
			  </ul> 
			</div>
		</div>

		<div class="block block__censor-post-list">
			<div class="block__header"  rel="js-toggle-block">
				<h4>Người phê duyệt bài viết</h4>
			</div>
			<div class="block__body block--padding block__body--hide" rel="js-toggle-block__target">
				<input class="form-control" rel="js-search-input" type="text" placeholder="Tìm..."><br>
				<ul class="list-group block__list block__list--hover-overflow" rel="js-search-list">
			    <li class="list-group-item list-unstyled">First item</li>
			    <li class="list-group-item">Second item</li>
			    <li class="list-group-item">Third item</li>
			    <li class="list-group-item">Fourth</li>
			  </ul> 
			</div>

		</div>

		<div class="block block__censor-member-list">
			<div class="block__header"  rel="js-toggle-block">
				<h4>Người phê duyệt thành viên</h4>
			</div>
			<div class="block__body block--padding block__body--hide" rel="js-toggle-block__target">
				<input class="form-control" rel="js-search-input" type="text" placeholder="Tìm..."><br>
				<ul class="list-group block__list block__list--hover-overflow" rel="js-search-list">
			    <li class="list-group-item list-unstyled">First item</li>
			    <li class="list-group-item">Second item</li>
			    <li class="list-group-item">Third item</li>
			    <li class="list-group-item">Fourth</li>
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

		});
	</script>
@endsection