// function gotogroup($manhom) {
// 	//alert($manhom);
// 	window.location.href = "http://localhost/DATNHuyLuan/0306151249_0306151264/public/gr/"+$manhom;
// }

function opencontent_nhom(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tab-content-nhom");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    document.getElementById(cityName).style.display = "block";
    // evt.currentTarget.className += " active";

    //hàm dưới đây để lấy list nhóm của tài khoản đăng nhập = cách sau mỗi lần chọn tab mới trong dynamic-menu
    getlstnhomcuataikhoanthamgia();
    getlstnhomnguoidungdangxingianhap();
}

//dành cho thứ bảy 26/6/2018
function clickxinvaonhom(pr){
    var manhom= pr.currentTarget.myParamManhom;
      $.ajax({
        url: link_host + '/ajax/getcaidatnhomne',
        type:'GET',
        data:{
            ma_nhom:manhom
        }
    }).done(function(data){
            if(data[0].trang_thai_cau_hoi_gia_nhap_nhom=="1"){
                var divtlcauhoi = document.createElement("div");
                divtlcauhoi.style.width="500px";
                divtlcauhoi.style.height="500px";
                divtlcauhoi.style.background="white";
                divtlcauhoi.style.margin="auto";
                divtlcauhoi.style.border="solid 1px #9695d8";
                divtlcauhoi.style.borderRadius="20px";
                divtlcauhoi.id="divtraloicauhoicuanhomnav";

                var divtop =document.createElement("div");
                    divtop.style.height="45px";
                    divtop.style.with="100%";
                    divtop.style.textAlign="center";
                    divtop.style.padding="10px";
                    divtop.textContent="Câu hỏi gia nhập nhóm";

                var divbody=document.createElement("div");
                     divbody.id="contentcauhoibody";
                     divbody.style.height="410px";
                     divbody.style.with="100%";
                     divbody.style.overflow="auto";


                 var divbot= document.createElement("div");
                   divbot.style.height="45px";
                     divbot.style.width="70%";

                  var divdongy = document.createElement("div");
                       divdongy.style.marginLeft="20px";
                       divdongy.style.float="right";
                       divdongy.textContent ="Đồng ý";
                       divdongy.className="buttonll";
                       // divdongy.addEventListener("click",dongyhoanthanhtraloicauhoigianhapnhom)
                       // divdongy.myParammanhom="NH00000004";



                        divdongy.addEventListener("click",function(){
                                  //  var manhom = "NH00000004";
                                //  alert(manhom);

                        $.ajax({
                            url: link_host+'/ajax/getcauhoigianhapne',
                            type:'GET',
                            data:{
                                    ma_nhom:data[0].ma_nhom,
                                    trang_thai:"1"
                            }}).done(function(data){
                                        for (var i = 0; i < data.length; i++) {
                                                  $.ajax({
                                                        url: link_host + '/ajax/postcautraloigianhapnhomne',
                                                        type:'POST',
                                                        data:{
                                                            _token:$('input[name=_token]').val(),
                                                            ma_cau_hoi:data[i].ma_cau_hoi,
                                                            ma_nhom:data[i].ma_nhom,
                                                            ma_nguoi_tra_loi:$('#session-ma-tk').val(),
                                                            noi_dung_tra_loi:$('#txtaretraloicauhoi'+data[i].ma_cau_hoi).val(),
                                                            trang_thai: "1"
                                                        }
                                                    }).done(function(data){})
                                        } 

                                        document.getElementById("btnxingianhapnhom"+manhom).innerHTML='<i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;Chờ phê duyệt';
                                                                    document.getElementById("btnxingianhapnhom"+manhom).style.marginLeft="290px";
                                                            $.ajax({
                                                                url: link_host + '/ajax/postthanhvienxingianhapnhomne',
                                                                type:'POST',
                                                                data:{
                                                                    _token:$('input[name=_token]').val(),
                                                                    ma_nhom:manhom,
                                                                    ma_tai_khoan:$('#session-ma-tk').val(),
                                                                    nguoi_moi:"0000000000",
                                                                    nguoi_phe_duyet:"0000000000",
                                                                    thoi_gian_cho_phe_duyet:"2017/07/06",
                                                                    trang_thai: "1"
                                                                }
                                                            }).done(function(data){
                                                               // sau khi xin gia nhập nhóm thành công
                                                               $("#contentmenupopupnav").css("display","block");
                                                               $("#divtraloicauhoicuanhomnav").remove();
                                                            })


                            })

             
                        ///hàm dưới là update lại list nhóm mà người dùng đang xin gia nhập
                        getlstnhomnguoidungdangxingianhap();
                        })

                      $.ajax({
                            url: link_host+'/ajax/getcauhoigianhapne',
                            type:'GET',
                            data:{
                                    ma_nhom:data[0].ma_nhom,
                                    trang_thai:"1"
                            }}).done(function(data){
                                for (var i = 0; i < data.length; i++) {
                                    taora1cauhoitraloi(data[i].ma_cau_hoi,data[i].noi_dung_cau_hoi,data[i].ma_nhom);
                                } 
                            })

                                 var divhuybo = document.createElement("div");
                                        divhuybo.style.marginLeft="20px";
                                        divhuybo.style.float="right";
                                        divhuybo.textContent ="Hủy bỏ";
                                        divhuybo.className="buttonll";
                                        divhuybo.addEventListener("click",function(){$("#contentmenupopupnav").css("display","block");
                                                                                        $("#divtraloicauhoicuanhomnav").remove();
                                                                                        })
                                        divbot.appendChild(divdongy);
                                        divbot.appendChild(divhuybo);

                                    divtlcauhoi.appendChild(divtop);
                                    divtlcauhoi.appendChild(divbody);
                                    divtlcauhoi.appendChild(divbot);


                                    $("#contentmenupopupnav").css("display","none");
                                    document.getElementById("div-dynamic-menu").appendChild(divtlcauhoi);
               
                
       }
       else
        if(data[0].trang_thai_cau_hoi_gia_nhap_nhom=="0"){
                document.getElementById("btnxingianhapnhom"+manhom).innerHTML='<i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;Chờ phê duyệt';
                document.getElementById("btnxingianhapnhom"+manhom).style.marginLeft="290px";
                $.ajax({
                    url: link_host + '/ajax/postthanhvienxingianhapnhomne',
                    type:'POST',
                    data:{
                        _token:$('input[name=_token]').val(),
                        ma_nhom:manhom,
                        ma_tai_khoan:$('#session-ma-tk').val(),
                        nguoi_moi:"0000000000",
                        nguoi_phe_duyet:"0000000000",
                        thoi_gian_cho_phe_duyet:"2017/07/06",
                        trang_thai: "1"
                    }
                }).done(function(data){
                   // alert(data);
                })
                ///hàm dưới là update lại list nhóm mà người dùng đang xin gia nhập
                getlstnhomnguoidungdangxingianhap();
       }
    })
}

