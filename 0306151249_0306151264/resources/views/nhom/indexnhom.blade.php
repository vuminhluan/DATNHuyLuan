
@extends('master.masterpage')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/lu/nhom/nhomcss.css') }}">
@endsection
@section('javascript')
<script src="{{ asset('js/jslu/nhom/nhomjs.js') }}" type="text/javascript" charset="utf-8" async defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.1/socket.io.dev.js" type="text/javascript"></script>
            <script>
              // var socketio = io('http://localhost:6001')
              //     socketio.on('chatnl:message',function(data){
              //     console.log(data)
                
              //     })

            </script>
@endsection
@section('main')
 <!-- body -->
    <div class="topnav contentmain  ">
<!-- ảnh bìa -->
<div id="anhbia" class="anhbianhomx" style=" margin-top: 30px;    width: 1184px; " >
  <div style="height: 325px;" >
    @if ($thongtinnhom[0]->anh=="no")
      <img id="imganhbianhom" style="width: 1184px;height: auto;" src="{{ asset('') }}" alt="">
    @endif
    @if ($thongtinnhom[0]->anh!="no")
      <img id="imganhbianhom" style="width: 1184px;height: auto;" src="{{ asset($thongtinnhom[0]->anh) }}" alt="">
    @endif
  </div>
  {{-- onclick="chonthayanhbianhom()" --}}
  @for ($i = 0; $i <count($quyentruycapnhomcuataikhoan) ; $i++)
               @if ($quyentruycapnhomcuataikhoan[$i]->ma_chuc_vu=="CV01"||$quyentruycapnhomcuataikhoan[$i]->ma_chuc_vu=="CV02")
                    <div class="divomtuychonanhbia" >
                      <form id="formdanganhbia" action="#khongthayduoc" method="get" accept-charset="utf-8">
                        <div id="chonanhthayanhbianhom" class=" btntuychonanhbia" >
                          <input id="ipanhbianhom" name="ipanhbianhom" type="file"/>
                              <label for="ipanhbianhom">
                              <span style="cursor: pointer;"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp;&nbsp;Cập nhật ảnh bìa</span></label>
                        </div>
                        @csrf
                     {{-- onclick="luuthayanhbianhom('{{$t}}')" --}}
                      <div id="luuthayanhbianhom" class="btntuychonanhbia"  style="display: none;">
                         <i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;
                         <input  type="submit" id="btnluuanhbinh" class="inputluuanhdaidien" name="btnluuanhbia" value="Lưu">
                      </div>
                      </form>
                      <div id="huythaydoianhbianhom" class="btntuychonanhbia" onclick="huybothayanhbianhom('{{$t}}')" style="display: none;">
                            <span><i class="fa fa-ban" aria-hidden="true"></i>&nbsp;&nbsp;Hủy</span>
                      </div>
                    </div>
               @break
               @endif
            @endfor

</div>
<!-- end ảnh bìa -->
       <div class="leftnav" >
        {{-- ||$quyentruycapnhomcuataikhoan[$i]->ma_chuc_vu=="CV03"||$quyentruycapnhomcuataikhoan[$i]->ma_chuc_vu=="CV04" --}}
            @for ($i = 0; $i <count($quyentruycapnhomcuataikhoan) ; $i++)
               @if ($quyentruycapnhomcuataikhoan[$i]->ma_chuc_vu=="CV01"||$quyentruycapnhomcuataikhoan[$i]->ma_chuc_vu=="CV02")
                   <div id="thongtincuanhom">
                      <div class="divomshowcaidatnhomhi" >
                       <div id="div-btn-show-menu-setting-nhom" onclick="($('#div-setting-nhom-menu').css('display')=='none')?$('#div-setting-nhom-menu').css('display','block'):$('#div-setting-nhom-menu').css('display','none')" class="dvbtnshowcaidatnhom">
                            <h3 style="font-weight: bold;font-size: 15px;" ><i class="fa fa-cog" aria-hidden="true"> &nbsp;</i> Cài đặt nhóm</h3>
                       </div>
                     </div>
                   </div>
               @break
               @endif
            @endfor

        <a href="{{ route('nhom.index',$t) }}" > 
          <div class="thongtinkhaccuanhom">
           <input type="hidden" id="div-hi-chu-bai-viet-ma-nhom" value="{{$t}}">
           <input type="hidden" id="div-hi-soluongbaiviethientainhom" value="{{$totalbaiviet}}">
           <input type="hidden" id="div-hi-phe_duyet_bai_viet_an_danh" value="{{$caidatnhom[0]->phe_duyet_bai_viet_an_danh}}">
           <input type="hidden" id="div-hi-phe_duyet_bai_viet_binh_thuong" value="{{$caidatnhom[0]->phe_duyet_bai_viet_binh_thuong}}">
           
           <div class="divchuaallttnhom">
                <div class="divchuaittnhom" ><i class="fa fa-flag-o fa-2x" aria-hidden="true"></i></div>
                <div class="divttinhom">
                  <H3 class="h3ttnhom" ><center> {{$thongtinnhom[0]->ten_nhom}}</center></H3>
                </div>
           </div>
         </div></a>

         <div class="thongtinkhaccuanhom">
           <input type="hidden" id="div-hi-chu-bai-viet-ma-nhom" value="{{$t}}">
           <div class="divomallthongtinkhacgioithieu">
                <div class="divittkhacnhom" ><i class="fa fa-globe fa-2x iglow" aria-hidden="true"></i></div>
                <div class="divtextgioithieu"><H3 class="h3chugioithieu"> Giới thiệu</H3></div>
           </div>
           <div class="divtextgioithieunhom" >{{$caidatnhom[0]->gioi_thieu_nhom}}</div>
         </div>
{{--           --}}
{{--          <div class="thongtinkhaccuanhom">
          <div style="height: 400px;">

            <div id="chatnhomcontnetne" style="height: 333px;">
              
            </div>
            <div style="height: 177px;border-top: solid 1px #9695d8;">
              <div style="float: left;">
                <textarea id="textgui" style="width: 80%" rows="5"></textarea>
              </div>
              <div style="float: left;width: 10%;background-color: blue;color: white" onclick="sendmessnhom()" >
                  Gửi
              </div>
              <div style="float: left;width: 10%;background-color: blue;color: white" onclick="taorooomnhom()" >
                  Tạo room
              </div>
            </div>
            
          </div>
         </div> --}}

        </div>
        
