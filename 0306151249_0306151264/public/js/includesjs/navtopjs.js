




function taonhommoi(l)
{
 //   alert("tao nhom moi");
 if (l) {
            $('#div-content-gr-thamgia-quanly').css("display","none");
            $('#div-content-tao-nhom').css("display","block");
            //div-content-tim-kiem-nhom
        }
        else{
            $('#div-content-gr-thamgia-quanly').css("display","block");
            $('#div-content-tao-nhom').css("display","none");
        }
   
}









function submittaonhom()
{
    var tennhom = $('#input-tennhom').val();
    if (tennhom.length>60||tennhom.length<4) {
        thongbaopopupy("Tên nhóm","Tên nhóm từ 4 tới 60 kí tự");return;
    }
    $("#btn-xac-nhan-tao-nhom-in-model").css("display","none");
    $("#btn-huy-tao-nhom-in-model").css("display","none");
    var manhom="1";
    // var tennhom = $('#input-tennhom').val();
    var loainhom = $("input:checked").val();
   // alert(loainhom);

  //  alert(tennhom);

 //  alert(link_host);


          // while(manhom.length<8)
          // {
          //   manhom ="0"+manhom;
          // }
          // manhom ="NH"+ manhom;


//alert(manhom);
//alert($('input[name=_token]').val());
    $.ajax({
        url: link_host+'/ajax/posttaonhomne',
        type:'POST',
        data:{
            _token: $('input[name=_token]').val(),
           // ma_nhom:   manhom,           
            ma_gia_nhap: "0000"   ,           
            ten_nhom:   tennhom   ,               
            anh:        "no"   ,              
            ma_tai_khoan:  $('#session-ma-tk').val() ,           
            ma_loai_nhom:  loainhom   ,          
            gioi_thieu_nhom:  "Describe something"  ,         
            // thoi_gian_tham_gia: "2001/01/01",        
            // thoi_gian_het_han_tham_gia: "2001/01/01"  ,
            // thoi_gian_sua: "2001/01/01",
            // thoi_gian_tao: "2001/01/01" ,
            nguoi_sua:   $('#session-ma-tk').val()  ,              
            trang_thai:   "1"               
        }

    }).done(function(data){


         $.ajax({
            url: link_host+'/ajax/getmanhomne',
            type:'GET',
            data:{
                 ma_tai_khoan:  $('#session-ma-tk').val() 
            }
         }).done(function(data){
            console.log(data);
        //alert(manhom);
            //manhom =  data.substring(2,10);
           // alert(manhom);
                 var manhomint = parseInt(data);
               //  alert(manhomint);
                 manhom = manhomint.toString();       
                  
            var vCV01=cCV02=cCV03=cCV04=cCaiDat=true;
            //Thêm chính người tạo nhóm này là thành viên của nhóm
            $.ajax({
            url: link_host+'/ajax/postthemthanhvienvaonhomne',
            type:'POST',
            data:{
                    _token: $('input[name=_token]').val(),
                    ma_nhom:manhom,
                    ma_tai_khoan:$("#session-ma-tk").val(),
                    ma_chuc_vu:"CV01",
                    thoi_gian_vao_nhom:"2001/01/01",
                    thoi_gian_thoat_nhom:"2001/01/01",
                    trang_thai:"1"        

            }}).done(function(data){
                
        if(vCV01){
                    vCV01=!vCV01;
                     $.ajax({
                                url: link_host+'/ajax/postchucvucuathanhvienvaonhomne',
                                type:'POST',
                                data:{
                                        _token: $('input[name=_token]').val(),
                                        ma_nhom:manhom,
                                        ma_tai_khoan:$("#session-ma-tk").val(),
                                        ma_chuc_vu:"CV01",
                                        trang_thai:"1"        

                                }}).done(function(data){
                                      //  alert(data);

                if(cCV02){
                    cCV02=!cCV02;
                     $.ajax({
                                url: link_host+'/ajax/postchucvucuathanhvienvaonhomne',
                                type:'POST',
                                data:{
                                        _token: $('input[name=_token]').val(),
                                        ma_nhom:manhom,
                                        ma_tai_khoan:$("#session-ma-tk").val(),
                                        ma_chuc_vu:"CV02",
                                        trang_thai:"1"        

                                }}).done(function(data){
                if(cCV03){
                    cCV03=!cCV03;
                    $.ajax({
                                url: link_host+'/ajax/postchucvucuathanhvienvaonhomne',
                                type:'POST',
                                data:{
                                        _token: $('input[name=_token]').val(),
                                        ma_nhom:manhom,
                                        ma_tai_khoan:$("#session-ma-tk").val(),
                                        ma_chuc_vu:"CV03",
                                        trang_thai:"1"        

                                }}).done(function(data){
                                        if(cCV04){
                                            cCV04=!cCV04;
                                            $.ajax({
                                                        url: link_host+'/ajax/postchucvucuathanhvienvaonhomne',
                                                        type:'POST',
                                                        data:{
                                                                _token: $('input[name=_token]').val(),
                                                                ma_nhom:manhom,
                                                                ma_tai_khoan:$("#session-ma-tk").val(),
                                                                ma_chuc_vu:"CV04",
                                                                trang_thai:"1"        

                                                        }}).done(function(data){
                                                            if(cCaiDat){
                                                                cCaiDat=!cCaiDat;
                                                                         //   alert(manhom+loainhom);
                                                                 $.ajax({
                                                                            url: link_host+'/ajax/postcaidatnhomne',
                                                                            type:'POST',
                                                                            data:{
                                                                                    _token: $('input[name=_token]').val(),
                                                                                    ma_nhom:manhom,
                                                                                    ma_loai_nhom:loainhom,
                                                                                    gioi_thieu_nhom:"Chưa có",
                                                                                    phe_duyet_bai_viet_an_danh:"0",
                                                                                    phe_duyet_bai_viet_binh_thuong:"0",
                                                                                    trang_thai_ma_gia_nhap_nhom:"0",
                                                                                    ma_gia_nhap_nhom:"0000",
                                                                                    trang_thai_cau_hoi_gia_nhap_nhom:"0",
                                                                                    ma_nguoi_them:$("#session-ma-tk").val(),
                                                                                    trang_thai:"1"        

                                                                            }}).done(function(data){
                                                                                gotogroup(manhom);  
                                                                            })     
                                                                            } 
                                                        }) 
                                                }
                                })
                            }
                                })
                            }
                
                                })
                         }
     
                    
                              $('#input-tennhom').val('');
             
            })
         //   alert(tennhom+"tao thanh cong");
          //  alert(data);
            //sau khi xong thì chuyển về tab các nhóm // hàm này bên content-menu-popupjs.js

            // ajaxlstnhomdathamgia_quanly();
            // opencontent_nhom(event,'div-content-gr-thamgia-quanly'); 

    })
    })
}






