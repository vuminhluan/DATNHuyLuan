<nav class="navbar navbar-inverse" role="navigation">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="{{ route('trangchu') }}"><i class="fa fa-cogs"></i> Quản trị hệ thống</a>
  </div>
  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
        <a href="#" class="" id="open-chat-button" ><i class="fa fa-comments"></i><span class="counter"></span></a>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span id="admin-fullname">{{Auth::user()->ho_ten_lot}} {{Auth::user()->ten}}</span> <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="{{ route('admin.taikhoan.chinhsua', [Auth::user()->ten_tai_khoan]) }}"><i class="fa fa-user"></i> Chỉnh sửa tài khoản</a></li>
          <li><a href="{{route('dangxuat')}}"><i class="fa fa-power-off"></i> Đăng xuất</a></li>
        </ul>
      </li>
    </ul>
  </div>
  <!-- /.navbar-collapse -->
</nav>
