<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css\style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!-- nav top -->
<div class="topnavroot">
<div class="topnav" >
<ul>
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
  <li ><a  href="#about">Người dùng A</a></li>
  </div>
</ul>
</div>
</div>
        <!-- end nav top  -->
   @yield('NoiDung');
</body>
</html>
