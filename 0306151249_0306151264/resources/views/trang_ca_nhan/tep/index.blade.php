@extends('master.luan.tep_masterpage')


@section('file_list')

<div class="head">
	<form action="{{ route('nguoidung.tep.index', [Auth::user()->ten_tai_khoan]) }}">
		<div class="search-box">
			<input class="search-files-input" name="filename_keyword" type="text" placeholder="Tìm tệp" required>
			<input type="text" class="last-segment" name="mode" hidden>
			<button class="search-files-button"><i class="fa fa-search"></i></button>
		</div>
	</form>

	@if (Auth::user()->ten_tai_khoan == $username)
		<div >
			<button class="open-upload-modal">Thêm tệp mới</button>
		</div>
	@endif
	
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
	<li>
		<div class="file-message">
			<p class="baomoi">Thông báo: ...</p>
			<span class="file-message-close"><i class="fa fa-times"></i></span>
		</div>
	</li>

	<li>
		@if ($tatca_tep->currentPage() != 1)
      <a href="{{$tatca_tep->previousPageUrl()}}" class="page-link"><i class="fa fa-caret-left"></i></a>
    @endif

    {{-- <span class="page-number"> <input id="current-page" type="text" value="{{$tatca_tep->currentPage()}}"> / <span id="total-page">{{$tatca_tep->total()}}</span></span> --}}

    <span class="page-number">
      <select name="page_list" id="page-list" style="" >
        @for ($i = 1; $i <= ceil($tatca_tep->total()/$tatca_tep->perPage()); $i++)
          <option {{$tatca_tep->currentPage() == $i ? "selected" : ""}} value="{{$tatca_tep->url($i)}}">{{$i}}</option>
        @endfor
      </select>
      
      @if ($tatca_tep->total() > 0)
        / <span id="total-page">{{$tatca_tep->lastPage()}}</span>
      @else
        <small><i>Không có kết quả</i></small>
      @endif

    </span>

    @if ($tatca_tep->currentPage() != $tatca_tep->lastPage())
      <a href="{{$tatca_tep->nextPageUrl()}}"><i class="fa fa-caret-right"></i></a>
    @endif
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
						{{-- <li class="post-with-it">Đăng bài viết với tệp này</li> --}}
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