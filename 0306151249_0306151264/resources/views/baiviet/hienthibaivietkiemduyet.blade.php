
<head>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/lu/baiviet/noidungbaiviet.css') }}">
  <script src="{{ asset('js/jslu/baiviet/hienthibaiviet.js') }}" type="text/javascript" charset="utf-8" async defer></script>
</head>

@for ($i = 0; $i < count($lstbaiviet) ; $i++)
                {{-- css file noidungbaiviet.css --}}
                @if ($lstbaiviet[$i]->ma_loai_bai_viet=="LBV001")
                    <div style="width: 800px;height: auto;" id="divbigbignoidungmotbaiviet-{{$lstbaiviet[$i]->ma_bai_viet}}" >
                      <div class="subcontentpheduyet" style="float: left;" id="divbignoidungmotbaiviet-{{$lstbaiviet[$i]->ma_bai_viet}}">
                      <div class="headtus" style=" height: 60px;  " >

                        <div class="divtopcontent" style="cursor: pointer;" >
                        <img class="imgavtnguoidang" src=" {{ asset( 'pictures/anh_dai_dien/'.$lstbaiviet[$i]->anh_dai_dien) }}" alt="Lu">
                          </div>
                          <div class="divtennguoidang" >
                            <span> <h3 class="spantennguoidang">  {{ $lstbaiviet[$i]->ho_ten_lot }} {{ $lstbaiviet[$i]->ten }} </h3> </span><br>
                            <span> <h5 class="spanthoigiandang"> {{ $lstbaiviet[$i]->thoi_gian_dang}} </h5> <span>
                          </div>

                       </div>

                       <div class="bodytus" >
                          <div class="texttus" >
                              <span>{{$lstbaiviet[$i]->noi_dung_bai_viet}}</span>
                          </div>
                          @if ($lstbaiviet[$i]->ma_hinh_anh!="")
                             <div class="divimagetus" >
                              <img class="imgtus" 
                             src=" {{ asset($lstbaiviet[$i]->duong_dan_anh) }}" alt="Mountain View">
                              </div>
                          @endif

                          @if ($lstbaiviet[$i]->khao_sat_y_kien=="1")
                                <div class="divclickbinhchon" id="div-click-show-y-kien-{{$lstbaiviet[$i]->ma_bai_viet}}" onclick="showbinhchonykien('{{$lstbaiviet[$i]->ma_bai_viet}}'),demnguoithoigian('{{$lstbaiviet[$i]->thoi_gian_khao_sat_bai_viet}}','timehet-{{$lstbaiviet[$i]->ma_bai_viet}}')"><center>
                                     Nhấn để tham gia bình chọn &nbsp; &nbsp;<i class="fa fa-list" aria-hidden="true"></i></center>
                                </div>
                                <div id="divthoigianhethanvote-{{$lstbaiviet[$i]->ma_bai_viet}}" class="cldivthoigianhetvote">
                                  <p id="timehet-{{$lstbaiviet[$i]->ma_bai_viet}}"></p>
                                </div>                          
                                <div id="divomcacvotebaiviet-{{$lstbaiviet[$i]->ma_bai_viet}}" class="divcacluachonvote">                             
                                </div>

                                <div id="xemketquakhaosat-{{$lstbaiviet[$i]->ma_bai_viet}}" class="clxemketquakhaosat"  onclick="showaaaa()">
                                  <span>Xem kết quả của cuộc khảo sát hiện tại</span>
                                </div>
                          @endif



                          @if ($lstbaiviet[$i]->nop_tep=="1")
                                <div class="divclicknopbai" id="div-click-{{$lstbaiviet[$i]->ma_bai_viet}}" onclick="shownoptep('{{$lstbaiviet[$i]->ma_bai_viet}}')"><center>
                                     Nhấn nộp tài liệu &nbsp; &nbsp;<i class="fa fa-file-archive-o fa-2x" aria-hidden="true"></i></center>
                                </div>
                             
                                <div class="divtopfiletus" id="div-nopfile-{{$lstbaiviet[$i]->ma_bai_viet}}" style="display: none;">
                                  <div style="height: 28px; " id="divomformnopbai-{{$lstbaiviet[$i]->ma_bai_viet}}">
                                  {{-- {{ route('postfilenopbaithanhvien') }} --}}
                                   <form action="hi" enctype="multipart/form-data" id="submitfile-{{$lstbaiviet[$i]->ma_bai_viet}}" method="POST" accept-charset="utf-8">
                                    @csrf
                                    <input type="hidden" value="{{$lstbaiviet[$i]->ma_bai_viet}}" name="ma_bai_viet">
                                    <input type="hidden" value="{{$lstbaiviet[$i]->ma_thumuc}}" name="ma_thumuc">
                                            <div style="width: 50%;float: left;">
                                              <input type="file"  onchange="$('#div-btn-nopbai-'+{{$lstbaiviet[$i]->ma_bai_viet}}).css('display','block');" class="ipbaivietnopfile" id="inputfilenopbai-{{$lstbaiviet[$i]->ma_bai_viet}}" name="inputfilenopbai-{{$lstbaiviet[$i]->ma_bai_viet}}" value="" placeholder="">
                                            </div>
                                            <div id="div-btn-nopbai-{{$lstbaiviet[$i]->ma_bai_viet}}" style="width: 50%;float: left;display: none;">

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

                       </div>
                       </div>
                       <div style="width: 200px;height: 100%;float: left;margin-left: 20px;">
                         <div>
                            <div class="divbtnduyetbaivietkiemduyet" onclick="thucthifuncysno({{$lstbaiviet[$i]->ma_bai_viet}},'pheduyetbaivietnay','Phê duyệt bài viết','Bạn chắc chắn phê duyệt bài viết này?')">
                              <div>Duyệt<i class="fa fa-check" aria-hidden="true"></i></div>
                            </div>
                            <div class="divbtnduyetbaivietkiemduyet" style="width: 115px;margin-left: 5px" onclick="thucthifuncysno2p('{{$lstbaiviet[$i]->ma_chu_bai_viet}}','1','updatetatcabaiviet','Phê duyệt bài viết','Bạn chắc chắn phê duyệt tất cả các bài viết này?')">
                              <div >Duyệt tất cả<i class="fa fa-check" aria-hidden="true"></i></div>
                            </div>
                            <div class="divbtnhuybaivietkiemduyet" onclick="thucthifuncysno({{$lstbaiviet[$i]->ma_bai_viet}},'khongpheduyetbaivietnay','Phê duyệt bài viết','Bạn chắc chắn không phê duyệt bài viết này?')" >
                              <div >Hủy<i class="fa fa-times" aria-hidden="true"></i></div>
                            </div>
                            <div class="divbtnhuybaivietkiemduyet"  style="width: 115px;margin-left: 5px" onclick="thucthifuncysno2p('{{$lstbaiviet[$i]->ma_chu_bai_viet}}','3','updatetatcabaiviet','Phê duyệt bài viết','Bạn chắc chắn không phê duyệt tất cả các bài viết này?')" >
                              <div >Hủy tất cả<i class="fa fa-times" aria-hidden="true"></i></div>
                            </div>
                         </div>
                       </div>
                    </div>
                @endif
                {{--  --}}
                @if ($lstbaiviet[$i]->ma_loai_bai_viet=="LBV002")
                    <div style="width: 800px;height: auto;" id="divbigbignoidungmotbaiviet-{{$lstbaiviet[$i]->ma_bai_viet}}" >
                      <div class="subcontentpheduyet" style="float: left;" id="divbignoidungmotbaiviet-{{$lstbaiviet[$i]->ma_bai_viet}}">
                      <div class="headtus" style=" height: 60px;  " >

                        <div class="divtopcontent" style="cursor: pointer;" >
                        <img class="imgavtnguoidang" src=" {{ asset( 'pictures/anh_hide_user/hideuser.jpg') }}" alt="Lu">
                          </div>
                          <div class="divtennguoidang" >
                            <span> <h3 class="spantennguoidang">  {{ $lstbaiviet[$i]->ten_an_danh }} </h3> </span><br>
                            <span> <h5 class="spanthoigiandang"> {{ $lstbaiviet[$i]->thoi_gian_dang}} </h5> <span>
                          </div>

                       </div>

                       <div class="bodytus" >
                          <div class="texttus" >
                              <span>{{$lstbaiviet[$i]->noi_dung_bai_viet}}</span>
                          </div>
                          @if ($lstbaiviet[$i]->ma_hinh_anh!="")
                             <div class="divimagetus" >
                              <img class="imgtus" 
                             src=" {{ asset($lstbaiviet[$i]->duong_dan_anh) }}" alt="Mountain View">
                              </div>
                          @endif

                          @if ($lstbaiviet[$i]->khao_sat_y_kien=="1")
                                <div class="divclickbinhchon" id="div-click-show-y-kien-{{$lstbaiviet[$i]->ma_bai_viet}}" onclick="showbinhchonykien('{{$lstbaiviet[$i]->ma_bai_viet}}'),demnguoithoigian('{{$lstbaiviet[$i]->thoi_gian_khao_sat_bai_viet}}','timehet-{{$lstbaiviet[$i]->ma_bai_viet}}')"><center>
                                     Nhấn để tham gia bình chọn &nbsp; &nbsp;<i class="fa fa-list" aria-hidden="true"></i></center>
                                </div>
                                <div id="divthoigianhethanvote-{{$lstbaiviet[$i]->ma_bai_viet}}" class="cldivthoigianhetvote">
                                  <p id="timehet-{{$lstbaiviet[$i]->ma_bai_viet}}"></p>
                                </div>                          
                                <div id="divomcacvotebaiviet-{{$lstbaiviet[$i]->ma_bai_viet}}" class="divcacluachonvote">                             
                                </div>

                                <div id="xemketquakhaosat-{{$lstbaiviet[$i]->ma_bai_viet}}" class="clxemketquakhaosat"  onclick="showaaaa()">
                                  <span>Xem kết quả của cuộc khảo sát hiện tại</span>
                                </div>
                          @endif



                          @if ($lstbaiviet[$i]->nop_tep=="1")
                                <div class="divclicknopbai" id="div-click-{{$lstbaiviet[$i]->ma_bai_viet}}" onclick="shownoptep('{{$lstbaiviet[$i]->ma_bai_viet}}')"><center>
                                     Nhấn nộp tài liệu &nbsp; &nbsp;<i class="fa fa-file-archive-o fa-2x" aria-hidden="true"></i></center>
                                </div>
                             
                                <div class="divtopfiletus" id="div-nopfile-{{$lstbaiviet[$i]->ma_bai_viet}}" style="display: none;">
                                  <div style="height: 28px; " id="divomformnopbai-{{$lstbaiviet[$i]->ma_bai_viet}}">
                                  {{-- {{ route('postfilenopbaithanhvien') }} --}}
                                   <form action="hi" enctype="multipart/form-data" id="submitfile-{{$lstbaiviet[$i]->ma_bai_viet}}" method="POST" accept-charset="utf-8">
                                    @csrf
                                    <input type="hidden" value="{{$lstbaiviet[$i]->ma_bai_viet}}" name="ma_bai_viet">
                                    <input type="hidden" value="{{$lstbaiviet[$i]->ma_thumuc}}" name="ma_thumuc">
                                            <div style="width: 50%;float: left;">
                                              <input type="file"  onchange="$('#div-btn-nopbai-'+{{$lstbaiviet[$i]->ma_bai_viet}}).css('display','block');" class="ipbaivietnopfile" id="inputfilenopbai-{{$lstbaiviet[$i]->ma_bai_viet}}" name="inputfilenopbai-{{$lstbaiviet[$i]->ma_bai_viet}}" value="" placeholder="">
                                            </div>
                                            <div id="div-btn-nopbai-{{$lstbaiviet[$i]->ma_bai_viet}}" style="width: 50%;float: left;display: none;">
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

                       </div>
                       </div>
                       <div style="width: 200px;height: 100%;float: left;margin-left: 20px;">
                         <div>
                            <div class="divbtnduyetbaivietkiemduyet" onclick="thucthifuncysno({{$lstbaiviet[$i]->ma_bai_viet}},'pheduyetbaivietnay','Phê duyệt bài viết','Bạn chắc chắn phê duyệt bài viết này?')">
                              <div>Duyệt<i class="fa fa-check" aria-hidden="true"></i></div>
                            </div>
                            <div class="divbtnduyetbaivietkiemduyet" style="width: 115px;margin-left: 5px" onclick="thucthifuncysno2p('{{$lstbaiviet[$i]->ma_chu_bai_viet}}','1','updatetatcabaiviet','Phê duyệt bài viết','Bạn chắc chắn phê duyệt tất cả các bài viết này?')">
                              <div >Duyệt tất cả<i class="fa fa-check" aria-hidden="true"></i></div>
                            </div>
                            <div class="divbtnhuybaivietkiemduyet" onclick="thucthifuncysno({{$lstbaiviet[$i]->ma_bai_viet}},'khongpheduyetbaivietnay','Phê duyệt bài viết','Bạn chắc chắn không phê duyệt bài viết này?')" >
                              <div >Hủy<i class="fa fa-times" aria-hidden="true"></i></div>
                            </div>
                            <div class="divbtnhuybaivietkiemduyet"  style="width: 115px;margin-left: 5px" onclick="thucthifuncysno2p('{{$lstbaiviet[$i]->ma_chu_bai_viet}}','3','updatetatcabaiviet','Phê duyệt bài viết','Bạn chắc chắn không phê duyệt tất cả các bài viết này?')" >
                              <div >Hủy tất cả<i class="fa fa-times" aria-hidden="true"></i></div>
                            </div>
                         </div>
                       </div>
                    </div>
                @endif
                @if ($lstbaiviet[$i]->ma_loai_bai_viet=="LBV003")
                    <div style="width: 800px;height: auto;" id="divbigbignoidungmotbaiviet-{{$lstbaiviet[$i]->ma_bai_viet}}" >
                      <div class="subcontentpheduyet" style="float: left;" id="divbignoidungmotbaiviet-{{$lstbaiviet[$i]->ma_bai_viet}}">
                      <div class="headtus" style=" height: 60px;  " >

                        <div class="divtopcontent" style="cursor: pointer;" >
                        <img class="imgavtnguoidang" src=" {{ asset( 'pictures/anh_dai_dien/'.$lstbaiviet[$i]->anh_dai_dien) }}" alt="Lu">
                          </div>
                          <div class="divtennguoidang" >
                            <span> <h3 class="spantennguoidang">  {{ $lstbaiviet[$i]->ho_ten_lot }} {{ $lstbaiviet[$i]->ten }} </h3> </span><br>
                            <span> <h5 class="spanthoigiandang"> {{ $lstbaiviet[$i]->thoi_gian_dang}} </h5> <span>
                          </div>

                       </div>

                       <div class="bodytus" >
                          <div class="texttus" >
                              <span>{{$lstbaiviet[$i]->noi_dung_bai_viet}}</span>
                          </div>
                          @if ($lstbaiviet[$i]->ma_hinh_anh!="")
                             <div class="divimagetus" >
                              <img class="imgtus" 
                             src=" {{ asset($lstbaiviet[$i]->duong_dan_anh) }}" alt="Mountain View">
                              </div>
                          @endif

                          @if ($lstbaiviet[$i]->khao_sat_y_kien=="1")
                                <div class="divclickbinhchon" id="div-click-show-y-kien-{{$lstbaiviet[$i]->ma_bai_viet}}" onclick="showbinhchonykien('{{$lstbaiviet[$i]->ma_bai_viet}}'),demnguoithoigian('{{$lstbaiviet[$i]->thoi_gian_khao_sat_bai_viet}}','timehet-{{$lstbaiviet[$i]->ma_bai_viet}}')"><center>
                                     Nhấn để tham gia bình chọn &nbsp; &nbsp;<i class="fa fa-list" aria-hidden="true"></i></center>
                                </div>
                                <div id="divthoigianhethanvote-{{$lstbaiviet[$i]->ma_bai_viet}}" class="cldivthoigianhetvote">
                                  <p id="timehet-{{$lstbaiviet[$i]->ma_bai_viet}}"></p>
                                </div>                          
                                <div id="divomcacvotebaiviet-{{$lstbaiviet[$i]->ma_bai_viet}}" class="divcacluachonvote">                             
                                </div>

                                <div id="xemketquakhaosat-{{$lstbaiviet[$i]->ma_bai_viet}}" class="clxemketquakhaosat"  onclick="showaaaa()">
                                  <span>Xem kết quả của cuộc khảo sát hiện tại</span>
                                </div>
                          @endif



                          @if ($lstbaiviet[$i]->nop_tep=="1")
                                <div class="divclicknopbai" id="div-click-{{$lstbaiviet[$i]->ma_bai_viet}}" onclick="shownoptep('{{$lstbaiviet[$i]->ma_bai_viet}}')"><center>
                                     Nhấn nộp tài liệu &nbsp; &nbsp;<i class="fa fa-file-archive-o fa-2x" aria-hidden="true"></i></center>
                                </div>
                             
                                <div class="divtopfiletus" id="div-nopfile-{{$lstbaiviet[$i]->ma_bai_viet}}" style="display: none;">
                                  <div style="height: 28px; " id="divomformnopbai-{{$lstbaiviet[$i]->ma_bai_viet}}">
                                  {{-- {{ route('postfilenopbaithanhvien') }} --}}
                                   <form action="hi" enctype="multipart/form-data" id="submitfile-{{$lstbaiviet[$i]->ma_bai_viet}}" method="POST" accept-charset="utf-8">
                                    @csrf
                                    <input type="hidden" value="{{$lstbaiviet[$i]->ma_bai_viet}}" name="ma_bai_viet">
                                    <input type="hidden" value="{{$lstbaiviet[$i]->ma_thumuc}}" name="ma_thumuc">
                                            <div style="width: 50%;float: left;">
                                              <input type="file"  onchange="$('#div-btn-nopbai-'+{{$lstbaiviet[$i]->ma_bai_viet}}).css('display','block');" class="ipbaivietnopfile" id="inputfilenopbai-{{$lstbaiviet[$i]->ma_bai_viet}}" name="inputfilenopbai-{{$lstbaiviet[$i]->ma_bai_viet}}" value="" placeholder="">
                                            </div>
                                            <div id="div-btn-nopbai-{{$lstbaiviet[$i]->ma_bai_viet}}" style="width: 50%;float: left;display: none;">
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

                       </div>
                       </div>
                       <div style="width: 200px;height: 100%;float: left;margin-left: 20px;">
                         <div>
                            <div class="divbtnduyetbaivietkiemduyet" onclick="thucthifuncysno({{$lstbaiviet[$i]->ma_bai_viet}},'pheduyetbaivietnay','Phê duyệt bài viết','Bạn chắc chắn phê duyệt bài viết này?')">
                              <div>Duyệt<i class="fa fa-check" aria-hidden="true"></i></div>
                            </div>
                            <div class="divbtnduyetbaivietkiemduyet" style="width: 115px;margin-left: 5px" onclick="thucthifuncysno2p('{{$lstbaiviet[$i]->ma_chu_bai_viet}}','1','updatetatcabaiviet','Phê duyệt bài viết','Bạn chắc chắn phê duyệt tất cả các bài viết này?')">
                              <div >Duyệt tất cả<i class="fa fa-check" aria-hidden="true"></i></div>
                            </div>
                            <div class="divbtnhuybaivietkiemduyet" onclick="thucthifuncysno({{$lstbaiviet[$i]->ma_bai_viet}},'khongpheduyetbaivietnay','Phê duyệt bài viết','Bạn chắc chắn không phê duyệt bài viết này?')" >
                              <div >Hủy<i class="fa fa-times" aria-hidden="true"></i></div>
                            </div>
                            <div class="divbtnhuybaivietkiemduyet"  style="width: 115px;margin-left: 5px" onclick="thucthifuncysno2p('{{$lstbaiviet[$i]->ma_chu_bai_viet}}','3','updatetatcabaiviet','Phê duyệt bài viết','Bạn chắc chắn không phê duyệt tất cả các bài viết này?')" >
                              <div >Hủy tất cả<i class="fa fa-times" aria-hidden="true"></i></div>
                            </div>
                         </div>
                       </div>
                    </div>
                @endif
                @if ($lstbaiviet[$i]->ma_loai_bai_viet=="LBV004")
                    <div style="width: 800px;height: auto;" id="divbigbignoidungmotbaiviet-{{$lstbaiviet[$i]->ma_bai_viet}}" >
                      <div class="subcontentpheduyet" style="float: left;" id="divbignoidungmotbaiviet-{{$lstbaiviet[$i]->ma_bai_viet}}">
                      <div class="headtus" style=" height: 60px;  " >

                        <div class="divtopcontent" style="cursor: pointer;" >
                        <img class="imgavtnguoidang" src=" {{ asset( 'pictures/anh_hide_user/hideuser.jpg') }}" alt="Lu">
                          </div>
                          <div class="divtennguoidang" >
                            <span> <h3 class="spantennguoidang">  {{$lstbaiviet[$i]->ten_an_danh }} </h3> </span><br>
                            <span> <h5 class="spanthoigiandang"> {{ $lstbaiviet[$i]->thoi_gian_dang}} </h5> <span>
                          </div>

                       </div>

                       <div class="bodytus" >
                          <div class="texttus" >
                              <span>{{$lstbaiviet[$i]->noi_dung_bai_viet}}</span>
                          </div>
                          @if ($lstbaiviet[$i]->ma_hinh_anh!="")
                             <div class="divimagetus" >
                              <img class="imgtus" 
                             src=" {{ asset($lstbaiviet[$i]->duong_dan_anh) }}" alt="Mountain View">
                              </div>
                          @endif

                          @if ($lstbaiviet[$i]->khao_sat_y_kien=="1")
                                <div class="divclickbinhchon" id="div-click-show-y-kien-{{$lstbaiviet[$i]->ma_bai_viet}}" onclick="showbinhchonykien('{{$lstbaiviet[$i]->ma_bai_viet}}'),demnguoithoigian('{{$lstbaiviet[$i]->thoi_gian_khao_sat_bai_viet}}','timehet-{{$lstbaiviet[$i]->ma_bai_viet}}')"><center>
                                     Nhấn để tham gia bình chọn &nbsp; &nbsp;<i class="fa fa-list" aria-hidden="true"></i></center>
                                </div>
                                <div id="divthoigianhethanvote-{{$lstbaiviet[$i]->ma_bai_viet}}" class="cldivthoigianhetvote">
                                  <p id="timehet-{{$lstbaiviet[$i]->ma_bai_viet}}"></p>
                                </div>                          
                                <div id="divomcacvotebaiviet-{{$lstbaiviet[$i]->ma_bai_viet}}" class="divcacluachonvote">                             
                                </div>

                                <div id="xemketquakhaosat-{{$lstbaiviet[$i]->ma_bai_viet}}" class="clxemketquakhaosat"  onclick="showaaaa()">
                                  <span>Xem kết quả của cuộc khảo sát hiện tại</span>
                                </div>
                          @endif



                          @if ($lstbaiviet[$i]->nop_tep=="1")
                                <div class="divclicknopbai" id="div-click-{{$lstbaiviet[$i]->ma_bai_viet}}" onclick="shownoptep('{{$lstbaiviet[$i]->ma_bai_viet}}')"><center>
                                     Nhấn nộp tài liệu &nbsp; &nbsp;<i class="fa fa-file-archive-o fa-2x" aria-hidden="true"></i></center>
                                </div>
                             
                                <div class="divtopfiletus" id="div-nopfile-{{$lstbaiviet[$i]->ma_bai_viet}}" style="display: none;">
                                  <div style="height: 28px; " id="divomformnopbai-{{$lstbaiviet[$i]->ma_bai_viet}}">
                                  {{-- {{ route('postfilenopbaithanhvien') }} --}}
                                   <form action="hi" enctype="multipart/form-data" id="submitfile-{{$lstbaiviet[$i]->ma_bai_viet}}" method="POST" accept-charset="utf-8">
                                    @csrf
                                    <input type="hidden" value="{{$lstbaiviet[$i]->ma_bai_viet}}" name="ma_bai_viet">
                                    <input type="hidden" value="{{$lstbaiviet[$i]->ma_thumuc}}" name="ma_thumuc">
                                            <div style="width: 50%;float: left;">
                                              <input type="file"  onchange="$('#div-btn-nopbai-'+{{$lstbaiviet[$i]->ma_bai_viet}}).css('display','block');" class="ipbaivietnopfile" id="inputfilenopbai-{{$lstbaiviet[$i]->ma_bai_viet}}" name="inputfilenopbai-{{$lstbaiviet[$i]->ma_bai_viet}}" value="" placeholder="">
                                            </div>
                                            <div id="div-btn-nopbai-{{$lstbaiviet[$i]->ma_bai_viet}}" style="width: 50%;float: left;display: none;">
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

                       </div>
                       </div>
                       <div style="width: 200px;height: 100%;float: left;margin-left: 20px;">
                         <div>
                            <div class="divbtnduyetbaivietkiemduyet" onclick="thucthifuncysno({{$lstbaiviet[$i]->ma_bai_viet}},'pheduyetbaivietnay','Phê duyệt bài viết','Bạn chắc chắn phê duyệt bài viết này?')">
                              <div>Duyệt<i class="fa fa-check" aria-hidden="true"></i></div>
                            </div>
                            <div class="divbtnduyetbaivietkiemduyet" style="width: 115px;margin-left: 5px" onclick="thucthifuncysno2p('{{$lstbaiviet[$i]->ma_chu_bai_viet}}','1','updatetatcabaiviet','Phê duyệt bài viết','Bạn chắc chắn phê duyệt tất cả các bài viết này?')">
                              <div >Duyệt tất cả<i class="fa fa-check" aria-hidden="true"></i></div>
                            </div>
                            <div class="divbtnhuybaivietkiemduyet" onclick="thucthifuncysno({{$lstbaiviet[$i]->ma_bai_viet}},'khongpheduyetbaivietnay','Phê duyệt bài viết','Bạn chắc chắn không phê duyệt bài viết này?')" >
                              <div >Hủy<i class="fa fa-times" aria-hidden="true"></i></div>
                            </div>
                            <div class="divbtnhuybaivietkiemduyet"  style="width: 115px;margin-left: 5px" onclick="thucthifuncysno2p('{{$lstbaiviet[$i]->ma_chu_bai_viet}}','3','updatetatcabaiviet','Phê duyệt bài viết','Bạn chắc chắn không phê duyệt tất cả các bài viết này?')" >
                              <div >Hủy tất cả<i class="fa fa-times" aria-hidden="true"></i></div>
                            </div>
                         </div>
                       </div>
                    </div>
                @endif

 @endfor



            <!--  -->
{{-- </div> --}}