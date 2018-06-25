@extends('master.adminmasterpage')

@section('admin_content')

  {{-- --}}

  <div id="main">
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="fa fa-home"></i> Trang quản trị</a></li>
      <li class="active"><a href="user.html">Tài khoản</a> <span class="badge">{{$tatca_baiviet->total()}}</span>  </li>
    </ol>
    <div class="col-xs-12">
      <form id="post_form" method="post" action="{{ route('admin.baiviet.capnhat.post') }}" role="form">
        @csrf
        <div class="col-xs-12">
          <div class="form-group">
            <!-- Single button -->
            <div class="btn-group">
              <select id="task" name="task" class="form-control">
                <option>Tác vụ</option>
                <option value="post-live">Đánh dấu đang hiển thị</option>
                <option value="post-delete">Xóa</option>
                <option value="post-ban">Đánh dấu vi phạm</option>
              </select>
            </div>
            {{-- @if (Auth::user()->quyen == "Q0001")
              <div class="btn-group">
                <select id="filter" name="filter_role" class="form-control">
                  <option value="{{false}}">Lọc</option>
                  <option value="Q0002">Người dùng</option>
                  <option value="Q0003">Mod</option>
                </select>
              </div>
            @endif --}}
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
                <th style="text-align: left;">Bài viết</th>
                <th class="hidden-xs">Người viết</th>
                <th class="hidden-xs">Nội dung</th>
                <th class="hidden-sm hidden-xs">Ngày đăng</th>
                {{-- <th>Sửa</th> --}}
                <th>Tình trạng</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($tatca_baiviet as $baiviet)
              <tr>
                <td>
                  <input name="id[]" type="checkbox" value="{{$baiviet->ma_bai_viet}}">
                </td>
                <td style="text-align: left;">
                  <a href="javascript:void(0)" class="show-post-detail-button" id="{{$baiviet->ma_bai_viet}}">
                    #{{$baiviet->ma_bai_viet}}
                  </a>
                </td>
                <td class="hidden-xs"><a href="javascript:void(0)" data-account-id="{{$baiviet->belongsToTaiKhoan->ma_tai_khoan}}">{{$baiviet->belongsToTaiKhoan->hasNguoiDung->ho_ten_lot." ".$baiviet->belongsToTaiKhoan->hasNguoiDung->ten}}</a></td>
                <td class="hidden-xs">{!!str_limit($baiviet->noi_dung_bai_viet, 22)!!}</td>
                <td class="hidden-sm hidden-xs">{{date_format($baiviet->thoi_gian_dang, 'd/m/Y H:i:s')}}</td>
               
                <td>
                  @if ($baiviet->trang_thai == 1)
                    <i class="fa fa-check text-success"></i>
                  @elseif($baiviet->trang_thai == 2)
                    <i class="fa fa-ban text-danger"></i>
                  @else
                    <i class="fa fa-times text-danger"></i>
                  @endif
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{-- paginate --}}
          {{-- <span>( {{$tatca_baiviet->total()}} )</span> --}}
          <div>

            @php
              $objects = $tatca_baiviet;
            @endphp
            @include('includes.pagination01')
            
          </div>
          {{-- paginate --}}
          <p><strong><i class="fa fa-bookmark"></i>Ghi chú: </strong></p>
          <p class="note-items"><i class="fa fa-check text-success"></i> Bài viết đang hiển thị.</p>
          <p class="note-items"><i class="fa fa-times text-danger"></i> Bài viết đã xóa.</p>
          <p class="note-items"><i class="fa fa-ban text-danger"></i> Bài viết bị khóa do vi phạm.</p>
        </div>
      </form>
    </div>
  </div>

  <!--END #main-->
@endsection


@section('javascript')
  {{-- <script src="{{ asset('js/admin/admin-account.js') }}"></script> --}}

  <script>
    $(document).ready(function() {
      $('.show-post-detail-button').click(function(event) {
        
        var postId = $(this).attr('id');
        window.location.href= link_host+"/admin/baiviet/xemchitiet/"+postId;


      });
    });
  </script>
@endsection
