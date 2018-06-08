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
          // $('#div-content-all-cmt-'+mabaiviet).html(data);
            $("#div-content-all-cmt-"+mabaiviet).empty();
              for (var i = 0; i < data.length; i++) {
                  taoramotcmt(data[i].ho_ten_lot+' '+data[i].ten+':'+data[i].noi_dung_binh_luan,
                              data[i].ma_binh_luan,
                              data[i].anh_dai_dien,
                              mabaiviet
                              );
              }

            })
}



function taoramotcmt(noidung,mabinhluancap1,duongdananh,mabaiviet){

    var divtonhat   = document.createElement("div");
        divtonhat.className="divbigbigchuamotcmt";
          var divcon1 = document.createElement("div");
              divcon1.className = "cl-div-content-boxreadcmt-avt";
              divcon1.id="dv-div-tare-cmt-"+mabinhluancap1;
              var divcon11 = document.createElement("div");
                  divcon11.className="cl-div-avt-cmt";
                  var img11 = document.createElement("IMG");
                      img11.className="imgaccountcmt";
                      img11.src=link_host+'/pictures/anh_dai_dien/'+duongdananh;
              var divcon12 = document.createElement("div");
                  divcon12.className="cl-div-tare-read";
                  var divcon121 = document.createElement("div");
                      divcon121.id="div-tare-cmt-"+mabinhluancap1;
                      divcon121.className="divchuacmtbac1";
                      var txtare121 = document.createElement("TEXTAREA");
                          txtare121.id="tare-cmt-"+mabinhluancap1;
                          txtare121.className="tara-read-cmt";
                          txtare121.value=noidung;
                  var divcon122 = document.createElement("div");
                      divcon122.className="div-btn-like-cmt";
                      var i122  = document.createElement("i");
                          i122.className="fa fa-star-o";
                  var divcon123 = document.createElement("div");
                      divcon123.className="div-btn-rep-cmt";
                      divcon123.addEventListener("click",function(){repbinhluan(mabinhluancap1);});
                      var i123  = document.createElement("i");
                         i123.className="fa fa-comments-o";
                        divcon121.appendChild(txtare121);
                        divcon122.appendChild(i122);
                        divcon123.appendChild(i123);
                  divcon11.appendChild(img11);
                  divcon12.appendChild(divcon121);
                  divcon12.appendChild(divcon122);
                  divcon12.appendChild(divcon123);
              divcon1.appendChild(divcon11);
              divcon1.appendChild(divcon12);
                   

          var divcon2 = document.createElement("div");
              divcon2.className="cl-divrepcmt";
              divcon2.id="divrepcmt"+mabinhluancap1;


          var divcon3 = document.createElement("div");
              divcon3.className="iprepcmtcmt";
              divcon3.id="inputrepcmt-"+mabinhluancap1;
              var divcon31 = document.createElement("div");
                  divcon31.className="divrepcmt";
                  divcon31.id="div-input-binhluan-"+mabinhluancap1;
                  var divcon311 = document.createElement("div");
                      var divcon3111 = document.createElement("div");
                          divcon3111.className="divimgaccountcmt";
                          var img3111 = document.createElement("IMG");
                              img3111.className="imgaccountcmt";
                              img3111.src=link_host+'/pictures/anh_dai_dien/'+ $("#session-anh-dai-dien-tk").val();
                      var divcon3112 = document.createElement("div");
                          divcon3112.className="divtextrepcmt";
                          var ip3112 = document.createElement("INPUT");
                              ip3112.className="iptextrepcmt";
                              ip3112.id="input-binhluan-"+mabinhluancap1;
                              ip3112.addEventListener("keypress",function(){submitrepcmt(event,mabinhluancap1)});
                              ip3112.placeholder="Viết bình luận...";
                      var divcon3113 = document.createElement("div");
                          divcon3113.className="btnrepsendcmt";
                          var i3113  = document.createElement("i");
                              i3113.className="fa fa-paper-plane-o";
                              i3113.addEventListener("click",function(){sendrepbinhluan(mabinhluancap1);});

                          divcon3113.appendChild(i3113);
                          divcon3112.appendChild(ip3112);
                          divcon3111.appendChild(img3111);      
                      divcon311.appendChild(divcon3111);
                      divcon311.appendChild(divcon3112);
                      divcon311.appendChild(divcon3113);
                  divcon31.appendChild(divcon311);
              divcon3.appendChild(divcon31);

        divtonhat.appendChild(divcon1);
        divtonhat.appendChild(divcon2);
        divtonhat.appendChild(divcon3);


    document.getElementById("div-content-all-cmt-"+mabaiviet).appendChild(divtonhat);
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
                var textarea = document.createElement("TEXTAREA");
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

    var noidung = $('#input-binhluan-'+prl).val().trim();
        if (noidung=="")return;
    $.ajax(
          {
          url: link_host+'/ajax/postbinhluanc2ne',
          type: 'POST',
          data:{
            _token: $('input[name=_token]').val(),
            ma_binh_luan: prl,
            ma_nguoi_binh_luan:$('#session-ma-tk').val(),
            noi_dung_binh_luan:noidung,
            nguoi_sua:$('#session-ma-tk').val(),
            trang_thai:"1"
          }
        }).done(function(data){
          $('#input-binhluan-'+prl).val(""); //gán lại không có giá trị
          reloadlstcmtrep(prl);
        })
}

function sendbinhluan(mabaivietl){
        var ndbinhluan = $('#input-binhluan-'+mabaivietl).val();
      ndbinhluan=ndbinhluan.trim();
      if (ndbinhluan=="") return;
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

          reloadbinhluan(mabaivietl);

           $('#input-binhluan-'+mabaivietl).val('');})
}

function submitme(event,mabaivietl)
{	
	var mabl= "hi";
	var ndbinhluan="hi";
	if (window.event.keyCode == 13)
    {
    	//	 alert("ban vua enter");

    	//alert(ndbinhluan);
	//	alert( $('input[name=_token]').val());
	// $.ajax({
 //    //getmabinhluan {{ asset('css/lu/baiviet/baiviet.css') }}  ///DATNHuyLuan/0306151249_0306151264/public/ajax/getmabinhluanne
	// 	url: link_host+'/ajax/getmabinhluanne',
	// 	type:'GET',
	// 	data:{

	// 	}
	// }).done(function(data){
 //         mabl= data+1;
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

          reloadbinhluan(mabaivietl);

     	  	 $('#input-binhluan-'+mabaivietl).val(''); // gán lại rỗng cho cmt
     	  	// 	$.ajax(
     	  	// 	{
     	  	// 		url: link_host+'/ajax/getbinhluanmoine',
     	  	// 		type:'GET',
     	  	// 		data:{
     	  	// 			ma_binh_luan:mabl
     	  	// 			,noidung:ndbinhluan
     	  	// 		}
     	  	// 	}).done(function(data){
     	  	// 		//	alert(ndbinhluan+": noi dung bl cuoi cung");

     	  	// 			var econn = document.createElement("div");
         //                 econn.setAttribute("id", mabl);
         //                // document.getElementById('divcontent').appendChild(element);
         //                var Echa = document.getElementById('div-content-all-cmt-'+mabaivietl);
         //                //Echa.insertBefore(econn, Echa.lastChild);
         //                Echa.appendChild(econn);	
         //                $('#'+mabl).html(data);
         //                //dòng dưới vì bị lỗi hiển thị
         //               // $('#dv-div-big-'+ma_bai_viet).css("height","auto");

     	  	// 	})

     	  	             


     	  })
 // })
}}



