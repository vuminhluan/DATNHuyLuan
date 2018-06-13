var modal_nhom = document.getElementById('div-setting-nhom-menu');

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
                            var spanx= document.createElement("SPAN");
                                spanx.className="fa fa-times";
                                spanx.style.marginLeft="575px";
                        divtop.appendChild(spanx);

                    var divbody = document.createElement("div");
                        divbody.className="divbodynoidungpopuppd";
                        divbody.textContent="";
                    var divbot = document.createElement("div");
                        divbot.className="divbotpopuptocaopd";
                        // var btndongy = document.createElement("div");
                        //     btndongy.textContent="Đồng ý"
                        //     btndongy.className="btndongypopupys";
                        //     btndongy.addEventListener("click",function(){
                        //        //   eval(namef+'(prl);');
                        //        var e = document.getElementById("popupbaocao");
                        //            e.parentNode.removeChild(e);
                        //     })
                        // var btnhuybo = document.createElement("div");
                        //     btnhuybo.className="btnhuypopupys";
                        //     btnhuybo.textContent="Xác nhận";
                        //     btnhuybo.addEventListener("click",function(){
                        //        var e = document.getElementById("popupbaocao");
                        //         e.parentNode.removeChild(e);
                        //     })
                       // divbot.appendChild(btndongy);
                        // divbot.appendChild(btnhuybo);
                     divto.appendChild(divtop);
                     divto.appendChild(divbody);
                     divto.appendChild(divbot);
            divtobig.appendChild(divto);
      document.getElementById("bodymaster").appendChild(divtobig);
}





























// var btn_nhom = document.getElementById("div-btn-show-menu-setting-nhom");
// btn_nhom.onclick = function() {
//     //alert("click thong bao");
//     modal_nhom.style.display = "block";

//    // opentab_lstthanhvien($('#div-hi-chu-bai-viet-ma-nhom').val());// mặc định khi mở load list thành viên của nhóm
// }
