@extends('includes.navtop')
@section('NoiDung')
<<<<<<< HEAD
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
            <!--  -->
            <?php
            for ($i=0; $i < 2; $i++) { 
            	@include("includes.baiviet");
            }
             
            ?>
            <!--  -->
        </div>
        
<!--  -->
        <div class="rightnav">
        </div>

    </div>
    <!-- //// -->
@endsection

