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
  var fileType = this.files[0].type;
  var ValidImageTypes = ["image/jpeg", "image/png"];
  if ($.inArray(fileType, ValidImageTypes) < 0) {
       thongbaopopupy("Đăng bài viết","Hãy chọn tệp tin hình ảnh 'jpg'/'png'."); return;
  }
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

var soluongluachon = 2;
function themcaukhaosat(){
  var divchuainput = document.createElement("DIV");
      divchuainput.id="luachon"+soluongluachon;soluongluachon+=1;
      divchuainput.className="ykienremove";
      var inputcaukhaosat = document.createElement("INPUT");
          // inputcaukhaosat.id="ykien"+soluongluachon;
          inputcaukhaosat.className="ykienkhaosat";
          inputcaukhaosat.placeholder ="Lựa chọn "+soluongluachon; 
      divchuainput.appendChild(inputcaukhaosat);
      var spanx = document.createElement("SPAN");
          spanx.className="fa fa-times divbtnxoaykiendangbaiviet";
          spanx.addEventListener("click",function(){
              var e = document.getElementById(this.parentNode.id);
                  e.parentNode.removeChild(e);soluongluachon-=1;  
                    for (var i = 5; i < document.getElementById("divchuacackhaosat").childNodes.length; i++) {
                        document.getElementById("divchuacackhaosat").childNodes[i].childNodes[0].placeholder="Lựa chọn "+(i-2);
                    }
                      // alert(document.getElementById("divchuacackhaosat").childNodes.length);
                      // console.log(document.getElementById("divchuacackhaosat").childNodes[10].childNodes[0]);

                      })


      divchuainput.appendChild(spanx);
  document.getElementById("divchuacackhaosat").appendChild(divchuainput);
}

function displaydivoption(p)
{
    document.getElementById("optionthongbao").style.display=p;
    document.getElementById("optionkhaosat").style.display=p;
    document.getElementById("optionthubai").style.display=p;
}


// comboxx các loại ẩn danh
//////////////////////////////////////////////////////////////////////////////////


var mabaiviet="hi";
 var ngaygiohientai = getdatetime();
 // $("#ngayhethankhaosat").val(getdatetime());
 // $("#ngayhethanthubaiviet").val(getdatetime());
 // $("#ipdtngayanbaiviet").val(getdatetime());

// function transferComplete(data){
//   console.log(data.currentTarget.response);
// }

$( document ).ready(function() {

  $('#formdangbaiviet').submit(function(event) {
    event.preventDefault();
    //checkrou1
      var noidungbaiviet=$('#iptextdangbaiviet').val().trim();
        if(noidungbaiviet==""){
          thongbaopopupy("Đăng bài viết","Bạn chưa nhập vào nội dung bài viết");return;}//kiểm tra caption có chưa

        if(checktimedangbaiviet()!="0"){
          thongbaopopupy("Đăng bài viết",checktimedangbaiviet()); return;} //kiểm tra thời gian input hợp lệ chưa
          // 

  
    submitdangbaiviet();
    if (document.getElementById("imgInp").value!="") {

    var danganhcheck=true;
    var formData = new FormData($(this)[0]);
        formData.append('nguoi_dang',$('#session-ma-tk').val());
        formData.append('chu_cua_bai_dang',$('#div-hi-chu-bai-viet-ma-nhom').val());
        formData.append('trang_thai','1');
        if(danganhcheck){ 
            danganhcheck=!danganhcheck;
              $.ajax({
                  url:  link_host+'/uploadanh',
                  type: 'POST',
                   async: false,  
                  processData: false,
                  contentType: false,              
                  data: formData
              }).done(function(data){
                // alert(data);

              });
        }
    } 

     
    
});


});


