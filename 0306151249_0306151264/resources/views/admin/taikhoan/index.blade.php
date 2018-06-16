@extends('master.adminmasterpage')

@section('admin_content')

  {{-- --}}

  <div id="main">
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="fa fa-home"></i> Trang quản trị</a></li>
      <li class="active"><a href="user.html">Tài khoản</a> <span class="badge">{{$tatca_taikhoan->total()}}</span>  </li>
    </ol>
    <div class="col-xs-12">
      <form id="post_form" method="post" action="{{ route('admin.taikhoan.capnhat') }}" role="form">
        @csrf
        <div class="col-xs-12">
          <div class="form-group">
            <!-- Single button -->
            <div class="btn-group">
              <select id="task" name="task" class="form-control">
                <option>Tác vụ</option>
                {{-- <option value="delete">Xóa tài khoản</option> --}}
                <option value="account-inactivate">Chưa kích hoạt</option>
                <option value="account-live">Đang hoạt động</option>
                <option value="account-ban">Đánh dấu vi phạm</option>
                <option value="account-lock">Khóa</option>
                @if (Auth::user()->quyen == "Q0001")
                  <option value="account-deactivate">Hủy kích hoạt</option>
                @endif
                
                {{-- <option value="deactivate">Hủy kích hoạt</option> --}}
              </select>
            </div>
            @if (Auth::user()->quyen == "Q0001")
              <div class="btn-group">
                <select id="filter" name="filter_role" class="form-control">
                  <option value="{{false}}">Lọc</option>
                  {{-- <option value="delete">Xóa tài khoản</option> --}}
                  <option value="Q0002">Người dùng</option>
                  <option value="Q0003">Mod</option>
                </select>
              </div>

              <a href="{{route('admin.taikhoan.them')}}" class="btn btn-submit"><small><i class="fa fa-plus"></i></small> Thêm mới</a>
            @endif
            <div class="btn-group pull-right hidden-xs" id="div-search">
              <input id="search" name="search" type="text" value="" class="form-control" placeholder="Tên tài khoản">
              <span class="fa fa-search"></span>
            </div>
          </div>
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th><input id="check_all" type="checkbox"></th>
                {{-- <th class="hidden-xs">ID</th> --}}
                <th>Tài khoản</th>
                <th class="hidden-xs">Email</th>
                <th class="hidden-sm hidden-xs">Ngày tạo</th>
                {{-- <th>Sửa</th> --}}
                <th>Tình trạng</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($tatca_taikhoan as $taikhoan)
              <tr>
                <td>
                  <input name="id[]" type="checkbox" value="{{$taikhoan->ma_tai_khoan}}">
                </td>
                <td style="text-align: left;">
                  <a href="javascript:void(0)" class="detail-account" id="{{$taikhoan->ma_tai_khoan}}" data-toggle="modal" data-target=".show-detail-account-modal">
                    {{'@'.$taikhoan->ten_tai_khoan}}
                    @if ($taikhoan->quyen == 'Q0003')
                      <i class="fa fa-star"></i>
                    @endif

                  </a>
                </td>
                <td class="hidden-xs">{{$taikhoan->email}}</td>
                <td class="hidden-sm hidden-xs">{{date_format($taikhoan->thoi_gian_tao, 'd/m/Y H:i:s')}}</td>
                {{-- <td>
                  <a href="new-type_product.html"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Sửa tài khoản"></i></a>
                </td> --}}
                <td>
                  @if ($taikhoan->trang_thai == 1)
                    <i class="fa fa-bolt text" style="color: #d0d32c" data-toggle="tooltip" data-placement="top" title="Chưa kích hoạt"></i>
                  @elseif ($taikhoan->trang_thai == 2)
                    <i class="fa fa-check text-success" data-toggle="tooltip" data-placement="top" title="Đang hoạt động"></i>
                  @elseif ($taikhoan->trang_thai == 3)
                    <i class="fa fa-lock text-danger" data-toggle="tooltip" data-placement="top" title="Tài khoản bị khóa"></i>
                  @elseif ($taikhoan->trang_thai == 4)
                    <i class="fa fa-times text-danger" data-toggle="tooltip" data-placement="top" title="Tài khoản đã bị vô hiệu hóa (xóa)"></i>
                  @else
                    <i class="fa fa-ban text-danger" data-toggle="tooltip" data-placement="top" title="Tài khoản vi phạm"></i>
                  @endif
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{-- paginate --}}
          {{-- <span>( {{$tatca_taikhoan->total()}} )</span> --}}
          <div>

            <div class="pagination" style="font-size: 17px;">
              @if ($tatca_taikhoan->currentPage() != 1)
                <a href="{{$tatca_taikhoan->previousPageUrl()}}" class="page-link"><i class="fa fa-caret-left"></i></a>
              @endif

              {{-- <span class="page-number"> <input id="current-page" type="text" value="{{$tatca_taikhoan->currentPage()}}"> / <span id="total-page">{{$tatca_taikhoan->total()}}</span></span> --}}

              <span class="page-number">
                <select name="page_list" id="page-list" style="" >
                  @for ($i = 1; $i <= ceil($tatca_taikhoan->total()/$tatca_taikhoan->perPage()); $i++)
                    <option {{$tatca_taikhoan->currentPage() == $i ? "selected" : ""}} value="{{$tatca_taikhoan->url($i)}}">{{$i}}</option>
                  @endfor
                </select>
                
                @if ($tatca_taikhoan->total() > 0)
                  / <span id="total-page">{{$tatca_taikhoan->lastPage()}}</span>
                @else
                  <small><i>Không có kết quả</i></small>
                @endif

              </span>

              @if ($tatca_taikhoan->currentPage() != $tatca_taikhoan->lastPage())
                <a href="{{$tatca_taikhoan->nextPageUrl()}}"><i class="fa fa-caret-right"></i></a>
              @endif


            </div>
          </div>
          {{-- paginate --}}
          <p><strong><i class="fa fa-bookmark"></i>Ghi chú: </strong></p>

          <p class="note-items"><i class="fa fa-bolt text" style="color: #d0d32c"></i> Tài khoản chưa kích hoạt.</p>
          <p class="note-items"><i class="fa fa-check text-success"></i> Tài khoản đang hoạt động.</p>
          <p class="note-items"><i class="fa fa-lock text-danger"></i> Tài khoản bị khóa.</p>
          <p class="note-items"><i class="fa fa-ban text-danger"></i> Tài khoản bị khóa do vi phạm.</p>
          <p class="note-items"><i class="fa fa-times text-danger"></i> Tài khoản đã vô hiệu hóa (xóa).</p>
        </div>
      </form>
    </div>
  </div>

  <!--END #main-->
