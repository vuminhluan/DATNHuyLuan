var modal_nhom = document.getElementById('div-setting-nhom-menu');
// var btn_nhom = document.getElementById("div-btn-show-menu-setting-nhom");
// btn_nhom.onclick = function() {
//     //alert("click thong bao");
//     modal_nhom.style.display = "block";

//    // opentab_lstthanhvien($('#div-hi-chu-bai-viet-ma-nhom').val());// mặc định khi mở load list thành viên của nhóm
// }

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
                                   
                                })
                                }
                            }
                     
     }

    
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


// $(document).ready(function(){
// $('.page-link').on('click', function(e){
//     e.preventDefault();
//     // var url = $(this).attr('href');
//     // $.post(url, $('#search').serialize(), function(data){
//     //     $('#posts').html(data);
//     // });
// });

// });




function clickthanhvienturoikhoinhomnhom(prl){
    var manhom=prl;
   // alert("say click"+prl.currentTarget.myparamMaNhom+"-"+prl.currentTarget.myparamMaTaiKhoan);
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
}







              // $.ajax({
              //   url:link_host+'/ajax/getsoluongbaivietcuamotnhomne',
              //   type:'GET',
              //   data:{
              //       ma_chu_bai_viet:$("#div-hi-chu-bai-viet-ma-nhom").val(),
              //   }}).done(function(data){   })