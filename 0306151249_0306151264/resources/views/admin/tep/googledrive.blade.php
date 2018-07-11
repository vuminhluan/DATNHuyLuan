@extends('master.adminmasterpage')

@section('admin_content')

{{-- --}}

<div id="main">
  <ol class="breadcrumb">
    <li><a href="index.html"><i class="fa fa-home"></i> Trang quản trị</a></li>
    <li class="active"><a href="user.html"> Tài khoản</a></li>
    <li class="active"><a href="user.html"> Tệp (Google Drive)</a> <span class="badge"></span></li>
  </ol>

  <div class="col-xs-12">
    <ul class="--list" style="list-style: none;">
        <li>
          <a href="https://drive.google.com/drive/folders/{{$root->ma_thumuc}}" target="_blank"> <i class="fa fa-folder-o"></i> Thư mục gốc</a>
        </li>
        @foreach ($children as $child)
          <li>
            <a href="https://drive.google.com/drive/folders/{{$child->ma_thumuc}}" target="_blank"> <i class="fa fa-folder-o"></i> Thư mục của bài viết #{{$child->ma_bai_viet}}</a>
          </li>
        @endforeach
    </ul>



  </div>




</div>
<!--END #main-->
@endsection




@section('javascript')
{{-- <script src="{{ asset('js/admin/admin-account.js') }}"></script> --}}

@endsection
