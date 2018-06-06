@extends('master.adminmasterpage')


@section('css')
  <link rel="stylesheet" href="{{ asset('css/admin/admin-contact.css') }}">
@endsection

@section('admin_content')


  <div id="main">
    <ol class="breadcrumb" id="step2">
      <li><a href="index.html"><i class="fa fa-home"></i> Trang quản trị</a></li>
      <li class="active"><a href="contact.html">Phản hồi</a></li>
    </ol>
    <div class="col-xs-12">
      <form id="admin-form" method="post" action="" role="form">
        <div class="col-xs-12">
          <div class="form-group">
            <!-- Single button -->
            <div class="btn-group" id="step3">
              <select id="task" name="task" class="form-control">
                <option>Tác vụ</option>
                <option value="delete">Xóa phản hồi</option>
                <option value="">Đánh dấu đã đọc</option>
                <option value="">Đánh dấu chưa đọc</option>
              </select>
            </div>
            
            <div class="btn-group pull-right hidden-xs" id="div-search">
              <input id="search" name="search" type="text" value="" class="form-control" placeholder="Tìm kiếm">
              <span class="fa fa-search"></span>
            </div>
          </div>
          <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Đóng</span></button>
            Có <strong>1</strong> phản hồi mới chưa đọc
          </div>
          @if (!$tatca_phanhoi)
            <p>Chưa có phản hồi nào</p>
          @endif
          <table class="table table-bordered table-hover" id="message-table">
            <thead>
              <tr>
                <th><input id="check_all" type="checkbox"></th>
                <th>Mã</th>
                <th class="hidden-xs">Người gửi</th>
                <th class="hidden-sm hidden-xs">Email</th>
                <th class="hidden-sm hidden-xs">Ngày gửi</th>
                <th>Tình trạng</th>
              </tr>
            </thead>
            <tbody>
              @if ($tatca_phanhoi)
                @foreach ($tatca_phanhoi as $phanhoi)
                 
                
                <tr class="alert alert-info" style="color: #333">
                  <td>
                    <input name="id[]" type="checkbox" value="0">
                  </td>
                  <td>
                    <a href="view-contact.html">Phản hồi số {{$phanhoi->ma}}</a>
                  </td>
                  <td class="hidden-xs">{{$phanhoi->ho_va_ten}}</td>
                  <td class="hidden-sm hidden-xs">{{$phanhoi->email}}</td>
                  <td class="hidden-sm hidden-xs">{{date_format($phanhoi->thoi_gian_tao, "d/m/Y H:i:s")}}</td>
                  <td>
                    <i class="fa fa-envelope-o" data-toggle="tooltip" data-placement="top" title="Phản hồi chưa đọc"></i>
                  </td>
                </tr>
                @endforeach
              @endif
              {{-- <tr>
                <td>
                  <input name="id[]" type="checkbox" value="2">
                </td>
                <td class="hidden-xs">2</td>
                <td>
                  <a href="view-contact.html">Phản hồi số 2</a>
                </td>
                <td class="hidden-xs">Quang Trung</td>
                <td class="hidden-sm hidden-xs">abc@gmail.com</td>
                <td class="hidden-sm hidden-xs">2014-06-19 01:05:13</td>
                <td>
                  <i class="fa fa-check text-success" data-toggle="tooltip" data-placement="top" title="Phản hồi đã đọc"></i>
                </td>
              </tr>
              --}}
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
          <div id="step6">
            <p><strong><i class="fa fa-bookmark"></i>Ghi chú: </strong></p>
            <p class="note-items"><i class="fa fa-envelope-o"></i> Phản hồi chưa đọc.</p>
            <p class="note-items"><i class="fa fa-check text-success"></i> Phản hồi đã đọc.</p>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!--END #main-->
@endsection


@section('javascript')
  <script src="{{ asset('node_modules/socket.io/node_modules/socket.io-client/dist/socket.io.js') }}"></script>
  <script src="{{ asset('js/admin/admin-contact.js') }}"></script>

  <script>
    
    var socket = io.connect( 'http://'+window.location.hostname+':3000' );
    // console.log(socket);
    // console.log('asd');
    socket.on('sendMessage', function(data) {
      // $('.alert').append('Có <strong>1</strong> phản hồi mới chưa đọc từ '+data.fullname);
      // Update message counter
      var messageCounter = parseInt($('#message-counter').attr('title'), 10) + 1; // cơ số 10
      $('#message-counter').attr('title', parseInt(messageCounter));
      if(messageCounter > 1000) {
        messageCounter = parseInt(messageCounter/1000)+' k';
      }
      $('#message-counter').html(messageCounter);


      // Update record;
      var fullname = data.fullname;

      var createdAt = new Date(data.thoi_gian_tao);

      var date = createdAt.getDate() < 10 ? '0'+createdAt.getDate() : createdAt.getDate();
      var month = createdAt.getMonth()+1 < 10 ? '0'+createdAt.getDate() : createdAt.getMonth()+1;
      var hour = createdAt.getHours() < 10 ? '0'+createdAt.getHours() : createdAt.getHours();
      var minute = createdAt.getMinutes() < 10 ? '0'+createdAt.getMinutes() : createdAt.getMinutes();
      var second = createdAt.getSeconds() < 10 ? '0'+createdAt.getSeconds() : createdAt.getSeconds();
      
      createAt = date+'/'+month+'/'+createdAt.getFullYear()+' '+hour+':'+minute+':'+second;

      var record = "<tr class='alert alert-info' style='color: #333'><td><input name='id[]' type='checkbox' value='0'></td><td><a href='view-contact.html'>Phản hồi số </a></td><td class='hidden-xs'>"+fullname+"</td><td class='hidden-sm hidden-xs'>"+{{'data.email'}}+"</td><td class='hidden-sm hidden-xs'>"+createAt+"</td><td><i class='fa fa-envelope-o' data-toggle='tooltip' data-placement='top' title='Phản hồi chưa đọc'></i></td></tr>";

      $('#message-table tbody').prepend(record);




    });
  </script>
@endsection