var mabaiviettieptheo =0;
function getmabaiviettieptheo() {
  $.ajax({
                        url: link_host+ '/ajax/getmabaivietne',
                        type:"GET",
                        async:false,
                        data:{}
                      }).done(function(data){
                          mabaiviettieptheo = parseInt(data)+1;
                      })
}
function submitdangbaiviet() {
  getmabaiviettieptheo();

var postbai= true; // đây là cái khóa tránh làm 2 lần ! của cậu ajax bất đồng bộ
var taofolder = true;
var khaosatcheck = true;
var Thoigiananbaiviet = "2222/01/01";
var Thoigiankhaosatbaiviet="";
var Thoigianthubaiviet="";
var thongbao=thubai=khaosat=tailieu= "0";
var noidungbaiviet=$('#iptextdangbaiviet').val().trim();
      if(noidungbaiviet==""){
        thongbaopopupy("Đăng bài viết","Bạn chưa nhập vào nội dung bài viết");return;}//kiểm tra caption có chưa

      if(checktimedangbaiviet()!="0"){
        thongbaopopupy("Đăng bài viết",checktimedangbaiviet()); return;} //kiểm tra thời gian input hợp lệ chưa

      $("#btndangbaiviet").css("display","none");


          if ($('#ckbthongbao').is(":checked")){
              anbai="1";
              Thoigiananbaiviet=$("#ipdtngayanbaiviet").val();
          }
          if ($('#ckbthubai').is(":checked")&&$('#ckbkhaosat').is(":checked")){
//đoạn này đầu tạo folder khi cả 2 cùng chẹck
                if($('#ckbthubai').is(":checked")){
                  thubai="1";  
                      Thoigianthubaiviet=$("#ngayhethanthubaiviet").val();
                      if(taofolder){
                        taofolder=!taofolder;
                        
                          $.ajax({
                            url: link_host+ '/taofolderchuatepthubaine',
                            type:"GET",
                            async:false,
                            data:{ma_bai_viet: mabaiviettieptheo ,//mabaivietmoi,  //mabaiviettieptheo
                                  nguoi_tao:$("#session-ma-tk").val()}
                          }).done(function(data){
// end lấy folder khi cả 2 cùng check
// đoạn này lấy list vote khi cả 2 nút cùng check
                              if ($('#ckbkhaosat').is(":checked"))
                              {
                                var arrcauhoi = [];
                                khaosat="1";
                                    Thoigiankhaosatbaiviet=$("#ngayhethankhaosat").val();}
                                    for (var i = 1; i < document.getElementById("divchuacackhaosat").childNodes.length; i++) {
                                      if(i<5){
                                        arrcauhoi.push(document.getElementById("divchuacackhaosat").childNodes[i].childNodes[1].value);i++;}
                                      else{
                                        arrcauhoi.push(document.getElementById("divchuacackhaosat").childNodes[i].childNodes[0].value);}
                                    //}
                                      if(khaosatcheck)
                                      {
                                        khaosatcheck=!khaosatcheck;

                                            
                                            for (var i = 0; i < arrcauhoi.length; i++) {
                                                $.ajax({
                                                  url:link_host+'/ajax/postykienvotebaivietne',
                                                  type:'POST',
                                                  async:false,
                                                  data:{
                                                    _token: $('input[name=_token]').val(),
                                                    ma_bai_viet:mabaiviettieptheo ,   //mabaivietmoine,
                                                    noi_dung_y_kien:arrcauhoi[i],
                                                    nguoi_tao_y_kien:$('#session-ma-tk').val(),
                                                    nguoi_sua:$('#session-ma-tk').val(),
                                                    trang_thai:"1"
                                                  }
                                                }).done(function(data){
// đoạn này up bài viết mới khi cả 2 cùng check
 if(postbai){
                                    postbai=!postbai;
                            upbaivietupup(noidungbaiviet,tailieu,thubai,khaosat,Thoigianthubaiviet,Thoigiankhaosatbaiviet,Thoigiananbaiviet,mabaiviettieptheo);
                          }})}}}
// đoạn này end lấy list vote khi cả 2 cùng chẹck
                          });
}
/////////////////////////
                    }}//}
          else{
            /////đầu
             if($('#ckbthubai').is(":checked")){
                  thubai="1";  
                      Thoigianthubaiviet=$("#ngayhethanthubaiviet").val();
                      if(taofolder)
                        { taofolder=!taofolder;
                          $.ajax({
                            url: link_host+ '/taofolderchuatepthubaine',
                            type:"GET",
                            async:true,
                            data:{ma_bai_viet: mabaiviettieptheo ,//mabaivietmoi,
                              nguoi_tao:$("#session-ma-tk").val()}
                          }).done(function(data){
                            // đoạn này up bài mới khi thu bài được check cái kia ko
                             if(postbai){
                                    postbai=!postbai;
                            upbaivietupup(noidungbaiviet,tailieu,thubai,khaosat,Thoigianthubaiviet,Thoigiankhaosatbaiviet,Thoigiananbaiviet,mabaiviettieptheo);
                          }
                            // end up bài mới
                          })//})
                  }
                    }//}
             else{
// đầu của list câu vote
                    if ($('#ckbkhaosat').is(":checked"))
                    {
                      var arrcauhoi = [];
                      khaosat="1";
                      if($("#ngayhethankhaosat").val()==""){
                          alert("Bạn cung cấp thiếu ngày hết hạn khảo sát");return;}
                      else{
                          Thoigiankhaosatbaiviet=$("#ngayhethankhaosat").val();}
                          for (var i = 1; i < document.getElementById("divchuacackhaosat").childNodes.length; i++) {
                            if(i<5){
                              arrcauhoi.push(document.getElementById("divchuacackhaosat").childNodes[i].childNodes[1].value);i++;}
                            else{
                              arrcauhoi.push(document.getElementById("divchuacackhaosat").childNodes[i].childNodes[0].value);}
                          }
                            if(khaosatcheck)
                            {khaosatcheck=!khaosatcheck;

                                  
                                  for (var i = 0; i < arrcauhoi.length; i++) {
                                      $.ajax({
                                        url:link_host+'/ajax/postykienvotebaivietne',
                                        type:'POST',
                                         async:false,
                                        data:{
                                          _token: $('input[name=_token]').val(),
                                          ma_bai_viet: mabaiviettieptheo , //mabaivietmoine,
                                          noi_dung_y_kien:arrcauhoi[i],
                                          nguoi_tao_y_kien:$('#session-ma-tk').val(),
                                          nguoi_sua:$('#session-ma-tk').val(),
                                          trang_thai:"1"
                                        }
                                      }).done(function(data){
// đoạn này up bài mới khi vote bài được check cái kia ko
                                  if(postbai){
                                    postbai=!postbai;
                                  upbaivietupup(noidungbaiviet,tailieu,thubai,khaosat,Thoigianthubaiviet,Thoigiankhaosatbaiviet,Thoigiananbaiviet,mabaiviettieptheo);
                                      }
                                      })}//})
                            }
                              }else{
                                  if (!$('#ckbthubai').is(":checked")&&!$('#ckbkhaosat').is(":checked"))
                                  {
                                    //up bài mới khi không nút nào được chọn
                                     if(postbai){
                                    postbai=!postbai;

                                    upbaivietupup(noidungbaiviet,tailieu,thubai,khaosat,Thoigianthubaiviet,Thoigiankhaosatbaiviet,Thoigiananbaiviet,mabaiviettieptheo);
                                   // })
                                   }
                                  }
                              }
// đuôi của list câu vote
              }
            /////cuối
          }

}






