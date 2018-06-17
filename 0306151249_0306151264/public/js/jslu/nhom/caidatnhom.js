function showhidediv(iddiv,flag){
    //flag = 1 thì display block
    //flag = 0 thì dispaly inline-block
    if (flag=='1') {
        if($('#'+iddiv).css('display')=='none')
    {
        $('#'+iddiv).css('display','block');
    }
    else{
        $('#'+iddiv).css('display','none');
    }
    }
    else{
        if(flag=='0')
        {
                    if($('#'+iddiv).css('display')=='none')
                    {
                        $('#'+iddiv).css('display','inline-block');
                    }
                    else{
                        $('#'+iddiv).css('display','none');
                    }
        }
    }
    
}


function themcauhoigianhapnhom(prl){
    prl = JSON.parse(prl);
    var stt= parseInt( $("#ip-hide-sttcauhoigianhap").val())+1;
    $("#ip-hide-sttcauhoigianhap").val(stt);

    var div = document.createElement("div");
    div.style.height="36px";
    div.style.background="white";
    div.style.width="100%";
    div.style.marginBottom="5px";
    div.id="divcauhoigianhapnhommoi"+stt;

    var divnoidungcauhoi = document.createElement("div");
    divnoidungcauhoi.style.width="83%";
    divnoidungcauhoi.style.float="left";
    divnoidungcauhoi.style.height="36px";
    var x = document.createElement("INPUT");
    x.id="noidungcauhoimoi"+stt;
    x.style.width="100%";
    x.style.height="36px";
    x.style.border="solid 1px #c7d2e2";
    x.style.borderRight="transparent";
    x.setAttribute("type", "text");
    divnoidungcauhoi.appendChild(x);

    var divtuychon =document.createElement("div");
    divtuychon.style.width="17%";
    divtuychon.style.float="left";
    divtuychon.style.height="36px";
    divtuychon.style.padding="0px";
    divtuychon.style.textAlign="center";
    divtuychon.style.border="solid 1px #c7d2e2";
    divtuychon.style.borderLeft="transparent";
    var spanicone = document.createElement("SPAN");
    spanicone.id="chinhsuacauhoimoi"+stt;
    spanicone.style.color="#d3dae5";
    spanicone.style.marginTop="4px";
    spanicone.style.marginRight="4px";
    spanicone.className=("fa fa-pencil-square-o fa-2x");

    var spanicons = document.createElement("SPAN");
    spanicons.id="luucauhoimoi"+stt;
    spanicons.style.color="#d3dae5";
    spanicons.style.marginTop="3px";
    spanicons.style.marginRight="4px";
    spanicons.className=("fa fa-floppy-o fa-2x");
    spanicons.addEventListener("click",luucauhoigianhapnhommoi);
    spanicons.myParamMaNhom=prl[0].ma_nhom;
    spanicons.myParamidipnoidungcauhoi="#noidungcauhoimoi"+stt;
    spanicons.myParamNguoiTaoCauHoi=$('#session-ma-tk').val();
    spanicons.myParamNguoiSua=$('#session-ma-tk').val();
   // spanicons.myParamIdcuadivcaunay="#divcauhoigianhapnhommoi"+stt;

    var spanicond = document.createElement("SPAN");
    id="xoacauhoimoi"+stt;
    spanicond.style.color="#d3dae5";
    spanicond.style.marginTop="2px";
    spanicond.style.marginRight="4px";
    spanicond.className=("fa fa-times fa-2x");

   // spanicon.addClass("fa-times");
    
    divtuychon.appendChild(spanicone);
    divtuychon.appendChild(spanicons);
    divtuychon.appendChild(spanicond);

    div.appendChild(divnoidungcauhoi);
    div.appendChild(divtuychon);

    document.getElementById("div-cac-cau-hoi").appendChild(div);

}

