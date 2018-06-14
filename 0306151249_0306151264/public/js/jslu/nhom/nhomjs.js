var modal_nhom = document.getElementById('div-setting-nhom-menu');





function chonthayanhbianhom(){
    $("#luuthayanhbianhom").css("display","block");
    $("#huythaydoianhbianhom").css("display","block");
    $("#chonanhthayanhbianhom").css("display","none");
}

function luuthayanhbianhom(manhom){
    $("#luuthayanhbianhom").css("display","none");
    $("#huythaydoianhbianhom").css("display","none");
    $("#chonanhthayanhbianhom").css("display","block");
}

function huybothayanhbianhom(manhom){
    // huythaydoianhbianhom
    $("#luuthayanhbianhom").css("display","none");
    $("#huythaydoianhbianhom").css("display","none");
    $("#chonanhthayanhbianhom").css("display","block");
}



$( document ).ready(function() {
  
  function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#imganhbianhom').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#ipanhbianhom").change(function() {
  readURL(this);
  chonthayanhbianhom();
});

});












function showhidepoprpnhom(){
    ($("#tuychonnhom").css("display")=="block")
    ?$("#tuychonnhom").css("display","none")
    :$("#tuychonnhom").css("display","block");
}
var soluongbaivietdalay=10;
var soluongbaivietcanlay=4;






$(document).scroll(function() {
    // alert("vao r");
     if(parseFloat($(document).scrollTop())/parseFloat($(document).height())>0.4){
                    if ($("#div-hi-soluongbaiviethientainhom").val()<soluongbaivietdalay+1) {return;}
                    else{
                            var blockdongbo = true;
                           if (blockdongbo) {
                                        blockdongbo=!blockdongbo;
                                        soluongbaivietdalay+=4;
                                  $.ajax({
                                    url:link_host+'/ajax/getbaivietphantrangne',
                                    type:'GET',
                                    data:{
                                        ma_nhom:$("#div-hi-chu-bai-viet-ma-nhom").val(),
                                        soluongbaivietdalay:soluongbaivietdalay,
                                        soluongbaivietcanlay:soluongbaivietcanlay
                                    }
                                }).done(function(data){
                                    
                                    console.log(data);
                                    var divpost = document.createElement("div");
                                        divpost.innerHTML=data;
                                    document.getElementById('divnoidungcon').appendChild(divpost); 
                                })}}} 
})




window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    else if(event.target == modal_nhom)
    {
        modal_nhom.style.display="none";
    }
}


function loadxemthembaiviet(prlmanhom){
    var blockdongbo = true;

      $.ajax({
        url:link_host+'/ajax/getbaivietphantrangne',
        type:'GET',
        data:{
            ma_nhom:prlmanhom,
            soluongbaivietdalay:soluongbaivietdalay,
            soluongbaivietcanlay:soluongbaivietcanlay
        }
    }).done(function(data){
        if (blockdongbo) {
            blockdongbo=!blockdongbo;
            soluongbaivietdalay+=2;
        }
        console.log(data);
        var divpost = document.createElement("div");
            divpost.innerHTML=data;
        document.getElementById('divnoidungcon').appendChild(divpost);
    // window.location = link_trangchufull;
    })
}


function roinhom11(prl){
    var manhom=prl;
 //  alert("say click"+prl.currentTarget.myparamMaNhom+"-"+prl.currentTarget.myparamMaTaiKhoan);
    $.ajax({
        url:link_host+'/ajax/postupdatethanhvientrongnhomne',
        type:'POST',
        data:{
            _token:$('input[name=_token]').val(),
            ma_nhom:manhom,
            ma_tai_khoan:$("#session-ma-tk").val(),
            trang_thai:"0"
        }
    }).done(function(data){

     window.location = link_trangchufull;
    })
    // console.log("hohohoho");
}


var soluongbaivietkiemduyetdalay=0;
var soluongbaivietkiemduyetcanlay=3;

