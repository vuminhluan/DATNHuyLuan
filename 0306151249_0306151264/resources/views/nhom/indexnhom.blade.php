
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
       
        <div class="content"  >
          <div>
            @include('baiviet.dangbaiviet')
         </div>
            <!--  -->
           
          @for ($i = 0; $i < (int)$s  ; $i++)
               @include('includes.baiviet')
          @endfor
         
          

                
           
          

          
            <!--  -->
        </div>
        
<!--  -->
        <div class="rightnav">
        </div>

    </div>
    <!-- //// -->
@endsection