function luucauhoigianhapnhommoi(prl){
   var manhom           = prl.currentTarget.myParamMaNhom;
   var noidungcauhoi    = $(prl.currentTarget.myParamidipnoidungcauhoi).val();
   var nguoitaocauhoi   = prl.currentTarget.myParamNguoiTaoCauHoi;
   var nguoisuacauhoi   = prl.currentTarget.myParamNguoiSua;

      thucthifuncysno4p(manhom,noidungcauhoi,nguoitaocauhoi,nguoisuacauhoi,'ajaxluucauhoigianhap','Lưu câu hỏi gia nhập nhóm','Bạn chắn chắc muốn lưu câu hỏi này?');

//alert(manhom+noidungcauhoi+nguoitaocauhoi+nguoisuacauhoi);


}


function ajaxluucauhoigianhap(manhom,noidungcauhoi,nguoitaocauhoi,nguoisuacauhoi){
          $.ajax({
                            url: link_host+'/ajax/postcauhoigianhapnhomne',
                            type:'POST',
                            data:{
                                    _token: $('input[name=_token]').val(),
                                    ma_nhom:           manhom,
                                    noi_dung_cau_hoi:  noidungcauhoi,
                                    nguoi_tao:         nguoitaocauhoi,
                                    nguoi_sua:         nguoisuacauhoi, 
                                    trang_thai:            "1",
                            }}).done(function(data){

                                var lstcauhoidiv = document.getElementById("div-cac-cau-hoi");
                                while(lstcauhoidiv.firstChild){
                                    lstcauhoidiv.removeChild(lstcauhoidiv.firstChild);
                                    }
                                cauhoigianhapnhomdocratudatabase(manhom);
                                //$(prl.currentTarget.myParamIdcuadivcaunay).css("display","none");
                            })
}




function cauhoigianhapnhomdocratudatabase(manhom){
    

        $.ajax({
                            url: link_host+'/ajax/getcauhoigianhapne',
                            type:'GET',
                            data:{
                                    ma_nhom:manhom,
                                    trang_thai:"1"

                            }}).done(function(data){
                                for (var i = 0; i < data.length; i++) {
                                    taora1cauhoi(data[i].ma_cau_hoi,data[i].noi_dung_cau_hoi,data[i].ma_nhom);
                                }
                            })
    
}


function taora1cauhoi(macauhoi,noidung,manhom){

    var div = document.createElement("div");
    div.style.height="36px";
    div.style.background="white";
    div.style.width="100%";
    div.style.marginBottom="5px";
    div.id="divcauhoigianhapnhom"+macauhoi;

    var divnoidungcauhoi = document.createElement("div");
    divnoidungcauhoi.style.width="83%";
    divnoidungcauhoi.style.float="left";
    divnoidungcauhoi.style.height="36px";
    var x = document.createElement("INPUT");
    x.style.paddingLeft="15px";
    x.id="noidungcauhoi"+macauhoi;
    
    x.disabled=true;
    x.value=noidung;
    x.style.width="100%";
    x.style.height="36px";
    x.style.border="solid 1px #c7d2e2";
    x.style.borderRight="transparent";
    x.setAttribute("type", "text");
    divnoidungcauhoi.appendChild(x);

    var divtuychon =document.createElement("div");
    divtuychon.style.width="17%";
    divtuychon.style.float="left";
    divtuychon.style.height="36px";
    divtuychon.style.padding="0px";
    divtuychon.style.textAlign="center";
    divtuychon.style.border="solid 1px #c7d2e2";
    divtuychon.style.borderLeft="transparent";

    var spanicone = document.createElement("SPAN");
    spanicone.id="chinhsuacauhoi"+macauhoi;
    spanicone.style.color="#d3dae5";
    spanicone.style.marginTop="4px";
    spanicone.style.marginRight="4px";
    spanicone.className=("fa fa-pencil-square-o fa-2x");
    spanicone.addEventListener("click",chinhsuacauhoigianhapnhom);
    // spanicone.myparamMaCauHoi=macauhoi;
    // spanicone.myparamMaNhom=manhom;
     spanicone.myparamIddivinput="#noidungcauhoi"+macauhoi;

    var spanicons = document.createElement("SPAN");
    spanicons.id="luucauhoi"+macauhoi;
    spanicons.style.color="#d3dae5";
    spanicons.style.marginTop="3px";
    spanicons.style.marginRight="4px";
    spanicons.className=("fa fa-floppy-o fa-2x");
    spanicons.addEventListener("click",luuchinhsuacauhoigianhapnhom);
    spanicons.myparamMaCauHoi=macauhoi;
    spanicons.myparamMaNhom=manhom;
    spanicons.myparamIddivinput="#noidungcauhoi"+macauhoi;

    var spanicond = document.createElement("SPAN");
    id="xoacauhoi"+macauhoi;
    spanicond.style.color="#d3dae5";
    spanicond.style.marginTop="2px";
    spanicond.style.marginRight="4px";
    spanicond.className=("fa fa-times fa-2x");
    spanicond.addEventListener("click",xoacauhoigianhapnhom);
    spanicond.myparamMaCauHoi=macauhoi;
    spanicond.myparamMaNhom=manhom;
   // spanicon.addClass("fa-times");
    
    divtuychon.appendChild(spanicone);
    divtuychon.appendChild(spanicons);
    divtuychon.appendChild(spanicond);

    div.appendChild(divnoidungcauhoi);
    div.appendChild(divtuychon);

    document.getElementById("div-cac-cau-hoi").appendChild(div);
}

