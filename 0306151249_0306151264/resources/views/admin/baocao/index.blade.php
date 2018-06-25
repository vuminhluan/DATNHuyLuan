@extends('master.adminmasterpage')


@section('css')
  {{-- <link rel="stylesheet" href="{{ asset('css/admin/admin-contact.css') }}"> --}}
@endsection

@section('admin_content')

  <div id="main">
    <ol class="breadcrumb" id="step2">
      <li><a href="index.html"><i class="fa fa-home"></i> Trang quản trị</a></li>
      <li class="active">
        <a href="contact.html">Báo cáo</a>
        &nbsp;&nbsp;
        <span id="message-counter" class="badge pull-right">{{$tatca_baocao->total()}}</span>
      </li>
    </ol>
    <div class="col-xs-12">
      <form id="post_form" method="post" action="{{ route('admin.baocao.capnhat') }}" role="form">
        @csrf
        <div class="col-xs-12">
          <div class="form-group">
            <!-- Single button -->
            <div class="btn-group" id="step3">
              <select id="task" name="task" class="form-control">
                <option>Tác vụ</option>
                <option value="report-delete">Xóa báo cáo</option>
                <option value="report-mark-as-seen">Đánh dấu đã đọc</option>
                <option value="report-mark-as-unread">Đánh dấu chưa đọc</option>
              </select>
            </div>
            
            {{-- <div class="btn-group pull-right hidden-xs" id="div-search">
              <input id="search" name="search" type="text" value="" class="form-control" placeholder="Tên người gửi">
              <span class="fa fa-search"></span>
            </div> --}}
          </div>
          @if (count($tatca_baocao) <= 0)
            <p>Chưa có báo cáo nào</p>
          @endif
          <table class="table table-bordered table-hover" id="message-table">
            <thead>
              <tr>
                <th><input id="check_all" type="checkbox"></th>
                <th>Mã</th>
                <th class="hidden-sm hidden-xs">Loại báo cáo</th>
                <th class="hidden-xs">Người gửi</th>
                <th class="hidden-sm hidden-xs">Ngày gửi</th>
                <th>Tình trạng</th>
              </tr>
            </thead>
            <tbody>
              @csrf
              @if ($tatca_baocao)
                @foreach ($tatca_baocao as $baocao)
                
                <tr class="alert alert-info" style="color: #333">
                  <td>
                    <input name="id[]" class="check" type="checkbox" value="{{$baocao->ma_bao_cao}}">
                  </td>
                  <td>
                    <a href="view-contact.html" class="detail-message" data-toggle="modal" data-target=".show-message-modal" id="id">#{{$baocao->ma_bao_cao}}</a>
                  </td>
                  <td class="hidden-sm hidden-xs">Báo cáo {{$baocao->belongsToLoaiBaoCao->ten_loai_bao_cao}}</td>
                  <td class="hidden-xs">{{$baocao->belongsToTaiKhoan->hasNguoiDung->ho_ten_lot." ".$baocao->belongsToTaiKhoan->hasNguoiDung->ten}}</td>
                  
                  <td class="hidden-sm hidden-xs">{{date_format($baocao->thoi_gian_gui_bao_cao, "d/m/Y H:i:s")}}</td>
                  <td>
                    @if ($baocao->da_xem)
                      <i class="fa fa-check text-success" data-seen="1" id="seen{{$baocao->ma}}" data-toggle="tooltip" data-placement="top" title="Phản hồi đã đọc"></i>
                    @else
                      <i class="fa fa-envelope-o" data-seen="0" id="seen{{$baocao->ma}}" data-toggle="tooltip" data-placement="top" title="Phản hồi chưa đọc"></i>
                    @endif

                    @if (!$baocao->trang_thai)
                      <i class="fa fa-times text-danger" data-toggle="tooltip" data-placement="top" title="Báo cáo đã xóa"></i>
                    @endif
                  </td>
                </tr>
                @endforeach
              @endif
            </tbody>
          </table>
          {{-- paginate --}}
          <div>
            
            @php
              $objects = $tatca_baocao;
            @endphp
            @include('includes.pagination01')
          </div>
          {{-- paginate --}}

          <div id="step6">
            <p><strong><i class="fa fa-bookmark"></i>Ghi chú: </strong></p>
            <p class="note-items"><i class="fa fa-check text-success"></i> Báo cáo đã đọc.</p>
            <p class="note-items"><i class="fa fa-envelope-o"></i> Báo cáo chưa đọc.</p>
            {{-- <p class="note-items"><i class="fa fa-times text-danger"></i> Phản hồi đã xóa.</p> --}}
          </div>

        </div>
      </form>
    </div>
  </div>

  <!--END #main-->
