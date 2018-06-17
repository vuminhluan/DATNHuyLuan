<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="favicon.png">
  <title>Quản trị hệ thống</title>
  <link href="{{asset('css/bootstrap3.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/admin/admin.css')}}" rel="stylesheet">
  

  <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
  <![endif]-->

  @yield('css')
</head>
<body>
  
  <div class="myloader">
    {{-- <img src="{{ asset('pictures/luan/ajax-loader2.gif') }}" alt=""> --}}
    <img src="" alt="">
  </div>

  <div class="slidedown-alert {{session('slidemessage') ? 'slidedown-alert-animation' : '' }}">
    <div class="--content">
      <p class="baomoi">Thông báo: {{session('slidemessage')}}</p>
    </div>
  </div>

  @include('includes.admin.topnavbar')

  <div class="clearfix">
    @include('includes.admin.sidebar')
    @yield('admin_content')
  </div>

  <script type="text/javascript" src="{{asset('js/jquery/jquery3.3.1.js')}}"></script>
  <script src="{{asset('js/jquery/jquery-validate.min.js')}}" charset="utf-8"></script>
  <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/admin/admin.js')}}"></script>
  <script type="text/javascript" src="{{ asset('js/globaljs/varglobal.js') }}" charset="utf-8"></script>

  <script>
    {{-- Tạo loader cho tất cả các trang admin Phải tạo bên ngoài ready function jquery vì nếu để ở trong mỗi lần refresh trang hình loader sẽ bị giật giật do phải render css --}}
    var loaderPath = "{{ asset('pictures/luan/ajax-loader2.gif') }}";
    $('.myloader img').attr('src', loaderPath);

  </script>

  @yield('javascript')
</body>
</html>