function chinhsuacauhoigianhapnhom(prl){
    $(prl.currentTarget.myparamIddivinput).prop('disabled',false);
}


function luuchinhsuacauhoigianhapnhom(prl){
    var manhom = prl.currentTarget.myparamMaNhom;
    var macauhoi= prl.currentTarget.myparamMaCauHoi;
    var noidungcauhoichinhsua = $(prl.currentTarget.myparamIddivinput).val();

     $.ajax({
                            url: link_host+'/ajax/postluuchinhsuacauhoine',
                            type:'POST',
                            data:{
                                    _token: $('input[name=_token]').val(),
                                    ma_cau_hoi:macauhoi,
                                    nguoi_sua:$('session-ma-tk').val(),
                                    noi_dung_cau_hoi:noidungcauhoichinhsua
                            }}).done(function(data){
                                var lstcauhoidiv = document.getElementById("div-cac-cau-hoi");
                                while(lstcauhoidiv.firstChild){
                                    lstcauhoidiv.removeChild(lstcauhoidiv.firstChild);
                                    }
                                cauhoigianhapnhomdocratudatabase(manhom);
                            })

}

function luumagianhap(prl){

 thucthifuncysno(prl,'luumagianhapnon','Lưu mã gia nhập nhóm nhanh','Bạn chắn chắc muốn lưu mã gia nhập nhóm nhanh này?');
        
}

function luumagianhapnon(prl){
     prl=JSON.parse(prl);

            prl[0].ma_gia_nhap_nhom = $("#inputmagianhapnhom").val();
            updatecaidatnhomjs(prl);
            $("#inputmagianhapnhom").prop("disabled",true);

        
}

function xoacauhoigianhapnhom(prl){
    var manhom = prl.currentTarget.myparamMaNhom;
    var macauhoi= prl.currentTarget.myparamMaCauHoi;
   // thongbao("hi");
   thucthifuncysno2p(macauhoi,manhom,'xoacauhoivaonhom','Xóa câu hỏi gia nhập','Bạn chắn chắc muốn xóa câu hỏi này chứ?');
// xoacauhoivaonhom(macauhoi,manhom);

}

function xoacauhoivaonhom(macauhoi,manhom)
{
         $.ajax({
                            url: link_host+'/ajax/postxoacauhoine',
                            type:'POST',
                            data:{
                                    _token: $('input[name=_token]').val(),
                                    ma_cau_hoi:macauhoi,
                                    trang_thai:            "0"
                            }}).done(function(data){
                                var lstcauhoidiv = document.getElementById("div-cac-cau-hoi");
                                while(lstcauhoidiv.firstChild){
                                    lstcauhoidiv.removeChild(lstcauhoidiv.firstChild);
                                    }
                                cauhoigianhapnhomdocratudatabase(manhom);
                            })
}



function luuchinhsualoainhom(prl){
     thucthifuncysno(prl,'luuchinhsualoainhomnon','Lưu loại nhóm','Bạn chắn chắc muốn lưu loại nhóm này?');
}

