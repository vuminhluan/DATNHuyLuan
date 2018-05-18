<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/lu/binhluan/binhluanbv.css') }}">
<script src="{{ asset('js/jslu/binhluan/docbinhluan.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('js/jslu/binhluan/postbinhluan.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
     $('tarecmt').autoResize();
</script> --}}

<div class="commenttus">
                    <div>
                        <div class="divlikecmt">

                               <div class="divbtnlike" onclick="clicklike('div-content-all-cmt-157')">
                                    <h3><i class="fa fa-thumbs-o-up" aria-hidden="true"><strong>&ensp;Thích</strong></i></h3>
                                </div>
                             
                                <div class="divbtncmt" onclick="clickbinhluan('{{ $lstbaiviet[$i]->ma_bai_viet }}')" >
                                    <h3><i class="fa fa-comment-o" aria-hidden="true" ><strong>&ensp;Bình luận</strong></i></h3>
                                </div>

                        </div>
                        {{--tren  --}}
                    <div id="dv-div-big-{{ $lstbaiviet[$i]->ma_bai_viet }}" class="div-tatca-cmt" >
                        <div style="margin-left: 12px;margin-right: 12px; height: 12px;"> </div>
                        <div style="margin-left: 12px;margin-right: 12px; height: 30px;"> </div>
                        <div id="div-content-all-cmt-{{ $lstbaiviet[$i]->ma_bai_viet }}" style="display: none;border-top: solid 1px #c5cfd6;margin-left: 12px;margin-right: 12px; height: auto;    padding-bottom: 10px"> 
                            {{-- 1 cmt --}}
                               {{--  @include('binhluan.motbinhluan') --}}
                               
                            
                            {{-- end 1 cmt --}}
                        </div>
                    </div>
                        {{-- duoi --}}
                        <div class="divcmt" id="div-inputbinhluan-157" style="display: none;" >
                            <div>
                                <div class="divimgaccountcmt" >
                                    <img class="imgaccountcmt"  src=" {{ asset('pictures/avt1.jpg') }}" alt="Mountain View" >
                                </div>
                                <div class="divtextcmt" >
                                    <input class="iptextcmt" id="binhluan-hi157" onKeyPress='submitme(event,"{{ $lstbaiviet[$i]->ma_bai_viet }}")' style="                               
                                                                    margin-top: 5px;
                                                                    width: 498px;
                                                                    background-color: 
                                                                    white;height: 30px;
                                                                    border:solid 1px #c5cfd6;
                                                                    border-radius: 0px;"
                                    placeholder="Viết bình luận..." type="text" >
                                </div>
                            </div>
                        </div>
                    <div>
                 </div>
            </div>
        </div>
        {{--  --}}
       