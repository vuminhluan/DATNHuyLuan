<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/lu/binhluan/binhluanbv.css') }}">
<script src="{{ asset('js/jslu/binhluan/docbinhluan.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('js/jslu/binhluan/postbinhluan.js') }}" type="text/javascript" charset="utf-8"></script>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}

</head>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
     $('tarecmt').autoResize();
</script> --}}

<div class="commenttus">
                    <div >
                        <div class="divlikecmt">

                               {{-- <div class="divbtnlike" onclick="clicklike('div-content-all-cmt-157')">
                                    <h3  ><i  class="fa fa-star-o" aria-hidden="true"><strong class="like-cmt" >&ensp;Hay</strong></i></h3>
                                </div> --}}
                             
                                <div  class="divbtncmt" onclick="clickbinhluan('{{ $lstbaiviet[$i]->ma_bai_viet }}','{{$lstbaiviet[$i]->ma_loai_bai_viet}}')" >
                                    <h3 ><i class="fa fa-comment-o" aria-hidden="true" ><strong class="like-cmt">&ensp;Thảo luận</strong></i></h3>
                                </div>
                        </div>
                        {{--tren  --}}
                    <div id="dv-div-big-{{ $lstbaiviet[$i]->ma_bai_viet }}" class="div-tatca-cmt"  >
                        <div style="margin-left: 12px;margin-right: 12px; height: 12px;"> </div>
                        {{-- <div style="margin-left: 12px;margin-right: 12px; height: 30px;"> </div> --}}
                        <div id="div-content-all-cmt-{{ $lstbaiviet[$i]->ma_bai_viet }}" style="display: none;border-top: solid 1px #e4e6e8;margin-left: 12px;margin-right: 12px; height: auto;    padding-bottom: 10px"> 
                            {{-- 1 cmt --}}
                               {{--  @include('binhluan.motbinhluan') --}}
                               
                            
                            {{-- end 1 cmt --}}
                        </div>
                    </div>
                        {{-- duoi --}}
                        <div class="divcmt" id="div-input-binhluan-{{ $lstbaiviet[$i]->ma_bai_viet }}" style="display: none;" >
                            <div>
                                <div class="divimgaccountcmt" >
                                    <img class="imgaccountcmtcmt"  src=" {{asset('pictures/anh_dai_dien/'.Auth::user()->anh_dai_dien)}}" alt="AVTCMT" >
                                </div>
                                <div class="divtextcmt" >
                                    <input class="iptextcmt" id="input-binhluan-{{ $lstbaiviet[$i]->ma_bai_viet }}" onKeyPress='submitme(event,"{{ $lstbaiviet[$i]->ma_bai_viet }}","{{$lstbaiviet[$i]->ma_loai_bai_viet}}")' 
                                    placeholder="Viết bình luận..." type="text" >
                                </div>
                                <div class="btnsendcmt" >
                                    <i onclick="sendbinhluan('{{ $lstbaiviet[$i]->ma_bai_viet }}','{{$lstbaiviet[$i]->ma_loai_bai_viet}}')" class="fa fa-paper-plane-o" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    <div>
                 </div>
            </div>
</div>
        {{--  --}}
       