// Get the modal
var modal = document.getElementById('div-dynamic-menu');

// Get the button that opens the modal
var btnx = document.getElementById("btn-show-dynamic-menu");

var btnlinhom=document.getElementById("li-nav-nhom");
// Get the <span> element that closes the modal
// var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btnlinhom.onclick=function(){
    modal.style.display = "block";
    ajaxlstnhomdathamgia_quanly();
    // var temptaonhom = document.getElementById("btn-tao-nhom-in-model");
    // temptaonhom.click();
    //opencontent_nhom(event,'div-content-tao-nhom');
}
btnx.onclick = function() {
    modal.style.display = "block";
    ajaxlstnhomdathamgia_quanly();
}

function ajaxlstnhomdathamgia_quanly(){
      $.ajax({
        url: link_host+'/ajax/getnhomtheomataikhoanne', 
        type: 'GET',
        data:{
            ma_tai_khoan :$("#session-ma-tk").val()
        }
    }).done(function(data){
     //   alert("hihi thanh cong send ajax");
        $('#div-dynamic-menu').html(data);
    })

}

// When the user clicks on <span> (x), close the modal
// span.onclick = function() {
//     modal.style.display = "none";
// }

// When the user clicks anywhere outside of the modal, close it
//ham nay o ben nhomjs.js roi


window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
// window.onclick = function(event) {
//     if (event.target == modal) {
//         modal.style.display = "none";
//     }
// }



// 












//tabbbb
function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

















// -----------------
$(document).ready(function() {
	$('.taikhoan-dropdown-content').click(function() {
		$('.taikhoan-dropdown-menu').fadeToggle('fast');
	});
});
// ------------------

