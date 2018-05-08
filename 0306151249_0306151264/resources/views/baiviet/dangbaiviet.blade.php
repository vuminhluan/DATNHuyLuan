

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
					<div class="divoptionradio"  >	
						<label class="container">Thông báo
		  				<input type="checkbox" checked="checked" onclick="clickckb()">
		 				<span class="checkmark"></span>
						</label>
						<div class="optionlevel2" id="optionthongbao">
							<br>
							<p>Ngày ẩn:<p>
							<br>
							<p>xxxxxxx:<p>
						</div>
					</div>
					<div class="divoptionradio" >
						<label class="container">Thu bài
		  				<input type="checkbox" onclick='clickoption("optionthubai")'>
		 				<span class="checkmark"></span>
						</label>
						<div class="optionlevel2" id="optionthubai">
							<br>
							<p>Từ ngày:<p>
							<br>
							<p>Đến ngày:<p>
						</div>
					</div>
					<div class="divoptionradio" >
						<label class="container">Khảo sát
		 				<input type="checkbox"  onclick='clickoption("optionkhaosat")''>
		  				<span class="checkmark"></span>
						</label>
						<div class="optionlevel2" id="optionkhaosat" >
							<br>
							<p>Từ ngày:<p>
							<br>
							<p>Đến ngày:<p>
						</div>
					</div>
					<div class="divoptionradio" >
						<label class="container">Tài liệu
		  				<input type="checkbox"  onclick='clickoption("optiontailieu")''>
		 				 <span class="checkmark"></span>
						</label>
						<div class="optionlevel2" id="optiontailieu">
							<br>
							<input style="width: 90px;" type="file" name="fileToUpload" id="fileToUpload">
							<br>
							<br>
							<p>Đến ngày:<p>
						</div>
					</div>
						 				 
 					
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
