function gotogroup($manhom) {
	alert($manhom);
	window.location.href = "http://localhost/DATNHuyLuan/0306151249_0306151264/public/gr/"+$manhom;
}

function opencontent_nhom(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tab-content-nhom");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    // tablinks = document.getElementsByClassName("tablinks");
    // for (i = 0; i < tablinks.length; i++) {
    //     tablinks[i].className = tablinks[i].className.replace(" active", "");
    // }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    // evt.currentTarget.className += " active";

    //hàm dưới đây để lấy list nhóm của tài khoản đăng nhập = cách sau mỗi lần chọn tab mới trong dynamic-menu
    getlstnhomcuataikhoanthamgia();getlstnhomnguoidungdangxingianhap();
}

//dành cho thứ bảy 26/6/2018
function clickxinvaonhom(pr){
   // alert(pr.currentTarget.myParamManhom);
    document.getElementById("btnxingianhapnhom"+pr.currentTarget.myParamManhom).innerHTML='<i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;Chờ phê duyệt';
    document.getElementById("btnxingianhapnhom"+pr.currentTarget.myParamManhom).style.marginLeft="290px";
    $.ajax({
        url: link_host + '/ajax/postthanhvienxingianhapnhomne',
        type:'POST',
        data:{
            _token:$('input[name=_token]').val(),
            ma_nhom:pr.currentTarget.myParamManhom,
            ma_tai_khoan:$('#session-ma-tk').val(),
            nguoi_moi:"0000000000",
            nguoi_phe_duyet:"0000000000",
            thoi_gian_cho_phe_duyet:"2017/07/06",
            trang_thai: "1"

        }
    }).done(function(data){
        alert(data);
    })
    ///hàm dưới là update lại list nhóm mà người dùng đang xin gia nhập
getlstnhomnguoidungdangxingianhap();
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

