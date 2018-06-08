
@for ($k = 0; $k <count($lstbinhluan) ; $k++)
   

<div class="divbigbigchuamotcmt" >
                                <div id="dv-div-tare-cmt-{{$lstbinhluan[$k]->ma_binh_luan}}"  class="cl-div-content-boxreadcmt-avt" >
                                    <div class="cl-div-avt-cmt" >
                                        <img class="imgaccountcmt"  src=" {{ asset( 'pictures/anh_dai_dien/'.$lstbinhluan[$k]->anh_dai_dien) }}" alt="Mountain View" >
                                    </div>
                                    <div class="cl-div-tare-read" >

                                        <div id="div-tare-cmt-{{$lstbinhluan[$k]->ma_binh_luan}}" class="divchuacmtbac1" >
                                                <textarea disabled="true" id="tare-cmt-{{$lstbinhluan[$k]->ma_binh_luan}}" cols="53" name="foo"  class="tara-read-cmt" > {{ $lstbinhluan[$k]->ho_ten_lot.' '.$lstbinhluan[$k]->ten }}: {{$lstbinhluan[$k]->noi_dung_binh_luan}}</textarea>
                                        </div>
                                       {{--  <div class="div-btn-show-allcmt" id="div-id-show-all-cmt-{{$lstbinhluan[$i]->ma_binh_luan}}"  onclick='showfullcmt("{{$lstbinhluan[$i]->ma_binh_luan}}","{{$mabaivietl}}")'>      
                                                <i style="color: #9695d8;" id="i-btn-show-allcmt{{$lstbinhluan[$i]->ma_binh_luan}}" class="fa fa-arrow-circle-down stick-xemthem" aria-hidden="true"></i>
                                        </div> --}}
                                        <div class="div-btn-like-cmt" >      
                                                <i style="color: #9695d8;" class="fa fa-star-o" aria-hidden="true">&nbsp;9</i>
                                        </div>
                                        <div class="div-btn-rep-cmt" onclick="repbinhluan('{{$lstbinhluan[$k]->ma_binh_luan}}')" >      
                                                <i style="color: #9695d8;" class="fa fa-comments-o" aria-hidden="true"></i>
                                        </div>                                 
                                    </div>
                                </div>

            <div class="cl-divrepcmt" id="divrepcmt{{ $lstbinhluan[$k]->ma_binh_luan }}" >
                                {{-- 1cmt con --}}
                               {{--  @for ($i = 0; $i <5 ; $i++)
                                    @include('binhluan.mottraloibinhluan')
                                @endfor --}}
                                {{-- end 1 cmt con --}}
            </div>
            <div id="inputrepcmt-{{ $lstbinhluan[$k]->ma_binh_luan }}" class="iprepcmtcmt" >

                 <div class="divrepcmt" id="div-input-binhluan-{{ $lstbinhluan[$k]->ma_binh_luan }}"  >
                            <div>
                                <div class="divimgaccountcmt" >
                                    <img class="imgaccountcmt"  src=" {{asset('pictures/anh_dai_dien/'.Auth::user()->anh_dai_dien)}}" alt="AVTCMT" >
                                </div>
                                <div class="divtextrepcmt" >
                                    <input class="iptextrepcmt" id="input-binhluan-{{ $lstbinhluan[$k]->ma_binh_luan }}" onKeyPress='submitrepcmt(event,"{{ $lstbinhluan[$k]->ma_binh_luan }}")' 
                                    placeholder="Viết bình luận..." type="text" >
                                </div>
                                <div class="btnrepsendcmt" >
                                    <i onclick="sendrepbinhluan('{{ $lstbinhluan[$k]->ma_binh_luan }}')" class="fa fa-paper-plane-o" aria-hidden="true"></i>
                                </div>
                            </div>
                    </div>
            </div>
</div>
@endfor