// 


//    /ajax/postnguoidocthongbaone   /ajax/getnguoidocthongbaone

$(document).ready(function() {
    ///ajax/soluonggetthongbaone
         $.ajax({
        url: link_host+'/ajax/soluonggetthongbaone', 
        type: 'GET',
        data:{ 
            ma_tai_khoan:$("#session-ma-tk").val(),
        }
    }).done(function(soluongthongbao){
      // alert(soluongthongbao.length);
         $.ajax({
            url: link_host+'/ajax/getnguoidocthongbaone', 
            type: 'GET',
            data:{ 
                ma_nguoi_doc:$("#session-ma-tk").val(),
            }
        }).done(function(soluongthongbaodadoc){
           var soluongthongbaothat=0;
           var soluongthongbaodadocthat = 0;
            // for (var i = 0; i < soluongthongbao.length; i++) {
            //     if (soluongthongbao[i]!="") {
            //         soluongthongbaothat+=1;
            //     }
            // }
            // soluongthongbao.forEach(function(soluongthongbao) {
            //   soluongthongbaothat+=1;
            //   // console.log(soluongthongbao.noi_nhan_tac_dong);
            // });

              // console.log(soluongthongbaothat);
              // console.log(soluongthongbaodadoc);
            // for (var j = 0; i < soluongthongbaodadoc.length; j++) {
            //     if (soluongthongbaodadoc[i]!="") {
            //         soluongthongbaodadocthat+=1;
            //     }
            // }

            if ((soluongthongbao.length-soluongthongbaodadoc.length)>0) {
                $("#divnotisoluongthongbao").css("display","block");
                if (soluongthongbao.length-soluongthongbaodadoc.length>19) {
                    $("#soluongthongbao").text("19+");
                }else{
                 $("#soluongthongbao").text((soluongthongbao.length-soluongthongbaodadoc.length));
                }
            }
            
            // alert(soluongthongbao.length+'-'+soluongthongbaodadoc.length);
        })
    })


});


function openbaivietduocthongbao(prl_manhom,prl_mabaiviet,ma_thong_bao){
    //alert(prl_manhom+prl_mabaiviet);
   $.when(postnguoidocthongbao(ma_thong_bao))
   .then(gotobvmoi(prl_manhom,prl_mabaiviet)); 
    
}
function openbinhluanbaivietduocthongbao(prl_mabinhluanrepbaiviet,ma_thong_bao) {
    $.when(postnguoidocthongbao(ma_thong_bao))
    .then(gotobl(prl_mabinhluanrepbaiviet));
}
function openrepbinhluanbaivietduocthongbao(prl_mabinhluanrepbaiviet,ma_thong_bao) {
     $.when(postnguoidocthongbao(ma_thong_bao))
     .then(gotorepbl(prl_mabinhluanrepbaiviet));
}

function postnguoidocthongbao(prl) {
     $.ajax({
        url: link_host+'/ajax/postnguoidocthongbaone', 
        type: 'POST',
        data:{
            _token: $('input[name=_token]').val(),
            ma_thong_bao:prl,   
            ma_nguoi_doc:$("#session-ma-tk").val(),
            trang_thai:'1',
        }
    }).done(function(data){
         // alert(data);
    })
}

