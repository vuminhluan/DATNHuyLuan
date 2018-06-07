
$( document ).ready(function() {
  
  function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function() {
  readURL(this);
  $('#divanhxemtruocduocthemvao').css("display","block");
});

});





var heightofdivtrongformdangbaiviet= 0;
var heightofdivbigformdanbaiviet = 0;

function getdodaiheightdivbigvadivtrong(){
  heightofdivtrongformdangbaiviet= $('#divtrongformdangbaiviet').height();
  heightofdivbigformdanbaiviet = $('#divbigformdangbaiviet').height();
}

//tu dong them dong textarea ///// textarea
// $('#iptextdangbaiviet').each(function () {
//   this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
// }).on('input', function () {
//   getdodaiheightdivbigvadivtrong();
//   // alert(this.scrollHeight);
//   // alert(this.scrollHeight+"day la cai gi do");
//   this.style.height = 'auto';
//   this.style.height = (this.scrollHeight) + 'px';

//   if(tongsoluachon<1)
//   {
//       var dodaimot= 20+parseInt(this.style.height);
//       var strdodaimot = dodaimot+'px';
//       $('#divnoidungbaiviet').height(strdodaimot);
//       ///////////////
//       var dodaihai = 94+parseInt(this.style.height);
//           heightofdivtrongformdangbaiviet=dodaihai;
//           dodaihai=heightofdivtrongformdangbaiviet;
//       var strdodaihai = dodaihai+'px';
//       $('#divtrongformdangbaiviet').height(strdodaihai);
//       ////////////////
//       var dodaiba = 143+parseInt(this.style.height); 
//           heightofdivbigformdanbaiviet= dodaiba;
//           dodaiba=heightofdivbigformdanbaiviet;
//       var strdodaiba = dodaiba+'px';
//       $('#divbigformdangbaiviet').height(strdodaiba);
//   }
//   else
//   {
//       var dodaimot= 20+parseInt(this.style.height);
//       var strdodaimot = dodaimot+'px';
//       $('#divnoidungbaiviet').height(strdodaimot);
//       ///////////////
//       var dodaihai = 94+parseInt(this.style.height)+125;
//           heightofdivtrongformdangbaiviet=dodaihai;
//           dodaihai=heightofdivtrongformdangbaiviet;
//       var strdodaihai = dodaihai+'px';
//       $('#divtrongformdangbaiviet').height(strdodaihai);
//       ////////////////
//       var dodaiba = 143+parseInt(this.style.height)+125; 
//           heightofdivbigformdanbaiviet= dodaiba;
//           dodaiba=heightofdivbigformdanbaiviet;
//       var strdodaiba = dodaiba+'px';
//       $('#divbigformdangbaiviet').height(strdodaiba);
//   }


// });















var tongsoluachon= 0;
//var z = true;
// function clickckbb(z) {
//   if (z)  {
//            getdodaiheightdivbigvadivtrong();
//             if(tongsoluachon>0&&tongsoluachon<2)
//             {
//               heightofdivtrongformdangbaiviet+=125;
//               heightofdivbigformdanbaiviet+=125;
//             }
//             var strheightofdivtrongformdangbaiviet = heightofdivtrongformdangbaiviet + 'px';
//             var strheightofdivbigformdangbaiviet = heightofdivbigformdanbaiviet + 'px';
//             // z=!z;
//                  $('#divbigformdangbaiviet').height(strheightofdivbigformdangbaiviet);
//                  $('#divtrongformdangbaiviet').height(strheightofdivtrongformdangbaiviet);
//                  var a =    document.getElementsByClassName("divoptionradio");
//                 // var c =    document.getElementsByClassName("optionlevel2");
//                  for (var i = 0; i < a.length; i++) {
//                    a[i].style.height="140px";
//                  //  c[i].style.display="none";
//                  }
//             getdodaiheightdivbigvadivtrong();
              
//           }
//   else{
//             getdodaiheightdivbigvadivtrong();
//             if(tongsoluachon<1)
//             {
//             heightofdivtrongformdangbaiviet-=125;
//             heightofdivbigformdanbaiviet-=125;
//             }
//             var strheightofdivtrongformdangbaiviet = heightofdivtrongformdangbaiviet + 'px';
//             var strheightofdivbigformdangbaiviet = heightofdivbigformdanbaiviet + 'px';
//             //  z=!z;
//               $('#divbigformdangbaiviet').height(strheightofdivbigformdangbaiviet);
//                  $('#divtrongformdangbaiviet').height(strheightofdivtrongformdangbaiviet);
//               var b =    document.getElementsByClassName("divoptionradio");
//            //   var d =    document.getElementsByClassName("optionlevel2");
//                for (var i = 0; i < b.length; i++) {
//                  b[i].style.height="30px";
//             //     d[i].style.display="none";
//                  }
//                  getdodaiheightdivbigvadivtrong();
//         }
//       }

var za=zb=zc=zd= true;


