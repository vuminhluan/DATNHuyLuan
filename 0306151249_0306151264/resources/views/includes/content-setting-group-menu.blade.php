 <head>
   <script src=" {{ asset('js/includesjs/content-menu-popupjs.js') }}" type="text/javascript" charset="utf-8" async defer></script>
   <script src="{{ asset('js/includesjs/content-setting-group-popupjs.js') }}" type="text/javascript" charset="utf-8" async defer></script>
   <link rel="stylesheet" type="text/css" href="{{ asset('css/dynamic-menu/dynamic-menucss.css') }}">
 </head>

 <div style="height: 500px;width: 700px;background-color: white; margin: auto;border:solid 1px #9695d8;border-radius: 20px;">
  <div id="div-lua-chon-chuc-nang-nhom-first" style="background-color: white;height: 500px;width: 700px;position: absolute;margin: auto;border-radius: 20px;padding: 40px;">
    @for ($i = 0; $i <count($quyentruycapnhomcuataikhoan) ; $i++)
    @if ($quyentruycapnhomcuataikhoan[$i]->ma_chuc_vu!="CV01")
        {{-- @if ($quyentruycapnhomcuataikhoan[$i]->ma_chuc_vu!="CV02")
           <div onclick="chonchucnangtrongnhom('{{$quyentruycapnhomcuataikhoan[$i]->ma_chuc_vu}}')" class="div-big-item-choose-menu-group">
             <div  class="div-item-choose-menu-group" >
              
             </div>
            <div style="padding: 7px;">
             <center><span>{{$quyentruycapnhomcuataikhoan[$i]->ten_chuc_vu}}</span></center>
             </div>
         </div>
        @endif --}}
{{--         @if ($quyentruycapnhomcuataikhoan[$i]->ma_chuc_vu=="CV03")
             <div onclick="chonchucnangtrongnhom('{{$quyentruycapnhomcuataikhoan[$i]->ma_chuc_vu}}')" class="div-big-item-choose-menu-group">
                 <div  class="div-item-choose-menu-group" >
                   <center><span class="fa fa-check-circle-o fa-5x"></span></center>
                 </div>
                <div style="padding: 7px;">
                 <center><span>{{$quyentruycapnhomcuataikhoan[$i]->ten_chuc_vu}}</span></center>
                 </div>
             </div>
        @endif
        @if ($quyentruycapnhomcuataikhoan[$i]->ma_chuc_vu=="CV04")
             <div onclick="chonchucnangtrongnhom('{{$quyentruycapnhomcuataikhoan[$i]->ma_chuc_vu}}')" class="div-big-item-choose-menu-group">
                 <div  class="div-item-choose-menu-group" >
                   <center><span class="fa fa-pencil-square-o fa-5x"></span></center>
                 </div>
                <div style="padding: 7px;">
                 <center><span>{{$quyentruycapnhomcuataikhoan[$i]->ten_chuc_vu}}</span></center>
                 </div>
             </div>
        @endif --}}
     
       @if ($quyentruycapnhomcuataikhoan[$i]->ma_chuc_vu=="CV02")
           <div class="div-big-item-choose-menu-group" onclick="chonchucnangtrongnhom('CV01')" >
            <div class="div-item-choose-menu-group" >
               <center><span class="fa fa-cogs fa-5x"></span></center>
            </div>
             <div style="padding: 7px;">
             <center><span>Cài đặt nhóm</span></center>
             </div>
          </div>
          {{-- CV08 là xem báo cáo --}}
{{--           <div onclick="chonchucnangtrongnhom('CV08')" class="div-big-item-choose-menu-group">
            
            <div  class="div-item-choose-menu-group" >
              <center><span class="fa fa-flag fa-5x" ></span></center>
            </div>
             <div style="padding: 7px;">
             <center><span>Xem tố cáo</span></center>
             </div>
          </div> --}}
          <div onclick="chonchucnangtrongnhom('CV09')" class="div-big-item-choose-menu-group">
            {{-- CV09 là quản lý danh thành viên --}}
            <div  class="div-item-choose-menu-group" >
              <center><span class="fa fa-users fa-5x" ></span></center>
            </div>
             <div style="padding: 7px;">
             <center><span>Quản lý thành viên</span></center>
             </div>
          </div>
        @endif

    @endif

      
    @endfor
    

  </div>

 {{--  <div id="div-head-popup-show-all-menu" >
    <span class="close">&times;</span>
  </div> --}}
            <div  style="width: 100%;height: 100%;margin-top: 17px; padding-left: 20px;padding-right: 20px;" >
                  <div class="tab">
                  <button class="tablinks active" id="tablinkdivthanhvien" onclick="openCity(event, 'divthanhvien'),opentab_lstthanhvien('{{$t}}')"><i class="fa fa-users" aria-hidden="true"></i>&nbsp;Thành viên</button>
{{--                   <button class="tablinks" id="tablinkdivpheduyetthanhvien" onclick="openCity(event, 'divpheduyetthanhvien'),opentab_pheduyetthanhvien('{{$t}}','')"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;Phê duyệt thành viên</button>
                  <button class="tablinks" id="tablinkdivpheduyetbaiviet" onclick="openCity(event, 'divpheduyetbaiviet')"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;Phê duyệt bài viết</button> --}}
{{--                   <button class="tablinks" id="tablinkdivbaocao" onclick="openCity(event, 'divbaocao')"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;Báo cáo</button> --}}
                  <button class="tablinks" id="tablinkdivcaidatnhom" onclick="openCity(event, 'divcaidatnhom'),chonchucnangtrongnhom('CV01')"><i class="fa fa-cog" aria-hidden="true"></i>&nbsp;Cài đặt</button>
                  {{-- <div style="width: 192px;height: 44px;border-bottom: solid 1px #9695d8;margin-left: 255px;margin-right: 10px;"></div> --}}
                  </div>

                <div id="divthanhvien" style="display: block;" class="tabcontent ">
                  <div style="height: 45px;width: 100%;padding-top: 10px;overflow: auto;margin-bottom: 5px;padding-left: 5px;padding-right: 5px;">
                    <input style="border:  solid 1px transparent;box-shadow: 1px 0px 2px #9695d8;border-bottom:  solid 1px #eadcf2;;height: 25px;border-radius: 3px;width: 100%;" onkeyup="timkiemthanhvien_menugrsetting('{{$t}}')" id="ip-timkiemthanhvien-popup-settingnhom" type="text" placeholder="Tìm thành viên....." name="">
                  </div>

                 <div id="divlstthanhvien" style="height: 350px;overflow: auto;"> 
                </div>
              </div>




                <div id="divpheduyetthanhvien" class="tabcontent">
                  {{-- <h3>Phê duyệt thành viên</h3> --}}  
                </div>
                <div id="divpheduyetbaiviet" class="tabcontent">
                  <h3>Phê duyệt bài viết</h3>  
                </div>
{{--                 <div id="divbaocao" class="tabcontent">
                  <h3>Báo cáo vi phạm</h3>  
                </div> --}}
                <div id="divcaidatnhom" class="tabcontent" style="display: none;">
                  
                </div>
            </div>



  </div>