
<!-- nav top -->
<div class="topnavroot">
  <div class="topnav" >
    <ul class="navtop-menu">
      <li><a class="active" href="#home">Trang chủ</a></li>
      <li><a href="#news">Thông báo</a></li>
      <li><a href="#contact">Tin nhắn</a></li>
      <div  style="float:right;  display: inline-block;" >
        <div class="search-container">
          <form action="/action_page.php">
            <input  type="text" placeholder="Search.." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>
        </div>
        @if (Auth::check())
          <li ><a  href="#about">{{Auth::user()->ten_tai_khoan}} remember</a></li>
        @endif

        <li ><a  href="{{route('dangxuat')}}">Đăng xuất</a></li>

      </div>
    </ul>
  </div>
</div>
