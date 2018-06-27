@extends('master.adminmasterpage')

@section('admin_content')

  {{-- --}}

  <div id="main">
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="fa fa-home"></i> Trang quản trị</a></li>
      <li class="active"><a href="user.html">Nhóm</a> <span class="badge">{{$tatca_nhom->total()}}</span></li>
    </ol>
    <div class="col-xs-12">
      <form id="post_form" method="post" action="{{ route('admin.nhom.capnhat.post') }}" role="form">
        @csrf
        <div class="col-xs-12">
          <div class="form-group">
            <!-- Single button -->
            <div class="btn-group">
              <select id="task" name="task" class="form-control">
                <option>Tác vụ</option>
                <option value="group-live">Cho phép hoạt động</option>
                <option value="group-delete">Xóa</option>
                <option value="group-ban">Đánh dấu vi phạm</option>
              </select>
            </div>
            <div class="btn-group pull-right hidden-xs" id="div-search">
              <input id="search" name="search" type="text" value="" class="form-control" placeholder="Tên nhóm">
              <span class="fa fa-search"></span>
            </div>
          </div>
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th><input id="check_all" type="checkbox"></th>
                {{-- <th class="hidden-xs">ID</th> --}}
                <th style="text-align: left;">Nhóm</th>
                <th style="text-align: left;">Tên nhóm</th>
                <th class="hidden-xs">Người tạo</th>
                <th style="text-align: left;" class="hidden-xs">Giới thiệu nhóm</th>
                <th class="hidden-sm hidden-xs">Ngày tạo</th>
                {{-- <th>Sửa</th> --}}
                <th>Tình trạng</th>
              </tr>
            </thead>
            <tbody class="for-search">
              @foreach ($tatca_nhom as $nhom)
              <tr>
                <td>
                  <input name="id[]" type="checkbox" value="{{$nhom->ma_nhom}}">
                </td>
                <td style="text-align: left;">
                  <a href="{{ route('admin.nhom.xem', [$nhom->ma_nhom]) }}" class="show-post-detail-button" id="id">
                    #{{$nhom->ma_nhom}}
                  </a>
                </td>
                <td class="td-search">{{$nhom->ten_nhom}}</td>
                <td class="hidden-xs"><a href="javascript:void(0)">{{'@'.$nhom->belongsToTaiKhoan->ten_tai_khoan}}</a></td>
                <td style="text-align: left;" class="hidden-xs">{!! str_limit($nhom->gioi_thieu_nhom, '25') !!}</td>
                {{-- {{date_format($baiviet->thoi_gian_dang, 'd/m/Y H:i:s')}} --}}
                <td class="hidden-sm hidden-xs">{{date_format($nhom->thoi_gian_tao, 'd/m/Y H:i:s')}}</td>
               
                <td>
                  @if ($nhom->trang_thai == 1)
                    <i class="fa fa-check text-success"></i>
                  @elseif($nhom->trang_thai == 2)
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
              $objects = $tatca_nhom;
            @endphp
            @include('includes.pagination01')
          </div>
          {{-- paginate --}}
          <p><strong><i class="fa fa-bookmark"></i>Ghi chú: </strong></p>
          <p class="note-items"><i class="fa fa-check text-success"></i> Nhóm đang hiển thị.</p>
          <p class="note-items"><i class="fa fa-times text-danger"></i> Nhóm đã xóa.</p>
          <p class="note-items"><i class="fa fa-ban text-danger"></i> Nhóm bị khóa do vi phạm.</p>
        </div>
      </form>
    </div>
  </div>

  <!--END #main-->
@endsection


@section('javascript')

  {{-- <script>
    $(document).ready(function(){
      
    });
  </script> --}}
@endsection
