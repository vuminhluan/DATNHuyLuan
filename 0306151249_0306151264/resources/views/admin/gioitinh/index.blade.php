@extends('master.adminmasterpage')

@section('admin_content')


  <div id="main">
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="fa fa-home"></i> Trang quản trị</a></li>
      <li class="active"><a href="user.html">Giới tính</a></li>
    </ol>
    <div class="col-xs-12">
      <form id="admin-form" method="post" action="#/" role="form">
        <div class="col-xs-12">
          <div class="form-group">
            <!-- Single button -->
            <div class="btn-group">
              <select id="task" name="task" class="form-control">
                <option>Tác vụ</option>
                <option value="deactive">Khóa</option>
                <option value="active">Mở khóa</option>
              </select>
            </div>
            <a href="{{route('admin.gioitinh.get_them')}}" class="btn btn-submit"><small><i class="fa fa-plus"></i></small> Thêm mới</a>
            <div class="btn-group pull-right hidden-xs" id="div-search">
              <input id="search" name="search" type="text" value="" class="form-control" placeholder="Tìm kiếm">
              <span class="fa fa-search"></span>
            </div>
          </div>
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th><input id="check_all" type="checkbox"></th>
                <th class="hidden-xs">Mã</th>
                <th class="">Giới tính</th>
                <th class="hidden-sm hidden-xs">Người tạo</th>
                <th class="hidden-sm hidden-xs">Người Sửa</th>
                <th class="hidden-sm hidden-lg hidden-md">Thông tin</th>
                {{-- <th class="hidden-lg">Thời gian sửa</th> --}}
                <th>Sửa</th>
                <th>Tình trạng</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($tatca_gioitinh as $gioitinh)
                <tr>
                  <td>
                    <input name="id[]" type="checkbox" value="0">
                  </td>
                  <td class="hidden-xs">{{$gioitinh->ma_gioi_tinh}}</td>
                  <td>
                    <a href="#/">{{$gioitinh->ten_gioi_tinh}}</a>
                  </td>
                  <td class="hidden-xs">{{$gioitinh->hoten_nguoitao}}</td>
                  <td class="hidden-xs">{{$gioitinh->hoten_nguoisua}}</td>
                  <td class="hidden-sm hidden-lg hidden-md">
                    <a href="#/">Thông tin</a>
                  </td>
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
          <div class="text-right">
            <ul class="pagination" id="step5">
              <li class="disabled"><span>«</span></li>
              <li class="active"><span>1</span></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">»</a></li>
            </ul>
          </div>
          <p><strong><i class="fa fa-bookmark"></i>Ghi chú: </strong></p>
          <p class="note-items"><i class="fa fa-check text-success"></i> Tài khoản đang hoạt động.</p>
          <p class="note-items"><i class="fa fa-times text-danger"></i> Tài khoản bị khóa.</p>
        </div>
      </form>
    </div>
  </div>

  <!--END #main-->
@endsection
