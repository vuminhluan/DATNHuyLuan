
@extends('master.masterpage')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/lu/nhom/nhomcss.css') }}">
@endsection
@section('javascript')
<script src="{{ asset('js/jslu/nhom/nhomjs.js') }}" type="text/javascript" charset="utf-8" async defer></script>
@endsection
@section('main')
 <!-- body -->
  <div>
    <div style="font-size: 30px;text-align: center;text-align: center;">
     <div style="margin-top: 100px;text-align: center;padding: 30px;font-weight: bold;text-shadow: 12px 12px 15px #9695d8;color: #8636d6;background-color: white;border-radius: px;border:solid 1px #9695d8;width: 36%;margin-left: 36%">
      <ion-icon style="font-size: 60px;margin-top: -20px;margin-right:10px;position: absolute;" name="search" size="big"></ion-icon>
        <span style="margin-left: 56px;" >Chưa tìm thấy trang này!</span> 
    </div>
    </div>
    <script>
      $("#bodymaster").css("background-color","white");
    </script>
  </div>
    <!-- //// -->
@endsection