function checktimedangbaiviet(){
  var timenoww    = new Date(getdatetime()).getTime();

if ($('#ckbkhaosat').is(":checked"))
{
  if ($("#ngayhethankhaosat").val()=="") {
    return "Chưa chọn thời gian hết hạn khảo sát";
  }
  var khaosat = new Date($("#ngayhethankhaosat").val()).getTime();
  if (khaosat-timenoww<0) {
    return "Thời gian khảo sát bài viết đã qua";
  }

    for (var i = 1; i < document.getElementById("divchuacackhaosat").childNodes.length; i++) {
      if(i<5){
        if(document.getElementById("divchuacackhaosat").childNodes[i].childNodes[1].value.trim()=="")
      return "Chưa nhập nội dung câu hỏi khảo sát";
         i++;
      }
       else{
        if(document.getElementById("divchuacackhaosat").childNodes[i].childNodes[0].value.trim()=="")
          return "Chưa nhập nội dung câu hỏi khảo sát";
      }} 

}
if($('#ckbthubai').is(":checked"))
{
  if ($("#ngayhethanthubaiviet").val()=="") {
    return "Chưa chọn thời gian hết hạn thu bài viết";
  }
  var thubai = new Date($("#ngayhethanthubaiviet").val()).getTime();
  if (thubai-timenoww<0) {
    return "Thời gian thu bài viết đã qua";
  }
}

if ($('#ckbthongbao').is(":checked"))
{
  if ($("#ipdtngayanbaiviet").val()=="") {
    return "Chưa chọn thời gian ẩn bài viết";
  }
  var anbaiviet = new Date($("#ipdtngayanbaiviet").val()).getTime();
  if (anbaiviet-timenoww<0) {
    return "Thời gian ẩn bài viết đã qua";
  }
}
return "0";
}






