

// var heightofdivtrongformdangbaiviet= 0;
// var heightofdivbigformdanbaiviet = 0;

// function getdodaiheightdivbigvadivtrong(){
//   heightofdivtrongformdangbaiviet= $('#divtrongformdangbaiviet').height();
//   heightofdivbigformdanbaiviet = $('#divbigformdangbaiviet').height();
// }

// //tu dong them dong textarea ///// textarea
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















// var tongsoluachon= 0;
// //var z = true;
// function clickckb(z) {
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

// var za=zb=zc=zd= true;


// function clickoption(l) {
      
//   getdodaiheightdivbigvadivtrong();

//   if (za&&l=="optionthubai") {
//                tongsoluachon+=1;
//              za=!za;
//              document.getElementById(l).style.display="block";    
//              if (tongsoluachon>0) {
//               clickckb(true);
//              }
//           }
//           else if(l=="optionthubai"){
//                tongsoluachon-=1;
//               za=!za;
//               document.getElementById(l).style.display="none";
//               if (tongsoluachon<1) {
//               clickckb(false);
//              }
//           }
//   if (zb&&l=="optionkhaosat") {
//                tongsoluachon+=1;
//              zb=!zb;
//              document.getElementById(l).style.display="block";    
//              if (tongsoluachon>0) {
//               clickckb(true);
//              }
//           }
//           else if(l=="optionkhaosat"){
//                tongsoluachon-=1;
//               zb=!zb;
//               document.getElementById(l).style.display="none";
//               if (tongsoluachon<1) {
//               clickckb(false);
//              }
//           }
//   if (zc&&l=="optiontailieu") {
//                tongsoluachon+=1;
//              zc=!zc;
//              document.getElementById(l).style.display="block";    
//              if (tongsoluachon>0) {
//               clickckb(true);
//              }
//           }
//           else if(l=="optiontailieu"){
//                tongsoluachon-=1;
//               zc=!zc;
//               document.getElementById(l).style.display="none";
//               if (tongsoluachon<1) {
//               clickckb(false);
//              }
//           }
//   if (zd&&l=="optionthongbao") {
//                tongsoluachon+=1;
//              zd=!zd;
//              document.getElementById(l).style.display="block";    
//              if (tongsoluachon>0) {
//               clickckb(true);
//              }
//           }
//           else if(l=="optionthongbao"){
//                tongsoluachon-=1;
//               zd=!zd;
//               document.getElementById(l).style.display="none";
//               if (tongsoluachon<1) {
//               clickckb(false);
//              }
//           }
// }

// function displaydivoption(p)
// {
//     document.getElementById("optionthongbao").style.display=p;
//     document.getElementById("optiontailieu").style.display=p;
//     document.getElementById("optionkhaosat").style.display=p;
//     document.getElementById("optionthubai").style.display=p;
// }




















// // comboxx các loại ẩn danh



































// //////////////////////////////////////////////////////////////////////////////////

// var thongbao=thubai=khaosat=tailieu= "0";
// var mabaiviet="hi";
//  var ngaygiohientai = getdatetime();
//  //var link_host = "/DATNHuyLuan/0306151249_0306151264/public"

// function submitdangbaiviet() {
//   alert("hihi");
// }

// $("#frmdangbaiviet").submit(function(event) {
//   // // tat su kien mac dinh của form
//       // event.preventDefault(); 
//       // alert("hihihi");
//   //     //test
//   //    //  alert(textt+"dang tim ne");
//   //    alert("-"+getdatetime()+"-");
//   //     //end test

      
//   //     // lay cac thong so cua form
//   //   //get value from form
//   //         if ($('#ckbthongbao').is(":checked"))
//   //         {
//   //           thongbao="1";
//   //         }
//   //         if ($('#ckbthubai').is(":checked"))
//   //         {
//   //           thubai="1";
//   //         }
//   //         if ($('#ckbkhaosat').is(":checked"))
//   //         {
//   //           khaosat="1";
//   //         }
//   //         if ($('#ckbtailieu').is(":checked"))
//   //         {
//   //           tailieu="1";
//   //         }
//   //         ///value của combobox loaibaiviet
//   //         var e = document.getElementById("cbbloaibaiviet");
//   //         var valueselectedoption = e.options[e.selectedIndex].value;
//   //         alert ("loai bai viet:"+valueselectedoption);


          
//   //   // end lay cac thong so form
//   //     //lay so luong bai viet, và cấp mã, sau đó insert
//   //     $.ajax(
//   //         {
//   //         url: link_host+'/ajax/getmabaivietne',
//   //         type: 'GET',
//   //         data:{
//   //         }
//   //     }).done(function(data) {
//   //        mabaiviet=  data.substring(2,10);
//   //        var mabaivietint = parseInt(mabaiviet)+1;
//   //        mabaiviet = mabaivietint.toString();
//   //         while(mabaiviet.length<8)
//   //         {
//   //           mabaiviet ="0"+mabaiviet;
//   //         }
//   //         mabaiviet ="BV"+ mabaiviet;
//   //         alert(mabaiviet);

