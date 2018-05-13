

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/baiviet.css') }}">
@endsection
@section('javascript')
<script src="{{ asset('js/jslu/dangbaiviet.js') }}" type="text/javascript" charset="utf-8"></script>
@endsection





<div id="divbigformdangbaiviet" >
	{{-- <div id="data" style="width: 100%;height: 50px;background-color: red;"></div> --}}
	<form  id="frmdangbaiviet" action="#/" method="post" accept-charset="utf-8" name="frmnamedangbaiviet">
		 @csrf 
		<div id="divtrongformdangbaiviet" >
			<div style="height: 200px;">
				<div id="divnoidungbaiviet">
					<img id="imgdangbaiviet" " src=" {{ asset('pictures/avt1.jpg') }}" alt="Mountain View">
					<textarea id="iptextdangbaiviet" rows="5" cols="50"></textarea>
				</div>
				<div id="divoptionradiobutton">		
					<div class="divoptionradio"  >	
						<label class="container">Thông báo
		  				<input id="ckbthongbao" type="checkbox"  onclick='clickoption("optionthongbao")'>
		 				<span class="checkmark"></span>
						</label>
						<div class="optionlevel2" id="optionthongbao">
							
							Ngày ẩn:<br><input class="datetimepickker"  type="date" name="" value="" placeholder="">
							<br>
							
						</div>
					</div>
					<div class="divoptionradio" >
						<label class="container">Thu bài
		  				<input id="ckbthubai" type="checkbox" onclick='clickoption("optionthubai")'>
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
		 				<input id="ckbkhaosat" type="checkbox"  onclick='clickoption("optionkhaosat")'>
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
		  				<input id="ckbtailieu" type="checkbox"  onclick='clickoption("optiontailieu")'>
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
 			 <select id="cbbloaibaiviet">
   				<option value="LBV001">Công khai</option>
   				<option value="LBV002">Chỉ ẩn tên người đăng</option>
			    <option value="LBV003">Chỉ ẩn tên người bình luận</option>
			    <option value="LBV004">Ẩn tên cả người đăng và người bình luận</option>
			   
			  </select>
		</div>
		<div id="divbtndangbaiviet">
		{{-- <input id="btndangbaiviet" type="submit"  value="Đăng"/> --}}
		<input type="submit" id="btndangbaiviet"  name="btndangbaiviet" value="Submit">
		{{-- <button id="btnn">DANGGG</button> --}}
		</div>
		</div>

	</form>
</div>