function upbaivietupup(noidungbaiviet,tailieu,thubai,khaosat,Thoigianthubaiviet,Thoigiankhaosatbaiviet,Thoigiananbaiviet,mabaivietmoine){
                                       var e = document.getElementById("cbbloaibaiviet");
                                        var valueselectedoption = e.options[e.selectedIndex].value;
                                        var trangthaibaiviet="1";//trạng thái = 4 là ko đăng được



                                        if(valueselectedoption=="LBV001"){
                                            if($("#div-hi-phe_duyet_bai_viet_binh_thuong").val()=="1"){
                                              trangthaibaiviet="2";
                                            }
                                        }else{
                                          if(valueselectedoption=="LBV002"||valueselectedoption=="LBV002"||valueselectedoption=="LBV003"||valueselectedoption=="LBV004"){
                                              if($("#div-hi-phe_duyet_bai_viet_an_danh").val()=="1"){
                                                trangthaibaiviet="2";
                                              }
                                          }
                                        }
                                        var blockbatdongbo = true;
                                        if(blockbatdongbo){blockbatdongbo!=blockbatdongbo;

                                            $.ajax(
                                            {
                                                url: link_host+'/ajax/postbaivietne',
                                                type: 'POST',
                                                async:false,
                                                data:{
                                                _token: $('input[name=_token]').val(),
                                                ma_nguoi_viet: $('#session-ma-tk').val(),
                                                ma_chu_bai_viet: $('#div-hi-chu-bai-viet-ma-nhom').val(), // hiện tại đăng trong nhóm nên sẽ là của nhóm
                                                noi_dung_bai_viet:noidungbaiviet,
                                                hinh_anh_bai_viet: tailieu,
                                                nop_tep: thubai,
                                                khao_sat_y_kien: khaosat,
                                                thoi_gian_thu_bai_viet:Thoigianthubaiviet,
                                                thoi_gian_khao_sat_bai_viet:Thoigiankhaosatbaiviet,
                                                ma_loai_bai_viet: valueselectedoption,
                                                thoi_gian_an_bai_viet: Thoigiananbaiviet,
                                                nguoi_sua: $('#session-ma-tk').val(),
                                                trang_thai:trangthaibaiviet,
                                                lstmanhomsharebv:lstmanhomsharebv

                                            }
                                            }).done(function(data) {

                                                // console.log(lstmanhomsharebv);
                                              lstmanhomsharebv=[];
                                              $('.multiSel').empty();
                                               $(".hida").css("display","block");
                                              // $('.dropdown dt div').append(ret);

                                                document.getElementById("imgInp").value="";
                                               $('#divanhxemtruocduocthemvao').css("display","none");


                                              var batdongbo2 = true;
                                              if(batdongbo2){batdongbo2!=batdongbo2;

                                                displaydivoption("none");
                                                tongsoluachon= 0;
                                                za=zb=zc=zd= true;
                                                $("#ckbkhaosat").prop("checked",false);
                                                $("#ckbthubai").prop("checked",false);
                                                $("#ckbthongbao").prop("checked",false);
                                                $('.ykienremove').remove(); //remove các ý kiên lựa chọn;
                                                $("#divbigchuacackhaosat").css("display","none");
                                                soluongluachon=2; // reset số lượng lựa chọn về 2

                                                if(trangthaibaiviet=="2"){
                                                  thongbaopopupy("Đăng bài viết","Bài viết của bạn sẽ được kiểm duyệt trước khi xuất hiện");
                                                  postthongbaobaivietmoi("LTBN02","Bài viết mới","2",mabaivietmoine);
                                                        $("#btndangbaiviet").css("display","block");
                                                        document.getElementById("formdangbaiviet").reset();
                                                        $('#iptextdangbaiviet').val("");
                                                  return;
                                                }else{
                                                  postthongbaobaivietmoi("LTBN02","Bài viết mới","1",mabaivietmoine);
                                                }

                                                      $.ajax({
                                                          url: link_host+'/ajax/getbaiviettheonguoivietvanguoisohuune',
                                                          type: 'GET',
                                                          async:false,
                                                          data:{
                                                            ma_nguoi_viet: $('#session-ma-tk').val(),
                                                            ma_chu_bai_viet: $('#div-hi-chu-bai-viet-ma-nhom').val()
                                                          }
                                                      }).done(function(data){
                                                        $("#btndangbaiviet").css("display","block");
                                                        document.getElementById("formdangbaiviet").reset();
                                                        $('#iptextdangbaiviet').val("");
                                                            var econ = document.createElement("div");
                                                            econ.setAttribute("id", "ssa");
                                                            var Echa = document.getElementById('divnoidungcon');
                                                            Echa.insertBefore(econ, Echa.firstChild);
                                                            $('#ssa').html(data);

                                                      })
                                                }

                                              }) } 
}

      /////////////////////////////
