@extends('master.adminmasterpage')

@section('admin_content')


  <div id="main"><!--Phần chứa nội dung chính-->

    <ol class="breadcrumb">
      <li><a href="index.html"><i class="fa fa-home"></i> Trang quản trị</a></li>
    </ol>

    <div class="col-xs-12">
      <div class="menu">
        <a href="{{ route('trangchu') }}" class="col-md-2 col-sm-5 col-xs-5">
          <i class="fa fa-home"></i><br> <span>Trang quản trị</span>
        </a>
        {{-- <a href="post.html" class="col-md-2 col-sm-5 col-xs-5">
          <i class="fa fa-edit"></i><br> <span>Tin tức</span>
        </a>
        <a href="product.html" class="col-md-2 col-sm-5 col-xs-5">
          <i class="fa fa-fire"></i><br> <span>Sản phẩm</span>
        </a>
        <a href="type_product.html" class="col-md-2 col-sm-5 col-xs-5">
          <i class="fa fa-bars"></i><br> <span>Loại sản phẩm</span>
        </a> --}}
        <a href="{{ route('admin.phanhoi') }}" class="col-md-2 col-sm-5 col-xs-5">
          <i class="fa fa-envelope-o"></i><br> <span>Phản hồi</span>
        </a>
        <a href="{{ route('admin.baocao') }}" class="col-md-2 col-sm-5 col-xs-5">
          <i class="fa fa-bug"></i><br> <span>Báo cáo</span>
        </a>
        <a href="{{route('admin.taikhoan')}}" class="col-md-2 col-sm-5 col-xs-5">
          <i class="fa fa-user"></i><br> <span>Tài khoản</span>
        </a>
        <a href="{{ route('admin.baiviet') }}" class="col-md-2 col-sm-5 col-xs-5">
          <i class="fa fa-book"></i><br> <span>Bài viết</span>
        </a>
        <a href="{{ route('admin.nhom') }}" class="col-md-2 col-sm-5 col-xs-5">
          <i class="fa fa-group"></i><br> <span>Nhóm</span>
        </a>
      </div>
    </div>
  </div>


  {{-- <form action="#/" id="formpost">
    @csrf
    <input type="text" id="username" name="username" value="">
    <button id="btn-register">ajax submit</button>
  </form>

  <div id="data"><!-- Chỗ này để tí dùng hàm debug kết quả --></div> --}}
  <!--END #main-->
@endsection


{{-- @section('javascript')

  <script>

  $(document).ready(function() {
    $('#btn-register').click(function(event) {
      event.preventDefault();

      $.ajax({
        url: "/register",
        type: 'POST',
        data: {_token: $('input[name=_token]').val(), username: $('#username').val() }
      })
      .done(function(data) {
        $('#data').html(data);
      })

    });
  });

  </script>
@endsection --}}