function showlistbaivietchopheduyet(manhom){
        var divtobig = document.createElement("div");
            divtobig.className="modal";
            divtobig.style.display="block";
            divtobig.id="popuppheduyetbaiviet";
                var divto = document.createElement("div");
                    divto.className="divmainnoidungpopuppd";
                    var divtop = document.createElement("div");
                        divtop.className="toppopuptocaopd";
                        divtop.textContent="Phê duyệt bài viết";
                        divtop.id="divtoppheduyetbaiviet";
                            var spanx= document.createElement("SPAN");
                                spanx.className="fa fa-times";
                                spanx.style.marginLeft="636px";
                                // spanx.style.float="right";
                                spanx.style.cursor="pointer";
                                spanx.style.position="absolute";
                                spanx.addEventListener("click",function(){
                                    // var e = document.getElementById("popupbaocao");
                                    // e.parentNode.removeChild(e);
                                   var e = document.getElementById("popuppheduyetbaiviet");
                                    e.parentNode.removeChild(e);
                                    soluongbaivietkiemduyetdalay=0;
                                })
                        divtop.appendChild(spanx);

                    var divbody = document.createElement("div");
                        divbody.className="divbodynoidungpopuppd";
                        divbody.id="contentpheduyetbody";
                        // divbody.textContent="";
                            var divtopbody = document.createElement("div");
                                divtopbody.className="divtopbodypheduyetbaiviet";

                            var divbodybody = document.createElement("div");
                                divbodybody.className="divbodybodypheduyetbaiviet";
                                divbodybody.id="divbodybodykiemduyetbaiviet";

                            var divbotbody = document.createElement("div");
                                divbotbody.className="divbotbodypheduyetbaiviet";
                                divbotbody.textContent="Xem thêm";
                                divbotbody.id="botbodyxemthempheduyetbaiviet";
                                divbotbody.addEventListener("click",function(){
                                   // alert();
                                   // alert($('#divbodybodykiemduyetbaiviet')[0].scrollHeight)
                                   // alert($("#divbodybodykiemduyetbaiviet").scrollTop());
                                    $("#divbodybodykiemduyetbaiviet").scrollTop( document.getElementById("divbodybodykiemduyetbaiviet").scrollHeight);
                                    loadthemduyetbaiviet();
                                })
                        // divbody.appendChild(divscroll);
                        divbody.appendChild(divtopbody);
                        divbody.appendChild(divbodybody);
                        divbody.appendChild(divbotbody);
                    var divbot = document.createElement("div");
                        divbot.className="divbotpopuptocaopd";
                     divto.appendChild(divtop);
                     divto.appendChild(divbody);
                     divto.appendChild(divbot);
            divtobig.appendChild(divto);

      document.getElementById("bodymaster").appendChild(divtobig);
loadthemduyetbaiviet();
}






function loadthemduyetbaiviet(){
                                    var blockdongbopheduyetbaiviet = true;
                               if (blockdongbopheduyetbaiviet) {
                                            blockdongbopheduyetbaiviet=!blockdongbopheduyetbaiviet;
                                           
                                      $.ajax({
                                        url:link_host+'/ajax/getbaivietphantrangkiemduyetne',
                                        type:'GET',
                                        data:{
                                            ma_nhom:$("#div-hi-chu-bai-viet-ma-nhom").val(),
                                            soluongbaivietkiemduyetdalay:soluongbaivietkiemduyetdalay,
                                            soluongbaivietkiemduyetcanlay:soluongbaivietkiemduyetcanlay
                                        }
                                    }).done(function(data){
                                        
                                       // console.log(data);
                                        var divpost = document.createElement("div");
                                            divpost.innerHTML=data;
                                        document.getElementById('divbodybodykiemduyetbaiviet').appendChild(divpost); 
                                    }) 
                                     soluongbaivietkiemduyetdalay+=2;
                                }

}










