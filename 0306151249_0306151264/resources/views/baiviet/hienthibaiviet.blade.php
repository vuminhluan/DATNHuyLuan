
<head>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/lu/baiviet/noidungbaiviet.css') }}">
  <script src="{{ asset('js/jslu/baiviet/hienthibaiviet.js') }}" type="text/javascript" charset="utf-8" async defer></script>
</head>
             <script>
              function abx(d){

               console.log(d);
              }
             </script>   
                {{-- css file noidungbaiviet.css --}}
                @if ($lstbaiviet[$i]->ma_loai_bai_viet=="LBV001")
                    <div class="subcontent" >
                      <div class="headtus" style=" height: 60px;  " >
                        <div class="divtopcontent" style="cursor: pointer;" onclick="abx({{$lstbaiviet}})">
                        <img class="imgavtnguoidang" src=" {{ asset( 'pictures/anh_dai_dien/'.$lstbaiviet[$i]->anh_dai_dien) }}" alt="Mountain View">
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
                          @if ($lstbaiviet[$i]->nop_tep=="1")
                                <div class="divclicknopbai" id="div-click-{{$lstbaiviet[$i]->ma_bai_viet}}" onclick="shownoptep('{{$lstbaiviet[$i]->ma_bai_viet}}')"><center>
                                     Nhấn nộp tài liệu &nbsp; &nbsp;<i class="fa fa-file-archive-o fa-2x" aria-hidden="true"></i></center>
                                </div>
                             
                                <div class="divtopfiletus" id="div-nopfile-{{$lstbaiviet[$i]->ma_bai_viet}}" style="display: none;">
                                   <form action="hi" id="submitfile" method="POST" accept-charset="utf-8">
                                            <div style="width: 50%;float: left;">
                                              <input type="file" class="ipbaivietnopfile" name="inputfilenopbai+{{$lstbaiviet[$i]->ma_bai_viet}}" value="" placeholder="">
                                            </div>
                                            <div style="width: 50%;float: left;">
                                              <button  class="submitnopbai" name="inputsubmitnopbai-{{$lstbaiviet[$i]->ma_bai_viet}}" type="submit">Nộp bài&nbsp;<i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                                            </div>
                                     </form>
                                </div>
                             
                          @endif

                       </div>
                       @include('binhluan.hienthibinhluan')
                    </div>
                @endif
                {{--  --}}
                @if ($lstbaiviet[$i]->ma_loai_bai_viet=="LBV002")
                    <div class="subcontent" >
                      <div class="headtus" style=" height: 60px;  " >
                        <div class="divtopcontent" >
                        <img class="imgavtnguoidang" src=" {{ asset( 'pictures/anh_dai_dien/'.$lstbaiviet[$i]->anh_dai_dien) }}" alt="Mountain View">
                          </div>
                          <div class="divtennguoidang" >
                            <span> <h3 class="spantennguoidang">{{ $lstbaiviet[$i]->ten_an_danh }}  <i class="fa fa-star-o" aria-hidden="true"></i>  </h3> </span><br>
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
                       </div>
                       @include('binhluan.hienthibinhluan')
                    </div>
                @endif
                {{--  --}}
                @if ($lstbaiviet[$i]->ma_loai_bai_viet=="LBV003")
                    <div class="subcontent" >
                      <div class="headtus" style=" height: 60px;  " >
                        <div class="divtopcontent" >
                        <img class="imgavtnguoidang" src=" {{ asset( 'pictures/anh_dai_dien/'.$lstbaiviet[$i]->anh_dai_dien) }}" alt="Mountain View">
                          </div>
                          <div class="divtennguoidang" >
                            <span> <h3 class="spantennguoidang">{{ $lstbaiviet[$i]->ho_ten_lot }} {{ $lstbaiviet[$i]->ten }} </h3> </span><br>
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
                       </div>
                       @include('binhluan.hienthibinhluan')
                    </div>
                @endif
                {{--  --}}
                @if ($lstbaiviet[$i]->ma_loai_bai_viet=="LBV004")
                    <div class="subcontent" >
                      <div class="headtus" style=" height: 60px;  " >
                        <div class="divtopcontent" >
                        <img class="imgavtnguoidang" src=" {{ asset( 'pictures/anh_dai_dien/'.$lstbaiviet[$i]->anh_dai_dien) }}" alt="Mountain View">
                          </div>
                          <div class="divtennguoidang" >
                            <span> <h3 class="spantennguoidang" style="color: #e6dae8;">{{ $lstbaiviet[$i]->ten_an_danh}}  <i class="fa fa-user-secret" aria-hidden="true"></i>  </h3> </span><br>
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
                       </div>
                       @include('binhluan.hienthibinhluan')
                    </div>
                @endif




            <!--  -->
