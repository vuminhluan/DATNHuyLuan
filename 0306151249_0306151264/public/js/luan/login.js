

$(document).ready(function() {

  // var socket = io.connect( 'http://'+window.location.hostname+':3000' );

  $.validator.addMethod( "regex", function(value, element, regexp) {
    var re = new RegExp(regexp);
    return re.test(value);
    }, "Dữ liệu không hợp lệ."
  );

//
function showAlert(message) {
  $("<div class='myalert show-alert show-alert-animation'>"+message+"</div>").appendTo('body');
}

function removeAlert(alertID, classToRemove) {
  $('#'+alertID).removeClass(classToRemove);
}

// XOR rule 1 XOR rule 2
$.validator.addMethod("xor", function(val, el, param) {
  var valid = false;

  // loop through sets of nested rules
  for(var i = 0; i < param.length; ++i) {
    var setResult = true;

    // loop through nested rules in the set
    for(var x in param[i]) {
      var result = $.validator.methods[x].call(this, val, el, param[i][x]);

      // If the input breaks one rule in a set we stop and move
      // to the next set...
      if(!result) {
        setResult = false;
        break;
      }
    }

    // If the value passes for one set we stop with a true result
    if(setResult == true) {
      valid = true;
      break;
    }
  }

  // Return the validation result
  return this.optional(el) || valid;
}, "Dữ liệu không hợp lệ");
// End XOR:  rule 1 XOR rule 2

$('#sign-in-form').validate({
  rules: {
    username: {
      // regex: "^[a-z.\@1-9]{6,}$"
      required: true,
      xor: [{
        regex: myregex['ten_taikhoan']
      }, {
        email: true
      }]
    },
    password: {
      required: true,
      regex: myregex['matkhau']
    }
  },
  messages: {
    username: {
      required: 'Tên đăng nhập hoặc email không thể để trống'
    },
    password: {
      required: 'Mật khẩu không thể để trống'
    }
  }
});

// End Form đăng nhập



// Form đăng ký

var currentTab = 0;
var tabs = $('.sign-up-tab');
showTab(currentTab);

function showTab(currentTab) {

  $(tabs[currentTab]).css('display', 'block');
  showControllers(currentTab, tabs.length);
}

function showControllers(currentTab) {
  if(currentTab == 0) {
    $('#sign-up-prev-btn').css('display', 'none');
  } else {
    $('#sign-up-prev-btn').css('display', 'inline-block');
  }

  if(currentTab >= tabs.length - 1) {
    $('#sign-up-next-btn').html('Đăng ký');
  } else {
    $('#sign-up-next-btn').html('Tiếp theo');
  }
}

function changeTab(n) {
  $(tabs[currentTab]).css('display', 'none');
  currentTab += n
  if(currentTab >= tabs.length) {
    currentTab--;
    SignupAjax();
    // $('#sign-up-form').submit();
    // return false;
  }
  showTab(currentTab);
}


  $('#sign-up-next-btn').click(function (e) {

    $('#sign-up-form').validate({ });

    // e.preventDefault();
    if(currentTab == 0) {

      $('[name="sign-up-lastname"]').rules('add', {
        // regex: "^([A-Za-zÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚÝàáâãèéêìíòóôõùúýĂăĐđĨĩŨũƠơƯưẠ-ỹ]{1,10}((\\s[A-Za-zÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚÝàáâãèéêìíòóôõùúýĂăĐđĨĩŨũƠơƯưẠ-ỹ]{1,15})?)+$)"
        regex: myregex['tiengviet'],
        maxlength: 30,
        minlength: 2,
        required: true,
        messages: {
          minlength: "Họ và tên đệm dài tối thiểu {0} kí tự",
          maxlength: "Họ và tên đệm dài tối đa {0} kí tự",
          required: "Họ và tên đệm không thể để trống"
        }
      });
      $('[name="sign-up-firstname"]').rules('add', {
        // regex: "^([A-Za-zÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚÝàáâãèéêìíòóôõùúýĂăĐđĨĩŨũƠơƯưẠ-ỹ]{1,10}((\\s[A-Za-zÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚÝàáâãèéêìíòóôõùúýĂăĐđĨĩŨũƠơƯưẠ-ỹ]{1,15})?)+$)"
        regex: myregex['tiengviet'],
        maxlength: 20,
        minlength: 2,
        required: true,
        messages: {
          minlength: "Tên dài tối thiểu {0} kí tự",
          maxlength: "Tên dài tối đa {0} kí tự",
          required: "Tên không thể để trống"
        }
      });

      // $('[name="sign-up-username"]').rules('remove');
      // $('[name="sign-up-email').rules('remove');
      // $('[name="sign-up-password"]').rules('remove');

      $('#sign-up-form').valid();
      if($('#sign-up-form').valid()) {
        e.preventDefault();
        changeTab(1);
        return;
      }
    }

    if(currentTab == 1) {

      $('[name="sign-up-username"]').rules('add', {
        // regex: "^[\\w]{6,}$"
        regex : myregex['ten_taikhoan'],
        required: true,
        minlength: 6,
        maxlength: 32,
        messages: {
          required: "Tên tài khoản không thể để trống",
          minlength: "Tài khoản có độ dài tối thiểu {0} kí tự",
          maxlength: "Tài khoản có độ dài tối đa {0} kí tự",
        }
      });

      $('[name="sign-up-email"]').rules("add", {
        required: true,
        email: true,
        messages: {
          required: 'Email không thể để trống',
          email: 'Dữ liệu không hợp lệ'
        }
      });

      $('[name="sign-up-password"]').rules('add', {
        // regex: "^[a-z0-9_]{6,30}$"
        regex : myregex['matkhau'],
        required: true,
        minlength: 6,
        maxlength: 60,
        messages: {
          required: "Mật khẩu không thể để trống",
          minlength: "Mật khẩu có độ dài tối thiểu {0} kí tự",
          maxlength: "Mật khẩu có độ dài tối đa {0} kí tự",
        }
      });

      // $('[name="sign-up-lastname"]').rules('remove');
      // $('[name="sign-up-firstname"]').rules('remove');

      $('#sign-up-form').valid();
      if($('#sign-up-form').valid()) {
        e.preventDefault();
        changeTab(1);
        return;
      }
    }

  });

  $('#sign-up-prev-btn').click(function (e) {
    e.preventDefault();
    changeTab(-1);
  });


// End Form đăng ký
// ajax
  function SignupAjax() {
    $.ajax({
      url: link_host+'/dangki',
      type: 'post',
      async: false,
      data: {
        _token: $('input[name=_token]').val(),
        firstname: $('input[name=sign-up-firstname]').val(),
        lastname: $('input[name=sign-up-lastname]').val(),
        username: $('input[name=sign-up-username]').val(),
        email: $('input[name=sign-up-email]').val(),
        password: $('input[name=sign-up-password]').val()
      },
      beforeSend: function() {
        $('#ajax-loader').css('display', 'block');
      },
      success: function() {
        // setting a timeout
        $('#ajax-loader').css('display', 'none');
      }
    })
    .done(function(response) {
      // console.log(response);
      var m =  "";
      if(response.errors) {
        // console.log(response.errors);
        // Duyệt từng phần từ của object lỗi (từ DangKiController trả về dạng Json)

        // Xóa mật khẩu trong input hiện tại
        $('input[name=sign-up-password]').val('');

        $.each(response.errors, function(fieldsName, messagesArray) {
          messagesArray.forEach(function(message) {
            m += "<p>"+message+"</p>";
          });
        });
        showAlert(m);
      } else {

        // m += "<p>Đăng kí thành công. Chúng tôi đã gửi tin nhắn kích hoạt tài khoản tới email "+$('input[name=sign-up-email]').val()+" của bạn. <span class='time-counter'></span></p>";
        // showAlert(m);
        // console.log(response);

        // setTimeout(function () {
        //   window.location.href = "/kichhoat/taikhoan";
        //
        // }, 4000);
        window.location.href = link_host+"/kichhoat/taikhoan";
      }
    });



  }


// end ajax signup

  // Ajax Sign in
  $('#sign-in-form-button').click(function(event) {
    event.preventDefault();
    if($('#sign-in-form').valid()) {
      // alert($('#sign-in-form input[name=remember]').prop('checked'));
      check = $('#sign-in-form input[name=remember]').is(':checked') ? 1 : 0;
      // alert(check); return;
      // return;
      $.ajax({
        url: link_host+'/dangnhap',
        type: 'POST',
        data: {
          _token: $('#sign-in-form input[name=_token]').val(),
          username: $('#sign-in-form input[name=username]').val(),
          password: $('#sign-in-form input[name=password]').val(),
          remember: check
        }
      })
      .done(function(response) {
        $('#sign-in-form input[name=password]').val('');
        // console.log(response);
        if(!response.success) {

          m = "<p>"+response.message+"</p>";
          showAlert(m);
          return;
        }
        // Đăng nhập thành công, => chuyển hướng về trang chủ
        // alert(response.id);return;
        window.location.href=link_host+"/trangchu";
      });
    }


  });




  // End ajax login

});
