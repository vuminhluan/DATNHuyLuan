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
            
            <div class="btn-group pull-right hidden-xs" id="div-search">
              <input id="search" name="search" type="text" value="" class="form-control" placeholder="Tên người gửi">
              <span class="fa fa-search"></span>
            </div>
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
            <tbody class="for-search">
              @csrf
              @if ($tatca_baocao)
                @foreach ($tatca_baocao as $baocao)
                  @if ($baocao->ma_noi_nhan_bao_cao == "NNBC1")
                  
                  <tr class="alert alert-info" style="color: #333">
                    <td>
                      <input name="id[]" class="check" type="checkbox" value="{{$baocao->ma_bao_cao}}">
                    </td>
                    <td>
                      <a href="view-contact.html" class="detail-report" data-toggle="modal" data-target=".show-message-modal" id="{{$baocao->ma_bao_cao}}">#{{$baocao->ma_bao_cao}}</a>
                    </td>
                    <td class="hidden-sm hidden-xs">Báo cáo {{$baocao->belongsToLoaiBaoCao->ten_loai_bao_cao}}</td>
                    <td class="hidden-xs td-search">{{$baocao->belongsToTaiKhoan->hasNguoiDung->ho_ten_lot." ".$baocao->belongsToTaiKhoan->hasNguoiDung->ten}}</td>
                    
                    <td class="hidden-sm hidden-xs">{{date_format($baocao->thoi_gian_gui_bao_cao, "d/m/Y H:i:s")}}</td>
                    <td>
                      @if ($baocao->da_xem)
                        <i class="fa fa-check text-success" data-seen="1" id="seen{{$baocao->ma_bao_cao}}" data-toggle="tooltip" data-placement="top" title="Phản hồi đã đọc"></i>
                      @else
                        <i class="fa fa-envelope-o" data-seen="0" id="seen{{$baocao->ma_bao_cao}}" data-toggle="tooltip" data-placement="top" title="Phản hồi chưa đọc"></i>
                      @endif

                      @if (!$baocao->trang_thai)
                        <i class="fa fa-times text-danger" data-toggle="tooltip" data-placement="top" title="Báo cáo đã xóa"></i>
                      @endif
                    </td>
                  </tr>
                  @endif
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
        <h4 class="modal-title">BÁO CÁO #<span id="contact-id">20</span></h4>
      </div>
      <div class="modal-body">
        <div><label for="">Người báo cáo: </label> <span id="report-sender">Họ tên người gửi</span></div>
        <div><label for="">Thời gian: </label> <span id="report-created-at">Thời gian gửi</span></div>
        <div><label for="">Loại báo cáo: </label> <span id="report-kind">Loại báo cáo</span></div>
        <div><label for="">Đối tượng bị báo cáo: </label> <span id="report-target" >Đối tượng báo cáo</span></div>
        <div>
          <label for="">Nội dung báo cáo: </label> <br>
          <p id="report-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, sequi.</p>
        </div>
      </div>
      <div class="modal-footer">
        <button id="send-mail-warning-button" type="button" class="btn btn-danger">Nhắc nhở vi phạm</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
      </div>
    </div>
    
  </div>
</div>
{{-- Modal --}}



@section('javascript')
  
  <script>
    
    $(document).ready(function() {

      $('body').on('click', '.detail-report', function(event) {

        $('.myloader').show();
        var id = $(this).attr('id');
        // alert(id);return;
        var seen = 0;

        if($('#seen'+id).attr('data-seen') == 1) {
          seen = 1;
        } else {
          $('#seen'+id).attr('class', 'fa fa-check text-success');
        }

        // alert(id+'--'+seen);return;

        var data = {
          id    : id,
          seen  : seen,
          _token: $('[name=_token]').val()
        };

        $.ajax({
          url: link_host+'/admin/baocao/xemchitiet',
          type: 'POST',
          data: data,
        })
        .done(function(response) {
          response = response[0];
          // console.log(response);
          $('#report-sender').html(response.sender_fullname);
          $('#report-created-at').html(response.report_created_at);
          $('#report-kind').html("Báo cáo "+response.report_kind);
          $('#report-target').html(response.target_name);
          $('#report-target').attr('data-owner', response.target_owner);
          $('#report-content').html(response.report_content);

          $('.myloader').hide();
        })
        .fail(function() {
          console.log("error");
        });
        
      });

      // Nhắc nhỏ vi phạm -> gửi mail
      $('#send-mail-warning-button').click(function() {
        var userID = $('#report-target').attr('data-owner');
        // alert(userID);

        $.ajax({
          url: link_host+'/admin/baocao/nhacnho/'+userID,
          type: 'GET',
        })
        .fail(function(error) {
          console.log(error);
        })
        .done(function(data) {
          console.log(data);
        });
        
        

      });





    });
  
  </script>
@endsection


