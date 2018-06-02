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
	<li>
		<div class="file-message">
			<p class="baomoi">Thông báo: ...</p>
			<span class="file-message-close"><i class="fa fa-times"></i></span>
		</div>
	</li>

	@foreach ($tatca_tep as $tep)
	{{-- expr --}}

	<li class="item link-hover1" >
		<img style="display: none;" src="{{ asset('pictures/luan/ajax-loader.gif') }}" alt="">
		<div>
			
			<img class="pos-absolute item-icon" src="{{asset('myicons/tep/file.svg')}}" alt="">
		</div>
		<div>
			<p>
				@if (!$tep->cong_khai)
					<i class="fa fa-lock"></i>
				@endif
				<a  class="item-link" target="_blank" href="{{ asset('uploads/'.$tep->belongsToTaiKhoan->ma_tai_khoan.'/'.$tep->duong_dan_tep) }}">{{$tep->ten_tep}}</a>
			</p>
		</div>
		<div class="item-date-created" data-date="{{date_format($tep->thoi_gian_tao, "Y-m-d")}}"><p>{{date_format($tep->thoi_gian_tao, "d/m/Y")}}</p></div>
		<div class="item-action">
			<span>
				<i class="fa fa-chevron-down"></i>
				<div class="action">
					<ul class="list-actions" data-id="{{$tep->ma_tep}}">

						<li class="change-name">Đổi tên</li>
						<li class="post-with-it">Đăng bài viết với tệp này</li>
						<li class="download">Tải</li>
						<li class="delete">Xóa</li>
						<li class="public-or-private">
							@if ($tep->cong_khai)
								Đặt tệp riêng tư
							@else
								Đặt tệp công khai
							@endif
						</li>
					</ul>
				</div>

			</span>
		</div>

	</li>
	@endforeach


</ul>

@endsection