////////////////////////////////////////////////////////////////////////////////////////////////
// Phê duyệt thành viên
function showlistthanhvienchopheduyet(manhom){
        var divtobig = document.createElement("div");
            divtobig.className="modal";
            divtobig.style.display="block";
            divtobig.id="popuppheduyetthanhvien";
                var divto = document.createElement("div");
                    divto.className="divmainnoidungpopuppd";
                    var divtop = document.createElement("div");
                        divtop.className="toppopuptocaopd";
                        divtop.textContent="Phê duyệt thành viên";
                        divtop.id="divtoppheduyetbaiviet";
                            var spanx= document.createElement("SPAN");
                                spanx.className="fa fa-times";
                                spanx.style.marginLeft="610px";
                                spanx.style.cursor="pointer";
                                spanx.style.position="absolute";
                                spanx.addEventListener("click",function(){
                                    // var e = document.getElementById("popupbaocao");
                                    // e.parentNode.removeChild(e);
                                   var e = document.getElementById("popuppheduyetthanhvien");
                                    e.parentNode.removeChild(e);
                                    soluongbaivietkiemduyetdalay=0;
                                })
                        divtop.appendChild(spanx);

                    var divbody = document.createElement("div");
                        divbody.className="divbodynoidungpopuppd";
                        divbody.id="contentpheduyetbody";
                        // divbody.textContent="";
                            var divtopbody = document.createElement("div");
                                divtopbody.className="divtopbodypheduyetthanhvien";
                                    var divpheduyettatcathanhvien = document.createElement("div");
                                        divpheduyettatcathanhvien.innerHTML = '<i class="fa fa-check" aria-hidden="true"></i> &nbsp; Phê duyệt tất cả';
                                        divpheduyettatcathanhvien.className="btnchopheptatcathanhviengianhapnhomcss";
                                        divpheduyettatcathanhvien.addEventListener("click",function(){
                                            clickpheduyettatcagiathanhviennhapnhom($("#div-hi-chu-bai-viet-ma-nhom").val());
                                            $("#divbodybodykiemduyetthanhvien").empty();

                                        })
                                    var divtuchoitatcathanhvien = document.createElement("div");
                                        divtuchoitatcathanhvien.innerHTML = '<i class="fa fa-times" aria-hidden="true"></i> &nbsp; Từ chối tất cả';
                                        divtuchoitatcathanhvien.className="btntuchoitatcathanhviengianhapnhomcss";
                                        divtuchoitatcathanhvien.addEventListener("click",function(){
                                           
                                        $.ajax({
                                        url: link_host+'/ajax/postupdatetatcathanhvientrongnhomne',
                                        type:'POST',
                                        data:{
                                                _token: $('input[name=_token]').val(),
                                                ma_nhom:manhom,
                                                trang_thai:"2", //2 là trạng thái bị hủy xin gia nhập
                                                nguoi_phe_duyet:$("#session-ma-tk").val()
                                        }}).done(function(data){
                                            $("#divbodybodykiemduyetthanhvien").empty();
                                        })
// /ajax/postupdatetatcathanhvientrongnhomne

                                        })
                                divtopbody.appendChild(divpheduyettatcathanhvien);
                                divtopbody.appendChild(divtuchoitatcathanhvien);

                            var divbodybody = document.createElement("div");
                                divbodybody.className="divbodybodypheduyetthanhvien";
                                divbodybody.id="divbodybodykiemduyetthanhvien";

                            var divbotbody = document.createElement("div");
                                divbotbody.className="divbotbodypheduyetbaiviet";
                                divbotbody.textContent="Xem thêm";
                                divbotbody.id="botbodyxemthempheduyetbaiviet";
                                divbotbody.addEventListener("click",function(){

                                    $("#divbodybodykiemduyetbaiviet").scrollTop( document.getElementById("divbodybodykiemduyetbaiviet").scrollHeight);
                                    // loadthemduyetbaiviet();
                                })
                        // divbody.appendChild(divscroll);
                        divbody.appendChild(divtopbody);
                        divbody.appendChild(divbodybody);
                        divbody.appendChild(divbotbody);
                    var divbot = document.createElement("div");
                        divbot.className="divbotpopuptocaopd";
                     divto.appendChild(divtop);
                     divto.appendChild(divbody);
                     divto.appendChild(divbot);
            divtobig.appendChild(divto);

      document.getElementById("bodymaster").appendChild(divtobig);
pheduyetthanhvienvaonhomcreateelement(manhom);
}





