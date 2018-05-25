var modal_nhom = document.getElementById('div-setting-nhom-menu');
var btn_nhom = document.getElementById("div-btn-show-menu-setting-nhom");
btn_nhom.onclick = function() {
    alert("click thong bao");
    modal_nhom.style.display = "block";
    // $.ajax({
    //     url: link_host+'/ajax/getnhomtheomataikhoanne', 
    //     type: 'GET',
    //     data:{
    //         ma_tai_khoan :"N000001"
    //     }
    // }).done(function(data){
    //     alert("hihi thanh cong send ajax");
    //     $('#div-dynamic-menu').html(data);
    // })
}



window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    else if(event.target == modal_nhom)
    {
        modal_nhom.style.display="none";
    }
}