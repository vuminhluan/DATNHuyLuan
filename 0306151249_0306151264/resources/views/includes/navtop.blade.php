
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
          <li ><a  href="#about" title="{{Auth::user()->ho_ten_lot." ".Auth::user()->ten}}"><img width="14px" style="border-radius: 50%" height="14px" src="{{asset('pictures/anh_dai_dien/'.Auth::user()->anh_dai_dien.'')}}" alt=""></a></li>
          <li ><a  href="{{route('dangxuat')}}">Đăng xuất</a></li>
        @endif
          <li ><a  href="#/">Người dùng A</a></li>



      </div>
    </ul>
  </div>
</div>
