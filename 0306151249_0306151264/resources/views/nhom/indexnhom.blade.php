
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
         <div id="thongtincuanhom">
           <div style="margin-top: 5px;margin-right: 5px;">
            @for ($i = 0; $i <count($quyentruycapnhomcuataikhoan) ; $i++)
               @if ($quyentruycapnhomcuataikhoan[$i]->ma_chuc_vu=="CV01"||$quyentruycapnhomcuataikhoan[$i]->ma_chuc_vu=="CV02"||$quyentruycapnhomcuataikhoan[$i]->ma_chuc_vu=="CV03"||$quyentruycapnhomcuataikhoan[$i]->ma_chuc_vu=="CV04")

               <div id="div-btn-show-menu-setting-nhom" style="border: solid 1px #9695d8; cursor: pointer;width: 287px;height: 36px;float: right;padding: 5px;"><h3><i class="fa fa-envelope-o" aria-hidden="true"> &nbsp; Quản lý nhóm</i></h3>
               </div>
               @break
               @endif
            @endfor
           
            
           </div>
         </div>
         <div id="thongtinkhaccuanhom">
           <input type="hidden" id="div-hi-chu-bai-viet-ma-nhom" value="{{$t}}">
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
        </div>

    </div>
    {{-- setting group --}}
    <div id="div-setting-nhom-menu" class="modal-setting-nhom">
     
        @include('includes.content-setting-group-menu')
     
    </div>
    <!-- //// -->
@endsection

