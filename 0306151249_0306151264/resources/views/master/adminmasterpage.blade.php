<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel='icon' href='{{ asset('pictures/logo/favicon.png') }}' type='image/png'/ >
  <title>Quản trị hệ thống</title>
  <link href="{{asset('css/bootstrap3.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/admin/admin.css')}}" rel="stylesheet">
  <link href="{{asset('css/admin/admin-chat.css')}}" rel="stylesheet">
  

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
  

  {{-- Admin chat sidebar --}}
  
  <div class="admin-chat-sidebar" id="admin-chat-sidebar">
    <h2 class="text-center" style="border-bottom: 1px solid #eee">CHAT <span id="close-chat-button" class="pull-right"><i class="fa fa-caret-left"></i></span></h2>
    <div class="content">
      <div class="chat-list" id="chat-list">

        {{-- <div class="pull-left item" title="Thời gian">
          <div class="pull-left item-left">
            <label for="">Người A</label>
            <p>tin nhắn mẫu 1.</p>
          </div>
        </div>
        <div class="pull-right item own" title="Thời gian">
          <div class="pull-right item-right">
            <label for="">Người B</label>
            <p>Tin nhắn mẫu 2.</p>
          </div>
        </div> --}}
        @if (session('admin-chat'))
          @php
            $list_chat = session('admin-chat');

          @endphp
          @for ($i = count($list_chat)-1; $i >= 0 ; $i--)
            @if ($list_chat[$i]['name'] == Auth::user()->ho_ten_lot." ".Auth::user()->ten)
              <div class="pull-right item own" title="">
                <div class="pull-right item-right">
                  <label for="">{{$list_chat[$i]['name']}}</label>
                  <p>{!!$list_chat[$i]['message']!!}</p>
                </div>
              </div>
            @else
              <div class="pull-left item" title="{{$list_chat[$i]['time']}}">
                <div class="pull-left item-left">
                  <label for="">{{$list_chat[$i]['name']}}</label>
                  <p>{{$list_chat[$i]['message']}}</p>
                </div>
              </div>
            @endif
          @endfor
        @endif
        


        {{-- <p class="text-center notification" id="notification"><i>Someone is typing...</i></p> --}}
      </div>


      
    </div>

    <div class="chat">
      <textarea class="chat-box" id="chat-box" name=""></textarea><br>
      @csrf
      <button class="send-chat-button btn btn-primary btn-block" id="send-chat-button">Gửi</button>
      <button class="send-chat-button btn btn-danger btn-block" id="delete-chat-button">Xóa</button>
    </div>

  </div>


  {{-- End Admin chat sidebar --}}


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


  
  <script src="{{ asset('node_modules/socket.io/node_modules/socket.io-client/dist/socket.io.js') }}"></script>
  <script type="text/javascript" src="{{asset('js/admin/admin-chat.js')}}"></script>

  <script type="text/javascript" src="{{asset('js/libs/moment.min.js')}}"></script>

  <script>
    // alert(moment().calendar());
  </script>



  <script>
    {{-- Tạo loader cho tất cả các trang admin Phải tạo bên ngoài ready function jquery vì nếu để ở trong mỗi lần refresh trang hình loader sẽ bị giật giật do phải render css --}}
    var loaderPath = "{{ asset('pictures/luan/ajax-loader2.gif') }}";
    $('.myloader img').attr('src', loaderPath);
  </script>

  @yield('javascript')
</body>
</html>
