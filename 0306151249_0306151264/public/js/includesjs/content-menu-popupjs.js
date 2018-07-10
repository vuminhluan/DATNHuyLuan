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
    // alert("hihi");
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


// $(document).ready(function(){



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
        console.log(data);
        //alert(data[0].ma_nhom);
        var listsearchdiv = document.getElementById('div-ket-qua-tim-kiem');
       // alert(listsearchdiv.childNodes.length);
        // for (var i = 0; i < listsearchdiv.childNodes.length; i++) {
        //     listsearchdiv.removeChild(listsearchdiv.childNodes[i]);
        // }
        $("#div-ket-qua-tim-kiem").empty();
        // while(listsearchdiv.firstChild){
        //     listsearchdiv.removeChild(listsearchdiv.firstChild);
        // }
        var flagbatdongbofor = true;
        if (flagbatdongbofor) {
            flagbatdongbofor=!flagbatdongbofor;

        for (var i = 0; i < data.length; i++) {
            var manhomm=data[i].ma_nhom;
            var flagkiemtracaidatnhom = true;
            var divkq = document.createElement("div");
                divkq.className="divkqtimkiemnhompopup";

             // divkq.style.background ="white";
            divkq.style.backgroundImage  = "url('"+link_host+"/"+data[i].anh+"')";//"url('"+data[i].anh+"');";

           //http://localhost/DATNHuyLuan/0306151249_0306151264/public/img_group/NH00000002TK00000006/NH00000002TK00000006-2018-06-20-03-57-36am.png

            divkq.innerHTML = data[i].ten_nhom+'<br>'+'<span style="color:#777777;">'+"Mã nhóm: "+ data[i].ma_nhom+'</span>';

         var btnxingianhapnhomnhanh = document.createElement("div");
             btnxingianhapnhomnhanh.className="btnxingianhapnhomnhanh";
             btnxingianhapnhomnhanh.innerHTML = '<i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp; Gia nhập nhanh';
             btnxingianhapnhomnhanh.addEventListener("click",clickxinvaonhomnhanh);
             btnxingianhapnhomnhanh.myParamManhom=data[i].ma_nhom;
             var flaggianhapnhanh = false; // kiểm tra xem nhóm này có gia nhập nhóm nhanh không
             if(flagkiemtracaidatnhom)
             {flagkiemtracaidatnhom=!flagkiemtracaidatnhom;
                                    if (data[i].trang_thai_ma_gia_nhap_nhom=="1") {
                                        flaggianhapnhanh=true;
                                    }

        var btnxingianhapnhom = document.createElement("div");
            btnxingianhapnhom.className="btnxingianhapnhom";
            btnxingianhapnhom.innerHTML = '<i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp; Gia nhập';
            btnxingianhapnhom.addEventListener("click",clickxinvaonhom);
            btnxingianhapnhom.myParamManhom=manhomm;
            btnxingianhapnhom.id="btnxingianhapnhom"+manhomm;

        for (var j = 0; j < lstNhomCuaTaiKhoanThamGia.length; j++) {
            if(manhomm==lstNhomCuaTaiKhoanThamGia[j].ma_nhom)
            {
                btnxingianhapnhom.innerHTML='<i class="fa fa-check" aria-hidden="true"></i>&nbsp;Đã tham gia';
                btnxingianhapnhom.removeEventListener("click",clickxinvaonhom);


                flaggianhapnhanh=false;
            }
        }
       for (var k = 0; k < lstNhomNguoiDungDangXinGiaNhap.length; k++) {
        if(data[i].ma_nhom==lstNhomNguoiDungDangXinGiaNhap[k].ma_nhom){
                btnxingianhapnhom.innerHTML='<i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;Chờ phê duyệt';
                btnxingianhapnhom.removeEventListener("click",clickxinvaonhom);
                // btnxingianhapnhom.style.marginLeft="310px";
                // btnxingianhapnhom.style.width="140px;"

                flaggianhapnhanh=false;


            }
        }
        
       
        divkq.appendChild(btnxingianhapnhom);
        if(flaggianhapnhanh)
        divkq.appendChild(btnxingianhapnhomnhanh);

        document.getElementById("div-ket-qua-tim-kiem").appendChild(divkq);
                                }
        

        }
        }
        


       // console.log(Object.values(data));
        // $('#div-ket-qua-tim-kiem').html(data->ma_nhom);
        // alert("lay thanh cong 1");
    })
}


