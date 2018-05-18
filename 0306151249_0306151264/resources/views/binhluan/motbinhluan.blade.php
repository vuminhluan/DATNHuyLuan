
@for ($i = 0; $i <count($lstbinhluan) ; $i++)
   

<div style="height: auto;width: 100%;">
                                <div id="dv-div-tare-cmt-{{$lstbinhluan[$i]->ma_binh_luan}}"  class="cl-div-content-boxreadcmt-avt" >
                                    <div class="cl-div-avt-cmt" >
                                        <img class="imgaccountcmt"  src=" {{ asset('pictures/avt1.jpg') }}" alt="Mountain View" >
                                    </div>
                                    <div class="cl-div-tare-read" >

                                        <div id="div-tare-cmt-{{$lstbinhluan[$i]->ma_binh_luan}}" style="width: 427px;float: left;height: 20px;padding-right: 5px;">
                                                <textarea disabled="true" id="tare-cmt-{{$lstbinhluan[$i]->ma_binh_luan}}" cols="53" name="foo"  class="tara-read-cmt" > Lu Lu: {{$lstbinhluan[$i]->noi_dung_binh_luan}}</textarea>
                                        </div>
                                        <div class="div-btn-show-allcmt" id="div-id-show-all-cmt-{{$lstbinhluan[$i]->ma_binh_luan}}"  onclick='showfullcmt("{{$lstbinhluan[$i]->ma_binh_luan}}","{{$mabaivietl}}")'>      
                                                <i style="color: #9695d8;" id="i-btn-show-allcmt{{$lstbinhluan[$i]->ma_binh_luan}}" class="fa fa-arrow-circle-down stick-xemthem" aria-hidden="true"></i>
                                        </div>
                                        <div class="div-btn-like-cmt" >      
                                                <i style="color: #9695d8;" class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                        </div>
                                        <div class="div-btn-rep-cmt" >      
                                                <i style="color: #9695d8;" class="fa fa-reply" aria-hidden="true"></i>
                                        </div>                                 
                                    </div>
                                </div>

            <div class="cl-divrepcmt" id="divrepcmt" style="margin-top: 5px;">
                                {{-- 1cmt con --}}
                               {{--  @for ($i = 0; $i <5 ; $i++)
                                    @include('binhluan.mottraloibinhluan')
                                @endfor --}}
                                

                                {{-- end 1 cmt con --}}
            </div>
</div>
@endfor