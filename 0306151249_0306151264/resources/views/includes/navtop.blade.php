
<!-- nav top -->
<head>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/includescss/navtopcss.css') }}">
  <script src="{{ asset('js/includesjs/navtopjs.js') }}" type="text/javascript" charset="utf-8" async defer></script>
</head>
<div class="topnavroot">
  <div class="topnav" >
    <ul class="navtop-menu">
      <div style="border-right: solid 1px #9695d8; width: 150px; height: 48px; float: left;">
      <li style="margin-left: 30px;"><a class="active" href="/">Trang chủ</a></li>
      </div>
      <li><a href="#news">Thông báo</a></li>
      <li><a href="#contact">xxxxxx</a></li>

      <div  style="float:right;  display: inline-block;" >
        <div class="search-container">
          <form action="/action_page.php">
            <input  type="text" placeholder="Search.." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>
        </div>
        <li><button id="btn-show-dynamic-menu"><i class="fa fa-bars" aria-hidden="true"></i></button></li>

        @if (Auth::check())
          <li ><a  href="#about" title="{{Auth::user()->ho_ten_lot." ".Auth::user()->ten}}"><img width="14px" style="border-radius: 50%" height="14px" src="{{asset('pictures/anh_dai_dien/'.Auth::user()->anh_dai_dien)}}" alt=""></a></li>
          <li ><a  href="{{route('dangxuat')}}">Đăng xuất</a></li>
        @endif
          <li ><a  href="#/">Người dùng A</a></li>



      </div>
    </ul>
  </div>
</div>

{{-- start modal --}}
<div id="div-dynamic-menu" class="modal">

  <!-- Modal content -->
  <div style="height: 500px;width: 500px;background-color: white; margin: auto;border:solid 1px #9695d8;border-radius: 20px;">
  <div id="div-head-popup-show-all-menu" >
    <span class="close">&times;</span>
    <p>Some text in the Modal..</p>
  </div>


  </div>

</div>
{{-- end modal --}}
