
<head>
	<script src="{{ asset('js/jslu/baiviet/dangbaiviet.js') }}" type="text/javascript" charset="utf-8">
</script>
</head>
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/lu/baiviet/baiviet.css') }}">
@endsection
@section('javascript')
{{-- <script src="{{ asset('js/jslu/baiviet/dangbaiviet.js') }}" type="text/javascript" charset="utf-8">
</script> --}}
@endsection





<div id="divbigformdangbaiviet" style="clear:both;" >
	{{-- <div id="data" style="width: 100%;height: 50px;background-color: red;"></div> --}}
	{{-- <form  id="frmdangbaiviet" action="/" method="post" accept-charset="utf-8" name="frmnamedangbaiviet"> --}}
		 @csrf 
		 {{-- id="divtrongformdangbaiviet" --}}
		<div  style="width: 100%; height: auto;" >
				{{-- id="divnoidungbaiviet" --}}
				<div style="height: 60px;" >
					<img id="imgdangbaiviet" " src=" {{asset('pictures/anh_dai_dien/'.Auth::user()->anh_dai_dien)}}" alt="Mountain View">
					<div style="padding-top: 5px;padding-left: 50px;padding-right: 7px;">
						<div style="width: auto;height: 0px;">
						<textarea cols="60"  id="iptextdangbaiviet" rows="2" placeholder="Viết điều gì đó..."></textarea>
						</div>
					</div>
					{{-- <div id="iptextdangbaiviet" contenteditable="true">	</div> --}}
					{{-- <textarea id="iptextdangbaiviet" rows="5" cols="50"></textarea> --}}
				</div>

				<div id="divanhxemtruocduocthemvao" style="width: 100%;height: auto;display: none;margin-top: 20px;">
					<div style="width: 50%;height: auto;float: left;padding: 2px;padding-left: 13%;">
							<img id="blah" src="#" alt="your image" style="width: 77px;height: 77px;border-radius: 3px;" />
					</div>
					<div style="clear: both;"></div>
				</div>

				<div style="width: 86%;height: auto;border-bottom: solid 1px #e4e6e8;margin-left: 14%;">
					{{-- id="divcacluachondinhkem" --}}
					{{--  id="divthemanhbaidang" --}}
						<div style="float: left;">
							
							<div style="float: left;">
							<label for="imgInp" class="custom-file-upload">
								<i class="fa fa-picture-o" aria-hidden="true"></i>
							</label>
							<form action="uploadanh" id="uploadanh" method="get" enctype="multipart/form-data">
								<input id="imgInp" type="file"/>
							</form>
							
							</div>
						</div>
						<div style="float: left;" id="divthemteptinbaidang">
							<label for="file-upload-file" class="custom-file-upload">
								<i class="fa fa-paperclip" aria-hidden="true"></i>
							</label>
							<input id="file-upload-file" type="file"/>
						</div>
						<div style="clear: both;"></div>
				</div>
				<div id="divoptionradiobutton" style="clear:both;padding-bottom: 3px;padding-top: 3px;">		
					
					<div class="divoptionradio"  >	
						<label class="container">Ẩn bài
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
						<div>
							
						</div>
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
					<div style="clear: both;" ></div>
				
{{-- 					<div class="divoptionradio" >
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
					</div> --}}
						 				 
 					
				</div>
       		

		</div>
		{{-- class="divbottomformdangbaiviet" --}}
		<div style="width: 100%;height: 50px;border-top: solid 1px #e4e6e8;" >
			{{-- class="custom-select" --}}
				<div style="width: 80%;float: left;padding: 9px;">
		 			 <select id="cbbloaibaiviet" style="margin-left: 43%;height: 30px;width: 277px;padding-left: 10px;border-radius: 3px;">
		   				<option value="LBV001">Công khai</option>
		   				<option value="LBV002">Chỉ ẩn tên người đăng</option>
					    <option value="LBV003">Chỉ ẩn tên người bình luận</option>
					    <option value="LBV004">Ẩn tên cả người đăng và người bình luận</option>
					   
					  </select>
				</div>
				{{-- id="divbtndangbaiviet" --}}
				<div style="width: 20%;float: left;" >
					<input type="submit" id="btndangbaiviet" onclick="submitdangbaiviet()"  name="btndangbaiviet" value="Đăng">
				</div>
		</div>

	{{-- </form> --}}
</div>
