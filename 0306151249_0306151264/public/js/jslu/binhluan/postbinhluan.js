function submitme(event)
{
	var mabl= "hi";

	if (window.event.keyCode == 13)
    {
    		 alert("ban vua enter");
    	var ndbinhluan = $('#binhluan-hi157').val();
    	alert(ndbinhluan);
    	


	//	alert( $('input[name=_token]').val());
	$.ajax({
		url:'/DATNHuyLuan/0306151249_0306151264/public/ajax/getmabinhluanne',
		type:'GET',
		data:{

		}
	}).done(function(data){
		 alert("hoan thanh lay ma");
			mabl=  data.substring(2,10);
         var mabinhluanint = parseInt(mabl)+1;
         mabl = mabinhluanint.toString();
          while(mabl.length<8)
          {
            mabl ="0"+mabl;
          }
          mabl ="BL"+ mabl;
          alert(mabl);


		 $.ajax(
          {
          url: '/DATNHuyLuan/0306151249_0306151264/public/ajax/postbinhluanne',
          type: 'POST',
          data:{
          	_token: $('input[name=_token]').val(),
          	ma_binh_luan :mabl,
          	ma_bai_viet: "BV00000078",
          	ma_nguoi_binh_luan:"N000001",
          	noi_dung_binh_luan:ndbinhluan,
          	thoi_gian_tao: "2001/01/01",
          	thoi_gian_sua: "2001/01/01",
          	nguoi_sua:"N000001",
          	trang_thai:"1"
          }
     	  }).done(function(data) {
     	  	alert("insert thanh cong");
     	  	$('#binhluan-hi157').val('');
     	  })

	})}}

