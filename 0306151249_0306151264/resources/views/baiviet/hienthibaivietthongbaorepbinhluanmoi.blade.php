
<head>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/lu/baiviet/noidungbaiviet.css') }}">
  <script src="{{ asset('js/jslu/baiviet/hienthibaiviet.js') }}" type="text/javascript" charset="utf-8" async defer></script>

      <link rel="stylesheet" type="text/css" href="{{ asset('css/lu/binhluan/binhluanbv.css') }}">
<script src="{{ asset('js/jslu/binhluan/docbinhluan.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('js/jslu/binhluan/postbinhluan.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
{{--              <script>
              function abx(d){
// onclick="abx({{$lstbaiviet}})"
               console.log(d);
              }
             </script>   --}} 
 
{{-- <div id="chuatatca"> --}}
@for ($i = 0; $i < count($lstbaiviet) ; $i++)
                {{-- css file noidungbaiviet.css --}}
                @if ($lstbaiviet[$i]->ma_loai_bai_viet=="LBV001")
                    <div class="subcontent" id="divbignoidungmotbaiviet-{{$lstbaiviet[$i]->ma_bai_viet}}" >
                      <div class="headtus" style=" height: 60px;  " >
                        <div>
                         <span onclick="thaotacthembaiviet('{{$lstbaiviet[$i]->ma_bai_viet}}')" class="spanclickxbaiviet" >
                          <ion-icon name="more" size="large"></ion-icon>
                        </span>
                          <div id="divxbaiviet-{{$lstbaiviet[$i]->ma_bai_viet}}" class="divomshowxbaiviet" >
                            <span class="spanshowxbaiviet" style="border-bottom: solid 15px #b366cc47;"></span>
                            <span class="spanshowxbaiviet" style="border-bottom: solid 15px #b366cc47;"></span>
                            <span class="spanshowxbaiviet"></span>
                            <ul> 
                              @if ($lstbaiviet[$i]->ma_nguoi_viet!=Auth::user()->ma_tai_khoan)
{{--                                 <li class="lixpopup" onclick='createboxhoilydotocao("LBC03","NNBC2",$("#session-ma-tk").val(),"{{$lstbaiviet[$i]->ma_bai_viet}}",$("#div-hi-chu-bai-viet-ma-nhom").val()),thaotacthembaiviet("{{$lstbaiviet[$i]->ma_bai_viet}}")'>Báo cáo bài viết tới quản trị viên</li> --}}
                                <li class="lixpopup" onclick='createboxhoilydotocao("LBC03","NNBC1",$("#session-ma-tk").val(),"{{$lstbaiviet[$i]->ma_bai_viet}}",$("#div-hi-chu-bai-viet-ma-nhom").val()),thaotacthembaiviet("{{$lstbaiviet[$i]->ma_bai_viet}}")' >Báo cáo bài viết tơi nhà quản trị</li>
                                 <li class="lixpopup" onclick='thaotacthembaiviet("{{$lstbaiviet[$i]->ma_bai_viet}}")'>Hủy bỏ</li>
                              @endif
                              @if ($lstbaiviet[$i]->ma_nguoi_viet==Auth::user()->ma_tai_khoan)
                              <li onclick="thucthifuncysno('{{$lstbaiviet[$i]->ma_bai_viet}}','xoabaivietnay','Xóa bài viết này','Bạn có chắc chắn muốn xóa bài viết này không')" class="lixpopup" >Xóa bài viết</li>
                               <li class="lixpopup" onclick='thaotacthembaiviet("{{$lstbaiviet[$i]->ma_bai_viet}}")'>Hủy bỏ</li>
                              @endif
                            </ul>
                          </div>
                       </div>

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
                                <div class="divclicknopbai" id="div-click-{{$lstbaiviet[$i]->ma_bai_viet}}" onclick="shownoptep('{{$lstbaiviet[$i]->ma_bai_viet}}'),demnguoithoigiannopbai('{{$lstbaiviet[$i]->thoi_gian_thu_bai_viet}}','timehetnoibai-{{$lstbaiviet[$i]->ma_bai_viet}}')"><center>
                                     Nhấn nộp tài liệu &nbsp; &nbsp;<i class="fa fa-file-archive-o fa-2x" aria-hidden="true"></i></center>
                                </div>
                             
                                <div class="divtopfiletus" id="div-nopfile-{{$lstbaiviet[$i]->ma_bai_viet}}" style="display: none;border-top: none;">
                                  <div id="divthoigianhethannopbai-{{$lstbaiviet[$i]->ma_bai_viet}}" class="cldivthoigianhetvote" style="display: block;">
                                    <p id="timehetnoibai-{{$lstbaiviet[$i]->ma_bai_viet}}"></p>
                                  </div> 
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
                                              <button onclick="submitnopbaine('{{$lstbaiviet[$i]->ma_bai_viet}}','{{$lstbaiviet[$i]->ma_thumuc}}','{{$lstbaiviet[$i]->ma_bai_viet}}')"  class="submitnopbai" name="inputsubmitnopbai-{{$lstbaiviet[$i]->ma_bai_viet}}" type="submit">Nộp bài&nbsp;<i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
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

                       </div >
                       @include('binhluan.hienthibinhluanchothongbaorepbinhluanmoi')
                       {{-- <img onload="alert('hihiihihihihihi');" src="" alt=""> --}}
                      
                    </div>
                @endif
                {{-- Loại bài viết 2  --}}
                @if ($lstbaiviet[$i]->ma_loai_bai_viet=="LBV002")
                    <div class="subcontent" id="divbignoidungmotbaiviet-{{$lstbaiviet[$i]->ma_bai_viet}}" >
                      <div class="headtus" style=" height: 60px;  " >
                        <div>
                         <span onclick="thaotacthembaiviet('{{$lstbaiviet[$i]->ma_bai_viet}}')" class="spanclickxbaiviet" >
                          <ion-icon name="more" size="large"></ion-icon>
                        </span>
                          <div id="divxbaiviet-{{$lstbaiviet[$i]->ma_bai_viet}}" class="divomshowxbaiviet" >
                            <span class="spanshowxbaiviet" style="border-bottom: solid 15px #b366cc47;"></span>
                            <span class="spanshowxbaiviet" style="border-bottom: solid 15px #b366cc47;"></span>
                            <span class="spanshowxbaiviet"></span>
                            <ul> 
                              @if ($lstbaiviet[$i]->ma_nguoi_viet!=Auth::user()->ma_tai_khoan)
                                <li class="lixpopup" onclick='createboxhoilydotocao("LBC03","NNBC2",$("#session-ma-tk").val(),"{{$lstbaiviet[$i]->ma_bai_viet}}",$("#div-hi-chu-bai-viet-ma-nhom").val()),thaotacthembaiviet("{{$lstbaiviet[$i]->ma_bai_viet}}")'>Báo cáo bài viết tới quản trị viên</li>
                                <li class="lixpopup" onclick='createboxhoilydotocao("LBC03","NNBC1",$("#session-ma-tk").val(),"{{$lstbaiviet[$i]->ma_bai_viet}}",$("#div-hi-chu-bai-viet-ma-nhom").val()),thaotacthembaiviet("{{$lstbaiviet[$i]->ma_bai_viet}}")' >Báo cáo bài viết tơi nhà quản trị</li>
                                 <li class="lixpopup" onclick='thaotacthembaiviet("{{$lstbaiviet[$i]->ma_bai_viet}}")'>Hủy bỏ</li>
                              @endif
                              @if ($lstbaiviet[$i]->ma_nguoi_viet==Auth::user()->ma_tai_khoan)
                              <li onclick="thucthifuncysno('{{$lstbaiviet[$i]->ma_bai_viet}}','xoabaivietnay','Xóa bài viết này','Bạn có chắc chắn muốn xóa bài viết này không')" class="lixpopup" >Xóa bài viết</li>
                               <li class="lixpopup" onclick='thaotacthembaiviet("{{$lstbaiviet[$i]->ma_bai_viet}}")'>Hủy bỏ</li>
                              @endif
                            </ul>
                          </div>
                       </div>

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
                                <div class="divclicknopbai" id="div-click-{{$lstbaiviet[$i]->ma_bai_viet}}" onclick="shownoptep('{{$lstbaiviet[$i]->ma_bai_viet}}'),demnguoithoigiannopbai('{{$lstbaiviet[$i]->thoi_gian_thu_bai_viet}}','timehetnoibai-{{$lstbaiviet[$i]->ma_bai_viet}}')"><center>
                                     Nhấn nộp tài liệu &nbsp; &nbsp;<i class="fa fa-file-archive-o fa-2x" aria-hidden="true"></i></center>
                                </div>
                             
                                <div class="divtopfiletus" id="div-nopfile-{{$lstbaiviet[$i]->ma_bai_viet}}" style="display: none;border-top: none;">
                                  <div id="divthoigianhethannopbai-{{$lstbaiviet[$i]->ma_bai_viet}}" class="cldivthoigianhetvote" style="display: block;">
                                    <p id="timehetnoibai-{{$lstbaiviet[$i]->ma_bai_viet}}"></p>
                                  </div> 
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
                                              <button onclick="submitnopbaine('{{$lstbaiviet[$i]->ma_bai_viet}}','{{$lstbaiviet[$i]->ma_thumuc}}','{{$lstbaiviet[$i]->ma_bai_viet}}')"  class="submitnopbai" name="inputsubmitnopbai-{{$lstbaiviet[$i]->ma_bai_viet}}" type="submit">Nộp bài&nbsp;<i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
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
                       @include('binhluan.hienthibinhluanchothongbaorepbinhluanmoi')
                    </div>
                @endif
                {{-- Loại bài viết 3 --}}
                @if ($lstbaiviet[$i]->ma_loai_bai_viet=="LBV003")
                    <div class="subcontent" id="divbignoidungmotbaiviet-{{$lstbaiviet[$i]->ma_bai_viet}}" >
                      <div class="headtus" style=" height: 60px;  " >
                        <div>
                         <span onclick="thaotacthembaiviet('{{$lstbaiviet[$i]->ma_bai_viet}}')" class="spanclickxbaiviet" >
                          <ion-icon name="more" size="large"></ion-icon>
                        </span>
                          <div id="divxbaiviet-{{$lstbaiviet[$i]->ma_bai_viet}}" class="divomshowxbaiviet" >
                            <span class="spanshowxbaiviet" style="border-bottom: solid 15px #b366cc47;"></span>
                            <span class="spanshowxbaiviet" style="border-bottom: solid 15px #b366cc47;"></span>
                            <span class="spanshowxbaiviet"></span>
                            <ul> 
                              @if ($lstbaiviet[$i]->ma_nguoi_viet!=Auth::user()->ma_tai_khoan)
                                <li class="lixpopup" onclick='createboxhoilydotocao("LBC03","NNBC2",$("#session-ma-tk").val(),"{{$lstbaiviet[$i]->ma_bai_viet}}",$("#div-hi-chu-bai-viet-ma-nhom").val()),thaotacthembaiviet("{{$lstbaiviet[$i]->ma_bai_viet}}")'>Báo cáo bài viết tới quản trị viên</li>
                                <li class="lixpopup" onclick='createboxhoilydotocao("LBC03","NNBC1",$("#session-ma-tk").val(),"{{$lstbaiviet[$i]->ma_bai_viet}}",$("#div-hi-chu-bai-viet-ma-nhom").val()),thaotacthembaiviet("{{$lstbaiviet[$i]->ma_bai_viet}}")' >Báo cáo bài viết tơi nhà quản trị</li>
                                 <li class="lixpopup" onclick='thaotacthembaiviet("{{$lstbaiviet[$i]->ma_bai_viet}}")'>Hủy bỏ</li>
                              @endif
                              @if ($lstbaiviet[$i]->ma_nguoi_viet==Auth::user()->ma_tai_khoan)
                              <li onclick="thucthifuncysno('{{$lstbaiviet[$i]->ma_bai_viet}}','xoabaivietnay','Xóa bài viết này','Bạn có chắc chắn muốn xóa bài viết này không')" class="lixpopup" >Xóa bài viết</li>
                               <li class="lixpopup" onclick='thaotacthembaiviet("{{$lstbaiviet[$i]->ma_bai_viet}}")'>Hủy bỏ</li>
                              @endif
                            </ul>
                          </div>
                       </div>

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
                                <div class="divclicknopbai" id="div-click-{{$lstbaiviet[$i]->ma_bai_viet}}" onclick="shownoptep('{{$lstbaiviet[$i]->ma_bai_viet}}'),demnguoithoigiannopbai('{{$lstbaiviet[$i]->thoi_gian_thu_bai_viet}}','timehetnoibai-{{$lstbaiviet[$i]->ma_bai_viet}}')"><center>
                                     Nhấn nộp tài liệu &nbsp; &nbsp;<i class="fa fa-file-archive-o fa-2x" aria-hidden="true"></i></center>
                                </div>
                             
                                <div class="divtopfiletus" id="div-nopfile-{{$lstbaiviet[$i]->ma_bai_viet}}" style="display: none;border-top: none;">
                                  <div id="divthoigianhethannopbai-{{$lstbaiviet[$i]->ma_bai_viet}}" class="cldivthoigianhetvote" style="display: block;">
                                    <p id="timehetnoibai-{{$lstbaiviet[$i]->ma_bai_viet}}"></p>
                                  </div> 
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
                                              <button onclick="submitnopbaine('{{$lstbaiviet[$i]->ma_bai_viet}}','{{$lstbaiviet[$i]->ma_thumuc}}','{{$lstbaiviet[$i]->ma_bai_viet}}')"  class="submitnopbai" name="inputsubmitnopbai-{{$lstbaiviet[$i]->ma_bai_viet}}" type="submit">Nộp bài&nbsp;<i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
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
                       @include('binhluan.hienthibinhluanchothongbaorepbinhluanmoi')
                    </div>
                @endif
                {{-- Loại bài viết 4 --}}
                @if ($lstbaiviet[$i]->ma_loai_bai_viet=="LBV004")
                    <div class="subcontent" id="divbignoidungmotbaiviet-{{$lstbaiviet[$i]->ma_bai_viet}}" >
                      <div class="headtus" style=" height: 60px;  " >
                        <div>
                         <span onclick="thaotacthembaiviet('{{$lstbaiviet[$i]->ma_bai_viet}}')" class="spanclickxbaiviet" >
                          <ion-icon name="more" size="large"></ion-icon>
                        </span>
                          <div id="divxbaiviet-{{$lstbaiviet[$i]->ma_bai_viet}}" class="divomshowxbaiviet" >
                            <span class="spanshowxbaiviet" style="border-bottom: solid 15px #b366cc47;"></span>
                            <span class="spanshowxbaiviet" style="border-bottom: solid 15px #b366cc47;"></span>
                            <span class="spanshowxbaiviet"></span>
                            <ul> 
                              @if ($lstbaiviet[$i]->ma_nguoi_viet!=Auth::user()->ma_tai_khoan)
                                <li class="lixpopup" onclick='createboxhoilydotocao("LBC03","NNBC2",$("#session-ma-tk").val(),"{{$lstbaiviet[$i]->ma_bai_viet}}",$("#div-hi-chu-bai-viet-ma-nhom").val()),thaotacthembaiviet("{{$lstbaiviet[$i]->ma_bai_viet}}")'>Báo cáo bài viết tới quản trị viên</li>
                                <li class="lixpopup" onclick='createboxhoilydotocao("LBC03","NNBC1",$("#session-ma-tk").val(),"{{$lstbaiviet[$i]->ma_bai_viet}}",$("#div-hi-chu-bai-viet-ma-nhom").val()),thaotacthembaiviet("{{$lstbaiviet[$i]->ma_bai_viet}}")' >Báo cáo bài viết tơi nhà quản trị</li>
                                 <li class="lixpopup" onclick='thaotacthembaiviet("{{$lstbaiviet[$i]->ma_bai_viet}}")'>Hủy bỏ</li>
                              @endif
                              @if ($lstbaiviet[$i]->ma_nguoi_viet==Auth::user()->ma_tai_khoan)
                              <li onclick="thucthifuncysno('{{$lstbaiviet[$i]->ma_bai_viet}}','xoabaivietnay','Xóa bài viết này','Bạn có chắc chắn muốn xóa bài viết này không')" class="lixpopup" >Xóa bài viết</li>
                               <li class="lixpopup" onclick='thaotacthembaiviet("{{$lstbaiviet[$i]->ma_bai_viet}}")'>Hủy bỏ</li>
                              @endif
                            </ul>
                          </div>
                       </div>

                        <div class="divtopcontent" style="cursor: pointer;" >
                        <img class="imgavtnguoidang" src=" {{ asset( 'pictures/anh_hide_user/hideuser.jpg') }}" alt="Lu">
                          </div>
                          <div class="divtennguoidang" >
                            <span> <h3 class="spantennguoidang">  {{  $lstbaiviet[$i]->ten_an_danh  }} </h3> </span><br>
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
                                <div class="divclicknopbai" id="div-click-{{$lstbaiviet[$i]->ma_bai_viet}}" onclick="shownoptep('{{$lstbaiviet[$i]->ma_bai_viet}}'),demnguoithoigiannopbai('{{$lstbaiviet[$i]->thoi_gian_thu_bai_viet}}','timehetnoibai-{{$lstbaiviet[$i]->ma_bai_viet}}')"><center>
                                     Nhấn nộp tài liệu &nbsp; &nbsp;<i class="fa fa-file-archive-o fa-2x" aria-hidden="true"></i></center>
                                </div>
                             
                                <div class="divtopfiletus" id="div-nopfile-{{$lstbaiviet[$i]->ma_bai_viet}}" style="display: none;border-top: none;">
                                  <div id="divthoigianhethannopbai-{{$lstbaiviet[$i]->ma_bai_viet}}" class="cldivthoigianhetvote" style="display: block;">
                                    <p id="timehetnoibai-{{$lstbaiviet[$i]->ma_bai_viet}}"></p>
                                  </div> 
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
                                              <button onclick="submitnopbaine('{{$lstbaiviet[$i]->ma_bai_viet}}','{{$lstbaiviet[$i]->ma_thumuc}}','{{$lstbaiviet[$i]->ma_bai_viet}}')"  class="submitnopbai" name="inputsubmitnopbai-{{$lstbaiviet[$i]->ma_bai_viet}}" type="submit">Nộp bài&nbsp;<i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
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
                       @include('binhluan.hienthibinhluanchothongbaorepbinhluanmoi')
                    </div>
                @endif
               


 @endfor



            <!--  -->
{{-- </div> --}}