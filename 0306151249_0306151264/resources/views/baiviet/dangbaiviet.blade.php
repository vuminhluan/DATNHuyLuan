
<head>
	<script src="{{ asset('js/jslu/baiviet/dangbaiviet.js') }}" type="text/javascript" charset="utf-8">
</script>
</head>
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/lu/baiviet/baiviet.css') }}">
@endsection
@section('javascript')

@endsection




<form id="formdangbaiviet" action="dangbaiviet_submit" method="get" accept-charset="utf-8">

<div id="divbigformdangbaiviet" style="clear:both;" >
{{-- <div style="position: relative;width: 100%;height: 100%;background-color: black;"></div> --}}
	{{-- <div id="data" style="width: 100%;height: 50px;background-color: red;"></div> --}}
	{{-- <form  id="frmdangbaiviet" action="/" method="post" accept-charset="utf-8" name="frmnamedangbaiviet"> --}}
		 @csrf 
		 {{-- id="divtrongformdangbaiviet" --}}
		<div  style="width: 100%; height: auto;" >
				{{-- id="divnoidungbaiviet" --}}
				<div style="height: 60px;" >
					<img id="imgdangbaiviet" src=" {{asset('pictures/anh_dai_dien/'.Auth::user()->anh_dai_dien)}}" alt="lu">
					<div style="padding-top: 5px;padding-left: 50px;padding-right: 7px;">
						<div style="width: auto;height: 0px;">
						<textarea cols="60"  id="iptextdangbaiviet" rows="2" placeholder="Viết điều gì đó..."></textarea>
						</div>
					</div>
					{{-- <div id="iptextdangbaiviet" contenteditable="true">	</div> --}}
					{{-- <textarea id="iptextdangbaiviet" rows="5" cols="50"></textarea> --}}
				</div>
				<div style="height: 38px;background-color: transparent;width:100%;padding-left: 3px;padding-right: 3px;">
					<dl class="dropdown"> 
					  
					    <dt>
					    <div href="#">
					      <span class="hida"><i class="fa fa-plus" aria-hidden="true"></i> Thêm người nhận</span>  
					       {{-- <input id="lstnhomsharebv" type="hidden" name="" value="">   --}}
					      <p class="multiSel"></p>  
					    </div>
					    </dt>
					  
					    <dd>
					        <div class="mutliSelect">
					            <ul>
					            	@for ($i = 0; $i <count($listnhomtkquanly) ; $i++)
					            	@if ($listnhomtkquanly[$i]->ma_nhom!=$t)
										<li><input type="checkbox" value="{{$listnhomtkquanly[$i]->ten_nhom.','.$listnhomtkquanly[$i]->ma_nhom}}" />{{$listnhomtkquanly[$i]->ten_nhom}}</li>
					            	@endif
						                
					            	@endfor

					            </ul>
					        </div>
					    </dd>

					</dl>
				</div>
					<script>
						
					$(".dropdown dt div").on('click', function() {
					  $(".dropdown dd ul").slideToggle('fast');
					});

					$(".dropdown dd ul li div").on('click', function() {
					  $(".dropdown dd ul").hide();
					});

					function getSelectedValue(id) {
					  return $("#" + id).find("dt div span.value").html();
					}

					$(document).bind('click', function(e) {
					  var $clicked = $(e.target);
					  if (!$clicked.parents().hasClass("dropdown")) $(".dropdown dd ul").hide();
					});
					  var lstmanhomsharebv = [];
					$('.mutliSelect input[type="checkbox"]').on('click', function() {

					  var title = $(this).closest('.mutliSelect').find('input[type="checkbox"]').val(),
					    title = $(this).val()+ ",";//.substring(0,)+title.indexOf('x') 
					    var nn = title.indexOf(",");
					    var tennhom=title.substring(0,nn+1);
					    
					    var ma_nhom=title.substring(nn+1,title.length-1);
					  if ($(this).is(':checked')) {
					    var html = '<span title="' + title + '">' + tennhom + '</span>';
					    	lstmanhomsharebv.push(ma_nhom);

					    $('.multiSel').append(html);
					    $(".hida").hide();
					  } else {
					  	var indexx = lstmanhomsharebv.indexOf(ma_nhom);
						if (indexx !== -1) lstmanhomsharebv.splice(indexx, 1);
					    $('span[title="' + title + '"]').remove();
					    var ret = $(".hida");
					    $('.dropdown dt div').append(ret);

					  }
					});
					</script>
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
						{{-- <form action="{{ route('postanh') }}" id="uploadanh" method="get" enctype="multipart/form-data"> --}}
								<input id="imgInp" name="imgInp" type="file"/>
							</div>
						</div>
{{-- 						<div style="float: left;" id="divthemteptinbaidang">
							<label for="file-upload-file" class="custom-file-upload">
								<i class="fa fa-paperclip" aria-hidden="true"></i>
							</label>
							<input id="file-upload-file" type="file"/>
						</div> --}}
						<div style="clear: both;"></div>
				</div>
				<div id="divbigchuacackhaosat" class="divchuaykienkhaosat">
					<div id="divchuacackhaosat" style="height: auto;">
						<div>
							<input  class="ykienkhaosat" type="text" name="" value="" placeholder="Lựa chọn 1">
						</div>
						<div>
							<input  class="ykienkhaosat" type="text" name="" value="" placeholder="Lựa chọn 2">
						</div>
					</div>
					
					<div>
						<div class="btnaddkhaosat" onclick="themcaukhaosat()" >
							<i class="fa fa-plus" aria-hidden="true"></i>
						</div>
					</div>
					<div style="width: 80%;margin-left: 20%;border-bottom:solid 1px #e4e6e8 "></div>
					
				</div>
				<div id="divoptionradiobutton" style="clear:both;padding-bottom: 3px;padding-top: 3px;">		
					
					<div class="divoptionradio"  >	
						<label class="container">Ẩn bài
		  				<input id="ckbthongbao" type="checkbox"  onclick='($("#optionthongbao").css("display")=="none")?$("#optionthongbao").css("display","block"):$("#optionthongbao").css("display","none")'>
		 				<span class="checkmark"></span>
						</label>
						<div class="optionlevel2" id="optionthongbao">
							
							Ngày ẩn:<br><input class="datetimepickker checkthuykien"  type="date" id="ipdtngayanbaiviet" name="" value="" placeholder="">
							<br>
							{{-- clickoption("optionthongbao") --}}
						</div>
					</div>
					<div class="divoptionradio" >
						<label class="container">Thu bài
		  				<input id="ckbthubai" type="checkbox" onclick='($("#optionthubai").css("display")=="none")?$("#optionthubai").css("display","block"):$("#optionthubai").css("display","none")'>
		 				<span class="checkmark"></span>
						</label>
						<div class="optionlevel2" id="optionthubai">
{{-- 							Từ ngày:<br><input class="datetimepickker"  id="ngaybatdauthubaiviet"  type="date" name="" value="" placeholder="">
							<br> --}}
							Đến ngày:<br><input class="datetimepickker checkthuykien" id="ngayhethanthubaiviet" type="date" name="" value="" placeholder="">
						</div>
					</div>
					<div class="divoptionradio" >
						<div>
							
						</div>
						<label class="container">Khảo sát
		 				<input id="ckbkhaosat" type="checkbox"  onclick='($("#optionkhaosat").css("display")=="none")?($("#optionkhaosat").css("display","block"),$("#divbigchuacackhaosat").css("display","block")):($("#optionkhaosat").css("display","none"),$("#divbigchuacackhaosat").css("display","none"))'>
		  				<span class="checkmark"></span>
						</label>
						<div class="optionlevel2" id="optionkhaosat" >
{{-- 							Từ ngày:
							<input class="datetimepickker"  type="date" name="" value="" placeholder=""> --}}
							Đến ngày:
								<br><input class="datetimepickker checkthuykien" id="ngayhethankhaosat"  type="date" name="" value="" placeholder="">
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
					{{-- onclick="submitdangbaiviet()"  --}}
					<input type="submit" id="btndangbaiviet"  name="btndangbaiviet" value="Đăng">
				</div>
				{{-- </form> --}}
		</div>

	{{-- </form> --}}
</div>
</form>