var modal_nhom = document.getElementById('div-setting-nhom-menu');
var btn_nhom = document.getElementById("div-btn-show-menu-setting-nhom");
btn_nhom.onclick = function() {
    //alert("click thong bao");
    modal_nhom.style.display = "block";

   // opentab_lstthanhvien($('#div-hi-chu-bai-viet-ma-nhom').val());// mặc định khi mở load list thành viên của nhóm

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