@extends('master.luan.tep_masterpage')


@section('file_list')

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

	@foreach ($tatca_tep as $tep)
	{{-- expr --}}

	<li class="item link-hover1">
		<div>
			
			<img class="pos-absolute item-icon" src="{{asset('myicons/tep/file.svg')}}" alt="">
		</div>
		<div>
			<p>
				@if (!$tep->cong_khai)
					<i class="fa fa-lock"></i>
				@endif
				<a href="{{ asset('uploads/'.$tep->belongsToTaiKhoan->ma_tai_khoan.'/'.$tep->duong_dan_tep) }}" target="_blank">{{$tep->ten_tep}}</a>
			</p>
		</div>
		<div class="item-date-created" data-date="{{date_format($tep->thoi_gian_tao, "Y-m-d")}}"><p>{{date_format($tep->thoi_gian_tao, "d/m/Y")}}</p></div>
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
	@endforeach


</ul>

@endsection