function dongyhoanthanhtraloicauhoigianhapnhom(prl){
    alert("hihi");
    // var manhom = prl.currenTarget.myParammanhom;

    //       $.ajax({
    //                         url: link_host+'/ajax/getcauhoigianhapne',
    //                         type:'GET',
    //                         data:{
    //                                 ma_nhom:data[0].ma_nhom,
    //                                 trang_thai:"1"
    //                         }}).done(function(data){
    //                             for (var i = 0; i < data.length; i++) {
    //                                       $.ajax({
    //                                             url: link_host + '/ajax/postcautraloigianhapnhomne',
    //                                             type:'POST',
    //                                             data:{
    //                                                 _token:$('input[name=_token]').val(),
    //                                                 ma_cau_hoi:data[i].ma_cau_hoi,
    //                                                 ma_nhom:data[i].ma_nhom,
    //                                                 ma_nguoi_tra_loi:$('#session-ma-tk').val(),
    //                                                 noi_dung_tra_loi:$('#txtaretraloicauhoi'+macauhoi).val(),
    //                                                 trang_thai: "1"
    //                                             }
    //                                         }).done(function(data){
    //                                             })
    //                             } 
    //                         })

    //                     document.getElementById("btnxingianhapnhom"+lstcauhoigianhap[0].ma_nhom).innerHTML='<i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;Chờ phê duyệt';
    //                     document.getElementById("btnxingianhapnhom"+lstcauhoigianhap[0].ma_nhom).style.marginLeft="290px";
    //                     $.ajax({
    //                         url: link_host + '/ajax/postthanhvienxingianhapnhomne',
    //                         type:'POST',
    //                         data:{
    //                             _token:$('input[name=_token]').val(),
    //                             ma_nhom:manhom,
    //                             ma_tai_khoan:$('#session-ma-tk').val(),
    //                             nguoi_moi:"0000000000",
    //                             nguoi_phe_duyet:"0000000000",
    //                             thoi_gian_cho_phe_duyet:"2017/07/06",
    //                             trang_thai: "1"
    //                         }
    //                     }).done(function(data){
    //                        // alert(data);
    //                     })
    //                     ///hàm dưới là update lại list nhóm mà người dùng đang xin gia nhập
    //                     getlstnhomnguoidungdangxingianhap();
                
}


