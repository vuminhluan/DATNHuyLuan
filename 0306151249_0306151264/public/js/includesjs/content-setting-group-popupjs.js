var nhomhientaidangduocchon;
function opentab_pheduyetthanhvien(pr) {
    nhomhientaidangduocchon=pr;
//	alert("open tab phê duyệt thành viên"+pr);
	$.ajax({
		url: link_host+'/ajax/getlstthanhviendangchopheduyettheomanhomne',
		type:'GET',
		data:{
			ma_nhom:pr
		}
	}).done(function(data){

		//alert("xong");
		//alert(data);
		console.log(data);

        var lsrv = document.getElementById('divpheduyetthanhvien'); // xóa hết các element trong divpheduyetthanhvien
        while(lsrv.firstChild){
            lsrv.removeChild(lsrv.firstChild);
        }


		////
		var listsearchdiv = document.getElementById('divpheduyetthanhvien');
		for (var i = 0; i < data.length; i++) {
		   var divkq = document.createElement("div");
        divkq.style.height= "70px";
        divkq.style.with="100%";
        divkq.style.background ="white";
        divkq.style.color="black";
        divkq.style.borderBottom ="solid 1px #9695d8";
        divkq.innerHTML ='<h4>'+ data[i].ho_ten_lot +" "+ data[i].ten+'</h4>';


        var divomhainut= document.createElement("div");
        	divomhainut.style.width="280px";
        	divomhainut.style.height="100%";
        //	divomhainut.style.border="solid 1px #9695d8";
        	divomhainut.style.float="right";
        	divomhainut.style.paddingTop="17px";

        var btnchophepgianhapnhom = document.createElement("div");
        btnchophepgianhapnhom.style.cursor="pointer";
        btnchophepgianhapnhom.style.marginTop="0px";
        btnchophepgianhapnhom.style.marginLeft="0px";
        btnchophepgianhapnhom.style.marginRight="5px";
        btnchophepgianhapnhom.style.borderRadius="3px";
        btnchophepgianhapnhom.style.paddingLeft="10px";
        btnchophepgianhapnhom.style.width="120px";
        btnchophepgianhapnhom.style.float="left";
        btnchophepgianhapnhom.style.paddingTop="3px";
        btnchophepgianhapnhom.style.height ="29px";
        btnchophepgianhapnhom.style.with="30px";
        btnchophepgianhapnhom.style.background="white";
        btnchophepgianhapnhom.style.color="black";
        btnchophepgianhapnhom.style.border="solid 1px #9695d8";
        btnchophepgianhapnhom.innerHTML = '<i class="fa fa-check" aria-hidden="true"></i> &nbsp; Phê duyệt';
        btnchophepgianhapnhom.addEventListener("click",clickpheduyetgianhapnhom);
        btnchophepgianhapnhom.myParamMaNhom=pr;
        btnchophepgianhapnhom.myParamMaTaiKhoan=data[i].ma_tai_khoan;
       
        btnchophepgianhapnhom.id="btnpheduyetgianhapnhom"+data[i].ma_tai_khoan;

        var btntuchoigianhapnhom = document.createElement("div");
        btntuchoigianhapnhom.style.cursor="pointer";
        btntuchoigianhapnhom.style.marginTop="0px";
        btntuchoigianhapnhom.style.marginLeft="5px";
        btntuchoigianhapnhom.style.borderRadius="3px";
        btntuchoigianhapnhom.style.paddingLeft="10px";
        btntuchoigianhapnhom.style.width="120px";
        btntuchoigianhapnhom.style.float="left";
        btntuchoigianhapnhom.style.paddingTop="3px";
        btntuchoigianhapnhom.style.height ="29px";
        btntuchoigianhapnhom.style.with="30px";
        btntuchoigianhapnhom.style.background="white";
        btntuchoigianhapnhom.style.color="black";
        btntuchoigianhapnhom.style.border="solid 1px #9695d8";
        btntuchoigianhapnhom.innerHTML = '<i class="fa fa-check" aria-hidden="true"></i> &nbsp; Từ chối';
        btntuchoigianhapnhom.addEventListener("click",clicktuchoigianhapnhom);
        btntuchoigianhapnhom.myParamMaNhom=pr;
        btntuchoigianhapnhom.myParamMaTaiKhoan=data[i].ma_tai_khoan;
       //data[i].ma_nhom;
        btntuchoigianhapnhom.id="btntuchoiduyetgianhapnhom"+data[i].ma_tai_khoan;

        //alert(data[i].ma_nhom+"day la luc tao xxx");
        
       
        divomhainut.appendChild(btnchophepgianhapnhom);
        divomhainut.appendChild(btntuchoigianhapnhom);
        divkq.appendChild(divomhainut);
        document.getElementById("divpheduyetthanhvien").appendChild(divkq);
		}
		////
	})
}
///function tim kiếm thành viên trong list thành viên
function timkiemthanhvien_menugrsetting(){
    alert($('#ip-timkiemthanhvien-popup-settingnhom').val());
}
///