function clickoption(l) {
      
  getdodaiheightdivbigvadivtrong();

  if (za&&l=="optionthubai") {
               tongsoluachon+=1;
             za=!za;
             document.getElementById(l).style.display="block";    

          }
          else if(l=="optionthubai"){
               tongsoluachon-=1;
              za=!za;
              document.getElementById(l).style.display="none";

          }
  if (zb&&l=="optionkhaosat") {
               tongsoluachon+=1;
             zb=!zb;
             document.getElementById(l).style.display="block";    

          }
          else if(l=="optionkhaosat"){
               tongsoluachon-=1;
              zb=!zb;
              document.getElementById(l).style.display="none";

          }
  if (zc&&l=="optiontailieu") {
               tongsoluachon+=1;
             zc=!zc;
             document.getElementById(l).style.display="block";    

          }
          else if(l=="optiontailieu"){
               tongsoluachon-=1;
              zc=!zc;
              document.getElementById(l).style.display="none";
          }
  if (zd&&l=="optionthongbao") {
               tongsoluachon+=1;
             zd=!zd;
             document.getElementById(l).style.display="block";    
          }
          else if(l=="optionthongbao"){
               tongsoluachon-=1;
              zd=!zd;
              document.getElementById(l).style.display="none";
          }
}

function displaydivoption(p)
{
    document.getElementById("optionthongbao").style.display=p;
    document.getElementById("optionkhaosat").style.display=p;
    document.getElementById("optionthubai").style.display=p;
}




















// comboxx các loại ẩn danh



































//////////////////////////////////////////////////////////////////////////////////

var thongbao=thubai=khaosat=tailieu= "0";
var mabaiviet="hi";
 var ngaygiohientai = getdatetime();

// function transferComplete(data){
//   console.log(data.currentTarget.response);
// }

$( document ).ready(function() {

  $('#formdangbaiviet').submit(function(event) {
    event.preventDefault();



    var formData = new FormData($(this)[0]);
        formData.append('nguoi_dang',$('#session-ma-tk').val());
        formData.append('chu_cua_bai_dang',$('#div-hi-chu-bai-viet-ma-nhom').val());
        formData.append('trang_thai','1');
    $.ajax({
        url:  link_host+'/uploadanh',
        type: 'POST',  
        processData: false,
        contentType: false,              
        data: formData
    }).done(function(data){
      submitdangbaiviet();
      document.getElementById("formdangbaiviet").reset();
      document.getElementById("imgInp").value="";
      $('#divanhxemtruocduocthemvao').css("display","none");
    });
    
});




   // $('#formdangbaiviet').submit(function(event) {
   //      event.preventDefault();
   //      var formData = new FormData($(this)[0]);
   //      $.ajax({
   //          url: link_host+'/uploadanh',
   //          type: 'POST',
   //          processData: false,
   //          contentType: false,              
   //          data: formData
   //      });
   //    });
});


function submitdangbaiviet() {

          // var formData = new FormData();
          // formData.append('file', $('#imgInp')[0].files[0]);

          // $.ajax({
          //        url :  link_host+'/uploadanh',
          //        type : 'POST',
          //        data : formData,
          //        // processData: false,  // tell jQuery not to process the data
          //        // contentType: false,  // tell jQuery not to set contentType
          //        _token:$('input[name=_token]').val()

          // }).done(function(data){                 
          //            console.log(data);
          //            alert(data);
          // })

         //  var form=document.getElementById("uploadanh");
         //  var filee = document.getElementById("imgInp");
         // //  var request = new XMLHttpRequest(form);

         // var myFormData = new FormData();
         //  myFormData.append('pictureFile', filee.files[0]);

         //  $.ajax({
         //    url: link_host+'/uploadanh',
         //    type: 'POST',
         //    processData: false, // important
         //    contentType: false, // important
         //    dataType : 'json',
         //    data:{
         //      _token:$('input[name=_token]').val(),
         //     myFormData:myFormData
         //     }
         //  }).done(function(data){
         //    console.log(data)
         //  });

         //  var formdata = new FormData(form);
         //  console.log(formdata);
         //  console.log(filee.files);
         //  console.log(filee.files[0]);
         //  request.open('post','DATNHuyLuan/0306151249_0306151264/public/uploadanh');
         // request.addEventListener("load", transferComplete);
         //  request.send(filee.files[0]);


          // 
          if ($('#ckbthongbao').is(":checked"))
          {
            thongbao="1";
          }
          if ($('#ckbthubai').is(":checked"))
          {
            thubai="1";
          }
          if ($('#ckbkhaosat').is(":checked"))
          {
            khaosat="1";
          }

          var e = document.getElementById("cbbloaibaiviet");
          var valueselectedoption = e.options[e.selectedIndex].value;

              $.ajax(
              {
                  url: link_host+'/ajax/postbaivietne',
                  type: 'POST',
                  data:{
                  _token: $('input[name=_token]').val(),
                  ma_nguoi_viet: $('#session-ma-tk').val(),
                  ma_chu_bai_viet: $('#div-hi-chu-bai-viet-ma-nhom').val(),
                  noi_dung_bai_viet:$('#iptextdangbaiviet').val(),
                  binh_luan_bai_viet: thongbao,
                  hinh_anh_bai_viet: tailieu,
                  nop_tep: thubai,
                  khao_sat_y_kien: khaosat,
                  ma_loai_bai_viet: valueselectedoption,
                  thoi_gian_an_bai_viet: "2001/01/01",
                  nguoi_sua: "NV12345869" 
              }
              }).done(function(data) {
                  displaydivoption("none");
                  tongsoluachon= 0;
                  za=zb=zc=zd= true;
                  $("#ckbkhaosat").prop("checked",false);
                  $("#ckbthubai").prop("checked",false);
                  $("#ckbthongbao").prop("checked",false);
                  $.ajax({
                      url: link_host+'/ajax/getbaiviettheonguoivietvanguoisohuune',
                      type: 'GET',
                      data:{
                        ma_nguoi_viet: $('#session-ma-tk').val(),
                        ma_chu_bai_viet: $('#div-hi-chu-bai-viet-ma-nhom').val()
                      }
                  }).done(function(data){

                    $('#iptextdangbaiviet').val("");
                        var econ = document.createElement("div");
                        econ.setAttribute("id", "ssa");
                        var Echa = document.getElementById('divnoidungcon');
                        Echa.insertBefore(econ, Echa.firstChild);
                        $('#ssa').html(data);

                  })
              })     
}

      /////////////////////////////




