function taora1cauhoitraloi(macauhoi,noidung,manhom){

    var div = document.createElement("div");
    div.style.height="100px";
    div.style.background="white";
    div.style.width="100%";
    div.style.marginBottom="5px";
    div.style.borderRadius="5px";
    div.id="divcauhoigianhapnhom"+macauhoi;

    var divnoidungcauhoi = document.createElement("div");
    divnoidungcauhoi.style.width="80%";
    divnoidungcauhoi.style.float="left";
    divnoidungcauhoi.style.height="26px";
    divnoidungcauhoi.style.marginLeft="10%";
    divnoidungcauhoi.style.marginRight="10%";
    var x = document.createElement("INPUT");
    x.style.paddingLeft="15px";
    x.style.borderTopLeftRadius ="3px";
    x.style.borderTopRightRadius ="3px";
    x.id="noidungcauhoi"+macauhoi;
    x.disabled=true;
    x.value=noidung;
    x.style.width="100%";
    x.style.height="26px";
    x.style.border="solid 1px #c7d2e2";
    x.setAttribute("type", "text");
    divnoidungcauhoi.appendChild(x);

    var divnoidungcautraloi = document.createElement("div");
    divnoidungcautraloi.style.height="55px";
    var textareacautraloi = document.createElement("TEXTAREA");
    textareacautraloi.id="txtaretraloicauhoi"+macauhoi;
    textareacautraloi.style.height="55px";
    textareacautraloi.style.width="100%";
    textareacautraloi.style.resize="none";
    textareacautraloi.style.borderBottomLeftRadius="3px";
    textareacautraloi.style.borderBottomRightRadius="3px";

    divnoidungcauhoi.appendChild(textareacautraloi);

    div.appendChild(divnoidungcauhoi);
    div.appendChild(divnoidungcautraloi);

    document.getElementById("contentcauhoibody").appendChild(div);
}

var lstNhomCuaTaiKhoanThamGia;
var lstNhomNguoiDungDangXinGiaNhap;

