@extends('master.luan.trangcanhan_masterpage')

@section('title')
	<title>Trang cá nhân {{'@'.$taikhoan->ten_tai_khoan}}</title>
@endsection

@section('profile_css')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/lu/baiviet/noidungbaiviet.css') }}">
@endsection

@section('noidung_trangcanhan')
<div class="content">
	@for ($i = 0; $i < count($lstbaiviet) ; $i++)
	{{-- css file noidungbaiviet.css --}}

	@include('includes.trangcanhan.post')



	@endfor
</div>


{{-- @include('includes/trangcanhan/trangcanhan_modal') --}}
{{-- <div style="display:none"  id="my_message">{{session('my_message')}}</div> --}}
@endsection

@section('trang_canhan_javascript')

	<script src="{{ asset('js/jslu/baiviet/hienthibaiviet.js') }}" type="text/javascript" charset="utf-8" async defer></script>

	<script>
		
		$(document).ready(function() {

			if($('#upload-pho-to-message').html() != "") {
				// $('.photo-modal').css('display', 'block');
				$('.photo-modal').addClass('photo-modal-show');
			}

			$('#close-icon').click(function() {
				// $('#upload-pho-to-message').html('');
				$('.photo-modal').removeClass('photo-modal-show');
				// alert('haha');
				// alert('haiz');
			});




		});

	</script>

@endsection


{{-- @section('trang_canhan_javascript')
	

@endsection --}}
