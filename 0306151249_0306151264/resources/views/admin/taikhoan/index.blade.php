@extends('master.adminmasterpage')

@section('admin_content')


  <div id="main">
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="fa fa-home"></i> Trang quản trị</a></li>
      <li class="active"><a href="user.html">Tài khoản</a></li>
    </ol>
    <div class="col-xs-12">
      <form id="admin-form" method="post" action="" role="form">
        <div class="col-xs-12">
          <div class="form-group">
            <!-- Single button -->
            <div class="btn-group">
              <select id="task" name="task" class="form-control">
                <option>Tác vụ</option>
                <option value="delete">Xóa tài khoản</option>
                <option value="deactive">Khóa</option>
                <option value="active">Mở khóa</option>
              </select>
            </div>
            <a href="{{route('admin.taikhoan.them')}}" class="btn btn-submit"><small><i class="fa fa-plus"></i></small> Thêm mới</a>
            <div class="btn-group pull-right hidden-xs" id="div-search">
              <input id="search" name="search" type="text" value="" class="form-control" placeholder="Tìm kiếm">
              <span class="fa fa-search"></span>
            </div>
          </div>
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th><input id="check_all" type="checkbox"></th>
                <th class="hidden-xs">ID</th>
                <th>Tài khoản</th>
                <th class="hidden-xs">Email</th>
                <th class="hidden-sm hidden-xs">Ngày tạo</th>
                <th>Sửa</th>
                <th>Tình trạng</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($tatca_taikhoan as $taikhoan)
              <tr>
                <td>
                  <input name="id[]" type="checkbox" value="0">
                </td>
                <td class="hidden-xs">1</td>
                <td>
                  <a href="new-type_product.html">{{$taikhoan->ten_tai_khoan}}</a>
                </td>
                <td class="hidden-xs">{{$taikhoan->email}}</td>
                <td class="hidden-sm hidden-xs">{{date_format($taikhoan->thoi_gian_tao, 'd/m/Y H:i:s')}}</td>
                <td>
                  <a href="new-type_product.html"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Sửa tài khoản"></i></a>
                </td>
                <td>
                  <i class="fa fa-check text-success" data-toggle="tooltip" data-placement="top" title="Đang hoạt động"></i>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <div>
            {{$tatca_taikhoan->links()}}
          </div>
          {{-- <div class="text-right">
            <ul class="pagination" id="step5">
              <li class="disabled"><span>«</span></li>
              <li class="active"><span>1</span></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">»</a></li>
            </ul>
          </div> --}}
          <p><strong><i class="fa fa-bookmark"></i>Ghi chú: </strong></p>
          <p class="note-items"><i class="fa fa-check text-success"></i> Tài khoản đang hoạt động.</p>
          <p class="note-items"><i class="fa fa-times text-danger"></i> Tài khoản bị khóa.</p>
        </div>
      </form>
    </div>
  </div>

  <!--END #main-->
@endsection