function luuchinhsualoainhomnon(prl){
     prl=JSON.parse(prl);
    if($('input[name=radio-groupp]:checked').val()=="LN01")
        {
            prl[0].ma_loai_nhom = "LN01";
            updatecaidatnhomjs(prl);
            showhidediv('div-content-loai-nhom-caidat','1');
            showhidediv('icon-div-content-loai-nhom-caidat','0');
            showhidediv('iconhideloainhom','0');
        }
        else{
            prl[0].ma_loai_nhom = "LN02";
            updatecaidatnhomjs(prl);
            showhidediv('div-content-loai-nhom-caidat','1');
            showhidediv('icon-div-content-loai-nhom-caidat','0');
            showhidediv('iconhideloainhom','0');
        }
}


function updatecaidatnhomjs(prl){
     $.ajax({
                            url: link_host+'/ajax/postupdatecaidatnhomne',
                            type:'POST',
                            data:{
                                    _token: $('input[name=_token]').val(),
                                    ma_nhom:                                prl[0].ma_nhom,
                                    ma_loai_nhom:                           prl[0].ma_loai_nhom,
                                    gioi_thieu_nhom:                        prl[0].gioi_thieu_nhom,
                                    phe_duyet_bai_viet_an_danh:             prl[0].phe_duyet_bai_viet_an_danh,
                                    phe_duyet_bai_viet_binh_thuong:         prl[0].phe_duyet_bai_viet_binh_thuong, //2 là trạng thái bị hủy xin gia nhập
                                    trang_thai_ma_gia_nhap_nhom:            prl[0].trang_thai_ma_gia_nhap_nhom,
                                    ma_gia_nhap_nhom:                       prl[0].ma_gia_nhap_nhom,
                                    trang_thai_cau_hoi_gia_nhap_nhom:       prl[0].trang_thai_cau_hoi_gia_nhap_nhom,
                                    ma_nguoi_them:                          prl[0].ma_nguoi_them,
                                    trang_thai:                             prl[0].trang_thai
                            }}).done(function(data){
                            })
}
function loadlistcauhoicuanhom(prl){
    var lstcauhoidiv = document.getElementById("div-cac-cau-hoi");
       while(lstcauhoidiv.firstChild){              //remove hết con ở trong đi
            lstcauhoidiv.removeChild(lstcauhoidiv.firstChild);
          }

      prl = JSON.parse(prl);
      cauhoigianhapnhomdocratudatabase(prl[0].ma_nhom);

}
function updatetrangthaicauhoigianhapnhom(prl1,prl2){
thucthifuncysno2p(prl1,prl2,'updatetrangthaicauhoigianhapnhomnon','Lưu cài đặt nhóm','Bạn chắn chắc muốn lưu cài đặt này chứ?');
}
function updatetrangthaicauhoigianhapnhomnon(prl1,prl2){
    prl1 = JSON.parse(prl1);
    if (prl2=="0") {
        prl1[0].trang_thai_cau_hoi_gia_nhap_nhom="1";
        updatecaidatnhomjs(prl1)
        $("#divcauhoigianhapnhomdangduoctat").css("display","none");
        $("#divcauhoigianhapnhomdangduocbat").css("display","block");
        

    }else{
        if (prl2=="1") {
            prl1[0].trang_thai_cau_hoi_gia_nhap_nhom="0";
            updatecaidatnhomjs(prl1)
        $("#divcauhoigianhapnhomdangduoctat").css("display","block");
        $("#divcauhoigianhapnhomdangduocbat").css("display","none");
        }
    }

}


function updatetrangthaimagianhapnhom(prl1,prl2){

thucthifuncysno2p(prl1,prl2,'updatetrangthaimagianhapnhomnon','Lưu cài đặt nhóm','Bạn chắn chắc muốn lưu cài đặt này chứ?');
}

