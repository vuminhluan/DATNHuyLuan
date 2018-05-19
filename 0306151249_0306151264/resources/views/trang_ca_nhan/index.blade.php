@extends('master.luan.trangcanhan_masterpage')

@section('title')
	<title>Trang cá nhân {{$username}}</title>
@endsection

@section('noidung_trangcanhan')
<div class="content">
	Bài viết ở đây (Theo tứ tự mới nhất -> cũ) {{$username}}
</div>


{{-- @include('includes/trangcanhan/trangcanhan_modal') --}}
<div style="display:none"  id="my_message">{{session('my_message')}}</div>
@endsection

@section('trang_canhan_javascript')
	<script>

		$(document).ready(function() {
			// var message = document.getElementById('my_message').innerHTML;
			message = $('#my_message');

			if($('#my_message').html() != "") {
				$('#my_message').css('display', 'block');
			}
		});

	</script>
@endsection
