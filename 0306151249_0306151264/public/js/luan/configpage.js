$(document).ready(function() {


  // Close alert
  $('.myalert .--close').click(function(event) {
    $(this).parents('.myalert').fadeOut('fast');
  });


  // add rule regex
  $.validator.addMethod( "regex", function(value, element, regexp) {
    var re = new RegExp(regexp);
    return re.test(value);
    }, "Dữ liệu không hợp lệ."
  );

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


  // -------------------------------

  // Confirm password form validation here:
  $('#except-change-setting-button').click(function(event) {
    // alert('s');
    // event.preventDefault();
    $('#confirm-password-form').validate({});
    $('[name="confirm-password"]').rules('add', {
      required: true,
      regex: "^[a-z0-9_]{6,30}$",
      messages: {
        required: "Vì lý do bảo mật, bạn cần xác nhận mật khẩu của mình",
        regex: "Mật khẩu dài từ 6 - 30 kí tự, gồm các chữ cái in thường không dấu, chữ số và dấu gạch dưới \" _ \"  "
      }
    });
    // $('#confirm-password-form').valid();
    if($('#confirm-password-form').valid()) {
      // alert('Mat khau hop le');
      closeModal($('#validation-button').attr('data-modalid'));
      var settingFormId = $('.setting-form').attr('id');
      var confirmPassword = $('[name="confirm-password"]').val();
      ajaxSendFormInputConfigPage(settingFormId, confirmPassword);
      // console.log($('#'+setting_form_id+' :input'));
    }


  });

  // -------------------------------


  // ----------------- Trang index - Cài đặt tài khoản: -----------------------
  $('#setting-account-form').validate({
    rules: {
      username: {
        required: true,
        regex: "^[\\w]{6,}$"
      },
      email: {
        required: true,
        email: true
      },
      phone: {
        required: false,
        xor: [{
          regex: "^[0-9]{9,11}$"
        }, {
          regex: "^[0-9]{9,11}$"
        }]

      }
    },
    messages: {
      username: {
        required : "Tên tài khoản không thể để trống",
        regex: "Tên tài khoản tối thiểu 6 kí tự, gồm chữ cái không dấu, chữ số là dấu gạch dưới \" _ \" "
      },
      email: {
        required: "Email không thể để trống"
      }
    }
  });

  $('#validation-button').click(function(event) {
    var parentForm =  $(this).parents('form').attr('id');
    
    if($('#setting-account-form').valid()) {
      var modal = $(this).attr('data-modalid');
      openModal(modal);
    }
  });

  function ajaxSendFormInputConfigPage(settingFormId, confirmPassword) {
    
    var inputObject = {};
    inputObject['confirm_password'] = confirmPassword;
    $('#'+settingFormId+' :input').each(function() {
      // Chỉ lấy input chứa dữ liệu và input chứa token, không lấy input[type = submit] hay button
      if( $(this).attr('data-info') || $(this).attr('name') == '_token'  ) {
        inputObject[$(this).attr('name')] = $(this).val();
      }
    });

    $.ajax({
      url: '/caidat/taikhoan/capnhat',
      type: 'POST',
      data: inputObject,
      beforeSend: function() {
        $('.ajax-loader').css('display', 'inline-block');

      },
      success: function() {
        // setting a timeout
        $('.ajax-loader').css('display', 'none');
      }
    })
    .done(function(response) {
      var m =  "";
      // if(response.errors)
      // console.log(response);
      // return;

      // Nếu muốn debug thì xem lại file login.js
      // Hoặc console.log(response)
      // Hoặc console.log(response.form_message)
      // Để hiểu cách duyệt mảng javascript (jquery)

      // console.log(response.form_message);
      if(response.errors) {

        $.each(response.errors, function(fieldsName, messagesArray) {
          messagesArray.forEach(function(message) {
            m += "<p>"+message+"</p>";
          });
        });

      } else {
        m += "<p>"+response.success+"</p>";
      }

      $('.myalert .--content').html(m);
      $('.myalert').fadeIn('fast');

      if(response.success) {
        setTimeout(function () {
          window.location.reload();
        }, 1000);
      }

    });
    
    
  }


 






  // End Trang index - Cài đặt tài khoản






});
