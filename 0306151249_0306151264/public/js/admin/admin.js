$(document).ready(function() {
  $('ul#menu>li>a[href="#"]').click(function(){
    $(this).next('ul').slideToggle("slow");
    return false;
  });
  $('#check_all').change(function(){
    $('.table input:checkbox').prop('checked', this.checked);
  });
  // $('#task').change(function(){
  //   var check = true;
  //   if ($(this).val()=="delete") {
  //     check = confirm('Có chắc bạn muốn xóa?');
  //   }
  //   if (check) {
  //     $('#post_form').submit();
  //   } else {
  //     $('#task option:first-child').prop('selected', true);
  //   }
  // });

  $('#task').change(function(){

    if($('input:checkbox:checked').length <= 0) { 
      $('#task option:first-child').prop('selected', true);
      alert('Bạn cần chọn đối tượng cần cập nhật');
      return;
    }
    var kindOfUpdate = $(this).val();
    var check = true;
    if (kindOfUpdate=="delete") {
      check = confirm('Có chắc bạn muốn xóa?');
    } else if (kindOfUpdate=="mark_as_seen") {
      check = confirm('Bạn muốn đánh dấu đã đọc những phản hồi được chọn ?');
    } else {
      check = confirm('Bạn muốn đánh dấu chưa đọc những phản hồi được chọn ?');
    }



    if (check) {
      $('.myloader').show();
      $('#post_form').submit();
    }
    
    

    $('#task option:first-child').prop('selected', true);
    
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
    $('#start-intro').click(function(){
      var intro = introJs();
      intro.setOptions({
        steps: [
        {
          element: '#step1',
          intro: "Danh sách quản lý.",
          position: 'right'
        },
        {
          element: '#step2',
          intro: "Thanh điều hướng, cho biết vị trí trang hiện tại",
          position: 'bottom'
        },
        {
          element: '#step3',
          intro: 'Danh sách các tác vụ như thêm, xóa, sửa.',
          position: 'right'
        },
        {
          element: '#step4',
          intro: 'Danh sách các record hiện có.'
        },
        {
          element: '#step5',
          intro: 'Phân trang kết quả hiển thị, click chuột để di chuyển giữa các trang.'
        },
        {
          element: '#step6',
          intro: 'Những ghi chú giải thích cho các icon.'
        }
        ]
      });

      intro.start();
    });
  });