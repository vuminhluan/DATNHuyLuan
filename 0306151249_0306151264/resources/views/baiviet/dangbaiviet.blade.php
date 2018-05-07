

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/baiviet.css') }}">
@endsection
@section('javascript')
<script src="{{ asset('js/jslu/dangbaiviet.js') }}" type="text/javascript" charset="utf-8" async defer></script>
@endsection


<div id="divbigformdangbaiviet" >
	<form action="dangbaiviet_submit" method="get" accept-charset="utf-8">
		<div id="divtrongformdangbaiviet" >
			<div style="height: 200px;">
				<div id="divnoidungbaiviet">
					<img id="imgdangbaiviet" " src=" {{ asset('pictures/avt1.jpg') }}" alt="Mountain View">
					<textarea id="iptextdangbaiviet" rows="5" cols="50"></textarea>
				</div>
				<div id="divoptionradiobutton">
					
			
				<label class="container">Thông báo
  				<input type="checkbox" checked="checked">
 				<span class="checkmark"></span>
				</label>
				<label class="container">Thu bài
  				<input type="checkbox">
 				<span class="checkmark"></span>
				</label>
				<label class="container">Khảo sát
 				<input type="checkbox">
  				<span class="checkmark"></span>
				</label>
				<label class="container">Tài liệu
  				<input type="checkbox">
 				 <span class="checkmark"></span>
				</label>
   				 
 					
				</div>
       		</div>

		</div>
		<div>
		<div class="custom-select" >
 			 <select>
   				<option value="0">Công khai</option>
   				<option value="1">Chỉ ẩn tên người đăng</option>
			    <option value="2">Chỉ ẩn tên người bình luận</option>
			    <option value="3">Ẩn tên cả người đăng và người bình luận</option>
			   
			  </select>
		</div>
		<div id="divbtndangbaiviet">
		<button id="btndangbaiviet" >Đăng</button>
		</div>
		</div>

	</form>
</div>