function pheduyetthanhvienvaonhomcreateelement(pr){
        $.ajax({
        url: link_host+'/ajax/getlstthanhviendangchopheduyettheomanhomne',
        type:'GET',
        data:{
            ma_nhom:pr
        }
    }).done(function(data){
        var lsrv = document.getElementById('divbodybodykiemduyetthanhvien'); // xóa hết các element trong divpheduyetthanhvien
        while(lsrv.firstChild){
            lsrv.removeChild(lsrv.firstChild);
        }
        var listsearchdiv = document.getElementById('divbodybodykiemduyetthanhvien');
        for (var i = 0; i < data.length; i++) {
           var divkq = document.createElement("div");
        divkq.style.height= "auto";
        divkq.style.width="770px";
        divkq.style.background ="white";
        divkq.style.color="black";
        divkq.style.borderBottom ="solid 1px #e4e6e8";
        // divkq.innerHTML =
        var divomanhdaidienvacautraloigianhapnhom = document.createElement("DIV");


              var divomanhdaidienvaten = document.createElement("DIV");
                  divomanhdaidienvaten.style.width="77px";
                  divomanhdaidienvaten.style.height="100%";
                  divomanhdaidienvaten.style.float="left";

              var divanhdiendien = document.createElement("DIV");
                  divanhdiendien.style.width="77px";
                  divanhdiendien.style.height="77px";
              var imgdaidien = document.createElement("IMG");
                  imgdaidien.style.borderRadius="50%";
                  imgdaidien.style.width="77px";
                  imgdaidien.style.height="77px";
                  imgdaidien.src= link_host+'/pictures/anh_dai_dien/'+ data[i].anh_dai_dien;
                  divanhdiendien.appendChild(imgdaidien);
                  divomanhdaidienvaten.appendChild(divanhdiendien);
              var divtenthanhvien = document.createElement("DIV");
                  divtenthanhvien.style.textAlign="center";
                  divtenthanhvien.style.height="23px";
                  divtenthanhvien.style.width="77px";
                  divtenthanhvien.innerHTML='<h4>'+ data[i].ho_ten_lot +" "+ data[i].ten+'</h4>';
                  divomanhdaidienvaten.appendChild(divtenthanhvien);
            divomanhdaidienvacautraloigianhapnhom.appendChild(divomanhdaidienvaten);

               var  divchuacautraloigianhap = document.createElement("DIV");
                    divchuacautraloigianhap.style.width="200px;";
                    divchuacautraloigianhap.style.height="auto";
                    divchuacautraloigianhap.style.marginLeft="120px";
                    $.ajax({
                      url:link_host+'/ajax/getcautraloivacauhoicuanhomtheomathanhvienne',
                      type:"GET",
                      data:{
                        ma_nhom:data[0].ma_nhom,
                        ma_nguoi_tra_loi:data[0].ma_tai_khoan
                      }

                    }).done(function(data){
                      console.log(data);

                      for (var i = 0; i < data.length; i++) {
                           var divcauhoicon = document.createElement("div");
                           divcauhoicon.innerHTML='<h4><u>'+data[i].noi_dung_cau_hoi+" ?"+'</u></h4>';
                           var divcautraloicon = document.createElement("div");
                           divcautraloicon.textContent="- "+data[i].noi_dung_tra_loi;
                           divchuacautraloigianhap.appendChild(divcauhoicon);
                           divchuacautraloigianhap.appendChild(divcautraloicon);
                      }
                    })
              

          divomanhdaidienvacautraloigianhapnhom.appendChild(divchuacautraloigianhap);
        divkq.appendChild(divomanhdaidienvacautraloigianhapnhom);


        var divomhainut= document.createElement("div");
            divomhainut.style.width="100%";
            divomhainut.style.height="40px";
        //  divomhainut.style.border="solid 1px #9695d8";
        //  divomhainut.style.float="right";
            // divomhainut.style.paddingTop="60px";

        var btnchophepgianhapnhom = document.createElement("div");
            btnchophepgianhapnhom.className="btnchophepthanhviengianhapnhomcss";
        btnchophepgianhapnhom.innerHTML = '<i class="fa fa-check" aria-hidden="true"></i> &nbsp; Phê duyệt';
        btnchophepgianhapnhom.addEventListener("click",clickpheduyetgianhapnhom);
        btnchophepgianhapnhom.myParamMaNhom=pr;
        btnchophepgianhapnhom.myParamMaTaiKhoan=data[i].ma_tai_khoan;
       
        btnchophepgianhapnhom.id="btnpheduyetgianhapnhom"+data[i].ma_tai_khoan;

        var btntuchoigianhapnhom = document.createElement("div");
            btntuchoigianhapnhom.className="btntuchoithanhviengianhapnhomcss";

        btntuchoigianhapnhom.innerHTML = '<i class="fa fa-times" aria-hidden="true"></i> &nbsp; Từ chối';
        btntuchoigianhapnhom.addEventListener("click",clicktuchoigianhapnhom);
        btntuchoigianhapnhom.myParamMaNhom=pr;
        btntuchoigianhapnhom.myParamMaTaiKhoan=data[i].ma_tai_khoan;
       //data[i].ma_nhom;
        btntuchoigianhapnhom.id="btntuchoiduyetgianhapnhom"+data[i].ma_tai_khoan; 
       
        divomhainut.appendChild(btnchophepgianhapnhom);
        divomhainut.appendChild(btntuchoigianhapnhom);
        divkq.appendChild(divomhainut);
        document.getElementById("divbodybodykiemduyetthanhvien").appendChild(divkq);
        }
        ////
    })
}






