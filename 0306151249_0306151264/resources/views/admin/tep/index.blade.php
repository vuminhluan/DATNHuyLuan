@extends('master.adminmasterpage')

@section('admin_content')

{{-- --}}

<div id="main">
  <ol class="breadcrumb">
    <li><a href="index.html"><i class="fa fa-home"></i> Trang quản trị</a></li>
    <li class="active"><a href="user.html"> Tài khoản</a></li>
    <li class="active"><a href="user.html"> Tệp</a> <span class="badge">{{$tatca_tep->total()}}</span></li>
  </ol>
  <div class="col-xs-12">

    <form id="post_form" method="post" action="{{ route('admin.taikhoan.tep.capnhat', [$ten_tai_khoan]) }}" role="form">
      @csrf
      <div class="col-xs-12">
        <div class="form-group">
          <!-- Single button -->
          <div class="btn-group">
            <select id="task" name="task" class="form-control">
              <option>Tác vụ</option>
              <option value="server-files-delete">Xóa</option>
              <option value="server-files-recover">Khôi phục</option>
              <option value="server-files-change-name">Đổi tên</option>
            </select>
          </div>

          <a id="url-to-files-googledrive" href="{{ route('admin.taikhoan.tep', [$ten_tai_khoan, 'googledrive']) }}" class="btn btn-submit"><img style="vertical-align: middle;" width="23px" height="23px" src="{{ asset('myicons/tep/google-drive.svg') }}" alt=""> Google Drive</a>


          <div class="btn-group pull-right hidden-xs" id="div-search">
            <input id="search" name="search" type="text" value="" class="form-control" placeholder="Tên tệp">
            <span class="fa fa-search"></span>
          </div>
        </div>
        
        <div style="display: none;" id="change-filename-box">
          <div class="form-group">
            <input type="text" name="new_filename" id="new_filename" class="form-control" required placeholder="Tên tệp mới" value="untitled">
          </div>
          <div class="form-group">
            <button class="btn btn-primary">Đồng ý</button>
          </div>
        </div>

        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th><input id="check_all" type="checkbox"></th>
              {{-- <th class="hidden-xs">ID</th> --}}
              <th style="text-align: left;">Tên tệp</th>
              <th class="hidden-sm hidden-xs">Ngày tạo</th>
              <th class="hidden-xs" style="text-align: center;">Tải</th>
              
              {{-- <th>Sửa</th> --}}
              <th>Trạng thái</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($tatca_tep as $tep)
            <tr>
              <td>
                <input name="id[]" type="checkbox" value="{{$tep->ma_tep}}">
              </td>
              <td style="text-align: left; max-width: 500px;">
                <a target="_blank" href="{{ asset('uploads/'.$tep->belongsToTaiKhoan->ma_tai_khoan.'/'.$tep->duong_dan_tep) }}">
                   @if (!$tep->cong_khai)
                      <i class="fa fa-lock text-warning"></i>
                    @endif 
                  {{$tep->ten_tep}}
                </a>
              </td>
              <td class="hidden-sm hidden-xs">{{date_format($tep->thoi_gian_tao, 'd/m/Y H:i:s')}}</td>
              <td class="hidden-sm hidden-xs" style="text-align: center;"><a href="{{ asset('uploads/'.$tep->belongsToTaiKhoan->ma_tai_khoan.'/'.$tep->duong_dan_tep) }}" download ><i class="fa fa-download"></i></a></td>
                {{-- <td>
                  <a href="new-type_product.html"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Sửa tài khoản"></i></a>
                </td> --}}
              <td>
                @if ($tep->trang_thai)
                  <i class="fa fa-check text-success" data-toggle="tooltip" data-placement="top" title="Tệp đang sử dụng"></i>
                @else
                  <i class="fa fa-times text-danger" data-toggle="tooltip" data-placement="top" title="Tệp bị xóa"></i>
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

        {{-- paginate --}}
        <div>

          <div class="pagination" style="font-size: 17px;">
            @if ($tatca_tep->currentPage() != 1)
              <a href="{{$tatca_tep->previousPageUrl()}}" class="page-link"><i class="fa fa-caret-left"></i></a>
            @endif

            {{-- <span class="page-number"> <input id="current-page" type="text" value="{{$tatca_tep->currentPage()}}"> / <span id="total-page">{{$tatca_tep->total()}}</span></span> --}}

            <span class="page-number">
              <select name="page_list" id="page-list" style="" >
                @for ($i = 1; $i <= ceil($tatca_tep->total()/$tatca_tep->perPage()); $i++)
                  <option {{$tatca_tep->currentPage() == $i ? "selected" : ""}} value="{{$tatca_tep->url($i)}}">{{$i}}</option>
                @endfor
              </select>
              
              @if ($tatca_tep->total() > 0)
                / <span id="total-page">{{$tatca_tep->lastPage()}}</span>
              @else
                <small><i>Không có kết quả</i></small>
              @endif

            </span>

            @if ($tatca_tep->currentPage() != $tatca_tep->lastPage())
              <a href="{{$tatca_tep->nextPageUrl()}}"><i class="fa fa-caret-right"></i></a>
            @endif


          </div>

        </div>
        {{-- paginate --}}
        <p><strong><i class="fa fa-bookmark"></i>Ghi chú: </strong></p>
        <p class="note-items"><i class="fa fa-check text-success"></i> Tệp đang sử dụng</p>
        <p class="note-items"><i class="fa fa-times text-danger"></i> Tệp bị xóa</p>
        <p class="note-items"><i class="fa fa-lock text-warning"></i> Tệp riêng tư</p>

      </div>
    </form>



    </div>
  </div>

  <!--END #main-->
  @endsection




  @section('javascript')
    
  @endsection
