
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
        
            @for ($i = 0; $i <count($quyentruycapnhomcuataikhoan) ; $i++)
               @if ($quyentruycapnhomcuataikhoan[$i]->ma_chuc_vu=="CV01"||$quyentruycapnhomcuataikhoan[$i]->ma_chuc_vu=="CV02"||$quyentruycapnhomcuataikhoan[$i]->ma_chuc_vu=="CV03"||$quyentruycapnhomcuataikhoan[$i]->ma_chuc_vu=="CV04")
                     <div id="thongtincuanhom">
                      <div style="margin-top: 5px;margin-right: 5px;">
                   <div id="div-btn-show-menu-setting-nhom" style=" cursor: pointer;width: 287px;height: 34px;float: right;padding: 5px;background-color: white;"><h3><i class="fa fa-cog" aria-hidden="true"> &nbsp; Quản lý nhóm</i></h3>
                   </div>
                   
                     </div>
                   </div>
               @break
               @endif
            @endfor

         <div class="thongtinkhaccuanhom">
           <input type="hidden" id="div-hi-chu-bai-viet-ma-nhom" value="{{$t}}">
           <div style="width: 100%;height: 37px;">
                <div style="padding-top: 7px;padding-left: 47%;"><i style="color:#9695d8; " class="fa fa-flag-o fa-2x" aria-hidden="true"></i></div>
                <div style="padding: 7px;padding-top: 11px;float: left;text-align: center;width: 100%;"><H3 style="display: inline-block; text-align: center;"><center> {{$thontinnhom[0]->ten_nhom}}</center></H3></div>
           </div>
         </div>

         <div class="thongtinkhaccuanhom">
           <input type="hidden" id="div-hi-chu-bai-viet-ma-nhom" value="{{$t}}">
           <div style="width: 100%;height: 37px;">
                <div style="padding-top: 7px;padding-left: 7px;float: left;"><i style="color:#9695d8; display: inline-block;" class="fa fa-globe fa-2x" aria-hidden="true"></i></div>
                <div style="padding: 7px;padding-top: 11px;float: left;"><H3 style="display: inline-block;"> Giới thiệu</H3></div>
           </div>
           <div style="padding-left:  7px;padding-top: 7px;width: 80%;margin:auto;">{{$caidatnhom[0]->gioi_thieu_nhom}}</div>
         </div>
        </div>
        
<!--  -->
       
        <div id="divcontent" class="content"  >
          <div id="divdangbaiviet">
            @include('baiviet.dangbaiviet')
            {{-- <div id="baivietmoidang" style="width: 100%;height: 50px;background-color: red;"></div> --}}
         </div>
         <div id="divnoidungcon">

            <!--  -->
           
          @for ($i = 0; $i < count($lstbaiviet) ; $i++)
               @include('baiviet.hienthibaiviet')
          @endfor
          </div>
            <!--  -->
        </div>
        
<!--  -->
        <div class="rightnav">
          <div class="divtoprightnav">
              <div style="float: left;width: 81%;padding-top: 11px;"><center>({{count($lstthanhviennhom)}})&nbsp;Thành viên</center></div>
              <div style="float: right;width: 19%;padding: 7px;padding-left: 10px;border-left: solid 1px #eadcf2;"
                onclick="($('#tuychonnhom').css('display')=='block')?$('#tuychonnhom').css('display','none'):$('#tuychonnhom').css('display','block');"><i class="fa fa-ellipsis-h fa-2x" aria-hidden="true"></i>
              </div>
              <div id="tuychonnhom" style="padding: 7px;border-radius: 3px;border:solid 1px #eadcf2;box-shadow: 1px 2px 3px #9695d8; display: none;background-color: white;width: 100px;position: absolute;margin-top: 50px;margin-left: 150px;">
                <span style="    margin-left: 70px;position: absolute; bottom: 100%;border-bottom:  solid 10px white;border-left: solid 10px transparent;border-right: solid 10px transparent;"></span>
                <ul>
                  <li onclick="clickthanhvienturoikhoinhomnhom('{{$t}}')">Rời nhóm</li>
                </ul>
              </div>
          </div>
        </div>

    </div>
    {{-- setting group --}}
    <div id="div-setting-nhom-menu" class="modal-setting-nhom">
     
        @include('includes.content-setting-group-menu')
     
    </div>
    <!-- //// -->
@endsection

