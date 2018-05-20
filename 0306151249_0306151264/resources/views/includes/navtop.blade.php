
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
                  <button class="tablinks" onclick="openCity(event, 'divnhom')"><i class="fa fa-users" aria-hidden="true"></i>&nbsp;Nhóm</button>
                  <button class="tablinks" onclick="openCity(event, 'divbanbe')"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;Bạn bè</button>
                  <button class="tablinks" onclick="openCity(event, 'divkhac')">Khác&nbsp;<i class="fa fa-chevron-circle-down" aria-hidden="true"></i></button>
                  <div style="width: 100%;height: 44px;border-bottom: solid 1px #9695d8;"></div>
                  </div>

                <div id="divnhom" style="display: block;" class="tabcontent ">
                  <div id="div-content-search-group" style="height: 30px;width: 100%;padding-left: 20%;">
                       <button id="btn-tao-nhom-in-model" class="btn-nhom-menu-dy" onclick="taonhommoi(true)">
                        <i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Tạo nhóm
                       </button>
                  </div>
                 <div id="div-big-content-menu-nhom"> 
                  {{-- div cac nhom da tham gia --}}
                  <div id="div-group-tham-gia">
                    <div style="height: 25px;width: 100%;">
                      <div style="width: 180px; border-top: 1px #9695d8 solid;color: #9596d8;">
                        <h4><span><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;Nhóm đang tham gia:</span></h4>
                      </div>
                    </div>
                      @for ($i = 0; $i < 17; $i++)
                        <div class="div-item-nhom-popup"></div>
                      @endfor
                  </div>
                  {{-- end div cac nhom tham gia --}}
                  {{-- div tao nhom --}}
                  <div id="div-content-tao-nhom" style="display: none;height: : 400px;">
                     <div style="height: 25px;width: 100%;">
                      <div style="width: 180px; border-top: 1px #9695d8 solid;color: white;background-color: #e1bdef">
                        {{-- <h4><span><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;Tạo nhóm:</span></h4> --}}
                      </div>
                    </div>
                    <div style="height: 300px;">
                      <div>
                        <div><h4><i class="fa fa-pencil" aria-hidden="true"></i> &nbsp;Đặt tên nhóm<h4></div>
                        <div>
                          <input style="width: 100%;height: 35px;border:solid 1px #9695d8;padding-left: 5px;" type="text" name="txtTenNhom" id="input-tennhom" placeholder="Ví dụ: CĐTH15C">
                        </div>
                      </div>
                    </div>
                    <div id="div-bottom-tao-nhom" style="width: 100%;height: 90px;border-top: 1px solid #9695d8;padding-top: 20px;">
                      <button id="btn-huy-tao-nhom-in-model" onclick="taonhommoi(false)" style="width: 77px;height: 25px;"  class="btn-nhom-menu-dy" >
                          Hủy bỏ
                       </button>
                       <button id="btn-xac-nhan-tao-nhom-in-model" onclick="submittaonhom()" style="margin-right: 5px;width: 100px;height: 25px;" class="btn-nhom-menu-dy" >
                          Đồng ý
                       </button>
                    </div>
                      
                  </div>
                  {{-- end div tao nhom --}}
                </div>
                </div>

                <div id="divbanbe" class="tabcontent">
                  <h3>Bạn bè</h3>
                 
                </div>

                <div id="divkhac" class="tabcontent">
                  <h3>Khác</h3>
                  
                </div>
            </div>



  </div>

</div>
{{-- end modal --}}
