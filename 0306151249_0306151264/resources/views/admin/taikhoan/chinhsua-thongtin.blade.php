@extends('master.adminmasterpage')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/admin/admin-account.css') }}">
@endsection

@section('admin_content')

  {{-- --}}

  <div id="main">
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="fa fa-home"></i> Trang quản trị</a></li>
      <li class="active"><a href="user.html">Tài khoản</a></li>
      <li class="active"><a href="user.html">{{'@'.Auth::user()->ten_tai_khoan}}</a></li>
    </ol>
    <div class="col-xs-12">
      <div class="grid">
        <div class="left">
          <div class="change-password-box">
            <h4 class="title">Đổi mật khẩu</h4>
            <div>
              <form action="{{ route('admin.taikhoan.capnhat.post', ['change-password']) }}" method="POST" id="change-password-form">
                @csrf
                <input type="hidden" value="{{$taikhoan->ma_tai_khoan}}" name="id">
                <div class="form-group">
                  <label for="cur-password">Mật khẩu hiện tại:</label>
                  <input type="password" class="form-control" id="cur-password" name="cur_password">
                </div>
                <div class="form-group">
                  <label for="new-password">Mật khẩu mới:</label>
                  <input type="password" class="form-control" id="new-password" name="new_password">
                </div>
                <div class="form-group">
                  <label for="reenter-password">Nhập lại mật khẩu:</label>
                  <input type="password" class="form-control" id="reenter-password" name="reenter_password">
                </div>
                <button type="submit" class="btn btn-primary submitform-button">Submit</button>
              </form>
            </div>
          </div>

          @if ($taikhoan->ma_tai_khoan == Auth::user()->ma_tai_khoan && $taikhoan->quyen != "Q0001")
            <div class="deactive-account-box">
              <h4 class="title">Vô hiệu hóa tài khoản</h4>
              <div>
                <form action="{{ route('admin.taikhoan.capnhat.post', ['deactive-account']) }}" id="deactive-account-form" method="POST">
                  @csrf
                <input type="hidden" value="{{$taikhoan->ma_tai_khoan}}" name="id">
                  <div class="form-group">
                    <label for="password">Xác nhận mật khẩu:</label>
                    <input type="password" class="form-control" id="password" name="password">
                  </div>
                  <button type="submit" id="deactive-account-button" class="btn btn-danger submitform-button">Submit</button>
                </form>
              </div>
            </div>
          @endif
        </div>
        <div class="right">
          <div class="basic-info">
            <h4 class="title">Thông tin cơ bản</h4>
            <div>
              <form action="{{ route('admin.taikhoan.capnhat.post', ['basic-info']) }}" id="change-basic-info-form" method="POST">
                @csrf
                <input type="hidden" value="{{$taikhoan->ma_tai_khoan}}" name="id">
                <div class="form-group">
                  <label for="familyname">Họ tên đệm:</label>
                  <input type="text" class="form-control" value="{{$taikhoan->ho_ten_lot}}" id="familyname" name="familyname">
                </div>
                <div class="form-group">
                  <label for="firstname">Tên:</label>
                  <input type="text" class="form-control" value="{{$taikhoan->ten}}" id="firstname" name="firstname">
                </div>
                <div class="form-group">
                  <label for="birthday">Ngày sinh (tháng / ngày / năm):</label>
                  <input type="date" class="form-control" id="birthday" name="birthday" value="{{$taikhoan->hasNguoiDung->ngay_sinh}}">
                  
                </div>
                <div class="form-group">
                  <label class="radio-inline"><input type="radio" name="gender" {{$taikhoan->hasNguoiDung->ma_gioi_tinh == 1 ? "checked" : "checked"}} value="1">Nam</label>
                  <label class="radio-inline"><input type="radio" name="gender" {{$taikhoan->hasNguoiDung->ma_gioi_tinh == 2 ? "checked" : ""}} value="2">Nữ</label>
                </div>
                <button type="submit" class="btn btn-primary submitform-button">Submit</button>
              </form>
            </div>
          </div>

          <div class="contact-info">
            <h4 class="title">Thông tin Liên hệ</h4>
            <div>
              <form action="{{ route('admin.taikhoan.capnhat.post', ['contact-info']) }}" id="change-contact-info-form" method="POST">
                @csrf
                <input type="hidden" value="{{$taikhoan->ma_tai_khoan}}" name="id">
                <div class="form-group">
                  <label for="username">Tên tài khoản:</label>
                  <input type="text" class="form-control" id="username" name="username" value="{{old('username') ? old('username') : $taikhoan->ten_tai_khoan}}">
                </div>
                <div class="form-group">
                  <label for="contact-email">Email:</label>
                  <input type="email" class="form-control" id="contact-email" name="email" value="{{old('email') ? old('email') : $taikhoan->email}}">
                </div>
                <div class="form-group">
                  <label for="phone">Số điện thoại:</label>
                  <input type="text" class="form-control" id="phone" name="phone" value="{{$taikhoan->so_dien_thoai}}">
                </div>
                <button type="submit" class="btn btn-primary submitform-button">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--END #main-->
@endsection


@section('javascript')

  <script src="{{ asset('js/admin/admin-account.js') }}"></script>
@endsection