@endsection

<!-- Modal -->
<div class="modal fade show-detail-account-modal" id="show-detail-account-modal" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">TÀI KHOẢN @<span id="username">taikhoan</span></h4>
      </div>
      <div class="modal-body">
        <div>
          <label for="">Ngày tham gia: </label>
          <span id="created_at">Ngày tham gia</span>
        </div>
        <div>
          <label for="">Họ và tên: </label>
          <span id="fullname">Họ và tên</span> <i id="nickname"></i>
        </div>
        <div>
          <label for="">Email: </label>
          <span id="email">Email</span>
        </div>
        <div>
          <label for="">Số điện thoại: </label>
          <span id="phone">Số điện thoại</span>
        </div>
        <div>
          <label for="">Giới tính: </label>
          <span id="gender">Ngày tham gia</span>
        </div>
        <div>
          <label for="">Ngày sinh: </label>
          <span id="birthday"></span>
        </div>
        <div>
          <label for="">Giới thiệu: </label>
          <p id="about">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure deleniti laboriosam tempora aspernatur.</p>
        </div>
      </div>
      <div class="modal-footer">
        <a type="button" href="https://facebook.com" class="btn btn-default">Xem bài viết</a>
        <a href="#/" id="url-to-files" type="button" class="btn btn-default">Xem tệp</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
      </div>
    </div>
    
  </div>
</div>
{{-- Modal --}}


@section('javascript')
  <script src="{{ asset('js/admin/admin-account.js') }}"></script>
@endsection
