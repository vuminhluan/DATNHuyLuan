 <head>
   <script src=" {{ asset('js/includesjs/content-menu-popupjs.js') }}" type="text/javascript" charset="utf-8" async defer></script>
 </head>

 <div style="height: 500px;width: 500px;background-color: white; margin: auto;border:solid 1px #9695d8;border-radius: 20px;">

 {{--  <div id="div-head-popup-show-all-menu" >
    <span class="close">&times;</span>
  </div> --}}
            <div  style="width: 100%;height: 100%;margin-top: 17px; padding-left: 20px;padding-right: 20px;" >
                  <div class="tab">
                  <button class="tablinks active" onclick="openCity(event, 'divnhom')"><i class="fa fa-users" aria-hidden="true"></i>&nbsp;Nhóm</button>
                  <button class="tablinks" onclick="openCity(event, 'divbanbe')"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;Bạn bè</button>
                  <button class="tablinks" onclick="openCity(event, 'divkhac')">Khác&nbsp;<i class="fa fa-chevron-circle-down" aria-hidden="true"></i></button>
                  <div style="width: 100%;height: 44px;border-bottom: solid 1px #9695d8;"></div>
                  </div>

                <div id="divnhom" style="display: block;" class="tabcontent ">
                  <div id="div-content-search-group" style="height: 30px;width: 100%;padding-left: 20%;">
                       <button id="btn-tao-nhom-in-model" class="btn-nhom-menu-dy" onclick="taonhommoi(true)">
                        <i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Tạo nhóm
                       </button>
                  </div>
                 <div id="div-big-content-menu-nhom"> 
                  {{-- div cac nhom da tham gia --}}
                  <div id="div-group-tham-gia">
                    <div style="height: 25px;width: 100%;">
                      <div style="width: 180px; border-top: 1px #9695d8 solid;color: #9596d8;">
                        <h4><span><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;Nhóm đang tham gia:</span></h4>
                      </div>
                    </div>
                      @for ($i = 0; $i < count($lstnhomcuataikhoan); $i++)
                      <div style="height: 92px;width: 77px; float: left;margin: 7px;" onclick='gotogroup("{{$lstnhomcuataikhoan[$i]->ma_nhom}}")' >
                        <div  class="div-item-nhom-popup">
                          
                        </div>
                        <div style="height: 20px; width: 100%;text-align: center;">{{$lstnhomcuataikhoan[$i]->ma_nhom}}</div>
                      </div>
                      @endfor
                  </div>
                  {{-- end div cac nhom tham gia --}}
                  {{-- div tao nhom --}}
                  <div id="div-content-tao-nhom" style="display: none;height: : 400px;">
                     <div style="height: 25px;width: 100%;">
                      <div style="width: 180px; border-top: 1px #9695d8 solid;color: white;background-color: #e1bdef">
                        {{-- <h4><span><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;Tạo nhóm:</span></h4> --}}
                      </div>
                    </div>
                    <div style="height: 300px;">
                      <div>
                        <div><h4><i class="fa fa-pencil" aria-hidden="true"></i> &nbsp;Đặt tên nhóm<h4></div>
                        <div>
                          <input style="width: 100%;height: 35px;border:solid 1px #9695d8;padding-left: 5px;" type="text" name="txtTenNhom" id="input-tennhom" placeholder="Ví dụ: CĐTH15C">
                        </div>
                      </div>
                    </div>
                    <div id="div-bottom-tao-nhom" style="width: 100%;height: 90px;border-top: 1px solid #9695d8;padding-top: 20px;">
                      <button id="btn-huy-tao-nhom-in-model" onclick="taonhommoi(false)" style="width: 77px;height: 25px;"  class="btn-nhom-menu-dy" >
                          Hủy bỏ
                       </button>
                       <button id="btn-xac-nhan-tao-nhom-in-model" onclick="submittaonhom()" style="margin-right: 5px;width: 100px;height: 25px;" class="btn-nhom-menu-dy" >
                          Đồng ý
                       </button>
                    </div>
                      
                  </div>
                  {{-- end div tao nhom --}}
                </div>
                </div>

                <div id="divbanbe" class="tabcontent">
                  <h3>Bạn bè</h3>
                 
                </div>

                <div id="divkhac" class="tabcontent">
                  <h3>Khác</h3>
                  
                </div>
            </div>



  </div>