function gotobvmoi(prl_manhom,prl_mabaiviet) {
    window.location.href = "http://localhost/DATNHuyLuan/0306151249_0306151264/public/gr/"+prl_manhom+"/baiviet/"+prl_mabaiviet;
}
function gotobl(prl_mabinhluanrepbaiviet) {
    window.location.href = "http://localhost/DATNHuyLuan/0306151249_0306151264/public/bl/"+prl_mabinhluanrepbaiviet;
}
function gotorepbl(prl_mabinhluanrepbaiviet) {
    window.location.href = "http://localhost/DATNHuyLuan/0306151249_0306151264/public/blr/"+prl_mabinhluanrepbaiviet;
}
function openpopupthongbao(prl_mataikhoan){
        var divtobig = document.createElement("div");
            divtobig.className="modal";
            divtobig.style.display="block";
            divtobig.id="popupthongbao";
                var divto = document.createElement("div");
                    divto.className="divmainnoidungpopupthongbao";
                    var divtop = document.createElement("div");
                        divtop.className="toppopuptocaothongbao";
                        divtop.textContent="Thông báo";
                        divtop.id="divtoppheduyetbaiviet";
                            var spanx= document.createElement("SPAN");
                                spanx.className="fa fa-times";
                                spanx.style.left="96%";
                                spanx.style.cursor="pointer";
                                spanx.style.position="absolute";
                                spanx.addEventListener("click",function(){
                                    // var e = document.getElementById("popupbaocao");
                                    // e.parentNode.removeChild(e);
                                   var e = document.getElementById("popupthongbao");
                                    e.parentNode.removeChild(e);
                                    soluongthongbaodalay=0;
                                })
                        divtop.appendChild(spanx);

                    var divbody = document.createElement("div");
                        divbody.className="divbodynoidungpopupthongbao";
                        divbody.id="contentpheduyetbody";
                        // divbody.textContent="";
                            var divtopbody = document.createElement("div");
                                divtopbody.className="divtopbodythongbao";

                            var divbodybody = document.createElement("div");
                                divbodybody.className="divbodybodythongbao";
                                divbodybody.id="divbodybodythongbaonhom";
                                divbodybody.addEventListener("scroll",function(){
                                     // console.log($(this).scrollTop());
                                    //  console.log($(this).height());
                                    //   console.log(this.scrollHeight-parseFloat($(this).scrollTop()));
                                    //  // console.log(this.scrollHeight);
                                    // console.log(parseFloat($(this).height())/(parseFloat($(this).scrollTop())-this.scrollHeight));
                                    if(parseFloat($(this).height())/(parseFloat($(this).scrollTop())-this.scrollHeight)==-1){
                                     //   alert("hhihi");

                                        loadtinthongbao();
                                    }
                                })

                        // divbody.appendChild(divscroll);
                        divbody.appendChild(divtopbody);
                        divbody.appendChild(divbodybody);
                        // divbody.appendChild(divbotbody);
                    var divbot = document.createElement("div");
                        divbot.className="divbotpopupthongbao";
                     divto.appendChild(divtop);
                     divto.appendChild(divbody);
                     divto.appendChild(divbot);
            divtobig.appendChild(divto);

      document.getElementById("bodymaster").appendChild(divtobig);
loadtinthongbao();
}
       var  soluongthongbaodalay = 0;
       var  soluongthongbaocanlay =50;



function loadtinthongbao(){
    var blockdongbo = true;
     if (blockdongbo) {
         blockdongbo=!blockdongbo;
    $.ajax({
        url: link_host+'/ajax/getthongbaone', 
        type: 'GET',
        data:{
            ma_tai_khoan :$("#session-ma-tk").val(),
            soluongthongbaodalay:soluongthongbaodalay,
            soluongthongbaocanlay:soluongthongbaocanlay
        }
    }).done(function(data){
         soluongthongbaodalay+=50;
      var divpost = document.createElement("div");
             divpost.innerHTML=data;



    ///////////////////////////////////////////////////////////////
    $.ajax({
        url: link_host+'/ajax/soluonggetthongbaone', 
        type: 'GET',
        data:{ 
        ma_tai_khoan:$("#session-ma-tk").val(),
    }
    }).done(function(soluongthongbao){
         $.ajax({
            url: link_host+'/ajax/getnguoidocthongbaone', 
            type: 'GET',
            data:{ 
                ma_nguoi_doc:$("#session-ma-tk").val(),
            }
        }).done(function(soluongthongbaodadoc){
            for (var i = 0; i < soluongthongbao.length; i++) {
                for (var j = 0; j < soluongthongbaodadoc.length; j++) {
                    if(soluongthongbao[i].ma_thong_bao==soluongthongbaodadoc[j].ma_thong_bao&&soluongthongbaodadoc[j].ma_nguoi_doc==$("#session-ma-tk").val()){
                            $("#divtb-"+soluongthongbao[i].ma_thong_bao).attr('class', 'thongbaodadocdiv');
                    }
                }
            }            
        })
    })

    ///////////////////////////////////////////////////////////////
            document.getElementById('divbodybodythongbaonhom').appendChild(divpost);
            // console.log(data);
            // if (data="") {
            //     loadtinthongbao();
            // }
    })
    }
}



