 <head>
   <script src=" {{ asset('js/includesjs/content-menu-popupjs.js') }}" type="text/javascript" charset="utf-8" async defer></script>
   <link rel="stylesheet" type="text/css" href="{{ asset('css/dynamic-menu/dynamic-menucss.css') }}">
 </head>

 <div style="height: 500px;width: 500px;background-color: white; margin: auto;border:solid 1px #9695d8;border-radius: 20px;">

 {{--  <div id="div-head-popup-show-all-menu" >
    <span class="close">&times;</span>
  </div> --}}
            <div  style="width: 100%;height: 100%;margin-top: 17px; padding-left: 20px;padding-right: 20px;" >
                  <div class="tab">
                  <button class="tablinks active" onclick="openCity(event, 'divnhom'),opencontent_nhom(event,'div-content-gr-thamgia-quanly')"><i class="fa fa-users" aria-hidden="true"></i>&nbsp;Nhóm</button>
                  <button class="tablinks" onclick="openCity(event, 'divbanbe')"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;xxxxx</button>
                  <button class="tablinks" onclick="openCity(event, 'divkhac')">xxxxxx&nbsp;<i class="fa fa-chevron-circle-down" aria-hidden="true"></i></button>
                  <div style="width: 192px;height: 44px;border-bottom: solid 1px #9695d8;margin-left: 255px;margin-right: 10px;"></div>
                  </div>

                <div id="divnhom" style="display: block;" class="tabcontent ">
                  <div id="div-content-search-group" style="height: 30px;width: 100%;padding-left: 20%;">
                    <div id="div-content-search-nhom">
                      <button id="btn-tao-nhom-in-model" class="btn-nhom-menu-dy" onclick="opencontent_nhom(event,'div-content-tim-kiem-nhom')">
                        <i class="fa fa-search" aria-hidden="true"></i></i> &nbsp; Tìm nhóm
                       </button>
                    </div>
                    <div id="div-content-btn-taonhom">
                       <button id="btn-tao-nhom-in-model" class="btn-nhom-menu-dy" onclick="opencontent_nhom(event,'div-content-tao-nhom')">
                        <i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Tạo nhóm
                       </button>
                     </div>
                  </div>
                 <div id="div-big-content-menu-nhom"> 
                  {{-- div cac nhom da tham gia --}}
                      <div id="div-content-gr-thamgia-quanly" class="tab-content-nhom">
                       <div id="div-group-tham-gia">
                        <div style="height: 25px;width: 100%;">
                          <div style="width: 180px; border-top: 0px #9695d8 solid;color: #9596d8;">
                            <h4><span><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;Nhóm đang tham gia:</span></h4>
                          </div>
                        </div>
                        <div class="div-item-nhom">
                          @for ($i = 0; $i < count($lstnhomcuataikhoan); $i++)
                          <div style="height: 130px;width: 90px; margin: 7px;" onclick='gotogroup("{{$lstnhomcuataikhoan[$i]->ma_nhom}}")' >

                            <div  class="div-item-nhom-popup">
                                <div class="div-name-nhom"  style="height: 20px; width: 92px;text-align: center;margin-left: -23px;margin-top: 53px;">{{$lstnhomcuataikhoan[$i]->ten_nhom}}</div>
                            </div>
                          
                          </div>
                          @endfor
                        </div>
                      </div>
                  
                  {{-- end div cac nhom tham gia --}}
                  {{-- div cac nhom dang quan ly --}}
                       
                        <div id="div-group-quan-ly">
                          <div style="height: 25px;width: 100%;">
                            <div style="width: 180px; border-top: 0px #9695d8 solid;color: #9596d8;">
                              <h4><span><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;Nhóm đang quản lý:</span></h4>
                            </div>
                          </div>
                          <div class="div-item-nhom">
                            @for ($i = 0; $i < count($lstNhomQuanLyCuaTaiKhoan); $i++)
                            <div style="height: 130px;width: 90px; margin: 7px;" onclick='gotogroup("{{$lstNhomQuanLyCuaTaiKhoan[$i]->ma_nhom}}")' >
                              {{-- background-image: url('pictures/group-icon.png'); --}}
                             {{--  <img src="{{ asset('papictures/group-icon.pngth') }}" style="width: 90px;height: 130px;" alt=""> --}}
                              <div  class="div-item-nhom-popup">
                                  <div class="div-name-nhom"  style="height: 20px; width: 92px;text-align: center;margin-left: -23px;margin-top: 53px;">{{$lstNhomQuanLyCuaTaiKhoan[$i]->ten_nhom}}</div>
                              </div>
                            
                            </div>
                            @endfor
                          </div>
                        </div>
                      </div>
                  {{-- end div cac nhom dang quan ly --}}
                  {{-- div tao nhom --}}
                  <div class="tab-content-nhom" id="div-content-tao-nhom" style="display: none;height: : 400px;">
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
                        <div style="padding: 20px;">
                          
                            <p>
                              <input type="radio" id="iploainhom1" value="LN01" name="radio-group" checked>
                              <label style="margin-bottom: 17px;" for="iploainhom1"><strong>Nhóm công khai</strong><br> (Mọi tài liệu, bài đăng, câu hỏi của nhóm có thể được mọi người tham khảo).</label>
                            </p>
                            <p>
                              <input type="radio" id="iploainhom2" value="LN02" name="radio-group">
                              <label for="iploainhom2"><strong>Nhóm kín</strong><br> (Mọi tài liệu, bài đăng, câu hỏi của nhóm đều là riêng tư).</label>
                            </p>
                          
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
                  {{-- Div tim kiem nhom --}}
                     <div id="div-content-tim-kiem-nhom" class="tab-content-nhom" style="display: none">
                       <div id="div-input-search">
                        <input style="width: 100%;height: 35px;border:solid 1px #9695d8;padding-left: 5px;" onkeyup="search_group()" type="text" name="input-search-group" id="input-search-gr"  placeholder="Nhập vào mã nhóm cần tìm..">
                       </div>
                       <div id="div-ket-qua-tim-kiem" style="height: 250px;overflow: auto;">
                       </div>
                     </div>
                  {{-- end div tim kiem nhom --}}
                </div>



                </div>
                <div id="divbanbe" class="tabcontent">
                  <h3>Bxxxx</h3>  
                </div>
                <div id="divkhac" class="tabcontent">
                  <h3>####</h3>
                </div>
            </div>



  </div>