// phê duyệt tất cả các thành viên gia nhập nhóm
function clickpheduyettatcagiathanhviennhapnhom(prmanhom){

        $.ajax({
        url: link_host+'/ajax/getlstthanhviendangchopheduyettheomanhomne',
        type:'GET',
        data:{
            ma_nhom:prmanhom
        }
    }).done(function(data){

        for (var i = 0; i < data.length; i++) {
        var bdb1 = bdb2=bdb3=true;
        if(bdb1){
            bdb1=!bdb1;
             $.ajax({
                    url: link_host+'/ajax/postthemthanhvienvaonhomne',
                    type:'POST',
                    data:{
                            _token: $('input[name=_token]').val(),
                            ma_nhom:prmanhom,
                            ma_tai_khoan:data[i].ma_tai_khoan,
                            ma_chuc_vu:"CV07",
                            trang_thai:"1"        
                    }}).done(function(dt1){})        
         }
         if(bdb2){
            bdb2=!bdb2;
            $.ajax({
                            url: link_host+'/ajax/postupdatethanhvienchopheduyetne',
                            type:'POST',
                            data:{
                                    _token: $('input[name=_token]').val(),
                                    ma_nhom:prmanhom,
                                    ma_tai_khoan:data[i].ma_tai_khoan,
                            trang_thai:"0",//bảng thành viên chờ phê duyệt đã bị hủy
                                    nguoi_phe_duyet:$("#session-ma-tk").val()
                            }}).done(function(dt2){})
        }
         if(bdb3){
            bdb3=!bdb3;
            $.ajax({
                            url: link_host+'/ajax/postchucvucuathanhvienvaonhomne',
                            type:'POST',
                            data:{
                                    _token: $('input[name=_token]').val(),
                                    ma_nhom:prmanhom,
                                    ma_tai_khoan:data[i].ma_tai_khoan,
                                    ma_chuc_vu:"CV07",
                                    trang_thai:"1"        
                            }}).done(function(dt3){})
        }
            

        }
    })
}