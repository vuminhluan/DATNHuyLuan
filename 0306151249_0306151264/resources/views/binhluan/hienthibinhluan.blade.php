<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/lu/binhluan/binhluanbv.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
     $('tarecmt').autoResize();
</script> --}}

<div class="commenttus">
                    <div>
                        <div class="divlikecmt">

                               <div class="divbtnlike">
                                    <a href="#"><h3><i class="fa fa-thumbs-o-up" aria-hidden="true"><strong>&ensp;Thích</strong></i></h3></a>
                                </div>
                             
                                <div class="divbtncmt" >
                                    <a href="#"><h3><i class="fa fa-comment-o" aria-hidden="true" ><strong>&ensp;Bình luận</strong></i></h3></a>
                                </div>
                        </div>





                        {{--tren  --}}
                    <div style="   height: auto; background-color: #f2f3f5 ;border-top: solid 1px #c5cfd6;">
                        <div style="margin-left: 12px;margin-right: 12px; height: 12px;">
                        </div>
                        <div style="border-bottom: solid 1px #c5cfd6;margin-left: 12px;margin-right: 12px; height: 30px;">
                        </div>
                        <div style="margin-left: 12px;margin-right: 12px; height: 90px;">

                            {{-- 1 cmt --}}
                            <div style="height: auto;width: 100%;">
                                <div style="height: 40px;">
                                    <div style="height: auto; width: 7%; float: left;">
                                        <img class="imgaccountcmt"  src=" {{ asset('pictures/avt1.jpg') }}" alt="Mountain View" >
                                    </div>
                                    <div id="tarecmt" style="
                                                 margin-top: 4px;
                                                 width: 90%;
                                                 float: left; 
                                                 background-color: white;
                                                 height: 30px;
                                                 text-align:  justify">
                                               {{--   <textarea style="overflow: auto;width: 100%; height: 100%;" id="tarecmt" >Lu Lu: Không thể tin được :))Lu Lu: Không thể tin được :))Lu Lu: Không thể tin được :))Lu Lu: Không thể tin được :))Lu Lu: Không thể tin được :))Lu Lu: Không thể tin được :))Lu Lu: Không thể tin được :))</textarea> --}}
                                       

                                    </div>
                                    
                                </div>
                                <div style="width: 100%;height: 20px; margin-left: 8%;"><a href="#">Thích . Trả lời</a></div>
                            </div>
                            {{-- end 1 cmt --}}

                        </div>

                    </div>










                        {{-- duoi --}}
                        <div class="divcmt" >

                            <div>
                                <div class="divimgaccountcmt" >
                                    <img class="imgaccountcmt"  src=" {{ asset('pictures/avt1.jpg') }}" alt="Mountain View" >
                                </div>
                                <div class="divtextcmt" >
                                    <input class="iptextcmt" style="margin-top: 5px;
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
       