 <head>
   <script src=" {{ asset('js/includesjs/content-menu-popupjs.js') }}" type="text/javascript" charset="utf-8" async defer></script>
   <script src="{{ asset('js/includesjs/content-setting-group-popupjs.js') }}" type="text/javascript" charset="utf-8" async defer></script>
   <link rel="stylesheet" type="text/css" href="{{ asset('css/dynamic-menu/dynamic-menucss.css') }}">
 </head>

 <div style="height: 500px;width: 700px;background-color: white; margin: auto;border:solid 1px #9695d8;border-radius: 20px;">

 {{--  <div id="div-head-popup-show-all-menu" >
    <span class="close">&times;</span>
  </div> --}}
            <div  style="width: 100%;height: 100%;margin-top: 17px; padding-left: 20px;padding-right: 20px;" >
                  <div class="tab">
                  <button class="tablinks active" onclick="openCity(event, 'divthongbaonhom')"><i class="fa fa-users" aria-hidden="true"></i>&nbsp;Thông báo</button>
                  <button class="tablinks" onclick="openCity(event, 'divpheduyetthanhvien'),opentab_pheduyetthanhvien('{{$t}}')"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;Phê duyệt thành viên</button>
                  <button class="tablinks" onclick="openCity(event, 'divpheduyetbaiviet')"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;Phê duyệt bài viết</button>
                  <button class="tablinks" onclick="openCity(event, 'divbaocao')"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;Báo cáo</button>
                  <button class="tablinks" onclick="openCity(event, 'divcaidatnhom')"><i class="fa fa-cog" aria-hidden="true"></i>&nbsp;Cài đặt</button>
                  {{-- <div style="width: 192px;height: 44px;border-bottom: solid 1px #9695d8;margin-left: 255px;margin-right: 10px;"></div> --}}
                  </div>

                <div id="divthongbaonhom" style="display: block;" class="tabcontent ">
                  <h3>Thông báo nhóm</h3>
                {{--   <div id="div-content-search-group" style="height: 30px;width: 100%;padding-left: 20%;">
                      <div id="div-content-search-nhom">
                       <button id="btn-x-x-x-y" class="btn-nhom-menu-dy" onclick="opencontent_nhom(event,'div-content-tim-kiem-nhom')">
                        <i class="fa fa-search" aria-hidden="true"></i></i> &nbsp; Tìm nhóm
                       </button>
                      </div>
                      <div id="div-content-btn-taonhom">
                       <button id="btn-x-x-x-x" class="btn-nhom-menu-dy" onclick="opencontent_nhom(event,'div-content-tao-nhom')">
                        <i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Tạo nhóm
                       </button>
                     </div>
                  </div> --}}
                 <div id="div-big-content-menu-nhom"> 
                </div>
              </div>




                <div id="divpheduyetthanhvien" class="tabcontent">
                  {{-- <h3>Phê duyệt thành viên</h3> --}}  
                </div>
                <div id="divpheduyetbaiviet" class="tabcontent">
                  <h3>Phê duyệt bài viết</h3>  
                </div>
                <div id="divbaocao" class="tabcontent">
                  <h3>Báo cáo vi phạm</h3>  
                </div>
                <div id="divcaidatnhom" class="tabcontent">
                  <h3>Cài đặt nhóm</h3>
                </div>
            </div>



  </div>