// ////////////load list thành viên của nhóm
function opentab_lstthanhvien(idnhom) {
    nhomhientaidangduocchon=idnhom;
//  alert("open tab phê duyệt thành viên"+pr);
    $.ajax({
        url: link_host+'/ajax/getlstthanhvientheomanhomne',
        type:'GET',
        data:{
            ma_nhom:idnhom,
            trang_thai:"1" //1 là thành viên còn hoạt động
        }
    }).done(function(data){

        //alert("xong");
        //alert(data);
        console.log(data);

        var lsrv = document.getElementById('divlstthanhvien'); // xóa hết các element trong divpheduyetthanhvien
        while(lsrv.firstChild){
            lsrv.removeChild(lsrv.firstChild);
        }


        ////
        var listsearchdiv = document.getElementById('divlstthanhvien');
        for (var i = 0; i < data.length; i++) {
        var divkq = document.createElement("div");
        divkq.style.height= "70px";
        divkq.style.with="100%";
        divkq.style.background ="white";
        divkq.style.color="black";
        divkq.style.borderBottom ="solid 1px #9695d8";
        divkq.innerHTML ='<h4>'+ data[i].ho_ten_lot +" "+ data[i].ten+'</h4>';


        var divomhainut= document.createElement("div");
            divomhainut.style.width="280px";
            divomhainut.style.height="100%";
            divomhainut.style.float="right";
            divomhainut.style.paddingTop="17px";
            divomhainut.id="divomhainut"+data[i].ma_tai_khoan;


        var btntuchoigianhapnhom = document.createElement("div");
        btntuchoigianhapnhom.style.cursor="pointer";
        btntuchoigianhapnhom.style.marginTop="0px";
        btntuchoigianhapnhom.style.marginLeft="5px";
        btntuchoigianhapnhom.style.borderRadius="3px";
        btntuchoigianhapnhom.style.paddingLeft="10px";
        btntuchoigianhapnhom.style.width="33px";
        btntuchoigianhapnhom.style.float="right";
        btntuchoigianhapnhom.style.paddingTop="3px";
        btntuchoigianhapnhom.style.height ="29px";
        btntuchoigianhapnhom.style.with="30px";
        btntuchoigianhapnhom.style.background="#ede6f2";
        btntuchoigianhapnhom.style.color="#9695d8";
        btntuchoigianhapnhom.style.border="solid 1px #dfd0ea";
        btntuchoigianhapnhom.innerHTML = '<i class="fa fa-ellipsis-h" aria-hidden="true"></i>';
        btntuchoigianhapnhom.addEventListener("click",showtoggletuychonthanhviennhomtrue);
        btntuchoigianhapnhom.myParamIdthediv="togglemenu"+data[i].ma_tai_khoan;
       // btntuchoigianhapnhom.myParamMaTaiKhoan=data[i].ma_tai_khoan;
       btntuchoigianhapnhom.appendChild(showtoggletuychonthanhviennhom(data[i].ma_tai_khoan,nhomhientaidangduocchon));
        btntuchoigianhapnhom.id="btnshowmenuluachonquanlythanhvien"+data[i].ma_tai_khoan;

        // divomhainut.appendChild(btnchophepgianhapnhom);
        divomhainut.appendChild(btntuchoigianhapnhom);
        divkq.appendChild(divomhainut);
        document.getElementById("divlstthanhvien").appendChild(divkq);
        }
        ////
    })
}
function showtoggletuychonthanhviennhomtrue(pr)
{
    if($('#'+pr.currentTarget.myParamIdthediv).css("display")=="block")
    $('#'+pr.currentTarget.myParamIdthediv).css("display","none");
else
     $('#'+pr.currentTarget.myParamIdthediv).css("display","block");

}
function showtoggletuychonthanhviennhom(idtaikhoan,manhom){
    var menucon = document.createElement("div");
    menucon.id="togglemenu"+idtaikhoan;
    menucon.style.marginTop="15px";
    menucon.style.width="180px";
    menucon.style.marginLeft="-147px";
    menucon.style.paddingLeft="7px";
    menucon.style.height="auto";
    menucon.style.background="white";
    menucon.style.border="solid 1px #9695d8";
    menucon.style.display="none";
    menucon.style.borderRadius="5px";
    menucon.style.position="relative";
    // 
    var x = document.createElement("SPAN");
    x.style.position="absolute";
    x.style.marginTop="-10px";
    x.style.marginLeft="137px";
    x.style.borderBottom="9px solid #9695d8";
    x.style.borderLeft ="10px solid transparent";
    x.style.borderRight="10px solid transparent";
    menucon.appendChild(x);
    // 
     var z = document.createElement("SPAN");
    z.style.position="absolute";
    z.style.marginTop="-10px";
    z.style.marginLeft="137px";
    z.style.borderBottom="10px solid #fff";
    z.style.borderLeft ="10px solid transparent";
    z.style.borderRight="10px solid transparent";
    menucon.appendChild(z);
    // /////////////////////////

    $.ajax({
        url: link_host+'/ajax/getmachucvutaikhoanne', /// lấy mã tài khoản về đây
        type:'GET',
        data:{
            ma_nhom:manhom,
            ma_tai_khoan:idtaikhoan
        }
    }).done(function(data){
       // alert(data[0].ma_chuc_vu+"đây mã tìm được đây");
        var arrCN = ["Quản trị viên","Phê duyệt thành viên","Phê duyệt bài viết","Trợ giúp xuất sắc","Hỗ trợ nhiệt tình"];
        var arrMCN= ["CV02","CV03","CV04","CV05","CV06","CV07"];
        var arrNameChucNang= ["onoffquantrivien","onoffpheduyetthanhvien","onoffpheduyetbaiviet","onofftrogiupxuatsac","onoffhotronhiettinh"];
        var ul= document.createElement("UL");
            for (var i = 0; i < 5; i++) {
                    var li1= document.createElement("LI");
                    //  var nameofevent = arrNameChucNang[i];
                        li1.addEventListener("click",onoffcapquyenchucnangtrongnhom);
                        li1.myParamMaChucVu=arrMCN[i];
                        li1.myparamMaNhom=manhom;
                        li1.myparamMaTaiKhoan=idtaikhoan;
                    var flagl = true;
                    for (var j = 0; j < data.length; j++) {
                        if (data[j].ma_chuc_vu==arrMCN[i]) {
                                 var spl = document.createElement("SPAN");
                                 spl.id="sptick"+arrMCN[i]+idtaikhoan; // id của span này gồm sp stick CV02 TK00001
                                 spl.className="fa fa-check";
                                 var txtli1=document.createTextNode(arrCN[i]);
                                 li1.appendChild(spl);
                                 li1.appendChild(txtli1);
                                 ul.appendChild(li1);
                                 flagl=false;
                        }}
                    if(flagl)
                    {
                        var txtli1=document.createTextNode(arrCN[i]);li1.appendChild(txtli1);ul.appendChild(li1);
                    }
            }
          var li1= document.createElement("LI");
              li1.addEventListener("click",clicktrucxuatkhoinhom);
              li1.myparamMaNhom=manhom;
              li1.myparamMaTaiKhoan=idtaikhoan;


          var txtli1=document.createTextNode("Trục xuất");li1.appendChild(txtli1);ul.appendChild(li1);

            menucon.appendChild(ul); 
      
})

return menucon;
}

