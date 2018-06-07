

<head>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/lu/baiviet/noidungbaiviet.css') }}">
</head>
                
                {{-- css file noidungbaiviet.css --}}

            <div class="subcontent" >
                <!--  -->
                 <div class="headtus" style=" height: 60px;  " >
                    <div class="divtopcontent" >
                      <img class="imgavtnguoidang" src="{{ asset( 'pictures/anh_dai_dien/'.$lstbaiviett[0]->anh_dai_dien) }}" alt="Mountain View">
                    </div>
                    <div class="divtennguoidang" >
                      <span> <h3 class="spantennguoidang">  {{ $lstbaiviett[0]->ho_ten_lot }} {{ $lstbaiviett[0]->ten }} </h3> </span><br>
                      <span> <h5 class="spanthoigiandang">{{ $lstbaiviett[0]->thoi_gian_dang}}</h5> <span>
                    </div>
                 </div>
                 <!--  -->
                 <div class="bodytus" >
                    <div class="texttus" >
                        <span><h4>{{$lstbaiviett[0]->noi_dung_bai_viet}}</h4></span>
                    </div>
                    @if ($lstbaiviett[0]->ma_hinh_anh!="")
                        <div class="divimagetus" >
                            <img class="imgtus" 
                           src=" {{ asset($lstbaiviett[0]->duong_dan_anh) }}" alt="Mountain View">
                        </div>
                    @endif
                    

                 </div>
                 @include('binhluan.hienthibinhluanchobaivietmoi')
                 
    </div>