function  getlstnhomnguoidungdangxingianhap()
{
    
    $.ajax({
        url:link_host+'/ajax/getlstnhomnguoidungdangxingianhapne',
        type:'GET',
        data:{ma_tai_khoan:$('#session-ma-tk').val()}
    }).done(function(data){
        lstNhomNguoiDungDangXinGiaNhap=data;
    })
}

 function getlstnhomcuataikhoanthamgia()
{
  //  alert($('#session-ma-tk').val()+"day la sesstion get lst nhom ");
    $.ajax({
        url:link_host+'/ajax/getnhommathanhviencone',
        type:'GET',
        data:{ma_tai_khoan:$('#session-ma-tk').val()}
    }).done(function(data){
        lstNhomCuaTaiKhoanThamGia=data;
    })
}



function search_group(){

  //  alert(lstNhomCuaTaiKhoanThamGia[0].ma_nhom);
	//alert("hihi");
    $.ajax({
        url: link_host+'/ajax/getlsttimkiemnhomne',
        type: 'GET',
        data: {
            ten_nhom: $('#input-search-gr').val()
        }
    }).done(function(data){
        //alert(data[0].ma_nhom);
        var listsearchdiv = document.getElementById('div-ket-qua-tim-kiem');
       // alert(listsearchdiv.childNodes.length);
        // for (var i = 0; i < listsearchdiv.childNodes.length; i++) {
        //     listsearchdiv.removeChild(listsearchdiv.childNodes[i]);
        // }
        while(listsearchdiv.firstChild){
            listsearchdiv.removeChild(listsearchdiv.firstChild);
        }

        for (var i = 0; i < data.length; i++) {
            var divkq = document.createElement("div");
        divkq.style.height= "70px";
        divkq.style.with="100%";
        divkq.style.background ="white";
        divkq.style.color="black";
        divkq.style.borderBottom ="solid 1px #9695d8";
        divkq.innerHTML = data[i].ten_nhom;


        var btnxingianhapnhom = document.createElement("div");
        btnxingianhapnhom.style.cursor="pointer";
        btnxingianhapnhom.style.marginTop="0px";
        btnxingianhapnhom.style.marginLeft="315px";
        btnxingianhapnhom.style.borderRadius="3px";
        btnxingianhapnhom.style.paddingLeft="10px";
        btnxingianhapnhom.style.paddingTop="3px";
        btnxingianhapnhom.style.height ="29px";
        btnxingianhapnhom.style.with="30px";
        btnxingianhapnhom.style.background="white";
        btnxingianhapnhom.style.color="black";
        btnxingianhapnhom.style.border="solid 1px #9695d8";
        btnxingianhapnhom.innerHTML = '<i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp; Gia nhập';
        btnxingianhapnhom.addEventListener("click",clickxinvaonhom);
        btnxingianhapnhom.myParamManhom=data[i].ma_nhom;
        btnxingianhapnhom.id="btnxingianhapnhom"+data[i].ma_nhom;

        for (var j = 0; j < lstNhomCuaTaiKhoanThamGia.length; j++) {
            if(data[i].ma_nhom==lstNhomCuaTaiKhoanThamGia[j].ma_nhom)
            {
                btnxingianhapnhom.innerHTML='<i class="fa fa-check" aria-hidden="true"></i>&nbsp;Đã tham gia';
                btnxingianhapnhom.removeEventListener("click",clickxinvaonhom);
            }
        }
       for (var k = 0; k < lstNhomNguoiDungDangXinGiaNhap.length; k++) {
        if(data[i].ma_nhom==lstNhomNguoiDungDangXinGiaNhap[k].ma_nhom){
                btnxingianhapnhom.innerHTML='<i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;Chờ phê duyệt';
                btnxingianhapnhom.removeEventListener("click",clickxinvaonhom);
                  btnxingianhapnhom.style.marginLeft="290px";
            }
        }
        
       
        divkq.appendChild(btnxingianhapnhom);

        document.getElementById("div-ket-qua-tim-kiem").appendChild(divkq);
        }
        


       // console.log(Object.values(data));
        // $('#div-ket-qua-tim-kiem').html(data->ma_nhom);
        // alert("lay thanh cong 1");
    })
}

