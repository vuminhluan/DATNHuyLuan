
@extends('master.masterpage')
@section('main')
 <!-- body -->
    <div class="topnav contentmain  ">
<!-- ảnh bìa -->
<div id="anhbia">
</div>
<!-- end ảnh bìa -->
       <div class="leftnav" >
         <div id="thongtincuanhom"></div>
         <div id="thongtinkhaccuanhom"></div>
        </div>
        
<!--  -->
       
        <div id="divcontent" class="content"  >
          <div id="divdangbaiviet">
            @include('baiviet.dangbaiviet')
            {{-- <div id="baivietmoidang" style="width: 100%;height: 50px;background-color: red;"></div> --}}
         </div>
         <div id="divnoidungcon">

            <!--  -->
           
          @for ($i = 0; $i < count($lstbaiviet) ; $i++)
               @include('baiviet.hienthibaiviet')
          @endfor
          </div>
            <!--  -->
        </div>
        
<!--  -->
        <div class="rightnav">
        </div>

    </div>
    <!-- //// -->
@endsection

