
function thaotacthembaiviet(prl_mabaiviet){
($("#divxbaiviet-"+prl_mabaiviet).css("display")=="none")
?$("#divxbaiviet-"+prl_mabaiviet).css("display","block")
:$("#divxbaiviet-"+prl_mabaiviet).css("display","none");
}


function xoabaivietnay(prl_mabaiviet){
	$.ajax({
		url:link_host+'/ajax/updatebaivietne',
		type:'POST',
		data:{
			_token:$('input[name=_token]').val(),
			ma_bai_viet:prl_mabaiviet,
			trang_thai:"0" // xóa bài viết
		}
	}).done(function(data){
		$("#divbignoidungmotbaiviet-"+prl_mabaiviet).css("display","none");
	})
}

function pheduyetbaivietnay(prl_mabaiviet){
	$.ajax({
		url:link_host+'/ajax/updatebaivietne',
		type:'POST',
		data:{
			_token:$('input[name=_token]').val(),
			ma_bai_viet:prl_mabaiviet,
			trang_thai:"1" // được phê duyệt / 2 là chờ
		}
	}).done(function(data){
		 $("#divbignoidungmotbaiviet-"+prl_mabaiviet).css("display","none");
	})
}
function khongpheduyetbaivietnay(prl_mabaiviet){
	$.ajax({
		url:link_host+'/ajax/updatebaivietne',
		type:'POST',
		data:{
			_token:$('input[name=_token]').val(),
			ma_bai_viet:prl_mabaiviet,
			trang_thai:"3" //3 là không được phê duyệt
		}
	}).done(function(data){
		 $("#divbignoidungmotbaiviet-"+prl_mabaiviet).css("display","none");
	})
}


function updatetatcabaiviet(manhom,trangthaiup){
	$.ajax({
		url:link_host+'/ajax/updatetatcabaivietne',
		type:'POST',
		data:{
			_token:$('input[name=_token]').val(),
			ma_chu_bai_viet:manhom,
			trang_thai:trangthaiup //3 là không được phê duyệt
		}
	}).done(function(data){
		$("#divbodybodykiemduyetbaiviet").empty();
	})
}
// $(document).ready(function(){
// $('.page-item a').on('click', function(e){
//     e.preventDefault();
//     // var url = $(this).attr('href');
//     // $.post(url, $('#search').serialize(), function(data){
//     //     $('#posts').html(data);
//     // });
// });

// });

























