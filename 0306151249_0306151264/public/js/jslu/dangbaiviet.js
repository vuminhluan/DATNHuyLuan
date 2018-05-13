var tongsoluachon= 0;
//var z = true;
function clickckb(z) {
  if (z)  {
            // z=!z;
                 document.getElementById("divbigformdangbaiviet").style.height="300px";
                 document.getElementById("divtrongformdangbaiviet").style.height="250px";
                 var a =    document.getElementsByClassName("divoptionradio");
                // var c =    document.getElementsByClassName("optionlevel2");
                 for (var i = 0; i < a.length; i++) {
                   a[i].style.height="140px";
                 //  c[i].style.display="none";
                 }
              
              }
          else{
            //  z=!z;
              document.getElementById("divbigformdangbaiviet").style.height="175px";
              document.getElementById("divtrongformdangbaiviet").style.height="125px";
              var b =    document.getElementsByClassName("divoptionradio");
           //   var d =    document.getElementsByClassName("optionlevel2");
               for (var i = 0; i < b.length; i++) {
                 b[i].style.height="30px";
            //     d[i].style.display="none";
                 }
              }
      }

var za=zb=zc=zd= true;


function clickoption(l) {
 
  if (za&&l=="optionthubai") {
               tongsoluachon+=1;
             za=!za;
             document.getElementById(l).style.display="block";    
             if (tongsoluachon>0) {
              clickckb(true);
             }
          }
          else if(l=="optionthubai"){
               tongsoluachon-=1;
              za=!za;
              document.getElementById(l).style.display="none";
              if (tongsoluachon<1) {
              clickckb(false);
             }
          }
  if (zb&&l=="optionkhaosat") {
               tongsoluachon+=1;
             zb=!zb;
             document.getElementById(l).style.display="block";    
             if (tongsoluachon>0) {
              clickckb(true);
             }
          }
          else if(l=="optionkhaosat"){
               tongsoluachon-=1;
              zb=!zb;
              document.getElementById(l).style.display="none";
              if (tongsoluachon<1) {
              clickckb(false);
             }
          }
  if (zc&&l=="optiontailieu") {
               tongsoluachon+=1;
             zc=!zc;
             document.getElementById(l).style.display="block";    
             if (tongsoluachon>0) {
              clickckb(true);
             }
          }
          else if(l=="optiontailieu"){
               tongsoluachon-=1;
              zc=!zc;
              document.getElementById(l).style.display="none";
              if (tongsoluachon<1) {
              clickckb(false);
             }
          }
  if (zd&&l=="optionthongbao") {
               tongsoluachon+=1;
             zd=!zd;
             document.getElementById(l).style.display="block";    
             if (tongsoluachon>0) {
              clickckb(true);
             }
          }
          else if(l=="optionthongbao"){
               tongsoluachon-=1;
              zd=!zd;
              document.getElementById(l).style.display="none";
              if (tongsoluachon<1) {
              clickckb(false);
             }
          }




}






















// comboxx các loại ẩn danh

var x, i, j, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
for (i = 0; i < x.length; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 0; j < selElmnt.length; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        h = this.parentNode.previousSibling;
        for (i = 0; i < s.length; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            for (k = 0; k < y.length; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  for (i = 0; i < y.length; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < x.length; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);


/////////////
  /* attach a submit handler to the form */

    // ma_bai_viet: "BV12345675",
    //       ma_nguoi_viet: "BV12345675",
    //       ma_chu_bai_viet: "BV12345675",
    //       noi_dung_bai_viet: "Đây là bài viết test thêm vào 666",
    //       binh_luan_bai_viet: "1",
    //       hinh_anh_bai_viet: "1",
    //       nop_tep: "1",
    //       khao_sat_y_kien: "1",
    //       ma_loai_bai_viet: "LBV002",
    //       thoi_gian_dang: "2001/01/01",
    //       thoi_gian_an_bai_viet: "2001/01/01",
    //       thoi_gian_sua: "2001/01/01",
    //       nguoi_sua: "NV12345675" 

    ////////////////////////////////
    $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});


    //

      $("#frmdangbaiviet").submit(function(event) {

      /* stop form from submitting normally */
      event.preventDefault();
  
      /* get the action attribute from the <form action=""> element */
      // var $form = $( this ),
      //     urll = $form.attr( 'action' );
      // var _tokenn = $("form[name='frmnamedangbaiviet']").find("input[name='_token']").val();
      // var _tokenn2 =  $('input[name=_token]').val();
      // alert(_tokenn);
      // alert(_tokenn2);
      alert("hihi");
      
      $.ajax(
          {
          url: '/DATNHuyLuan/0306151249_0306151264/public/hr/postbaivietne',
          type: 'POST',
          data:{
          _token: $('input[name=_token]').val(),

          ma_bai_viet: "BV12345676",
          ma_nguoi_viet: "BV12345676",
          ma_chu_bai_viet: "BV12345676",
          noi_dung_bai_viet: "Đây là bài viết test thêm vào 777",
          binh_luan_bai_viet: "1",
          hinh_anh_bai_viet: "1",
          nop_tep: "1",
          khao_sat_y_kien: "1",
          ma_loai_bai_viet: "LBV002",
          thoi_gian_dang: "2001/01/01",
          thoi_gian_an_bai_viet: "2001/01/01",
          thoi_gian_sua: "2001/01/01",
          nguoi_sua: "NV12345676" 
          }
      }).done(function(data) {
        document.getElementById("baivietmoidang").style.height = "300px";
         $('#baivietmoidang').html(data);
    })

    });
      /////////////////////////////

      // $(document).ready(function(){
      //   $('btnn').click(function(event){
      //     event.preventDefault();
      //     $.post("ajaxpost",{ _token:  $('input[name=_token]').val(), dulieu:"tesstdulieu"}, function(data){
      //       $('#data').html(data);
      //     });
      //   });
      // });