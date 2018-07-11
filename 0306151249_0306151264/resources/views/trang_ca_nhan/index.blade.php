@extends('master.luan.trangcanhan_masterpage')

@section('title')
<title>Trang cá nhân {{'@'.$taikhoan->ten_tai_khoan}}</title>
@endsection

@section('profile_css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/lu/baiviet/noidungbaiviet.css') }}">
<style>
	.no-post-alert {
		background-color: #fff;padding:8px 10px;border-radius: 3px;box-shadow: 2px 2px 3px rgba(0,0,0,0.5);
	}
</style>
@endsection

@section('noidung_trangcanhan')

@if (count($lstbaiviet) <= 0)
	<div class="no-post-alert">
		<p>Bạn hiện chưa có vài viết nào. Hãy tham gia các nhóm và đăng bài chia sẻ với cộng đồng</p>
	</div>
@endif
<div class="content" style="background-color: transparent;">
	@for ($i = 0; $i < count($lstbaiviet) ; $i++)
	{{-- css file noidungbaiviet.css --}}
		{{-- @if (Auth::user()->ma_tai_khoan == $taikhoan->ma_tai_khoan)
		@include('includes.trangcanhan.post')
	@elseif ($lstbaiviet[$i]->ma_loai_bai_viet != "LBV002" && $lstbaiviet[$i]->ma_loai_bai_viet != "LBV004")
		@include('includes.trangcanhan.post')
		@endif --}}


		@include('includes.trangcanhan.post')

	@endfor


		{{-- <div>Xem thêm</div> --}}
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


	@section('trang_canhan_javascript')

	<script>
		// $(document).scroll(function() {

		// 	if(parseFloat($(document).scrollTop())/parseFloat($(document).height())>0.4) {
		// 		if ($("#div-hi-soluongbaiviethientainhom").val()<soluongbaivietdalay+1) {
		// 			return;
		// 		}
		// 		else {
		// 			var blockdongbo = true;
		// 			if (blockdongbo) {
		// 				blockdongbo=!blockdongbo;
		// 				soluongbaivietdalay+=4;
		// 				$.ajax({
		// 					url:link_host+'/ajax/getbaivietphantrangne',
		// 					type:'GET',
		// 					data:{
		// 						ma_nhom:$("#div-hi-chu-bai-viet-ma-nhom").val(),
		// 						soluongbaivietdalay:soluongbaivietdalay,
		// 						soluongbaivietcanlay:soluongbaivietcanlay
		// 					}
		// 				}).done(function(data) {
							
		// 					var divpost = document.createElement("div");
		// 					divpost.innerHTML=data;
		// 					document.getElementById('divnoidungcon').appendChild(divpost); 
		// 				});
		// 			}
		// 		}
		// 	}
		// })

	</script>	

	@endsection
