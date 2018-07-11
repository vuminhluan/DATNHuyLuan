@extends('master.three-col_layout_masterpage')

@section('title')
	<title>Chi tiết bài viết</title>
@endsection

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/lu/baiviet/baiviet.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/lu/baiviet/noidungbaiviet.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/includescss/navtopcss.css') }}">
	<link rel="stylesheet" href="{{asset('css/admin/admin-detail-post.css')}}">

@endsection

@section('sidebar-col-left')
	<div class="detail-post-sidebar">
		<div class="block block__post-detail">
			<div class="block__header block--padding" rel="js-toggle-block">
				<h4 class="block__title">Thông tin bài viết</h4>
			</div>
			<div class="block__body block--padding">
				<h4>
					@if ($lstbaiviet[0]->nop_tep)
						Bài viết nộp tệp
					@elseif($lstbaiviet[0]->khao_sat_y_kien)
						Bài viết khảo sát ý kiến
					@endif
				</h4>
				<p>Người viết: {{$lstbaiviet[0]->ho_ten_lot.' '.$lstbaiviet[0]->ten}}</p>
				<p>Nhóm: {{$lstbaiviet[0]->ten_nhom}}</p>
				<p>Thời gian đăng: {{date_format(date_create($lstbaiviet[0]->thoi_gian_dang), 'd/m/Y H:i:s')}}</p>
				<p>Loại bài viết: {{$lstbaiviet[0]->ten_loai_bai_viet}}</p>
			</div>
		</div>

		@if ($lstbaiviet[0]->ma_thumuc)
			<div class="block">
				<div class="block__body block--padding">
					<i class="fa fa-folder" style="color: #337ab7"></i> <a href="https://drive.google.com/drive/folders/{{$lstbaiviet[0]->ma_thumuc}}" target="_blank">Thư mục thu bài của bài viết</a>
				</div>
			</div>
		@endif

		<div class="block block--padding">
			<ul class="block__next-previous">
				@if ($next_and_prev_post_id['previous'])
					<li><a href="{{ route('admin.baiviet.xem', [$next_and_prev_post_id['previous']]) }}"><i class="fa fa-chevron-left fa-2x"></i></a></li>
				@endif
				<li><a href="{{ route('trangchu') }}"><i class="fa fa-home fa-2x"></i></a></li>
				@if ($next_and_prev_post_id['next'])
					<li><a href="{{ route('admin.baiviet.xem', [$next_and_prev_post_id['next']]) }}"><i class="fa fa-chevron-right fa-2x"></i></a></li>
				@endif
			</ul>
		</div>
	</div>

	
@endsection

@section('middle-col')
	<div class="middle-content">

		<div class="block">
			<div class="block__header block--padding" rel="js-toggle-block">
				<h4 class="block__title">Nội dung bài viết</h4>
			</div>
			<div class="block__body block--padding">
				<pre class="block__post-content">
{{$lstbaiviet[0]->noi_dung_bai_viet}}
				</pre>
				@if ($lstbaiviet[0]->duong_dan_anh)
					<img style="width:100%" src="{{ asset($lstbaiviet[0]->duong_dan_anh) }}" alt="">
				@endif
			</div>
		</div>
	</div>
@endsection

@section('sidebar-col-right')
	{{-- <div class="detail-post-sidebar">
		<div class="block block__group-question">
			<div class="block__header" rel="js-toggle-block">
				<h4>Câu hỏi gia nhập nhóm</h4>
			</div>
			<div class="block__body block--padding block__body--hide" rel="js-toggle-block__target">
				asdasd
			</div>
		</div>
	</div> --}}
@endsection


@section('js')
	<script>
		// alert(link_host);
	</script>
@endsection