

$(document).ready(function() {
  $('#task option:first-child').prop('selected', true);
  $('#change-filename-box').hide();
  $('#change-filename-box input').val('untitled');
  // Ẩn loader khi load xong trang web
  $('.myloader').hide();

  $('#page-list').change(function(event) {
    window.location.href = $(this).val();
  });


  $('ul#menu>li>a[href="#"]').click(function(){
    $(this).next('ul').slideToggle("slow");
    return false;
  });
  $('#check_all').change(function(){
    $('.table input:checkbox').prop('checked', this.checked);
  });
  // });

  $('#task').change(function(e){

    if($('input:checkbox:checked').length <= 0) { 
      $('#task option:first-child').prop('selected', true);
      alert('Bạn cần chọn đối tượng cần cập nhật');
      return;
    }
    var kindOfUpdate = $(this).val();
    // alert(kindOfUpdate); return;
    var check = true;
    if (kindOfUpdate=="delete") {
      check = confirm('Có chắc bạn muốn xóa?');
    } else if (kindOfUpdate=="mark_as_seen") {
      check = confirm('Bạn muốn đánh dấu đã đọc những phản hồi được chọn ?');
    } else if (kindOfUpdate=="mark_as_unread") {
      check = confirm('Bạn muốn đánh dấu chưa đọc những phản hồi được chọn ?');
    } else if (kindOfUpdate=="account-ban") {
      check = confirm('Bạn muốn đánh dấu vi phạm những tài khoản được chọn ?');
    } else if (kindOfUpdate=="account-live") {
      check = confirm('Bạn muốn đánh dấu hoạt động bình thường những tài khoản được chọn ?');
    } else if (kindOfUpdate=="account-inactivate") {
      check = confirm('Bạn muốn đánh dấu chưa kích hoạt những tài khoản được chọn ?');
    } else if (kindOfUpdate=="account-lock") {
      check = confirm('Bạn muốn khóa những tài khoản được chọn ?');
    } else if (kindOfUpdate=="account-deactivate") {
      check = confirm('Bạn muốn hủy kích hoạt - xóa - những tài khoản được chọn ?');
    } else if(kindOfUpdate=="server-files-change-name") {
      
      $('#change-filename-box').show();
      
      return;
    }



    if (check) {
      $('.myloader').show();
      $('#post_form').submit();
    }

    $('#task option:first-child').prop('selected', true);
    
  });

  $('#filter').change(function() {
    
    $('#post_form').submit();
    $('#filter option:first-child').prop('selected', true);

  });




  $('#search').keyup(function(e){
    if (e.which==13) {
      $('#post_form').submit();
    }
  });

  
  $('i').hover(function(){
    $(this).tooltip('show')
  });
    //Intro
    // $('#start-intro').click(function(){
    //   var intro = introJs();
    //   intro.setOptions({
    //     steps: [
    //     {
    //       element: '#step1',
    //       intro: "Danh sách quản lý.",
    //       position: 'right'
    //     },
    //     {
    //       element: '#step2',
    //       intro: "Thanh điều hướng, cho biết vị trí trang hiện tại",
    //       position: 'bottom'
    //     },
    //     {
    //       element: '#step3',
    //       intro: 'Danh sách các tác vụ như thêm, xóa, sửa.',
    //       position: 'right'
    //     },
    //     {
    //       element: '#step4',
    //       intro: 'Danh sách các record hiện có.'
    //     },
    //     {
    //       element: '#step5',
    //       intro: 'Phân trang kết quả hiển thị, click chuột để di chuyển giữa các trang.'
    //     },
    //     {
    //       element: '#step6',
    //       intro: 'Những ghi chú giải thích cho các icon.'
    //     }
    //     ]
    //   });

    //   intro.start();
    // });
});