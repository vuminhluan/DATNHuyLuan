@extends('master.luan.tep_masterpage')


@section('file_list')

<div class="head">
	{{-- <form action="{{ route('nguoidung.tep.index', [Auth::user()->ten_tai_khoan]) }}">
		<div class="search-box">
			<input class="search-files-input" name="filename_keyword" type="text" placeholder="Tìm tệp" required>
			<input type="text" class="last-segment" name="mode" hidden>
			<button class="search-files-button"><i class="fa fa-search"></i></button>
		</div>
	</form> --}}


	{{-- <div >
		<button class="open-upload-modal">Thêm tệp mới</button>
	</div> --}}
</div>
<ul class="file-list">

	<li>
		<span>Sắp xếp</span>
		<select name="sort" id="sort">
			{{-- des - giảm => Ngày gần nhất -> ngày xa hơn (mới nhất) --}}
			{{-- asc - tăng => Ngày cũ nhất -> ngày mới hơn (cũ nhất)--}}
			<option value="asc" selected>Cũ nhất</option>
			<option value="desc">Mới nhất</option>
		</select>
	</li>
	<li>
		<div class="file-message">
			<p class="baomoi">Thông báo: ...</p>
			<span class="file-message-close"><i class="fa fa-times"></i></span>
		</div>
	</li>

	@foreach ($files as $file)
	{{-- expr --}}

	<li class="item link-hover1" >
		<img style="display: none;" src="{{ asset('pictures/luan/ajax-loader.gif') }}" alt="">
		<div>
			
			<img class="pos-absolute item-icon" src="{{asset('myicons/tep/file.svg')}}" alt="">
		</div>
		<div>
			<p>
				<a class="item-link" target="_blank" href="">{{$file['name']}}</a>
			</p>
		</div>
		<div class="item-date-created" data-date="{{date('Y-m-d',$file['timestamp'])}}"><p title="{{date('H:i:s',$file['timestamp'])}}">{{date('d/m/Y',$file['timestamp'])}}</p></div>
		<div class="item-action">
			<span>
				<i class="fa fa-chevron-down"></i>
				<div class="action">
					<ul class="list-actions" data-id="ma_tep">
						<li class="gd-file-view"><a href="https://drive.google.com/file/d/{{$file['basename']}}/view" target="_blank">Xem</a></li>
						<li class="gd-file-download"><a href="{{ route('googledrive.tep.tai', [$file['basename']]) }}">Tải xuống</a></li>
						<li class="gd-file-delete"><a href="{{ route('googledrive.tep.xoa', [$file['basename']]) }}">Xóa</a></li>
					</ul>
				</div>

			</span>
		</div>

	</li>
	@endforeach

</ul>

@endsection