<!--  -->
       
        <div id="divcontent" class="content"  >
             <div id="divdangbaiviet">
                   @include('baiviet.dangbaiviet')
             </div>
             <div id="divnoidungcon">
                   @include('baiviet.hienthibaiviet')
             </div>
{{--              <div class="xemthembaiviet">
                    <span>Chưa hiện tại chưa có bài viết để hiển thị thêm</span>
             </div> --}}
            <!--  -->
        </div>
        
<!--  -->
        <div class="rightnav">

          <div class="divtoprightnav">
              <div class="divslthongbao" style="position: relative;"><ion-icon style="font-size: 23px;" name="notifications"></ion-icon>
                    <span style="position: absolute;font-weight: bold;">Thông báo:</span>
              </div>
              <div class="dropdownnhantb">
                @if (count($nhanthongbaoftk)==0)
                  <button id="iddtb" class="dropbtnnhantb">Tất cả</button>
                @endif
                 @if (count($nhanthongbaoftk)!=0)
                  <button id="iddtb" class="dropbtnnhantb">{{$nhanthongbaoftk[0]->ten_loai_thong_bao_nhan}}</button>
                @endif  
                
                
                <div class="dropdown-contentnhantb">
                  @for ($i = 0; $i < count($listloaithongbao); $i++)
                     <div onclick='chonthongbao("{{$listloaithongbao[$i]->ma_loai_thong_bao_nhan}}","{{$listloaithongbao[$i]->ten_loai_thong_bao_nhan}}")' >{{$listloaithongbao[$i]->ten_loai_thong_bao_nhan}}</div>
                  @endfor
                </div>
              </div>

          </div>

          <div class="divtoprightnav">
              <div class="divslthanhviennhom"><center>({{count($lstthanhviennhom)}})&nbsp;Thành viên</center></div>
              <div class="divbtnshowtuychontvn" onclick="($('#tuychonnhom').css('display')=='block')?$('#tuychonnhom').css('display','none'):$('#tuychonnhom').css('display','block');"><i class="fa fa-ellipsis-h fa-2x" aria-hidden="true"></i>
              </div>
              <div id="tuychonnhom">
                <span class="spansomethinghh"></span>
                <ul>
                  <li class="lituychonthemnhom"  onclick='createboxhoilydotocao("LBC01","NNBC1",$("#session-ma-tk").val(),"{{$t}}","ADMIN"),showhidepoprpnhom()'><i class="fa fa-flag" aria-hidden="true"></i>&nbsp;Báo cáo nhóm </li>
                  <li class="lituychonthemnhom" onclick="thucthifuncysno('{{$t}}','roinhom11','Rời khỏi nhóm','Bạn có chắc chắn muốn rời nhóm này không?')"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Rời nhóm</li>
                </ul>
              </div>
          </div>
          
           @for ($i = 0; $i <count($quyentruycapnhomcuataikhoan) ; $i++)
               @if ($quyentruycapnhomcuataikhoan[$i]->ma_chuc_vu=="CV03")
                  <div id="divpheduyetbaivietnhom" onclick="showlistthanhvienchopheduyet('{{$t}}')" class="divtoprightnav" style="padding: 12px;cursor: pointer;font-weight: bold;font-size: 15px;">
                   <center><ion-icon  style="color: #9695d8" name="contacts"></ion-icon>&nbsp;<span>Phê duyệt thành viên</span>&nbsp;&nbsp;</center>
                  </div>
                  @break
               @endif
            @endfor


           @for ($i = 0; $i <count($quyentruycapnhomcuataikhoan) ; $i++)
               @if ($quyentruycapnhomcuataikhoan[$i]->ma_chuc_vu=="CV04")
                  <div id="pheduyetthanhviengianhapnhom" class="divtoprightnav" onclick="showlistbaivietchopheduyet('{{$t}}')" style="padding: 12px;cursor: pointer;font-weight: bold;font-size: 15px;">
                  <center><ion-icon  style="color: #9695d8" name="clipboard"></ion-icon>  <span>Phê duyệt bài viết</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</center>
                  </div>
                  @break
               @endif
            @endfor



{{--             @for ($i = 0; $i <count($quyentruycapnhomcuataikhoan) ; $i++)
               @if ($quyentruycapnhomcuataikhoan[$i]->ma_chuc_vu=="CV02")
                  <div id="pheduyetthanhviengianhapnhom" class="divtoprightnav" onclick="showlistbaocaovipham('{{$t}}')" style="padding: 12px;cursor: pointer;">
                  <center><ion-icon style="color: #9695d8" name="flag"></ion-icon>  <span>Báo cáo vi phạm</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</center>
                  </div>
                  @break
               @endif
            @endfor --}}
          

        </div>

    </div>
    {{-- setting group --}}
    <div id="div-setting-nhom-menu" class="modal-setting-nhom">
     
        @include('includes.content-setting-group-menu')
     
    </div>
    <!-- //// -->
@endsection

