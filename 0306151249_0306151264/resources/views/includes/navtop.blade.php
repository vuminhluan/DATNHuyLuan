
<!-- nav top -->
<head>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/includescss/navtopcss.css') }}">
  <script src="{{ asset('js/includesjs/navtopjs.js') }}" type="text/javascript" charset="utf-8" async defer></script>
</head>
<div class="topnavroot">
  @csrf
  <div class="topnav" >
    {{-- <ul class="navtop-menu">
      <div style="border-right: solid 1px #9695d8; width: 150px; height: 48px; float: left;">
       <li style="margin-left: 30px;"><a class="active" href="#home">Trang chủ</a></li>
       </div>
      <li><a href="#news">Thông báo</a></li>
      <li><a href="#contact">Tạo nhóm</a></li>
    </ul> --}}
    <nav class="navtop-menu">

      
      {{-- Menu trái --}}
      <ul class="navtop-left">
        <li style="width: 150px;height: 48px;margin-left: 30px;">
          <a class="active" href="{{ route('trangchu') }}">Trang chủ</a>
        </li>
        <li><a id="li-nav-nhom">Nhóm</a></li>
       {{--  <li><a id="li-nav-taonhom">xxxxx</a></li> --}}
      </ul>
      {{-- End Menu trái --}}

      {{-- Menu phải --}}
      <ul class="navtop-right">
        {{-- <li class="search-container">
          <form action="/action_page.php">
            <input id="topnav-search"  type="text" placeholder="Search.." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>
        </li> --}}
        {{-- đây là cái menu động --}}
        <li><button id="btn-show-dynamic-menu"><i class="fa fa-bars" aria-hidden="true"></i></button></li>
        {{-- end menu động --}}

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
              {{-- $taikhoan->nguoi_dung->ten_cot --}}
            </li>
          </ul>
        </li>
        <li><input type="hidden" id="session-ma-tk" value="{{Auth::user()->ma_tai_khoan}}"></li>
        @endif
      </ul>
      {{-- End Menu phải --}}

    </nav>
  </div>
</div>





{{-- start modal --}}
<div id="div-dynamic-menu" class="modal">

  <!-- Modal content -->
 {{-- @include ('includes.content-menu-popup'); --}}

</div>

<script>
  // alert($('#session-ma-tk').val());
</script>
{{-- end modal --}}