/////////////////
function   onoffcapquyenchucnangtrongnhom(prl){
    alert("quản trị thành viên");
    var idtaikhoan=prl.currentTarget.myparamMaTaiKhoan;
    var idnhom = prl.currentTarget.myparamMaNhom
    var machucvu=prl.currentTarget.myParamMaChucVu;
    $.ajax({
        url:link_host+'/ajax/postupdatechucvuthanhvientrongnhomne',
        type:'POST',
        data:{
            _token:$('input[name=_token]').val(),
            ma_chuc_vu:machucvu,
            ma_tai_khoan:idtaikhoan,
            ma_nhom:idnhom,
            trang_thai:"1"
        }}).done(function(data){
         //   alert(data);
          //  console.log(data);
         //   $('#sptick'+machucvu+idtaikhoan).css("display","none");
         //   opentab_lstthanhvien(idnhom);
            $('#btnshowmenuluachonquanlythanhvien'+idtaikhoan).children().last().remove();
             $('#btnshowmenuluachonquanlythanhvien'+idtaikhoan).append(showtoggletuychonthanhviennhom(idtaikhoan,idnhom));
         //  document.getElementById('btnshowmenuluachonquanlythanhvien'+idtaikhoan).appendChild(showtoggletuychonthanhviennhom(idtaikhoan,idnhom));

    })
} 





