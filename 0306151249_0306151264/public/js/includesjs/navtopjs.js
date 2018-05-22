function taonhommoi(l)
{
 //   alert("tao nhom moi");
 if (l) {
            $('#div-group-tham-gia').css("display","none");
            $('#div-content-tao-nhom').css("display","block");
        }
        else{
            $('#div-group-tham-gia').css("display","block");
            $('#div-content-tao-nhom').css("display","none");
        }
   
}

function submittaonhom()
{
    var manhom="hi";
    var tennhom = $('#input-tennhom').val();
  //  alert(tennhom);

 //  alert(link_host);

 $.ajax({
    url: link_host+'/ajax/getmanhomne',
    type:'GET',
    data:{

    }
 }).done(function(data){
//alert(manhom);
    manhom =  data.substring(2,10);
   // alert(manhom);
         var manhomint = parseInt(manhom)+1;
       //  alert(manhomint);
         manhom = manhomint.toString();
          while(manhom.length<8)
          {
            manhom ="0"+manhom;
          }
          manhom ="NH"+ manhom;


alert(manhom);
//alert($('input[name=_token]').val());
    $.ajax({
        url: link_host+'/ajax/posttaonhomne',
        type:'POST',
        data:{
            _token: $('input[name=_token]').val(),
            ma_nhom:   manhom,           
            ma_gia_nhap: "0000"   ,           
            ten_nhom:   tennhom   ,               
            anh:        "no"   ,              
            ma_tai_khoan:  "N000001"   ,           
            ma_loai_nhom:  "LN01"   ,          
            gioi_thieu_nhom:  "Describe something"  ,         
            thoi_gian_tham_gia: "2001/01/01",        
            thoi_gian_het_han_tham_gia: "2001/01/01"  ,
            thoi_gian_sua: "2001/01/01",
            thoi_gian_tao: "2001/01/01" ,
            nguoi_sua:   "N000001"  ,              
            trang_thai:   "1"               
        }

    }).done(function(data){
         //   alert(tennhom+"tao thanh cong");
            alert(data);
    })
    })
}






// Get the modal
var modal = document.getElementById('div-dynamic-menu');

// Get the button that opens the modal
var btn = document.getElementById("btn-show-dynamic-menu");

// Get the <span> element that closes the modal
// var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
// alert("hihi thanh cong send ajax");
    $.ajax({
        url: link_host+'/ajax/getnhomtheomataikhoanne', 
        type: 'GET',
        data:{
            ma_tai_khoan :"N000001"
        }
    }).done(function(data){
        alert("hihi thanh cong send ajax");
        $('#div-dynamic-menu').html(data);
    })
}

// When the user clicks on <span> (x), close the modal
// span.onclick = function() {
//     modal.style.display = "none";
// }

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}



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