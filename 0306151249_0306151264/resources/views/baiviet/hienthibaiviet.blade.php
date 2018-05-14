<head>
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
</head>


            <div class="subcontent" >
                <!--  -->
                 <div class="headtus" style=" height: 60px;  " >
                    <div style="width: 40px; height:40px; margin-top: 15px; margin-left: 15px; float: left; " >
                      <img style="width: 40px; height: 40px; border-radius: 50%;"
                       src=" {{ asset('pictures/avt1.jpg') }}" alt="Mountain View">
                    </div>
                    <div style="float:left; margin-left:20px;">
                      <span> <h3 style="margin-top: 20px;margin-bottom:0px;">  {{ $t }} </h3> </span><br>
                      <span> <h5 style="margin-top: -22px; color:#ccc"> 22/02/2018 18:07 </h5> <span>
                    </div>
                 </div>
                 <!--  -->
                 <div class="bodytus" style="padding-left: 12px; height: auto; width: auto;  ">
                    <div class="texttus" style="margin-bottom: 7px; margin-top: 5px;font-family: inherit;">
                        <span><h4>{{$lstbaiviet[$i]->noi_dung_bai_viet}}</h4></span>
                    </div>
                    <div class="imagetus">
                        <img style="width: 536px; height: 357px;"
                       src=" {{ asset('pictures/avt1.jpg') }}" alt="Mountain View">
                    </div>

                 </div>
                 <!--  -->
                 <div class="foottus">

                 </div>
                 <!--  -->
                 <div class="commenttus">
                    <div>
                        <div class="like-cmt" style="border-top: solid 1px #c5cfd6; margin-left: 12px;margin-right: 12px;">
                                <div style="float: left;width: 47%;margin-left: 1%;margin-right: 1%">
                              
                                    <i class="fal fa-thumbs-up"></i>
                                </div>
                                <div style="float: left;width: 47%;margin-left: 1%;margin-right: 1%">
                                    <i class="fal fa-thumbs-up"></i>
                                </div>
                        </div>
                    <div>
                 </div>

            </div>
            <!--  -->
