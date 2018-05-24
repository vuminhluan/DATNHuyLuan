@extends('master.luan.trangcanhan_masterpage')

@section('title')
	<title>Trang cá nhân {{'@'.$taikhoan->ten_tai_khoan}}</title>
@endsection

@section('noidung_trangcanhan')
<div class="content">
	Bài viết ở đây (Theo tứ tự mới nhất -> cũ)
</div>


{{-- @include('includes/trangcanhan/trangcanhan_modal') --}}
{{-- <div style="display:none"  id="my_message">{{session('my_message')}}</div> --}}
@endsection

@section('trang_canhan_javascript')
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
