
<!-- nav top -->
<head>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/includescss/navtopcss.css') }}">
  <script src="{{ asset('js/includesjs/navtopjs.js') }}" type="text/javascript" charset="utf-8" async defer></script>
</head>
<div class="topnavroot">
  <div class="topnav" >
    <nav class="navtop-menu">
      
      {{-- Menu trái --}}
      <ul class="navtop-left">
        <li style="width: 150px;border-right: solid 1px #9695d8;height: 48px;margin-left: 30px;">
          <a class="active" href="/">Trang chủ</a>
        </li>
        <li><a href="#news">Thông báo</a></li>
        <li><a href="#contact">xxxxxx</a></li>
      </ul>
      {{-- End Menu trái --}}

      {{-- Menu phải --}}
      <ul class="navtop-right">
        <li class="search-container">
          <form action="/action_page.php">
            <input id="topnav-search"  type="text" placeholder="Search.." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>
        </li>
        
        <li><button id="btn-show-dynamic-menu"><i class="fa fa-bars" aria-hidden="true"></i></button></li>

        @if (Auth::check())
        <li class="taikhoan-dropdown-content">
          <a  href="#about"  title="{{Auth::user()->ho_ten_lot." ".Auth::user()->ten}}">
            <img src="{{asset('pictures/anh_dai_dien/'.Auth::user()->anh_dai_dien)}}" alt="">
          </a>
          <ul class="taikhoan-dropdown-menu">
            <li>
              <a href="{{route('trangcanhan.index', Auth::user()->ten_tai_khoan)}}">
                <h3>{{Auth::user()->ho_ten_lot." ".Auth::user()->ten}}</h3>
                <p>{{'@'.Auth::user()->ten_tai_khoan}}</p>
              </a>
            </li>
            <li>
              <a href="{{route('caidat.index')}}"><i class="fa fa-cogs"></i> Cài đặt</a>
              <a href="{{route('lienhe')}}"><i class="fa fa-envelope"></i> Liên hệ</a>
            </li>
            <li>
              <a href="{{route('dangxuat')}}"><i class="fa fa-sign-out"></i> Đăng xuất</a>
            </li>
          </ul>
        </li>
        @endif
        <li ><a  href="#/">Người dùng A</a></li>
      </ul>
      {{-- End Menu phải --}}

    </nav>
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
