

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
		  				<input type="checkbox"  onclick='clickoption("optionthongbao")'>
		 				<span class="checkmark"></span>
						</label>
						<div class="optionlevel2" id="optionthongbao">
							
							Ngày ẩn:<br><input class="datetimepickker"  type="date" name="" value="" placeholder="">
							<br>
							
						</div>
					</div>
					<div class="divoptionradio" >
						<label class="container">Thu bài
		  				<input type="checkbox" onclick='clickoption("optionthubai")'>
		 				<span class="checkmark"></span>
						</label>
						<div class="optionlevel2" id="optionthubai">
							Từ ngày:<br><input class="datetimepickker"   type="date" name="" value="" placeholder="">
							<br>
							Đến ngày:<br><input class="datetimepickker"  type="date" name="" value="" placeholder="">
						</div>
					</div>
					<div class="divoptionradio" >
						<label class="container">Khảo sát
		 				<input type="checkbox"  onclick='clickoption("optionkhaosat")'>
		  				<span class="checkmark"></span>
						</label>
						<div class="optionlevel2" id="optionkhaosat" >
							Từ ngày:
							<input class="datetimepickker"  type="date" name="" value="" placeholder="">
							Đến ngày:
								<br><input class="datetimepickker"  type="date" name="" value="" placeholder="">
							<br>
						</div>
					</div>
					<div class="divoptionradio" >
						<label class="container">Tài liệu
		  				<input type="checkbox"  onclick='clickoption("optiontailieu")'>
		 				 <span class="checkmark"></span>
						</label>
						<div class="optionlevel2" id="optiontailieu">
							<br>	
							<label for="file-upload" class="custom-file-upload">
  								  Chọn tệp
							</label>
							<input id="file-upload" type="file"/>
							
							
						</div>
					</div>
						 				 
 					
				</div>
       		</div>

		</div>
		<div class="divbottomformdangbaiviet">
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
