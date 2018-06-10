
function showbinhchonykien(prl_mabaiviet){
	//alert(prl_mabaiviet);

	$("#divomcacvotebaiviet-"+prl_mabaiviet).css("display","block");
	$("#div-click-show-y-kien-"+prl_mabaiviet).css("display","none");
	
		$.ajax({
		url:link_host+'/ajax/getykienvotebaivietne',
		type:"GET",
		data:{
				ma_bai_viet:prl_mabaiviet
		}
	}).done(function(data){	

// function(){
// 								console.log(maykien);
// 								clickthemorbobinhchon(maykien,prl_mabaiviet,$('#session-ma-tk').val(),"1");
// 						}

		console.log(data);
		var maykien=0;
		for (var i = 0; i < data.length; i++) {
			//maykien= data[i].ma_y_kien;
			var divchuaykien = document.createElement("div");
				// divchuaykien.id=data[i].ma_y_kien;
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

function clickthemorbobinhchon(prl){

//alert(prl.currentTarget.prma_baiviet+"-"+prl.currentTarget.prma_y_kien);
var mabaiviet = prl.currentTarget.prma_baiviet;
var maykien = prl.currentTarget.prma_y_kien;
// ma_y_kien,ma_bai_viet,ma_tai_khoan_chon,trang_thai
//alert("hhii");
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
		// alert(data);
		// console.log(data);
		// alert("giải quyết thành công");
	})
        
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
    			alert(data);
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