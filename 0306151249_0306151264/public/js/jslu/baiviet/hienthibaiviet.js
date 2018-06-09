function shownoptep(prl) {
	//alert(prl);
	if ($("#div-click-"+prl).css("display")=="block" && $("#div-nopfile-"+prl).css("display")=="none") {
		$("#div-click-"+prl).css("display","none"); 
		$("#div-nopfile-"+prl).css("display","block");
	}
	else{
		$("#div-click-"+prl).css("display","block"); 
		$("#div-nopfile-"+prl).css("display","none");
	}

	// $.ajax({
	// 	url:link_host+'/ajax/getlsttepduocnoptheomabaivietne',
	// 	type:"GET",
	// 	data:{
	// 			ma_nguoi_nop:$('#session-ma-tk').val(),
	// 			ma_bai_viet:prl
	// 	}
	// }).done(function(data){
	// 	console.log(data);
	// 	// alert(data[0].soluong);
	// })
}

function submitnopbaine(prl,prl_mathumuc,prl_mabaiviet){
//	alert($("#inputfilenopbai-"+prl_mabaiviet).val());
//	alert(document.getElementById("inputfilenopbai-"+prl_mabaiviet).required());
// if(document.getElementById("inputfilenopbai-"+prl_mabaiviet).files.length == 0)

// {

//  alert("khong co file");
 
// }
// else{
// 	 alert("có file");
// }


		
	  $('#submitfile-'+prl).submit(function(event) {
	    event.preventDefault();


if (document.getElementById("inputfilenopbai-"+prl_mabaiviet).value!="") {
    alert("No files selected.");
}


return;
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
    		// alert(data);
    		// alert("post file thành công");
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