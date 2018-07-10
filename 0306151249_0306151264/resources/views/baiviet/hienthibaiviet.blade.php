
<head>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/lu/baiviet/noidungbaiviet.css') }}">
  <script src="{{ asset('js/jslu/baiviet/hienthibaiviet.js') }}" type="text/javascript" charset="utf-8" async defer></script>
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
               {{--                  <li class="lixpopup" onclick='createboxhoilydotocao("LBC03","NNBC2",$("#session-ma-tk").val(),"{{$lstbaiviet[$i]->ma_bai_viet}}",$("#div-hi-chu-bai-viet-ma-nhom").val()),thaotacthembaiviet("{{$lstbaiviet[$i]->ma_bai_viet}}")'>Báo cáo bài viết tới quản trị viên</li> --}}
{{--                                 <li class="lixpopup" onclick='createboxhoilydotocao("LBC03","NNBC1",$("#session-ma-tk").val(),"{{$lstbaiviet[$i]->ma_bai_viet}}",$("#div-hi-chu-bai-viet-ma-nhom").val()),thaotacthembaiviet("{{$lstbaiviet[$i]->ma_bai_viet}}")' >Báo cáo bài viết tơi nhà quản trị</li> --}}
                                 <li class="lixpopup" onclick='thaotacthembaiviet("{{$lstbaiviet[$i]->ma_bai_viet}}")'>Hủy bỏ</li>
                              @endif
                              @if ($lstbaiviet[$i]->ma_nguoi_viet==Auth::user()->ma_tai_khoan)
                              <li onclick="thucthifuncysno('{{$lstbaiviet[$i]->ma_bai_viet}}','xoabaivietnay','Xóa bài viết này','Bạn có chắc chắn muốn xóa bài viết này không')" class="lixpopup" >Xóa bài viết</li>
                               <li class="lixpopup" onclick='thaotacthembaiviet("{{$lstbaiviet[$i]->ma_bai_viet}}")'>Hủy bỏ</li>
                              @endif
                            </ul>
                          </div>
                       </div>

                        <a href="{{route('trangcanhan.id.index', $lstbaiviet[$i]->ma_nguoi_viet)}}"><div class="divtopcontent" >
                        <img class="imgavtnguoidang" src=" {{ asset( 'pictures/anh_dai_dien/'.$lstbaiviet[$i]->anh_dai_dien) }}" alt="Lu">
                          </div>
                          <div class="divtennguoidang" >
                            <span> <h3 class="spantennguoidang">  {{ $lstbaiviet[$i]->ho_ten_lot }} {{ $lstbaiviet[$i]->ten }} </h3> </span><br>
                            <span> <h5 class="spanthoigiandang"> {{ $lstbaiviet[$i]->thoi_gian_dang}} </h5> <span>
                          </div>

                       </div></a>

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
                       @include('baiviet.nopfilebv')




                       </div>
                       @include('binhluan.hienthibinhluan')
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
         {{--                        <li class="lixpopup" onclick='createboxhoilydotocao("LBC03","NNBC2",$("#session-ma-tk").val(),"{{$lstbaiviet[$i]->ma_bai_viet}}",$("#div-hi-chu-bai-viet-ma-nhom").val()),thaotacthembaiviet("{{$lstbaiviet[$i]->ma_bai_viet}}")'>Báo cáo bài viết tới quản trị viên</li> --}}
{{--                                 <li class="lixpopup" onclick='createboxhoilydotocao("LBC03","NNBC1",$("#session-ma-tk").val(),"{{$lstbaiviet[$i]->ma_bai_viet}}",$("#div-hi-chu-bai-viet-ma-nhom").val()),thaotacthembaiviet("{{$lstbaiviet[$i]->ma_bai_viet}}")' >Báo cáo bài viết tơi nhà quản trị</li> --}}
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



                          @include('baiviet.nopfilebv')

                       </div>
                       @include('binhluan.hienthibinhluan')
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
           {{--                      <li class="lixpopup" onclick='createboxhoilydotocao("LBC03","NNBC2",$("#session-ma-tk").val(),"{{$lstbaiviet[$i]->ma_bai_viet}}",$("#div-hi-chu-bai-viet-ma-nhom").val()),thaotacthembaiviet("{{$lstbaiviet[$i]->ma_bai_viet}}")'>Báo cáo bài viết tới quản trị viên</li> --}}
{{--                                 <li class="lixpopup" onclick='createboxhoilydotocao("LBC03","NNBC1",$("#session-ma-tk").val(),"{{$lstbaiviet[$i]->ma_bai_viet}}",$("#div-hi-chu-bai-viet-ma-nhom").val()),thaotacthembaiviet("{{$lstbaiviet[$i]->ma_bai_viet}}")' >Báo cáo bài viết tơi nhà quản trị</li> --}}
                                 <li class="lixpopup" onclick='thaotacthembaiviet("{{$lstbaiviet[$i]->ma_bai_viet}}")'>Hủy bỏ</li>
                              @endif
                              @if ($lstbaiviet[$i]->ma_nguoi_viet==Auth::user()->ma_tai_khoan)
                              <li onclick="thucthifuncysno('{{$lstbaiviet[$i]->ma_bai_viet}}','xoabaivietnay','Xóa bài viết này','Bạn có chắc chắn muốn xóa bài viết này không')" class="lixpopup" >Xóa bài viết</li>
                               <li class="lixpopup" onclick='thaotacthembaiviet("{{$lstbaiviet[$i]->ma_bai_viet}}")'>Hủy bỏ</li>
                              @endif
                            </ul>
                          </div>
                       </div>
                        <a href="{{route('trangcanhan.id.index', $lstbaiviet[$i]->ma_nguoi_viet)}}">
                        <div class="divtopcontent" style="cursor: pointer;" >
                        <img class="imgavtnguoidang" src=" {{ asset( 'pictures/anh_dai_dien/'.$lstbaiviet[$i]->anh_dai_dien) }}" alt="Lu">
                          </div>
                          <div class="divtennguoidang" >
                            <span> <h3 class="spantennguoidang">  {{ $lstbaiviet[$i]->ho_ten_lot }} {{ $lstbaiviet[$i]->ten }} </h3> </span><br>
                            <span> <h5 class="spanthoigiandang"> {{ $lstbaiviet[$i]->thoi_gian_dang}} </h5> <span>
                          </div>
                        </a>

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



                           @include('baiviet.nopfilebv')

                       </div>
                       @include('binhluan.hienthibinhluan')
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
     {{--                            <li class="lixpopup" onclick='createboxhoilydotocao("LBC03","NNBC2",$("#session-ma-tk").val(),"{{$lstbaiviet[$i]->ma_bai_viet}}",$("#div-hi-chu-bai-viet-ma-nhom").val()),thaotacthembaiviet("{{$lstbaiviet[$i]->ma_bai_viet}}")'>Báo cáo bài viết tới quản trị viên</li> --}}
{{--                                 <li class="lixpopup" onclick='createboxhoilydotocao("LBC03","NNBC1",$("#session-ma-tk").val(),"{{$lstbaiviet[$i]->ma_bai_viet}}",$("#div-hi-chu-bai-viet-ma-nhom").val()),thaotacthembaiviet("{{$lstbaiviet[$i]->ma_bai_viet}}")' >Báo cáo bài viết tơi nhà quản trị</li> --}}
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



                          @include('baiviet.nopfilebv')

                       </div>
                       @include('binhluan.hienthibinhluan')
                    </div>
                @endif
               


 @endfor



            <!--  -->
{{-- </div> --}}