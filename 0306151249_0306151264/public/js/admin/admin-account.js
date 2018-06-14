$(document).ready(function() {
	
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


});