function updatetrangthaimagianhapnhomnon(prl1,prl2){
    prl1 = JSON.parse(prl1);
    if (prl2=="0") {
        prl1[0].trang_thai_ma_gia_nhap_nhom="1";
        updatecaidatnhomjs(prl1)
        $("#divmagianhapnhomdangduoctat").css("display","none");
        $("#divmagianhapnhomdangduocbat").css("display","block");
        

    }else{
        if (prl2=="1") {
            prl1[0].trang_thai_ma_gia_nhap_nhom="0";
            updatecaidatnhomjs(prl1)
        $("#divmagianhapnhomdangduoctat").css("display","block");
        $("#divmagianhapnhomdangduocbat").css("display","none");
        }
    }

}
    var soluongkitutocao = 5;
    var noidung="";
function nhapmagianhapnhomnhanh(){

        var soluongconlai = soluongkitutocao - parseInt($("#inputmagianhapnhom").val().length);
        if(soluongconlai>0){
            noidung=$("#inputmagianhapnhom").val();
        }
        else{
            $("#inputmagianhapnhom").val(noidung);
        }
       // document.getElementById("spanslkitu"+ma_doi_tuong_bi_bao_cao).textContent=soluongconlai;



}

function updatetrangthaipheduyetbaivietcongkhai(prl1,prl2){
    thucthifuncysno2p(prl1,prl2,'updatetrangthaipheduyetbaivietcongkhainon','Lưu cài đặt nhóm','Bạn chắn chắc muốn lưu cài đặt này chứ?');
}

function updatetrangthaipheduyetbaivietcongkhainon(prl1,prl2){
     prl1 = JSON.parse(prl1);
    if (prl2=="0") {
        prl1[0].phe_duyet_bai_viet_binh_thuong="1";
        updatecaidatnhomjs(prl1)
        $("#divpheduyetbaivietcongkhaidangduoctat").css("display","none");
        $("#divpheduyetbaivietcongkhaidangduocbat").css("display","block");
        

    }else{
        if (prl2=="1") {
            prl1[0].phe_duyet_bai_viet_binh_thuong="0";
            updatecaidatnhomjs(prl1)
        $("#divpheduyetbaivietcongkhaidangduoctat").css("display","block");
        $("#divpheduyetbaivietcongkhaidangduocbat").css("display","none");
        }
    }
}
//thucthifuncysno2p


function updatetrangthaipheduyetbaivietandanh(prl1,prl2){
    thucthifuncysno2p(prl1,prl2,'updatetrangthaipheduyetbaivietandanhnon','Lưu cài đặt nhóm','Bạn chắn chắc muốn lưu cài đặt này chứ?');
}

function updatetrangthaipheduyetbaivietandanhnon(prl1,prl2){
          prl1 = JSON.parse(prl1);
    if (prl2=="0") {
        prl1[0].phe_duyet_bai_viet_an_danh="1";
      //  thucthifuncysno(prl1,'updatecaidatnhomjs','Lưu cài đặt nhóm','Bạn chắn chắc muốn lưu cài đặt này chứ?');
        updatecaidatnhomjs(prl1)
        $("#divpheduyetbaivietandanhdangduoctat").css("display","none");
        $("#divpheduyetbaivietandanhdangduocbat").css("display","block");
        

    }else{
        if (prl2=="1") {
            prl1[0].phe_duyet_bai_viet_an_danh="0";
            // thucthifuncysno(prl1,'updatecaidatnhomjs','Lưu cài đặt nhóm','Bạn chắn chắc muốn lưu cài đặt này chứ?');
            updatecaidatnhomjs(prl1)
        $("#divpheduyetbaivietandanhdangduoctat").css("display","block");
        $("#divpheduyetbaivietandanhdangduocbat").css("display","none");
        }
    }
}




function luugioithieunhom(prl){

   thucthifuncysno(prl,'upgioithieunhom','Lưu giới thiệu nhóm','Bạn chắn chắc muốn lưu giới thiệu này chứ?');
}

function upgioithieunhom(prl){

         prl = JSON.parse(prl);
        prl[0].gioi_thieu_nhom=$('#txtaragioithieunhom').val();
       // alert(prl[0].gioi_thieu_nhom);
        updatecaidatnhomjs(prl)
        showhidediv('div-content-gioi-thieu-nhom-caidat','1');
        showhidediv('icon-div-content-gioi-thieu-nhom-caidat','0');
        showhidediv('iconhidegioithieunhom','0');

}