@endsection

<!-- Modal -->
<div class="modal fade show-message-modal" id="show-message-modal" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">PHẢN HỒI #<span id="contact-id">20</span></h4>
      </div>
      <div class="modal-body">
        <div><label for="">Họ tên: </label> <span id="contact-fullname">Họ tên người gửi</span></div>
        <div><label for="">Email: </label> <span id="contact-email">Email</span></div>
        <div><label for="">Thời gian: </label> <span id="contact-created-at">Thời gian gửi</span></div>
        <div>
          <label for="">Tin nhắn: </label> <br>
          <pre id="contact-message"><code></code>
          </pre>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
      </div>
    </div>
    
  </div>
</div>
{{-- Modal --}}



@section('javascript')
  {{-- <script src="{{ asset('node_modules/socket.io/node_modules/socket.io-client/dist/socket.io.js') }}"></script>
  <script src="{{ asset('js/admin/admin-contact.js') }}"></script> --}}
  
  <script>
    
    // var socket = io.connect( 'http://'+window.location.hostname+':3000' );
    // // console.log(socket);
    // // console.log('asd');
    // socket.on('sendMessage', function(data) {
    //   // $('.alert').append('Có <strong>1</strong> phản hồi mới chưa đọc từ '+data.fullname);
    //   // Update message counter
    //   var messageCounter = parseInt($('#message-counter').attr('title'), 10) + 1; // cơ số 10
    //   $('#message-counter').attr('title', parseInt(messageCounter));
    //   if(messageCounter > 1000) {
    //     messageCounter = parseInt(messageCounter/1000)+' k';
    //   }
    //   $('#message-counter').html(messageCounter);


    //   // Update record;
    //   var fullname = data.ho_va_ten;
    //   var id = data.ma;

    //   var createdAt = new Date(data.thoi_gian_tao);

    //   var date = createdAt.getDate() < 10 ? '0'+createdAt.getDate() : createdAt.getDate();
    //   var month = (createdAt.getMonth()+1) < 10 ? '0'+(createdAt.getMonth()+1) : (createdAt.getMonth()+1);
    //   var hour = createdAt.getHours() < 10 ? '0'+createdAt.getHours() : createdAt.getHours();
    //   var minute = createdAt.getMinutes() < 10 ? '0'+createdAt.getMinutes() : createdAt.getMinutes();
    //   var second = createdAt.getSeconds() < 10 ? '0'+createdAt.getSeconds() : createdAt.getSeconds();
      
    //   createAt = date+'/'+month+'/'+createdAt.getFullYear()+' '+hour+':'+minute+':'+second;

    //   var record = "<tr class='alert alert-info' style='color: #333'><td><input name='id[]' type='checkbox' value='0'></td><td><a href='view-contact.html' class='detail-message' data-toggle='modal' data-target='.show-message-modal' id='"+id+"'>#"+id+"</a></td><td class='hidden-xs'>"+fullname+"</td><td class='hidden-sm hidden-xs'>"+{{'data.email'}}+"</td><td class='hidden-sm hidden-xs'>"+createAt+"</td><td><i class='fa fa-envelope-o' data-toggle='tooltip' data-placement='top' title='Phản hồi chưa đọc'></i></td></tr>";

    //   $('#message-table tbody').prepend(record);

    // });
  </script>
@endsection


