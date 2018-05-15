@extends('master.adminmasterpage')

@section('admin_content')


  <div id="main">
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="fa fa-home"></i> Trang quản trị</a></li>
      <li class="active"><a href="user.html">Giới tính</a></li>
      <li class="active"><a href="new-user.html">Thêm giới tính mới</a></li>
    </ol>
    <div class="col-xs-12">
      <form id="admin-form" class="form-horizontal col-xl-8 col-lg-9 col-md-10" method="post" action="{{route('admin.gioitinh.post_them')}}" role="form">
        @csrf
        <div class="form-group">
          <label for="gender" class="col-sm-3 control-label required">Tên giới tính</label>
          <div class="col-sm-9">
            <input name="gender" type="text" value="" class="form-control" id="gender" placeholder="Tên giới tính" required="" maxlength="255">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
            <button type="submit" class="btn btn-submit"><small><i class="fa fa-plus"></i></small> Thêm mới</button>
            <a class="btn btn-warning" href="#"><small><i class="fa fa-reply"></i></small> Trở về</a>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!--END #main-->
@endsection
