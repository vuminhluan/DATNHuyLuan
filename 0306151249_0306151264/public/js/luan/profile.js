$(document).ready(function() {

	// // Open modal
	// $('.modal-open-button').click(function() {
	// 	closeModal($(this).attr('data-modalid'));
	// });
	//
	// // Close modal
	// $('.modal-cancel-button').click(function() {
	// 	closeModal($(this).attr('data-modalid'));
	// });
  $('.myloader').hide();

  
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


	$('.group-action-button').click(function() {
		if( $(this).parent().hasClass('js-card-hover') ) {
			$(this).parent().removeClass('js-card-hover');
		} else {
			$(this).parent().addClass('js-card-hover');
		}

		$(this).next().fadeToggle('fast');
	});


	$('#upload-avatar').change(function(event) {
		event.preventDefault();
		$(this).parent('form').submit();
	});

	$('#upload-banner').change(function(event) {
		event.preventDefault();
		$(this).parent('form').submit();
	});

	// Validation for update profile form
	$('#update-profile-form').validate({
    rules: {
      profile_family_middle_name: {
        required : true,
        regex    : myregex['tiengviet'],
        maxlength: 30
      },
      profile_first_name: {
        required : true,
        regex    : myregex['tiengviet'],
        maxlength: 20
      },
      profile_secret_name: {
        required : true,
        minlength: 3,
        regex    : myregex['ten_andanh']
      },
      profile_bio: {
      	required: false,
	      xor: [{
	        regex: myregex['tiengviet'],
       		maxlength: 150
       		// required: false,
	      }, {
	        regex: myregex['tiengviet'],
       		maxlength: 150
	      }]
      },

      profile_birthday: {
      	required: false,
        xor: [{
          date: true
        }, {
          date: true
        }]
      }

    },
    messages: {
    	profile_family_middle_name: {
        required : 'Họ và tên lót không được để trống',
        regex    : 'Họ tên lót phải là tiếng việt có dấu',
        maxlength: 'Họ tên lót dài tối đa {0} kí tự'
    	},
    	profile_first_name: {
        required : 'Tên không được để trống',
        regex    : 'Tên phải là tiếng việt có dấu',
        maxlength: 'Tên dài tối đa {0} kí tự'
    	},
      profile_secret_name: {
        required : 'Bạn cần có tên ẩn danh',
        regex    : 'Tên ẩn danh chỉ bao gồm các chữ cái (có dấu) và các chữ số',
        minlength: 'Tên ẩn danh phải tối thiểu {0} kí tự'
      },
    	profile_bio: {
        regex    : 'Lời giới thiệu phải là tiếng việt có dấu',
        maxlength: 'Lời giới thiệu dài tối đa {0}'
    	}
    }
  });


  // Block account button
  $('#block-this-account-button').click(function(event) {
    event.preventDefault();
    var userid = $('#username-userid').attr('data-userid');
    var username = $('#username-userid').attr('data-username');
    // alert(username); return;
    // alert(userid);
    if(confirm('Bạn muốn chặn tài khoản này ?')) {
      window.location.href = link_host+"/taikhoan/chan/"+userid+"/"+username;
    }
  });


  // Report account

  $('#report-input').val('');

  $('#report-this-account-button').click(function(event) {
    event.preventDefault();
    var id = $('#username-userid').attr('data-userid');
    
    $.ajax({
      url: link_host+'/taikhoan/'+id+'/kiemtra/baocao',
      type: 'GET',
    })
    .done(function(response) {
      // console.log(response);return;

      // Nếu đối tượng này đã được báo cáo và chưa được xử lý => Hiển thị nội dung cũ
      if(response.reported) {
        $('#report-input').val(response.content);
        $('#report-message').html(response.message);
      }
      $('.report-modal').fadeIn('fast');
    })
    .fail(function() {
      console.log("error");
    });
    
  });

  $('#close-report-modal').click(function(event) {
    $(this).parents('.report-modal').fadeOut('fast');
  });


  //---->Report form validation
  $('#report-account-form').validate({
    rules: {
      report_input: {
        required: true,
        minlength: 20,
        maxlength: 200
      }
    },

    messages: {
      report_input: {
        required: "Chưa có nội dung báo cáo",
        minlength: "Nội dung báo cáo dài tối thiểu {0} kí tự",
        maxlength: "Nội dung báo cáo dài tối đa {0} kí tự"
      }
    },

  });


  // End report account


});
