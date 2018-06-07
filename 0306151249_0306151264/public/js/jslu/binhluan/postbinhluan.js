var host="/DATNHuyLuan/0306151249_0306151264/public/"; // tam thoi de day

function clickbinhluan(mabaiviet)
{

 if($('#dv-div-big-'+mabaiviet).css("display")=="none"&& $('#div-content-all-cmt-'+mabaiviet).css("display")=="none"&& $('#div-input-binhluan-'+mabaiviet).css("display")=="none"){
        $('#dv-div-big-'+mabaiviet).css("display","block");
        $('#div-content-all-cmt-'+mabaiviet).css("display","block");
        $('#div-input-binhluan-'+mabaiviet).css("display","block");
         reloadbinhluan(mabaiviet);
 }
 else{
        $('#dv-div-big-'+mabaiviet).css("display","none");
        $('#div-content-all-cmt-'+mabaiviet).css("display","none");
        $('#div-input-binhluan-'+mabaiviet).css("display","none");
 }

 

}


function reloadbinhluan(mabaiviet){
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


function taoramotcmt(noidung,mabinhluancap1,duongdananh,tennguoicmt,mabaiviet){

     var divtochuacmtvaanhdaidien = document.createElement("div");
        divtochuacmtvaanhdaidien.className="cl-div-content-boxreadrepcmt-avt";
        var divchuaanhdaidien = document.createElement("div");
            divchuaanhdaidien.className="cl-div-avt-repcmt";
            var imganhdaidien = document.createElement("IMG");
                imganhdaidien.className="imgaccountrepcmt";
                imganhdaidien.src=link_host+'/pictures/anh_dai_dien/'+duongdananh;//'localhost'+link_host+
            divchuaanhdaidien.appendChild(imganhdaidien);

        var divchuatextvalikecmt = document.createElement("div");
            divchuatextvalikecmt.className="cl-div-tare-readrep";
            var divchuatext = document.createElement("div");
                divchuatext.className="divchuacmtbac2"; 
                var textarea = document.createElement("TEXTAREA")
                    textarea.disabled =true;
                    textarea.className="tara-read-rep-cmt";
                    textarea.value=noidung;
                divchuatext.appendChild(textarea);
            var divlikecmt = document.createElement("div");
                var divspaniconlike = document.createElement("SPAN");
                    divspaniconlike.className="fa fa-star-o";

            divchuatextvalikecmt.appendChild(divchuatext);
            divchuatextvalikecmt.appendChild(divlikecmt);

        divtochuacmtvaanhdaidien.appendChild(divchuaanhdaidien);
        divtochuacmtvaanhdaidien.appendChild(divchuatextvalikecmt);

    document.getElementById("divrepcmt"+mabinhluancap1).appendChild(divtochuacmtvaanhdaidien);
}



function repbinhluan(prl){
 // alert(prl);


  if ($("#inputrepcmt-"+prl).css("display")=="none" && $("#divrepcmt"+prl).css("display")=="none") {
        $("#inputrepcmt-"+prl).css("display","block");
        $("#divrepcmt"+prl).css("display","block");

          reloadlstcmtrep(prl);
  }
  else{
     
    $("#inputrepcmt-"+prl).css("display","none");
        $("#divrepcmt"+prl).css("display","none");
  }
}

function reloadlstcmtrep(prl){
          $.ajax({
          url: link_host+'/ajax/getbinhluancap2ne',
          type: 'GET',
          data:{
            ma_binh_luan: prl
          }
        }).done(function(data){
             $("#divrepcmt"+prl).empty();
          for (var i = 0; i < data.length; i++) {
              taoramotrepcmt(data[i].noi_dung_binh_luan,data[i].ma_binh_luan,data[i].anh_dai_dien,data[i].ho_ten_lot+data[i].ten,data[i].ma_binh_luan_cap_2);
          }

        })
}

function taoramotrepcmt(noidung,mabinhluancap1,duongdananh,tennguoicmt,mabinhluancap2){
    var divtochuacmtvaanhdaidien = document.createElement("div");
        divtochuacmtvaanhdaidien.className="cl-div-content-boxreadrepcmt-avt";
        var divchuaanhdaidien = document.createElement("div");
            divchuaanhdaidien.className="cl-div-avt-repcmt";
            var imganhdaidien = document.createElement("IMG");
                imganhdaidien.className="imgaccountrepcmt";
                imganhdaidien.src=link_host+'/pictures/anh_dai_dien/'+duongdananh;//'localhost'+link_host+
            divchuaanhdaidien.appendChild(imganhdaidien);

        var divchuatextvalikecmt = document.createElement("div");
            divchuatextvalikecmt.className="cl-div-tare-readrep";
            var divchuatext = document.createElement("div");
                divchuatext.className="divchuacmtbac2"; 
                var textarea = document.createElement("TEXTAREA")
                    textarea.disabled =true;
                    textarea.className="tara-read-rep-cmt";
                    textarea.value=noidung;
                divchuatext.appendChild(textarea);
            var divlikecmt = document.createElement("div");
                var divspaniconlike = document.createElement("SPAN");
                    divspaniconlike.className="fa fa-star-o";

            divchuatextvalikecmt.appendChild(divchuatext);
            divchuatextvalikecmt.appendChild(divlikecmt);

        divtochuacmtvaanhdaidien.appendChild(divchuaanhdaidien);
        divtochuacmtvaanhdaidien.appendChild(divchuatextvalikecmt);

    document.getElementById("divrepcmt"+mabinhluancap1).appendChild(divtochuacmtvaanhdaidien);
}
function submitrepcmt(event,mabaivietl)
{ 

  if (window.event.keyCode == 13)
    {
      sendrepbinhluan(mabaivietl);
    }
}
function sendrepbinhluan(prl){
    $.ajax(
          {
          url: link_host+'/ajax/postbinhluanc2ne',
          type: 'POST',
          data:{
            _token: $('input[name=_token]').val(),
            ma_binh_luan: prl,
            ma_nguoi_binh_luan:$('#session-ma-tk').val(),
            noi_dung_binh_luan:$('#input-binhluan-'+prl).val(),
            nguoi_sua:$('#session-ma-tk').val(),
            trang_thai:"1"
          }
        }).done(function(data){
          $('#input-binhluan-'+prl).val(""); //gán lại không có giá trị
          reloadlstcmtrep(prl);
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
         mabl= data+1;
		 $.ajax(
          {
          url: link_host+'/ajax/postbinhluanne',
          type: 'POST',
          data:{
          	_token: $('input[name=_token]').val(),
          	ma_bai_viet: mabaivietl,
          	ma_nguoi_binh_luan:$('#session-ma-tk').val(),
          	noi_dung_binh_luan:ndbinhluan,
          	nguoi_sua:$('#session-ma-tk').val(),
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
 })
}}



