                          @if ($lstbaiviet[$i]->nop_tep=="1")
                                <div class="divclicknopbai" id="div-click-{{$lstbaiviet[$i]->ma_bai_viet}}" onclick="shownoptep('{{$lstbaiviet[$i]->ma_bai_viet}}'),demnguoithoigiannopbai('{{$lstbaiviet[$i]->thoi_gian_thu_bai_viet}}','{{$lstbaiviet[$i]->ma_bai_viet}}')"><center>
                                     Nhấn nộp tài liệu &nbsp; &nbsp;<i class="fa fa-file-archive-o fa-2x" aria-hidden="true"></i></center>
                                </div>
                                {{-- <a href="https://drive.google.com/drive/folders/{{$folder['basename']}}" target="_blank"> <i class="fa fa-folder-o"></i> {{$folder['name']}}</a> --}}
                                <div class="divtopfiletus" id="div-nopfile-{{$lstbaiviet[$i]->ma_bai_viet}}" style="display: none;border-top: none;">
                                  @if ($lstbaiviet[$i]->ma_nguoi_viet==Auth::user()->ma_tai_khoan)
                                  <a class="theatepduocnopbai" href="https://drive.google.com/drive/folders/{{$lstbaiviet[$i]->ma_thumuc}}" title="Tệp được nộp" target="_blank">
                                    <div class="divxemtepdanopthubai" >Xem tệp đã được nộp{{$lstbaiviet[$i]->ma_bai_viet}}</div>
                                  </a>
                                  @endif

                                  <div id="divthoigianhethannopbai-{{$lstbaiviet[$i]->ma_bai_viet}}" class="cldivthoigianhetvote" style="display: block;">
                                    <p id="timehetnoibai-{{$lstbaiviet[$i]->ma_bai_viet}}"></p>
                                  </div> 
                                  <div style="height: 28px; " id="divomformnopbai-{{$lstbaiviet[$i]->ma_bai_viet}}">
                                  {{-- {{ route('postfilenopbaithanhvien') }} --}}
                                   <form action="hi" enctype="multipart/form-data" id="submitfile-{{$lstbaiviet[$i]->ma_bai_viet}}" method="POST" accept-charset="utf-8">
                                    @csrf
                                    <input type="hidden" value="{{$lstbaiviet[$i]->ma_bai_viet}}" name="ma_bai_viet">
                                    <input type="hidden" value="{{$lstbaiviet[$i]->ma_thumuc}}" name="ma_thumuc">
                                            <div class="upload-btn-wrapperl" style="width: 80%;float: left;">
                                              <input type="file"  
                                              onchange="$('#div-btn-nopbai-'+{{$lstbaiviet[$i]->ma_bai_viet}}).css('display','block'),
                                                        $('#chonteptinnopbai-'+{{$lstbaiviet[$i]->ma_bai_viet}}).html($('#inputfilenopbai-{{$lstbaiviet[$i]->ma_bai_viet}}').val())" 
                                              class="ipbaivietnopfile" id="inputfilenopbai-{{$lstbaiviet[$i]->ma_bai_viet}}" 
                                              name="inputfilenopbai-{{$lstbaiviet[$i]->ma_bai_viet}}" value="" placeholder="">
                                              <button id="chonteptinnopbai-{{$lstbaiviet[$i]->ma_bai_viet}}" class="btnlipfile">Chọn tệp tin</button>
                                            </div>
                                            <div id="div-btn-nopbai-{{$lstbaiviet[$i]->ma_bai_viet}}" style="width: 20%;float: left;display: none;">
                                              <button onclick="submitnopbaine('{{$lstbaiviet[$i]->ma_bai_viet}}','{{$lstbaiviet[$i]->ma_thumuc}}','{{$lstbaiviet[$i]->ma_bai_viet}}','{{$lstbaiviet[$i]->thoi_gian_dang}}')"  class="submitnopbai" name="inputsubmitnopbai-{{$lstbaiviet[$i]->ma_bai_viet}}" type="submit">Nộp bài&nbsp;<i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                                            </div>
                                     </form>
                                   </div>
                                     <div style="width: 100%;height: 28px;color: #9596d8;text-align: center;padding-top: 3px;display: none;" id="divloaddingupfile-{{$lstbaiviet[$i]->ma_bai_viet}}">
                                       
                                     </div>
                                     <div style="width: 100%;height: 28px;color: #9596d8;text-align: center;padding-top: 3px;display: none;" id="divdanopfileroi-{{$lstbaiviet[$i]->ma_bai_viet}}">
                                       <span>Đã nộp bài cho bài viết này rồi</span>&nbsp;<i class="fa fa-check" aria-hidden="true"></i>
                                     </div>
                                </div>
                             
                        @endif