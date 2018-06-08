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