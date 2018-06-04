<head>
  <script src="{{ asset('js/jslu/nhom/caidatnhom.js') }}" type="text/javascript" charset="utf-8" async defer></script>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/lu/nhom/caidatnhom.css') }}">
</head>
<div style="overflow: auto; height: 400px;width: 100%;">
                    <div>
                        <div onclick="showhidediv('div-content-loai-nhom-caidat','1'),showhidediv('icon-div-content-loai-nhom-caidat','0'),showhidediv('iconhideloainhom','0')" style="width: 100%;height: 30px;">
                        <strong><i class="fa fa-arrows" aria-hidden="true"></i>&nbsp;Loại nhóm&nbsp;<i id="icon-div-content-loai-nhom-caidat" class="fa fa-plus-square-o" aria-hidden="true"></i><i id="iconhideloainhom" style="display: none;" class= "fa fa-minus-square-o" aria-hidden="true"></i></strong>
                        </div>
                        <div id="div-content-loai-nhom-caidat" class="divomnoidungsuacaidat" >
                          @if ($caidatnhom[0]->ma_loai_nhom=="LN01")
                             <p>
                              <input type="radio" id="iploainhom11" value="LN01" name="radio-groupp" checked>
                              <label style="margin-bottom: 17px;" for="iploainhom11"><strong>Nhóm công khai</strong><br> (Mọi tài liệu, bài đăng, câu hỏi của nhóm có thể được mọi người tham khảo).</label>
                            </p>
                            <p>
                              <input type="radio" id="iploainhom22" value="LN02" name="radio-groupp">
                              <label for="iploainhom22"><strong>Nhóm kín</strong><br> (Mọi tài liệu, bài đăng, câu hỏi của nhóm đều là riêng tư).</label>
                            </p>
                          @endif
                          @if ($caidatnhom[0]->ma_loai_nhom=="LN02")
                          
                           
                      
                            <p>
                              <input type="radio" id="iploainhom11" value="LN01" name="radio-groupp" >
                              <label style="margin-bottom: 17px;" for="iploainhom11"><strong>Nhóm công khai</strong><br> (Mọi tài liệu, bài đăng, câu hỏi của nhóm có thể được mọi người tham khảo).</label>
                            </p>
                            <p>
                              <input type="radio" id="iploainhom22" value="LN02" name="radio-groupp" checked>
                              <label for="iploainhom22"><strong>Nhóm kín</strong><br> (Mọi tài liệu, bài đăng, câu hỏi của nhóm đều là riêng tư).</label>
                            </p>
                                {{-- </form> --}}
                          @endif
                           <div class="buttoncaidatnhom" style="float: right;overflow: hidden;" onclick="luuchinhsualoainhom('{{$caidatnhom}}')" type="button" ><center>Lưu lại</center></div>
                           <div style="height: 5px;border-bottom: solid 1px #f9f9f9;padding-bottom: 3px;clear:right;width: 100%;">
                           
                               
                          
                        </div>

                    </div>
                    <div>
                        <div onclick="showhidediv('div-content-cau-hoi-caidat','1'),showhidediv('icon-div-content-cau-hoi-caidat','0'),showhidediv('iconhidecauhoigianhap','0'),loadlistcauhoicuanhom('{{$caidatnhom}}')" style="width: 100%;height: 30px;">
                          <input type="hidden" id="ip-hide-sttcauhoigianhap" value="0">
                        <strong><i class="fa fa-arrows" aria-hidden="true"></i>&nbsp;Câu hỏi gia nhập&nbsp;<i id="icon-div-content-cau-hoi-caidat" class="fa fa-plus-square-o" aria-hidden="true"></i><i style="display: none;" id="iconhidecauhoigianhap" class="fa fa-minus-square-o" aria-hidden="true"></i></strong>
                        </div>
                        <div id="div-content-cau-hoi-caidat" class="divomnoidungsuacaidat" >
                          <div id="div-cac-cau-hoi">

                          </div>
                          <div>
                            <div style="height: 36px;margin-bottom: 10px;">
                              <div style="height: 34px;color: #b2b1d8;float: left;"><span  onclick="themcauhoigianhapnhom('{{$caidatnhom}}')" class="fa fa-plus-circle fa-2x" ></span></div>
                              <div style="float: left;padding:5px;margin-left: 7px;">Thêm câu hỏi gia nhập</div>
                            </div>
                          </div>
                          <div style="height: 35px;border-bottom: solid 1px #f9f9f9;">
                            @if ($caidatnhom[0]->trang_thai_cau_hoi_gia_nhap_nhom=="0")
                                  <div id="divcauhoigianhapnhomdangduoctat" style="width: 100%;height:30px;cursor: pointer;" onclick="updatetrangthaicauhoigianhapnhom('{{$caidatnhom}}','0')">
                                  <div style="float: left;color: #9695d8;"><i class="fa fa-toggle-off fa-2x" aria-hidden="true"></i></div>
                                  <div style="padding: 5px;float: left;"><strong>Câu hỏi gia nhập nhóm đang được vô hiệu</strong></div>
                                  </div>

                                  <div id="divcauhoigianhapnhomdangduocbat" style="width: 100%;height:30px;cursor: pointer;display: none;" onclick="updatetrangthaicauhoigianhapnhom('{{$caidatnhom}}','1')">
                                  <div style="float: left;color: #9695d8;"><i class="fa fa-toggle-on fa-2x" aria-hidden="true"></i></div>
                                  <div style="padding: 5px;float: left;"><strong>Câu hỏi gia nhập nhóm đang được kích hoạt</strong></div>
                                  </div>
                             
                            @endif
                            @if ($caidatnhom[0]->trang_thai_cau_hoi_gia_nhap_nhom=="1")
                              <div id="divcauhoigianhapnhomdangduoctat" style="width: 100%;height:30px;cursor: pointer;display: none;" onclick="updatetrangthaicauhoigianhapnhom('{{$caidatnhom}}','0')">
                                  <div style="float: left;color: #9695d8;"><i class="fa fa-toggle-off fa-2x" aria-hidden="true"></i></div>
                                  <div style="padding: 5px;float: left;"><strong>Câu hỏi gia nhập nhóm đang được vô hiệu</strong></div>
                                  </div>

                                  <div id="divcauhoigianhapnhomdangduocbat" style="width: 100%;height:30px;cursor: pointer;" onclick="updatetrangthaicauhoigianhapnhom('{{$caidatnhom}}','1')">
                                  <div style="float: left;color: #9695d8;"><i class="fa fa-toggle-on fa-2x" aria-hidden="true"></i></div>
                                  <div style="padding: 5px;float: left;"><strong>Câu hỏi gia nhập nhóm đang được kích hoạt</strong></div>
                                  </div>
                            @endif

                          </div>
                        </div>
                    </div>
                    <div>
                        <div onclick="showhidediv('div-content-ma-gia-nhap-caidat','1'),showhidediv('icon-div-content-ma-gia-nhap-caidat','0'),showhidediv('iconhidegianhapnhom','0')" style="width: 100%;height: 30px;">
                        <strong><i class="fa fa-arrows" aria-hidden="true"></i>&nbsp;Mã gia nhập nhóm&nbsp;<i id="icon-div-content-ma-gia-nhap-caidat" class="fa fa-plus-square-o" aria-hidden="true"></i><i style="display: none;" id="iconhidegianhapnhom" class="fa fa-minus-square-o" aria-hidden="true"></i></strong>
                        </div>
                        <div id="div-content-ma-gia-nhap-caidat" class="divomnoidungsuacaidat" >
                          <div style="height: 36px; width: 100%;padding: 2px;margin-bottom: 10px;">
                          <div style="width: 80%;float: left;height: 36px;border: solid 1px #c7d2e2;">
                            <input id="inputmagianhapnhom" style="border:none;width: 100%;height: 34px;padding-left: 15px;" disabled="true" type="text" name="" value="{{$caidatnhom[0]->ma_gia_nhap_nhom}}" placeholder=""></div>
                          <div style="width: 20%;float: left; height: 36px;">
                              <div style="cursor: pointer;width: 50%;height: 36px;padding: 7px;float: left;" onclick="$('#inputmagianhapnhom').prop('disabled',false)"> <center>Sửa</center></div>
                              <div style="cursor: pointer;width: 50%;height: 36px;padding: 7px;float: left;" onclick="luumagianhap('{{$caidatnhom}}')"> <center>Lưu</center></div>
                          </div>
                        </div>

                          <div style="height: 35px;border-bottom: solid 1px #f9f9f9;">
                            @if ($caidatnhom[0]->trang_thai_ma_gia_nhap_nhom=="0")
                                  <div id="divmagianhapnhomdangduoctat" style="width: 100%;height:30px;cursor: pointer;" onclick="updatetrangthaimagianhapnhom('{{$caidatnhom}}','0')">
                                  <div style="float: left;color: #9695d8;"><i class="fa fa-toggle-off fa-2x" aria-hidden="true"></i></div>
                                  <div style="padding: 5px;float: left;">Sử dụng mã gia nhập nhóm đang được vô hiệu</div>
                                  </div>

                                  <div id="divmagianhapnhomdangduocbat" style="width: 100%;height:30px;cursor: pointer;display: none;" onclick="updatetrangthaimagianhapnhom('{{$caidatnhom}}','1')">
                                  <div style="float: left;color: #9695d8;"><i class="fa fa-toggle-on fa-2x" aria-hidden="true"></i></div>
                                  <div style="padding: 5px;float: left;">Sử dụng mã gia nhập nhóm đang được kích hoạt</div>
                                  </div>
                             
                            @endif
                            @if ($caidatnhom[0]->trang_thai_ma_gia_nhap_nhom=="1")
                              <div id="divmagianhapnhomdangduoctat" style="width: 100%;height:30px;cursor: pointer;display: none;" onclick="updatetrangthaimagianhapnhom('{{$caidatnhom}}','0')">
                                  <div style="float: left;color: #9695d8;"><i class="fa fa-toggle-off fa-2x" aria-hidden="true"></i></div>
                                  <div style="padding: 5px;float: left;">Sử dụng mã gia nhập nhóm đang được vô hiệu</div>
                                  </div>

                                  <div id="divmagianhapnhomdangduocbat" style="width: 100%;height:30px;cursor: pointer;" onclick="updatetrangthaimagianhapnhom('{{$caidatnhom}}','1')">
                                  <div style="float: left;color: #9695d8;"><i class="fa fa-toggle-on fa-2x" aria-hidden="true"></i></div>
                                  <div style="padding: 5px;float: left;">Sử dụng mã gia nhập nhóm đang được kích hoạt</div>
                                  </div>
                            @endif

                          </div>
                        </div>
                    </div>
                    <div>
                        <div onclick="showhidediv('div-content-phe-duyet-bai-viet-caidat','1'),showhidediv('icon-div-content-phe-duyet-bai-viet-caidat','0'),showhidediv('iconhidepheduyetbaiviet','0')" style="width: 100%;height: 30px;">
                        <strong><i class="fa fa-arrows" aria-hidden="true"></i>&nbsp;Phê duyệt bài viết trước khi xuất hiện trên nhóm&nbsp;<i id="icon-div-content-phe-duyet-bai-viet-caidat" class="fa fa-plus-square-o" aria-hidden="true"></i><i class="fa fa-minus-square-o" id="iconhidepheduyetbaiviet" style="display: none;" aria-hidden="true"></i></strong>
                        </div>
                        <div id="div-content-phe-duyet-bai-viet-caidat" style="display: none;" class="divomnoidungsuacaidat">
                              
                              <div style="height: 35px;">
                            @if ($caidatnhom[0]->phe_duyet_bai_viet_binh_thuong=="0")
                                  <div id="divpheduyetbaivietcongkhaidangduoctat" style="width: 100%;height:30px;cursor: pointer;" onclick="updatetrangthaipheduyetbaivietcongkhai('{{$caidatnhom}}','0')">
                                  <div style="float: left;color: #9695d8;"><i class="fa fa-toggle-off fa-2x" aria-hidden="true"></i></div>
                                  <div style="padding: 5px;float: left;">Không cần phê duyệt bài viết công khai trước khi hiện lên nhóm</div>
                                  </div>

                                  <div id="divpheduyetbaivietcongkhaidangduocbat" style="width: 100%;height:30px;cursor: pointer;display: none;" onclick="updatetrangthaipheduyetbaivietcongkhai('{{$caidatnhom}}','1')">
                                  <div style="float: left;color: #9695d8;"><i class="fa fa-toggle-on fa-2x" aria-hidden="true"></i></div>
                                  <div style="padding: 5px;float: left;">Phê duyệt bài viết công khai trước khi hiện lên nhóm</div>
                                  </div>
                             
                            @endif
                            @if ($caidatnhom[0]->phe_duyet_bai_viet_binh_thuong=="1")
                              <div id="divpheduyetbaivietcongkhaidangduoctat" style="width: 100%;height:30px;cursor: pointer;display: none;" onclick="updatetrangthaipheduyetbaivietcongkhai('{{$caidatnhom}}','0')">
                                  <div style="float: left;color: #9695d8;"><i class="fa fa-toggle-off fa-2x" aria-hidden="true"></i></div>
                                  <div style="padding: 5px;float: left;">Không cần phê duyệt bài viết công khai trước khi hiện lên nhóm</div>
                                  </div>

                                  <div id="divpheduyetbaivietcongkhaidangduocbat" style="width: 100%;height:30px;cursor: pointer;" onclick="updatetrangthaipheduyetbaivietcongkhai('{{$caidatnhom}}','1')">
                                  <div style="float: left;color: #9695d8;"><i class="fa fa-toggle-on fa-2x" aria-hidden="true"></i></div>
                                  <div style="padding: 5px;float: left;">Phê duyệt bài viết công khai trước khi hiện lên nhóm</div>
                                  </div>
                            @endif

                               </div>

                               <div style="height: 35px;border-bottom: solid 1px #f9f9f9;">
                            @if ($caidatnhom[0]->phe_duyet_bai_viet_an_danh=="0")
                                  <div id="divpheduyetbaivietandanhdangduoctat" style="width: 100%;height:30px;cursor: pointer;" onclick="updatetrangthaipheduyetbaivietandanh('{{$caidatnhom}}','0')">
                                  <div style="float: left;color: #9695d8;"><i class="fa fa-toggle-off fa-2x" aria-hidden="true"></i></div>
                                  <div style="padding: 5px;float: left;">Không cần phê duyệt bài viết ẩn danh trước khi hiện lên nhóm</div>
                                  </div>

                                  <div id="divpheduyetbaivietandanhdangduocbat" style="width: 100%;height:30px;cursor: pointer;display: none;" onclick="updatetrangthaipheduyetbaivietandanh('{{$caidatnhom}}','1')">
                                  <div style="float: left;color: #9695d8;"><i class="fa fa-toggle-on fa-2x" aria-hidden="true"></i></div>
                                  <div style="padding: 5px;float: left;">Phê duyệt bài viết ẩn danh trước khi hiện lên nhóm</div>
                                  </div>
                             
                            @endif
                            @if ($caidatnhom[0]->phe_duyet_bai_viet_an_danh=="1")
                              <div id="divpheduyetbaivietandanhdangduoctat" style="width: 100%;height:30px;cursor: pointer;display: none;" onclick="updatetrangthaipheduyetbaivietandanh('{{$caidatnhom}}','0')">
                                  <div style="float: left;color: #9695d8;"><i class="fa fa-toggle-off fa-2x" aria-hidden="true"></i></div>
                                  <div style="padding: 5px;float: left;">Không cần phê duyệt bài viết ẩn danh trước khi hiện lên nhóm</div>
                                  </div>

                                  <div id="divpheduyetbaivietandanhdangduocbat" style="width: 100%;height:30px;cursor: pointer;" onclick="updatetrangthaipheduyetbaivietandanh('{{$caidatnhom}}','1')">
                                  <div style="float: left;color: #9695d8;"><i class="fa fa-toggle-on fa-2x" aria-hidden="true"></i></div>
                                  <div style="padding: 5px;float: left;">Phê duyệt bài viết ẩn danh trước khi hiện lên nhóm</div>
                                  </div>
                            @endif

                          </div>
                        </div>
                    </div>


                    <div>
                        <div onclick="showhidediv('div-content-gioi-thieu-nhom-caidat','1'),showhidediv('icon-div-content-gioi-thieu-nhom-caidat','0'),showhidediv('iconhidegioithieunhom','0')" style="width: 100%;height: 30px;">
                        <strong><i class="fa fa-arrows" aria-hidden="true"></i>&nbsp;Giới thiệu nhóm&nbsp;<i id="icon-div-content-gioi-thieu-nhom-caidat" class="fa fa-plus-square-o" aria-hidden="true"></i><i id="iconhidegioithieunhom" style="display: none;" class= "fa fa-minus-square-o" aria-hidden="true"></i></strong>
                        </div>
                        <div id="div-content-gioi-thieu-nhom-caidat" style="display: none;" class="divomnoidungsuacaidat">
                          <div style="height: 36px; width: 100%;">
                          <div style="width: 560px;height: auto;border: solid 1px #f9f9f9;">
                             <textarea id="txtaragioithieunhom" style="border: none;resize: none;" rows="4" cols="50">{{$caidatnhom[0]->gioi_thieu_nhom}}</textarea>
                           </div>
                          <div style="width: 10%; height: 36px;">
                            <div onclick="luugioithieunhom('{{$caidatnhom}}')" class="buttoncaidatnhom" >
                               <center>Lưu</center>
                            </div>
                          </div>
                        </div>
                        </div>
                    </div>
  {{--                   <div>
                        <div onclick="showhidediv('div-content-giai-tan-nhom-caidat','1'),showhidediv('icon-div-content-giai-tan-nhom-caidat','0'),showhidediv('iconhidegiaitannhom','0')" style="width: 100%;height: 30px;">
                        <strong><i class="fa fa-arrows" aria-hidden="true"></i>&nbsp;Giải tán nhóm&nbsp;<i id="icon-div-content-giai-tan-nhom-caidat" class="fa fa-plus-square-o" aria-hidden="true"></i><i id="iconhidegiaitannhom" style="display: none;" class= "fa fa-minus-square-o" aria-hidden="true"></i></strong>
                        </div>

                        <div id="div-content-giai-tan-nhom-caidat" style="display: none;">
                          <div style="height: 36px; width: 100%;">
                          <div style="width: 90%;float: left;height: 36px;border: solid 1px #f9f9f9;">
                              <input style="border:none;width: 100%;height: 36px;" type="text" name="" value="" placeholder="">
                           </div>
                          <div style="width: 10%;float: left; height: 36px;">
                            <div style="cursor: pointer;width: 100%;height: 36px;padding: 7px;">
                               <center>Lưu</center>
                            </div>
                          </div>
                        </div>
                        </div>
                    </div> --}}


                    {{--  --}}
</div>