function clicktrucxuatkhoinhom(prl){
    var manhom=prl.currentTarget.myparamMaNhom;
   // alert("say click"+prl.currentTarget.myparamMaNhom+"-"+prl.currentTarget.myparamMaTaiKhoan);
    $.ajax({
        url:link_host+'/ajax/postupdatethanhvientrongnhomne',
        type:'POST',
        data:{
            _token:$('input[name=_token]').val(),
            ma_nhom:manhom,
            ma_tai_khoan:prl.currentTarget.myparamMaTaiKhoan,
            trang_thai:"0"
        }
    }).done(function(data){
        alert("kích thành  viên khỏi nhóm thành công");
        alert(data);
     //   opentab_lstthanhvien(manhom);
    })
}
function clickroikhoinhomnhom(prl){
    var manhom=prl.currentTarget.myparamMaNhom;
   // alert("say click"+prl.currentTarget.myparamMaNhom+"-"+prl.currentTarget.myparamMaTaiKhoan);
    $.ajax({
        url:link_host+'/ajax/postupdatethanhvientrongnhomne',
        type:'POST',
        data:{
            _token:$('input[name=_token]').val(),
            ma_nhom:manhom,
            ma_tai_khoan:prl.currentTarget.myparamMaTaiKhoan,
            trang_thai:"0"
        }
    }).done(function(data){
        alert("Rời nhóm viên khỏi nhóm thành công");
        alert(data);
     window.location = link_trangchufull;
    })
}

// //////////////////

function clickpheduyetgianhapnhom(prl){
	//alert("phê duyệt mã nhóm:"+prl.currentTarget.myParamMaNhom);
//	alert("phê duyệt:"+prl.currentTarget.myParamMaTaiKhoan);
	var prmanhom=prl.currentTarget.myParamMaNhom;
	var prmataikhoan=prl.currentTarget.myParamMaTaiKhoan;
	 $.ajax({
            url: link_host+'/ajax/postthemthanhvienvaonhomne',
            type:'POST',
            data:{
                    _token: $('input[name=_token]').val(),
                    ma_nhom:prmanhom,
                    ma_tai_khoan:prmataikhoan,
                    ma_chuc_vu:"CV07",
                    thoi_gian_vao_nhom:"2001/01/01",
                    thoi_gian_thoat_nhom:"2001/01/01",
                    trang_thai:"1"        

            }}).done(function(data){
                //    alert(data);
                //    alert("phê duyệt mã nhóm:"+prmanhom);
				//	alert("phê duyệt mã tk:"+prmataikhoan);
                    //sau khi insert vào bảng thành viên xong
				            $.ajax({
				            url: link_host+'/ajax/postupdatethanhvienchopheduyetne',
				            type:'POST',
				            data:{
				                    _token: $('input[name=_token]').val(),
				                    ma_nhom:prmanhom,
				                    ma_tai_khoan:prmataikhoan,
                                    trang_thai:"0",
				                    nguoi_phe_duyet:$("#session-ma-tk").val()
				                           

				            }}).done(function(data){
				                 //   alert(data);
				                    //sau khi hoàn tất thêm thành viên vào nhóm
				                    $("#btnpheduyetgianhapnhom"+prmataikhoan).css("display","none");
				                     $("#btntuchoiduyetgianhapnhom"+prmataikhoan).css("display","none");
                                     ////
                                    opentab_pheduyetthanhvien(nhomhientaidangduocchon);// cái này là gọi lại hàm cập nhật người tham gia
				            })
                    //
            })



            ///ajax/postupdatethanhvienchopheduyetne
}
function clicktuchoigianhapnhom(prl){
	//alert("từ chối"+prl.currentTarget.myParamMaTaiKhoan);
    var prmanhom=prl.currentTarget.myParamMaNhom;
    var prmataikhoan=prl.currentTarget.myParamMaTaiKhoan;

                            $.ajax({
                            url: link_host+'/ajax/postupdatethanhvienchopheduyetne',
                            type:'POST',
                            data:{
                                    _token: $('input[name=_token]').val(),
                                    ma_nhom:prmanhom,
                                    ma_tai_khoan:prmataikhoan,
                                    trang_thai:"2", //2 là trạng thái bị hủy xin gia nhập
                                    nguoi_phe_duyet:$("#session-ma-tk").val()
                                           

                            }}).done(function(data){
                                   // alert(data);
                                    //sau khi hoàn tất thêm thành viên vào nhóm
                                    $("#btnpheduyetgianhapnhom"+prmataikhoan).css("display","none");
                                     $("#btntuchoiduyetgianhapnhom"+prmataikhoan).css("display","none");
                                     ////
                                    opentab_pheduyetthanhvien(nhomhientaidangduocchon);// cái này là gọi lại hàm cập nhật người tham gia
                            })


}

