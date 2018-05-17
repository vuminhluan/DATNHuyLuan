function clickbinhluan(pr1)
{
	$('#'+pr1).css("display","block");
	$('#'+'div-inputbinhluan-157').css("display","block");


		$.ajax({
		url:'/DATNHuyLuan/0306151249_0306151264/public/ajax/getbinhluanne',
		type:'GET',
		data{
			ma_bai_viet:pr1
		}
	}).done(function(data){

						// var econn = document.createElement("div");
      //                   econn.setAttribute("id", mabl);
      //                   var Echa = document.getElementById('div-content-all-cmt-157');
      //                   Echa.appendChild(econn);
                        $('#'+pr1).html(data);

						// $('#'+pr1).appendChild()
				
	})
}


function clicklike(pr1)
{

}



function submitme(event)
{
	var mabl= "hi";
	var ndbinhluan="hi";
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

     	  		$.ajax(
     	  		{
     	  			url:'/DATNHuyLuan/0306151249_0306151264/public/ajax/getbinhluanmoine',
     	  			type:'GET',
     	  			data:{
     	  				ma_binh_luan:mabl,
     	  				noidung:ndbinhluan
     	  			}

     	  		}).done(function(data){

     	  				alert(ndbinhluan+": noi dung bl cuoi cung");

     	  				var econn = document.createElement("div");
                         econn.setAttribute("id", mabl);
                        // document.getElementById('divcontent').appendChild(element);
                        var Echa = document.getElementById('div-content-all-cmt-157');
                        //Echa.insertBefore(econn, Echa.lastChild);
                        Echa.appendChild(econn);
                        $('#'+mabl).html(data);

     	  		})

     	  	             


     	  })

	})}}