function clickxinvaonhomnhanh(prl){
    var manhom= prl.currentTarget.myParamManhom;
    // alert(manhom);
    // 
        var divtobig = document.createElement("div");
            divtobig.className="modal";
            divtobig.style.display="block";
            divtobig.id="popupbaocao";
                var divto = document.createElement("div");
                    divto.className="divmainnoidungpopupysgianhapnhomnhanh";
                    var divtop = document.createElement("div");
                        divtop.className="toppopuptocaoys";
                        divtop.textContent="Gia nhập nhóm nhanh";

                    var divbody = document.createElement("div");
                        divbody.className="divbodynoidungpopupysgianhapnhomnhanh";
                        divbody.innerHTML='<i class="fa fa-asterisk" aria-hidden="true"></i> Nhập vào mã gia nhập nhóm nhanh';
                            var inputpass = document.createElement("INPUT");
                                inputpass.className="inputpassgianhapnhomnhanh";
                                inputpass.id="inputgianhapnhomid";
                                inputpass.addEventListener("input",function(){
                                    $("#notipassgianhapnhomid").val("");
                                })
                            var inputnotipass= document.createElement("INPUT");
                                inputnotipass.className="inputpassgianhapnhomnhanhnoti";
                                inputnotipass.id="notipassgianhapnhomid";
                                inputnotipass.style.color="red";
                                inputnotipass.value="";
                                inputnotipass.disabled=true;
                        divbody.appendChild(inputpass);
                        divbody.appendChild(inputnotipass);
                    var divbot = document.createElement("div");
                        divbot.className="divbotpopuptocaoys";
                        var btndongy = document.createElement("div");
                            btndongy.textContent="Đồng ý"
                            btndongy.className="btndongypopupys";
                            btndongy.addEventListener("click",function(){

                                // 
                        // '/ajax/getcaidatnhomne'
                         $.ajax({
                                url: link_host+'/ajax/getcaidatnhomne',
                                type:'GET',
                                data:{
                                        ma_nhom:manhom
                                }}).done(function(data){
                                    if (data[0].ma_gia_nhap_nhom!=$("#inputgianhapnhomid").val()) {
                                           $("#notipassgianhapnhomid").val("Mật khẩu không đúng");
                                    }else{ 

                                 $.ajax({
                                        url: link_host+'/ajax/postthemthanhvienvaonhomne',
                                        type:'POST',
                                        data:{
                                                _token: $('input[name=_token]').val(),
                                                ma_nhom:manhom,
                                                ma_tai_khoan:$("#session-ma-tk").val(),
                                                ma_chuc_vu:"CV07",
                                                trang_thai:"1"        
                                        }}).done(function(data){
                                            $.ajax({
                                                url: link_host+'/ajax/postchucvucuathanhvienvaonhomne',
                                                type:'POST',
                                                data:{
                                                        _token: $('input[name=_token]').val(),
                                                        ma_nhom:manhom,
                                                        ma_tai_khoan:$("#session-ma-tk").val(),
                                                        ma_chuc_vu:"CV07",
                                                        trang_thai:"1"        
                                                }}).done(function(data){
                                                    gotogroup(manhom);
                                                })})}
                                })
                                // 

                            })
                        var btnhuybo = document.createElement("div");
                            btnhuybo.className="btnhuypopupys";
                            btnhuybo.textContent="Hủy bỏ";
                            btnhuybo.addEventListener("click",function(){
                               var e = document.getElementById("popupbaocao");
                                e.parentNode.removeChild(e);
                            })
                        divbot.appendChild(btndongy);
                        divbot.appendChild(btnhuybo);
                     divto.appendChild(divtop);
                     divto.appendChild(divbody);
                     divto.appendChild(divbot);
            divtobig.appendChild(divto);
      document.getElementById("bodymaster").appendChild(divtobig);

    // 
}



function clickxinvaonhomriengle(manhom){
    // var manhom= pr.currentTarget.myParamManhom;
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
                document.getElementById("textxingianhapnhom").innerHTML='<i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;Chờ phê duyệt';
                // document.getElementById("btnxingianhapnhom"+manhom).style.marginLeft="290px";
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