function showbinhchonykien(prl_mabaiviet){
	//alert(prl_mabaiviet);
	$("#divthoigianhethanvote-"+prl_mabaiviet).css("display","block");

	$.ajax({
		url:link_host+'/ajax/getkiemtravoteykienne',
		type:'GET',
		data:{
			ma_tai_khoan_chon:$("#session-ma-tk").val(),
			ma_bai_viet:prl_mabaiviet
		}
	}).done(function(dt){
		if(dt[0].soluong>0){
					$("#xemketquakhaosat-"+prl_mabaiviet).css("display","block");
					$("#divomcacvotebaiviet-"+prl_mabaiviet).css("display","block");
					$("#div-click-show-y-kien-"+prl_mabaiviet).css("display","none");
					$("#divomcacvotebaiviet-"+prl_mabaiviet).empty();
					$.ajax({
					url:link_host+'/ajax/getykienvotebaivietne',
					type:"GET",
					data:{ ma_bai_viet:prl_mabaiviet}
					}).done(function(data){	
							var big = data;
							for (var i = 0; i < data.length; i++) {
								var divchuaykien = document.createElement("div");
									// divchuaykien.addEventListener("click",clickthemorbobinhchon);
									// divchuaykien.prma_y_kien=data[i].ma_y_kien;
									// divchuaykien.prma_baiviet=mabaiviet;
										var inputykien = document.createElement("INPUT");
											inputykien.className="ykienkhaosatshow";
											inputykien.id="ykien"+data[i].ma_y_kien;
											if(dt[0].ma_y_kien==data[i].ma_y_kien){
												inputykien.style.background="#0aabf83b";
											}
											inputykien.disabled =true;
											inputykien.value=data[i].noi_dung_y_kien;
											divchuaykien.appendChild(inputykien);

										var spansl = document.createElement("SPAN");
											spansl.className="spansoluongnguoichon";
											spansl.id="idsoluongchonykien"+data[i].ma_y_kien;
											if(dt[0].ma_y_kien==data[i].ma_y_kien){
												spansl.style.border="solid 1px #0aabf83b";
												spansl.style.background="#e9f4fc82";
											}
											$.ajax({
													url:link_host+'/ajax/getsoluongluachoncuaykienne',
													type:"GET",
													data:{ ma_y_kien:data[i].ma_y_kien}
													}).done(function(diti){	
														lstsoluong.push(diti[0]);//	alert(lstsoluong[0]);				
													})
													divchuaykien.appendChild(spansl);
											document.getElementById("divomcacvotebaiviet-"+prl_mabaiviet).appendChild(divchuaykien);
							}		
					})
		}
		else{
				$("#divomcacvotebaiviet-"+prl_mabaiviet).css("display","block");
				$("#div-click-show-y-kien-"+prl_mabaiviet).css("display","none");
				
					$.ajax({
					url:link_host+'/ajax/getykienvotebaivietne',
					type:"GET",
					data:{
							ma_bai_viet:prl_mabaiviet
					}
				}).done(function(data){	
					//console.log(data);
					for (var i = 0; i < data.length; i++) {
						var divchuaykien = document.createElement("div");
							divchuaykien.addEventListener("click",clickthemorbobinhchon);
							divchuaykien.prma_y_kien=data[i].ma_y_kien;
							divchuaykien.prma_baiviet=prl_mabaiviet;
								var inputykien = document.createElement("INPUT");
									inputykien.className="ykienkhaosatshow";
									inputykien.disabled =true;
									inputykien.value=data[i].noi_dung_y_kien;
									divchuaykien.appendChild(inputykien);
						document.getElementById("divomcacvotebaiviet-"+prl_mabaiviet).appendChild(divchuaykien);
					}
				})			
		}
	})


return;


	
}
var lstsoluong = [];
function clickthemorbobinhchon(prl){
lstsoluong=[];
var mabaiviet = prl.currentTarget.prma_baiviet;
var maykien = prl.currentTarget.prma_y_kien;

$("#xemketquakhaosat-"+mabaiviet).css("display","block");



$.ajax({
		url:link_host+'/ajax/themhuyluachonykienbaivietne',
		type:"POST",
		data:{
			_token:$('input[name=_token]').val(),
			ma_y_kien:maykien,
			ma_bai_viet:mabaiviet,
			ma_tai_khoan_chon:$("#session-ma-tk").val(),
			trang_thai:"1"
		}
	}).done(function(data){	
		$("#divomcacvotebaiviet-"+mabaiviet).empty();
		$.ajax({
		url:link_host+'/ajax/getykienvotebaivietne',
		type:"GET",
		data:{ ma_bai_viet:mabaiviet}
		}).done(function(data){	
				var big = data;
				for (var i = 0; i < data.length; i++) {
					var divchuaykien = document.createElement("div");
						// divchuaykien.addEventListener("click",clickthemorbobinhchon);
						// divchuaykien.prma_y_kien=data[i].ma_y_kien;
						// divchuaykien.prma_baiviet=mabaiviet;
							var inputykien = document.createElement("INPUT");
								inputykien.className="ykienkhaosatshow";
								inputykien.disabled =true;
								inputykien.value=data[i].noi_dung_y_kien;
								if(maykien==data[i].ma_y_kien){
									inputykien.style.background="#0aabf83b";
									}
								divchuaykien.appendChild(inputykien);

							var spansl = document.createElement("SPAN");
								spansl.className="spansoluongnguoichon";
								spansl.id="idsoluongchonykien"+data[i].ma_y_kien;
								if(maykien==data[i].ma_y_kien){
										spansl.style.border="solid 1px #0aabf83b";
										spansl.style.background="#e9f4fc82";
									}
								$.ajax({
										url:link_host+'/ajax/getsoluongluachoncuaykienne',
										type:"GET",
										data:{ ma_y_kien:data[i].ma_y_kien}
										}).done(function(diti){	
											//console.log(diti[0]);
											lstsoluong.push(diti[0]);//	alert(lstsoluong[0]);				
										})
										divchuaykien.appendChild(spansl);
								document.getElementById("divomcacvotebaiviet-"+mabaiviet).appendChild(divchuaykien);
				}		
		})
})




}

function showaaaa(){
	for (var i = 0; i < lstsoluong.length; i++) {
		// alert(lstsoluong[i].ma_y_kien);
		if(lstsoluong[i].ma_y_kien!=null)
		{
			 document.getElementById("idsoluongchonykien"+lstsoluong[i].ma_y_kien).textContent=lstsoluong[i].soluong;
	 	}
	}
}



function shownoptep(prl) {
	$.ajax({
		url:link_host+'/ajax/getlsttepduocnoptheomabaivietne',
		type:"GET",
		data:{
				ma_nguoi_nop:$('#session-ma-tk').val(),
				ma_bai_viet:prl
		}
	}).done(function(data){	 
		 if(data[0].soluong>0){
		 	$("#div-nopfile-"+prl).css("display","block");
		 	$("#divdanopfileroi-"+prl).css("display","block");
		 	$("#div-click-"+prl).css("display","none"); 
		 	$("#divomformnopbai-"+prl).css("display","none");
		 }
		 else{
		 	$("#div-click-"+prl).css("display","none"); 
		 	$("#div-nopfile-"+prl).css("display","block");
			
		 }
	})
}

