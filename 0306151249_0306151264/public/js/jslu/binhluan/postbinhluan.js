var host="/DATNHuyLuan/0306151249_0306151264/public/"; // tam thoi de day

function clickbinhluan(mabaiviet)
{
	$('#div-content-all-cmt-'+mabaiviet).css("display","block");
	$('#div-input-binhluan-'+mabaiviet).css("display","block");
     	  		$.ajax(
     	  		{
     	  			url: link_host+'/ajax/getbinhluanne',
     	  			type:'GET',
     	  			data:{
     	  				ma_bai_viet:mabaiviet
     	  			}

     	  		}).done(function(data){
					 $('#div-content-all-cmt-'+mabaiviet).html(data);
     	  		})
}





function submitme(event,mabaivietl)
{	
	var mabl= "hi";
	var ndbinhluan="hi";
	if (window.event.keyCode == 13)
    {
    	//	 alert("ban vua enter");
    	var ndbinhluan = $('#input-binhluan-'+mabaivietl).val();
    	ndbinhluan=ndbinhluan.trim();
    	//alert(ndbinhluan);
	//	alert( $('input[name=_token]').val());
	$.ajax({
    //getmabinhluan {{ asset('css/lu/baiviet/baiviet.css') }}  ///DATNHuyLuan/0306151249_0306151264/public/ajax/getmabinhluanne
		url: link_host+'/ajax/getmabinhluanne',
		type:'GET',
		data:{

		}
	}).done(function(data){
	//	 alert("hoan thanh lay ma");
			mabl=  data.substring(2,10);
         var mabinhluanint = parseInt(mabl)+1;
         mabl = mabinhluanint.toString();
          while(mabl.length<8)
          {
            mabl ="0"+mabl;
          }
          mabl ="BL"+ mabl;
       //   alert(mabl);
		 $.ajax(
          {
          url: link_host+'/ajax/postbinhluanne',
          type: 'POST',
          data:{
          	_token: $('input[name=_token]').val(),
          	ma_binh_luan :mabl,
          	ma_bai_viet: mabaivietl,
          	ma_nguoi_binh_luan:"N000001",
          	noi_dung_binh_luan:ndbinhluan,
          	thoi_gian_tao: "2001/01/01",
          	thoi_gian_sua: "2001/01/01",
          	nguoi_sua:"N000001",
          	trang_thai:"1"
          }
     	  }).done(function(data) {
     	  	$('#input-binhluan-'+mabaivietl).val(''); // gán lại rỗng cho cmt
     	  		$.ajax(
     	  		{
     	  			url: link_host+'/ajax/getbinhluanmoine',
     	  			type:'GET',
     	  			data:{
     	  				ma_binh_luan:mabl
     	  				,noidung:ndbinhluan
     	  			}
     	  		}).done(function(data){
     	  			//	alert(ndbinhluan+": noi dung bl cuoi cung");

     	  				var econn = document.createElement("div");
                         econn.setAttribute("id", mabl);
                        // document.getElementById('divcontent').appendChild(element);
                        var Echa = document.getElementById('div-content-all-cmt-'+mabaivietl);
                        //Echa.insertBefore(econn, Echa.lastChild);
                        Echa.appendChild(econn);	
                        $('#'+mabl).html(data);
                        //dòng dưới vì bị lỗi hiển thị
                       // $('#dv-div-big-'+ma_bai_viet).css("height","auto");

     	  		})

     	  	             


     	  })

	})}}



