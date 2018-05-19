

<head>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/lu/baiviet/noidungbaiviet.css') }}">
</head>
                
                {{-- css file noidungbaiviet.css --}}

            <div class="subcontent" >
                <!--  -->
                 <div class="headtus" style=" height: 60px;  " >
                    <div class="divtopcontent" >
                      <img class="imgavtnguoidang" src=" {{ asset('pictures/avt1.jpg') }}" alt="Mountain View">
                    </div>
                    <div class="divtennguoidang" >
                      <span> <h3 class="spantennguoidang">  {{ $mabaivietmoi }} </h3> </span><br>
                      <span> <h5 class="spanthoigiandang"> 22/02/2018 18:07 </h5> <span>
                    </div>
                 </div>
                 <!--  -->
                 <div class="bodytus" >
                    <div class="texttus" >
                        <span><h4>{{$lstbaiviett[0]->noi_dung_bai_viet}}</h4></span>
                    </div>
                    <div class="divimagetus" >
                        <img class="imgtus" 
                       src=" {{ asset('pictures/avt1.jpg') }}" alt="Mountain View">
                    </div>

                 </div>
                 @include('binhluan.hienthibinhluanchobaivietmoi')
                 
    </div>