function submitnopbaine(prl,prl_mathumuc,prl_mabaiviet){	

	  $('#submitfile-'+prl).submit(function(event) {
	    event.preventDefault();
		if( document.getElementById("inputfilenopbai-"+prl_mabaiviet).files.length == 0 )
			{
				alert("Chưa chọn tập tin");return;
			}
		if(document.getElementById("inputfilenopbai-"+prl_mabaiviet).files[0].size/1024/1024>50)
			{
				alert("Dung lượng file vượt quá 50MB");return;
			}
				

		var locallink= document.getElementById("inputfilenopbai-"+prl_mabaiviet).value;
		var lsts = locallink.lastIndexOf("\\");
		//alert(lsts+"-"+locallink.length);
		var tenfile = locallink.substring(lsts+1,locallink.length);
		// alert(tenfile);return;





		$("#divomformnopbai-"+prl_mabaiviet).css("display","none");
		$("#divloaddingupfile-"+prl_mabaiviet).css("display","block");
		var spannd = document.createElement("SPAN");
			spannd.textContent = "Đang tải tệp tin lên";
			var i = document.createElement("i");
				i.className="fa fa-spinner fa-pulse fa-fw";
			spannd.appendChild(i);
		document.getElementById("divloaddingupfile-"+prl_mabaiviet).appendChild(spannd);


	    var formData = new FormData($(this)[0]);
	        formData.append('ma_thumuc',prl_mathumuc);
	        formData.append('ma_bai_viet',prl_mabaiviet);

    $.ajax({
        url:  link_host+'/postfilenopbaithanhvienne',
        type: 'POST',  
        processData: false,
        contentType: false,              
        data: formData
    }).done(function(data){
    		$.ajax({
			 url:  link_host+'/ajax/posttepduocnopne',
			 type: 'POST',            
			 data: {
			 	_token:$('input[name=_token]').val(),
			 	ma_bai_viet:prl_mabaiviet,
			 	ma_nguoi_nop:$("#session-ma-tk").val(),
			 	ten_tep:tenfile,
			 	trang_thai:"1"
			 }
    		}).done(function(data){
    		  thongbaopopupy("Nộp tệp tin",data);	// alert(data);
    		});
    		//alert(prl_mabaiviet+$("#session-ma-tk").val()+tenfile);

    		// 
    		$("#divloaddingupfile-"+prl_mabaiviet).empty();
    		var spannd = document.createElement("SPAN");
			spannd.textContent = data;
			document.getElementById("divloaddingupfile-"+prl_mabaiviet).appendChild(spannd);
    });



});
}


function demnguoithoigian(rql,tag){
	var countDownDate = new Date(rql).getTime();
var x = setInterval(function() {
    var now = new Date().getTime();
    var distance = countDownDate - now;
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    document.getElementById(tag).innerHTML = '<i class="fa fa-clock-o" aria-hidden="true"></i>'+ " Cuộc khảo sát này kết thúc trong: " +'<p style="color:#9596d8;display:inline-block;">' + days + "ngày " + hours + "giờ "
    + minutes + "phút " + seconds + "giây "+'</p>';
    if (distance < 0) {
        clearInterval(x);
        document.getElementById(tag).innerHTML = "Hết hạn bình chọn";
    }
}, 1000);
}


function demnguoithoigiannopbai(rql,tag){
	var countDownDate = new Date(rql).getTime();
var x = setInterval(function() {
    var now = new Date().getTime();
    var distance = countDownDate - now;
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    document.getElementById(tag).innerHTML = '<i class="fa fa-clock-o" aria-hidden="true"></i>'+ " Thời hạn nộp bài còn: " +'<p style="color:#9596d8;display:inline-block;">' + days + "ngày " + hours + "giờ "
    + minutes + "phút " + seconds + "giây "+'</p>';
    if (distance < 0) {
        clearInterval(x);
        document.getElementById(tag).innerHTML = "Hết hạn nộp tệp tin";
    }
}, 1000);
}

// $( document ).ready(function() {


//   $('#submitfile').submit(function(event) {
//     event.preventDefault();
// alert("hihi");


//     var formData = new FormData($(this)[0]);
//         formData.append('nguoi_dang',$('#session-ma-tk').val());
//         formData.append('chu_cua_bai_dang',$('#div-hi-chu-bai-viet-ma-nhom').val());
//         formData.append('trang_thai','1');
//     $.ajax({
//         url:  link_host+'/uploadanh',
//         type: 'POST',  
//         processData: false,
//         contentType: false,              
//         data: formData
//     }).done(function(data){
//       submitdangbaiviet();
//       document.getElementById("formdangbaiviet").reset();
//       document.getElementById("imgInp").value="";
//       $('#divanhxemtruocduocthemvao').css("display","none");
//     });
    
// });


// });