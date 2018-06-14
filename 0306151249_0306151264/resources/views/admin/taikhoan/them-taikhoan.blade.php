@extends('master.adminmasterpage')

@section('admin_content')


  <div id="main">
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="fa fa-home"></i> Trang quản trị</a></li>
      <li class="active"><a href="user.html">Tài khoản</a></li>
      <li class="active"><a href="new-user.html">Thêm tài khoản mới</a></li>
    </ol>
    <div class="col-xs-12">
      <form id="admin-add-account-form" class="form-horizontal col-xl-8 col-lg-9 col-md-10" method="post" action="" role="form">
        <input name="id" type="hidden" value="0">
        <div class="form-group">
          <label for="familyname" class="col-sm-3 control-label required">Họ tên lót</label>
          <div class="col-sm-9">
            <input name="familyname" type="text" value="" class="form-control" id="familyname" placeholder="Họ tên lót">
          </div>
        </div>
        <div class="form-group">
          <label for="firstname" class="col-sm-3 control-label required">Tên</label>
          <div class="col-sm-9">
            <input name="firstname" type="text" value="" class="form-control" id="firstname" placeholder="Tên">
          </div>
        </div>
        <div class="form-group">
          <label for="username" class="col-sm-3 control-label required">Tên tài khoản</label>
          <div class="col-sm-9">
            <input name="username" type="text" value="" class="form-control" id="username" placeholder="Tên tài khoản">
          </div>
        </div>
        <div class="form-group">
          <label for="email" class="col-sm-3 control-label required">Email</label>
          <div class="col-sm-9">
            <input name="email" type="email" value="" class="form-control" id="email" placeholder="Email" >
          </div>
        </div>
        <div class="form-group">
          <label for="password" class="col-sm-3 control-label required">Mật khẩu</label>
          <div class="col-sm-9">
            <input name="password" type="password" value="" class="form-control" id="password" placeholder="Mật khẩu">
          </div>
        </div>
        <div class="form-group">
          <label for="reenter_password" class="col-sm-3 control-label required">Nhập lại mật khẩu</label>
          <div class="col-sm-9">
            <input name="reenter_password" type="password" value="" class="form-control" id="reenter_password" placeholder="Nhập lại mật khẩu">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
            <button type="submit" class="btn btn-submit"><small><i class="fa fa-plus"></i></small> Thêm mới</button>
            {{-- <a class="btn btn-warning" href="#"><small><i class="fa fa-reply"></i></small> Trở về</a> --}}
          </div>
        </div>
      </form>
    </div>
  </div>

  <!--END #main-->
@endsection

@section('javascript')
  <script src="{{asset('js/jquery/jquery-validate.min.js')}}" charset="utf-8"></script>
  <script src="{{ asset('js/admin/admin-account.js') }}"></script>
@endsection