//var listsearchdiv = document.getElementById('divpheduyetthanhvien');
		//for (var i = 0; i < data.length; i++) {
		   // var divkq = document.createElement("div");
     //    divkq.style.height= "70px";
     //    divkq.style.with="100%";
     //    divkq.style.background ="white";
     //    divkq.style.color="black";
     //    divkq.style.borderBottom ="solid 1px #9695d8";
     //    divkq.innerHTML = data[i].ma_tai_khoan;

     //    var btnxingianhapnhom = document.createElement("div");
     //    btnxingianhapnhom.style.cursor="pointer";
     //    btnxingianhapnhom.style.marginTop="0px";
     //    btnxingianhapnhom.style.marginLeft="315px";
     //    btnxingianhapnhom.style.borderRadius="3px";
     //    btnxingianhapnhom.style.paddingLeft="10px";
     //    btnxingianhapnhom.style.paddingTop="3px";
     //    btnxingianhapnhom.style.height ="29px";
     //    btnxingianhapnhom.style.with="30px";
     //    btnxingianhapnhom.style.background="white";
     //    btnxingianhapnhom.style.color="black";
     //    btnxingianhapnhom.style.border="solid 1px #9695d8";
     //    btnxingianhapnhom.innerHTML = '<i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp; Gia nhập';
       // btnxingianhapnhom.addEventListener("click",clickxinvaonhom);
      //  btnxingianhapnhom.myParamManhom=data[i].ma_tai_khoan;

        // btnxingianhapnhom.id="btnxingianhapnhom"+data[i].ma_nhom;
        // for (var j = 0; j < lstNhomCuaTaiKhoanThamGia.length; j++) {
        //     if(data[i].ma_nhom==lstNhomCuaTaiKhoanThamGia[j].ma_tai_khoan)
        //     {
        //         btnxingianhapnhom.innerHTML='<i class="fa fa-check" aria-hidden="true"></i>&nbsp;Đã tham gia';
        //         btnxingianhapnhom.removeEventListener("click",clickxinvaonhom);
        //     }
        // }
       // for (var k = 0; k < lstNhomNguoiDungDangXinGiaNhap.length; k++) {
       //  if(data[i].ma_nhom==lstNhomNguoiDungDangXinGiaNhap[k].ma_nhom){
       //          btnxingianhapnhom.innerHTML='<i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;Chờ phê duyệt';
       //          btnxingianhapnhom.removeEventListener("click",clickxinvaonhom);
       //            btnxingianhapnhom.style.marginLeft="290px";
       //      }
       //  }
        
       
        // divkq.appendChild(btnxingianhapnhom);

        // document.getElementById("divpheduyetthanhvien").appendChild(divkq);
	//	}