//   //         alert(document.getElementById("iptextdangbaiviet").value);
//   //         ///document.getElementById("iptextdangbaiviet").value,
//   //             $.ajax(
//   //             {
//   //                 url: link_host+'/ajax/postbaivietne',
//   //                 type: 'POST',
//   //                 data:{
//   //                 _token: $('input[name=_token]').val(),
//   //                 ma_bai_viet: mabaiviet,
//   //                 ma_nguoi_viet: "BV12345869",
//   //                 ma_chu_bai_viet: "BV12345869",
//   //                 noi_dung_bai_viet:$('#iptextdangbaiviet').val(),
//   //                 binh_luan_bai_viet: thongbao,
//   //                 hinh_anh_bai_viet: tailieu,
//   //                 nop_tep: thubai,
//   //                 khao_sat_y_kien: khaosat,
//   //                 ma_loai_bai_viet: valueselectedoption,
//   //                 thoi_gian_dang: ngaygiohientai,
//   //                 thoi_gian_an_bai_viet: "2001/01/01",
//   //                 thoi_gian_sua: "2001/01/01",
//   //                 nguoi_sua: "NV12345869" 
//   //             }
//   //             }).done(function(data) {
//   //               //  document.getElementById("baivietmoidang").style.height = "300px";
//   //                // $('#baivietmoidang').html(data);
//   //                 ///xu ly sau khi dang baiviet xong
                 

//   //                 displaydivoption("none");
//   //                 clickckb(false);
//   //                 tongsoluachon= 0;
//   //                 za=zb=zc=zd= true;
//   //                 ///insert bai viet vao noi dung ben duoi su dung ajax
//   //                   alert(mabaiviet);
//   //                 $.ajax({
//   //                     url: link_host+'/ajax/getbaivietne',
//   //                     type: 'GET',
//   //                     data:{
//   //                       mabaiviet: mabaiviet
//   //                     }
//   //                 }).done(function(data){
//   //                   //gan lai height cho form dang bai viet
//   //                   $('#divbigformdangbaiviet').height(175);
//   //                   $('#divtrongformdangbaiviet').height(125);

//   //                   $('#iptextdangbaiviet').height(30);
//   //                   //alert(mabaiviet+"saukhidangbai");
//   //                   document.getElementById("frmdangbaiviet").reset();
//   //                     //   alert("lay trang kia thanh cong");
//   //                        var econ = document.createElement("div");
//   //                        econ.setAttribute("id", "sss");
//   //                       // document.getElementById('divcontent').appendChild(element);
//   //                       var Echa = document.getElementById('divnoidungcon');
//   //                       Echa.insertBefore(econ, Echa.firstChild);
//   //                       $('#sss').html(data);

//   //                 })


                 
//   //             })     
//   //     })

      


// });
//       /////////////////////////////




















// //////////////////// tao ra div sau khi dang bai
// function creatediv() {

//     var element = document.createElement("div");
//     element.setAttribute("id", "sss");
//     document.getElementById('divcontent').appendChild(element);


// }

//  function getdatetime(){
//  var today = new Date();
      
//         var dd = today.getDate();
//         var mm = today.getMonth()+1; //January is 0!
//         var yyyy = today.getFullYear();
//         var h = today.getHours();
//         var MM = today.getMinutes();
//         var mns = today.getSeconds();

//         if(dd<10) {
//             dd = '0'+dd
//         } 

//         if(mm<10) {
//             mm = '0'+mm
//         } 
//         today = yyyy + '/' + mm + '/' + dd +" "+h+":"+MM+":"+mns;
//      return today;
//  }





// // var areinput = document.getElementById('#iptextdangbaiviet');
// //     areinput.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
// //     areinput.addEventListener("input", myFunction);


// //     function myFunction () {
// //   alert(this.scrollHeight+"day la cai gi do");
// //   this.style.height = 'auto';
// //   this.style.height = (this.scrollHeight) + 'px';

// /////


// var x, i, j, selElmnt, a, b, c;
// /*look for any elements with the class "custom-select":*/
// x = document.getElementsByClassName("custom-select");
// for (i = 0; i < x.length; i++) {
//   selElmnt = x[i].getElementsByTagName("select")[0];
//   /*for each element, create a new DIV that will act as the selected item:*/
//   a = document.createElement("DIV");
//   a.setAttribute("class", "select-selected");
//   a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
//   x[i].appendChild(a);
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
//   x[i].appendChild(b);
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


