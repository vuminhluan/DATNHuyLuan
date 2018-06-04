<head>
  <script src="{{ asset('js/jslu/nhom/caidatnhom.js') }}" type="text/javascript" charset="utf-8" async defer></script>
</head>
<div style="overflow: auto; height: 400px;width: 100%;">
                    <div>
                        <div onclick="showhidediv('div-content-loai-nhom-caidat','1'),showhidediv('icon-div-content-loai-nhom-caidat','0'),showhidediv('iconhideloainhom','0')" style="width: 100%;height: 30px;">
                        <strong><i class="fa fa-arrows" aria-hidden="true"></i>&nbsp;Loại nhóm&nbsp;<i id="icon-div-content-loai-nhom-caidat" class="fa fa-plus-square-o" aria-hidden="true"></i><i id="iconhideloainhom" style="display: none;" class= "fa fa-minus-square-o" aria-hidden="true"></i></strong>
                        </div>
                        <div id="div-content-loai-nhom-caidat" style="display: none;">
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
                           <div style="height: 35px;border-bottom: solid 1px #f9f9f9;">
                                <button style="background-color: white;border-radius: 3px;height: 30px;width: 80px;float: right;border:solid 1px #9695d8;cursor: pointer;" onclick="luuchinhsualoainhom('{{$caidatnhom}}')" type="button" >Lưu lại</button>
                           </div>
                        </div>
                    </div>
                    <div>
                        <div onclick="showhidediv('div-content-cau-hoi-caidat','1'),showhidediv('icon-div-content-cau-hoi-caidat','0'),showhidediv('iconhidecauhoigianhap','0')" style="width: 100%;height: 30px;">
                          <input type="hidden" id="ip-hide-sttcauhoigianhap" value="0">
                        <strong><i class="fa fa-arrows" aria-hidden="true"></i>&nbsp;Câu hỏi gia nhập&nbsp;<i id="icon-div-content-cau-hoi-caidat" class="fa fa-plus-square-o" aria-hidden="true"></i><i style="display: none;" id="iconhidecauhoigianhap" class="fa fa-minus-square-o" aria-hidden="true"></i></strong>
                        </div>
                        <div id="div-content-cau-hoi-caidat" style="display: none;">
                          <div id="div-cac-cau-hoi">

                          </div>
                          <div>
                            <div style="height: 34px;color: #d3dae5;">
                              <span  onclick="themcauhoigianhapnhom()" class="fa fa-plus-circle fa-2x" ></span>
                            
                          </div>
                          </div>
                        </div>
                    </div>
                    <div>
                        <div onclick="showhidediv('div-content-ma-gia-nhap-caidat','1'),showhidediv('icon-div-content-ma-gia-nhap-caidat','0'),showhidediv('iconhidegianhapnhom','0')" style="width: 100%;height: 30px;">
                        <strong><i class="fa fa-arrows" aria-hidden="true"></i>&nbsp;Mã gia nhập nhóm&nbsp;<i id="icon-div-content-ma-gia-nhap-caidat" class="fa fa-plus-square-o" aria-hidden="true"></i><i style="display: none;" id="iconhidegianhapnhom" class="fa fa-minus-square-o" aria-hidden="true"></i></strong>
                        </div>
                        <div id="div-content-ma-gia-nhap-caidat" style="display: none;">
                          <div style="height: 36px; width: 100%;">
                          <div style="width: 90%;float: left;height: 36px;border: solid 1px #f9f9f9;"><input style="border:none;width: 100%;height: 36px;" type="text" name="" value="" placeholder=""></div>
                          <div style="width: 10%;float: left; height: 36px;">
                              <div style="cursor: pointer;width: 100%;height: 36px;padding: 7px;"> <center>Lưu</center></div>
                          </div>
                        </div>
                        </div>
                    </div>
                    <div>
                        <div onclick="showhidediv('div-content-phe-duyet-bai-viet-caidat','1'),showhidediv('icon-div-content-phe-duyet-bai-viet-caidat','0'),showhidediv('iconhidepheduyetbaiviet','0')" style="width: 100%;height: 30px;">
                        <strong><i class="fa fa-arrows" aria-hidden="true"></i>&nbsp;Phê duyệt bài viết trước khi xuất hiện trên nhóm&nbsp;<i id="icon-div-content-phe-duyet-bai-viet-caidat" class="fa fa-plus-square-o" aria-hidden="true"></i><i class="fa fa-minus-square-o" id="iconhidepheduyetbaiviet" style="display: none;" aria-hidden="true"></i></strong>
                        </div>
                        <div id="div-content-phe-duyet-bai-viet-caidat" style="display: none;">
                            <div style="height: 36px; width: 100%;">
                              <div style="width: 90%;float: left;height: 36px;border: solid 1px #f9f9f9;"><input style="border:none;width: 100%;height: 36px;" type="text" name="" value="" placeholder="">
                              </div>
                              <div style="width: 10%;float: left; height: 36px;">
                                  <div style="cursor: pointer;width: 100%;height: 36px;padding: 7px;"> <center>Lưu</center>
                                  </div>
                              </div>
                            </div>
                        </div>
                    </div>


                    <div>
                        <div onclick="showhidediv('div-content-gioi-thieu-nhom-caidat','1'),showhidediv('icon-div-content-gioi-thieu-nhom-caidat','0'),showhidediv('iconhidegioithieunhom','0')" style="width: 100%;height: 30px;">
                        <strong><i class="fa fa-arrows" aria-hidden="true"></i>&nbsp;Giới thiệu nhóm&nbsp;<i id="icon-div-content-gioi-thieu-nhom-caidat" class="fa fa-plus-square-o" aria-hidden="true"></i><i id="iconhidegioithieunhom" style="display: none;" class= "fa fa-minus-square-o" aria-hidden="true"></i></strong>
                        </div>
                        <div id="div-content-gioi-thieu-nhom-caidat" style="display: none;">
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
                    </div>
                    <div>
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
                    </div>


                    {{--  --}}
</div>