//////////////////// tao ra div sau khi dang bai
function creatediv() {

    var element = document.createElement("div");
    element.setAttribute("id", "sss");
    document.getElementById('divcontent').appendChild(element);


}

 function getdatetime(){
 var today = new Date();
      
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();
        var h = today.getHours();
        var MM = today.getMinutes();
        var mns = today.getSeconds();

        if(dd<10) {
            dd = '0'+dd
        } 

        if(mm<10) {
            mm = '0'+mm
        } 
        today = yyyy + '/' + mm + '/' + dd +" "+h+":"+MM+":"+mns;
     return today;
 }





// var areinput = document.getElementById('#iptextdangbaiviet');
//     areinput.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
//     areinput.addEventListener("input", myFunction);


//     function myFunction () {
//   alert(this.scrollHeight+"day la cai gi do");
//   this.style.height = 'auto';
//   this.style.height = (this.scrollHeight) + 'px';

/////

// $('document').ready()
// {

// var xi, i, j, selElmnt, a, b, c;
// /*look for any elements with the class "custom-select":*/
// xi = document.getElementsByClassName("custom-select");
// for (i = 0; i < xi.length; i++) {
//   selElmnt = xi[i].getElementsByTagName("select")[0];
//   /*for each element, create a new DIV that will act as the selected item:*/
//   a = document.createElement("DIV");
//   a.setAttribute("class", "select-selected");
//   a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
//   xi[i].appendChild(a);
//   /*for each element, create a new DIV that will contain the option list:*/
//   b = document.createElement("DIV");
//   b.setAttribute("class", "select-items select-hide");
//   for (j = 0; j < selElmnt.length; j++) {
//     /*for each option in the original select element,
//     create a new DIV that will act as an option item:*/
//     c = document.createElement("DIV");
//     c.innerHTML = selElmnt.options[j].innerHTML;
//     c.addEventListener("click", function(e) {
//         /*when an item is clicked, update the original select box,
//         and the selected item:*/
//         var y, i, k, s, h;
//         s = this.parentNode.parentNode.getElementsByTagName("select")[0];
//         h = this.parentNode.previousSibling;
//         for (i = 0; i < s.length; i++) {
//           if (s.options[i].innerHTML == this.innerHTML) {
//             s.selectedIndex = i;
//             h.innerHTML = this.innerHTML;
//             y = this.parentNode.getElementsByClassName("same-as-selected");
//             for (k = 0; k < y.length; k++) {
//               y[k].removeAttribute("class");
//             }
//             this.setAttribute("class", "same-as-selected");
//             break;
//           }
//         }
//         h.click();
//     });
//     b.appendChild(c);
//   }
//   xi[i].appendChild(b);
//   a.addEventListener("click", function(e) {
//       /*when the select box is clicked, close any other select boxes,
//       and open/close the current select box:*/
//       e.stopPropagation();
//       closeAllSelect(this);
//       this.nextSibling.classList.toggle("select-hide");
//       this.classList.toggle("select-arrow-active");
//     });
// }
// function closeAllSelect(elmnt) {
//   /*a function that will close all select boxes in the document,
//   except the current select box:*/
//   var x, y, i, arrNo = [];
//   x = document.getElementsByClassName("select-items");
//   y = document.getElementsByClassName("select-selected");
//   for (i = 0; i < y.length; i++) {
//     if (elmnt == y[i]) {
//       arrNo.push(i)
//     } else {
//       y[i].classList.remove("select-arrow-active");
//     }
//   }
//   for (i = 0; i < x.length; i++) {
//     if (arrNo.indexOf(i)) {
//       x[i].classList.add("select-hide");
//     }
//   }
// }
// /*if the user clicks anywhere outside the select box,
// then close all select boxes:*/
// document.addEventListener("click", closeAllSelect);




// }