//////////////////// tao ra div sau khi dang bai
function creatediv() {
    var element = document.createElement("div");
    element.setAttribute("id", "sss");
    document.getElementById('divcontent').appendChild(element);
}


function postthongbaobaivietmoi(loaithongbao,noidungthongbao,trangthai,ma_noi_dung_duoc_thong_bao){

   $.ajax(
                                            {
                                                url: link_host+'/ajax/postthongbaone',
                                                type: 'POST',
                                                data:{
                                                _token: $('input[name=_token]').val(),
                                                noi_nhan_tac_dong: $('#div-hi-chu-bai-viet-ma-nhom').val(), // hiện tại đăng trong nhóm nên sẽ là của nhóm
                                                ma_loai_thong_bao:loaithongbao,
                                                noi_dung_tac_dong:ma_noi_dung_duoc_thong_bao,
                                                noi_dung_thong_bao:noidungthongbao,
                                                nguoi_tao_thong_bao: $('#session-ma-tk').val(),
                                                trang_thai: trangthai
                                            }
                                            }).done(function(data) {})

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




/*
  Dropdown with Multiple checkbox select with jQuery - May 27, 2013
  (c) 2013 @ElmahdiMahmoud
  license: https://www.opensource.org/licenses/mit-license.php
*/



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



// var tongsoluachon= 0;
// var za=zb=zc=zd= true;
// function clickoption(l) {
      
//   getdodaiheightdivbigvadivtrong();

//   if (za&&l=="optionthubai") {
//                tongsoluachon+=1;
//              za=!za;
//              document.getElementById(l).style.display="block";    

//           }
//           else if(l=="optionthubai"){
//                tongsoluachon-=1;
//               za=!za;
//               document.getElementById(l).style.display="none";

//           }
//   if (zb&&l=="optionkhaosat") {
//                tongsoluachon+=1;
//              zb=!zb;
//              document.getElementById(l).style.display="block";    

//           }
//           else if(l=="optionkhaosat"){
//                tongsoluachon-=1;
//               zb=!zb;
//               document.getElementById(l).style.display="none";

//           }
//   if (zc&&l=="optiontailieu") {
//                tongsoluachon+=1;
//              zc=!zc;
//              document.getElementById(l).style.display="block";    

//           }
//           else if(l=="optiontailieu"){
//                tongsoluachon-=1;
//               zc=!zc;
//               document.getElementById(l).style.display="none";
//           }
//   if (zd&&l=="optionthongbao") {
//                tongsoluachon+=1;
//              zd=!zd;
//              document.getElementById(l).style.display="block";    
//           }
//           else if(l=="optionthongbao"){
//                tongsoluachon-=1;
//               zd=!zd;
//               document.getElementById(l).style.display="none";
//           }
// }
