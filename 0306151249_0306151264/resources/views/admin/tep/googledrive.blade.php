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
      
        @foreach ($folders as $folder)
          <li>
            <a href="https://drive.google.com/drive/folders/{{$folder['basename']}}" target="_blank"> <i class="fa fa-folder-o"></i> {{$folder['name']}}</a>
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
