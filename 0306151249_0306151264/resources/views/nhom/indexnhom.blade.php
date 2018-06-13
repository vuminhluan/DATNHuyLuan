
@extends('master.masterpage')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/lu/nhom/nhomcss.css') }}">
@endsection
@section('javascript')
<script src="{{ asset('js/jslu/nhom/nhomjs.js') }}" type="text/javascript" charset="utf-8" async defer></script>
@endsection
@section('main')
 <!-- body -->
    <div class="topnav contentmain  ">
<!-- ảnh bìa -->
<div id="anhbia">
</div>
<!-- end ảnh bìa -->
       <div class="leftnav" >
        {{-- ||$quyentruycapnhomcuataikhoan[$i]->ma_chuc_vu=="CV03"||$quyentruycapnhomcuataikhoan[$i]->ma_chuc_vu=="CV04" --}}
            @for ($i = 0; $i <count($quyentruycapnhomcuataikhoan) ; $i++)
               @if ($quyentruycapnhomcuataikhoan[$i]->ma_chuc_vu=="CV01"||$quyentruycapnhomcuataikhoan[$i]->ma_chuc_vu=="CV02")
                   <div id="thongtincuanhom">
                      <div class="divomshowcaidatnhomhi" >
                       <div id="div-btn-show-menu-setting-nhom" onclick="($('#div-setting-nhom-menu').css('display')=='none')?$('#div-setting-nhom-menu').css('display','block'):$('#div-setting-nhom-menu').css('display','none')" class="dvbtnshowcaidatnhom">
                            <h3><i class="fa fa-cog" aria-hidden="true"> &nbsp; Quản lý nhóm</i></h3>
                       </div>
                     </div>
                   </div>
               @break
               @endif
            @endfor

         <div class="thongtinkhaccuanhom">
           <input type="hidden" id="div-hi-chu-bai-viet-ma-nhom" value="{{$t}}">
           <input type="hidden" id="div-hi-soluongbaiviethientainhom" value="{{$totalbaiviet}}">
           <div class="divchuaallttnhom">
                <div class="divchuaittnhom" ><i class="fa fa-flag-o fa-2x" aria-hidden="true"></i></div>
                <div class="divttinhom">
                  <H3 class="h3ttnhom" ><center> {{$thontinnhom[0]->ten_nhom}}</center></H3>
                </div>
           </div>
         </div>

         <div class="thongtinkhaccuanhom">
           <input type="hidden" id="div-hi-chu-bai-viet-ma-nhom" value="{{$t}}">
           <div class="divomallthongtinkhacgioithieu">
                <div class="divittkhacnhom" ><i class="fa fa-globe fa-2x iglow" aria-hidden="true"></i></div>
                <div class="divtextgioithieu"><H3 class="h3chugioithieu"> Giới thiệu</H3></div>
           </div>
           <div class="divtextgioithieunhom" >{{$caidatnhom[0]->gioi_thieu_nhom}}</div>
         </div>
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
                  <div id="divpheduyetbaivietnhom" class="divtoprightnav" style="padding: 12px;cursor: pointer;">
                   <center><ion-icon name="contacts"></ion-icon>&nbsp;<span>Phê duyệt thành viên</span>&nbsp;&nbsp;</center>
                  </div>
                  @break
               @endif
            @endfor


           @for ($i = 0; $i <count($quyentruycapnhomcuataikhoan) ; $i++)
               @if ($quyentruycapnhomcuataikhoan[$i]->ma_chuc_vu=="CV04")
                  <div id="pheduyetthanhviengianhapnhom" class="divtoprightnav" onclick="showlistbaivietchopheduyet('{{$t}}')" style="padding: 12px;cursor: pointer;">
                  <center><ion-icon name="clipboard"></ion-icon>  <span>Phê duyệt bài viết</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</center>
                  </div>
                  @break
               @endif
            @endfor
          

        </div>

    </div>
    {{-- setting group --}}
    <div id="div-setting-nhom-menu" class="modal-setting-nhom">
     
        @include('includes.content-setting-group-menu')
     
    </div>
    <!-- //// -->
@endsection

