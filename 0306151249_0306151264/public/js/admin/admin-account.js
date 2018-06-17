$(document).ready(function() {

	// Hiện loader khi ấn submit form (điều kiện form đã được kiểm tra dữ liệu = javascript)
	$('.submitform-button').click(function() {
		if($(this).parents('form').valid()) {
			$('.myloader').show();
		}
	});

	$('body').on('click', '.detail-account', function(event) {
		event.preventDefault();
		
		$('.myloader').show();
		var id = $(this).attr('id');
		// alert(id); return;
		var data = {
			id    : id,
			_token: $('[name=_token]').val()
		};

		// console.log(data);

		$.ajax({
			url : link_host+'/admin/taikhoan/xemchitiet',
			type: 'POST',
			data: data,
		})
		.done(function(response) {
			// console.log(response);return;
			$('#username').html(response.taikhoan.ten_tai_khoan);
			$('#created_at').html(response.taikhoan.thoi_gian_tao);
			$('#fullname').html(response.nguoidung.ho_ten_lot+' '+response.nguoidung.ten);
			if (response.nguoidung.ten_an_danh) {
				$('#nickname').html('( '+response.nguoidung.ten_an_danh+' )');
			} else {
				$('#nickname').html('');
			}
			$('#email').html(response.taikhoan.email);
			$('#phone').html(response.taikhoan.so_dien_thoai);
			if (response.nguoidung.gioi_tinh == 1) {
				$('#gender').html('Nam');
			} else {
				$('#gender').html('Nữ');
			}
			$('#birthday').html(response.nguoidung.ngay_sinh);
			$('#about').html(response.nguoidung.gioi_thieu);


			$('#url-to-files').attr('href', link_host+'/admin/taikhoan/'+response.taikhoan.ten_tai_khoan+'/tep/server');
      $('#url-to-files-googledrive').attr('href', link_host+'/admin/taikhoan/'+response.taikhoan.ten_tai_khoan+'/tep/googledrive');


			$('.myloader').hide();
		})
		.fail(function() {
			console.log("error");
		});


	});



	// Add account Validation:
	$.validator.addMethod( "regex", function(value, element, regexp) {
      var re = new RegExp(regexp);
      return re.test(value);
    }
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

	$('#admin-add-account-form').validate({
		rules: {
      familyname: {
      	regex: myregex['tiengviet'],
      	maxlength: 30,
      },
      firstname: {
      	regex: myregex['tiengviet'],
      	maxlength: 20,
      },
      username: {
      	required: true,
        regex: myregex['ten_taikhoan'],
      },
      email: {
      	required: true,
        email: true
      },
      password: {
      	required: true,
        regex: myregex['matkhau'],
      },
      reenter_password: {
      	required: true,
      	equalTo: "#password"
      }
    },
    messages: {
      familyname: {
      	regex:	"Họ tên lót không hợp lệ.",
      	maxlength: "Không được dài quá {0} kí tự"
      },
      firstname: {
      	regex:	"Tên không hợp lệ.",
      	maxlength: "Không được dài quá {0} kí tự"
      },
      username: {
        required: "Xin hãy nhập tên tài khoản",
        regex:	"Tên tài khoản không hợp lệ."
      },
      password: {
        required: "Xin hãy nhập mật khẩu",
        regex:	"Mật khẩu không hợp lệ."
      },
      email: {
        required: "Xin hãy nhập email",
        email: "Không đúng định dạng email",
      },
      reenter_password: {
        required: "Tin nhắn không được để trống",
        equalTo: "Mật khẩu nhập lại không khớp"
      }
    }
	});

	$('#change-password-form').validate({

		rules: {
			cur_password: {
      	required: true,
        regex: myregex['matkhau']
      },
      new_password: {
      	required: true,
        regex: myregex['matkhau']
      },
      
      reenter_password: {
        required: true,
        equalTo: "#new-password"
      }
    },
    messages: {
      cur_password: {
        required: "Chưa có mật khẩu hiện tại",
        regex: "Mật khẩu có độ dài từ 6 - 30 kí tự, chỉ bao gồm các chữ cái in thường, chữ số và dấu gạch dưới"
      },
      new_password: {
        required: "Chưa có mật khẩu mới",
        regex: "Mật khẩu có độ dài từ 6 - 30 kí tự, chỉ bao gồm các chữ cái in thường, chữ số và dấu gạch dưới"
      },
      reenter_password: {
        required: "Vì lý do an toàn, xin hãy nhập lại mật khẩu mới một lần nữa",
        equalTo: "Mật khẩu nhập lại không khớp"
      }
    }
	});

	$('#deactive-account-form').validate({

		rules: {
			password: {
      	required: true,
        regex: myregex['matkhau']
      }
    },
    messages: {
      password: {
        required: "Chưa có mật khẩu hiện tại",
        regex: "Mật khẩu có độ dài từ 6 - 30 kí tự, chỉ bao gồm các chữ cái in thường, chữ số và dấu gạch dưới"
      }
    }
	});

	$('#deactive-account-button').click(function(e) {
		e.preventDefault();
		if($(this).parents('form').valid()) {
			if(!confirm('Bạn thật sự muốn vô hiệu hóa (xóa) tài khoản này ?')) {
				$('.myloader').hide();
				return;
			}
			$(this).parents('form').submit();
		}
	});

	$('#change-basic-info-form').validate({

		rules: {
			familyname: {
      	required: true,
        regex: myregex['tiengviet']
      },
      firstname: {
      	required: true,
        regex: myregex['tiengviet']
      },
      
      birthday: {
        required: true
      }
    },
    messages: {
      familyname: {
        required: "Chưa có mật khẩu hiện tại",
        regex: "Họ tên lót tối đa 30 kí tự chỉ bao gồm các chữ cái và khoảng trắng. Không có kí tự khoảng trắng ở đầu hoặc cuối"
      },
      firstname: {
        required: "Chưa có mật khẩu mới",
        regex: "Tên tối đa 20 kí tự chỉ bao gồm các chữ cái và khoảng trắng. Không có kí tự khoảng trắng ở đầu hoặc cuối"
      },
      birthday: {
        required: "Chưa có ngày sinh"
      }
    }
	});

	$('#change-contact-info-form').validate({
    rules: {
      username: {
        required: true,
        regex : myregex['ten_taikhoan']
      },
      email: {
        required: true,
        email: true
      },
      phone: {
        required: false,
        xor: [{
          // regex: "^[0-9]{9,11}$"
          regex : myregex['sodienthoai']
        }, {
          // regex: "^[0-9]{9,11}$"
          regex : myregex['sodienthoai']
        }]

      }
    },
    messages: {
      username: {
        required : "Tên tài khoản không thể để trống",
        regex: "Tên tài khoản tối thiểu 6 kí tự, gồm chữ cái không dấu, chữ số là dấu gạch dưới \" _ \" "
      },
      email: {
        required: "Email không thể để trống",
        email: "Email không hợp lệ"
      },
      phone: {
      	xor: "Số điện thoại không hợp lệ"
      }
    }
  });

	


});