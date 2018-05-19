
<!-- nav top -->
<head>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/includescss/navtopcss.css') }}">
  <script src="{{ asset('js/includesjs/navtopjs.js') }}" type="text/javascript" charset="utf-8" async defer></script>
</head>
<div class="topnavroot">
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
        <li style="width: 150px;border-right: solid 1px #9695d8;height: 48px;margin-left: 30px;">
          <a class="active" href="/">Trang chủ</a>
        </li>
        <li><a href="#news">Thông báo</a></li>
        <li><a href="#contact">Tạo nhóm</a></li>
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

 {{--  <div id="div-head-popup-show-all-menu" >
    <span class="close">&times;</span>
  </div> --}}
            <div  style="width: 100%;height: 100%;margin-top: 17px; padding-left: 20px;padding-right: 20px;" >
                  <div class="tab">
                  <button class="tablinks" onclick="openCity(event, 'London')"><i class="fa fa-users" aria-hidden="true"></i>&nbsp;Nhóm</button>
                  <button class="tablinks" onclick="openCity(event, 'Paris')"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;Bạn bè</button>
                  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Khác&nbsp;<i class="fa fa-chevron-circle-down" aria-hidden="true"></i></button>
                  <div style="width: 100%;height: 44px;border-bottom: solid 1px #9695d8;"></div>
                  </div>

                <div id="London" class="tabcontent">
                  <div id="div-content-search-group" style="height: 30px;width: 100%;padding-left: 20%;">
                   {{--  <form class="example" action="/action_page.php">
                       <input type="text" placeholder="Search.." name="search">
                       <button type="submit"><i class="fa fa-search"></i></button>
                    </form> --}}
                  </div>
                  @for ($i = 0; $i < 17; $i++)
                    <div class="div-item-nhom-popup"></div>
                  @endfor
                </div>

                <div id="Paris" class="tabcontent">
                  <h3>Bạn bè</h3>
                 
                </div>

                <div id="Tokyo" class="tabcontent">
                  <h3>Khác</h3>
                  
                </div>
            </div>

  {{--   <div id="div-head-popup-show-all-menu" >
      <span class="close">&times;</span>
      <p>Some text in the Modal..</p>
    </div> --}}


  </div>

</div>
{{-- end modal --}}
