$(document).ready(function() {

	// $('.help-mark').hover(function() {
	// 	$(this).children().show();
	// }, function() {
	// 	$(this).children().hide();
	// });


	//  Form đăng nhập

	// $.validator.addMethod("USERNAME", function(value, element) {
 //    return this.optional(element) || /^[\w.@]{6,30}$/.test(value);
 //  }, "Tài khoản hoặc email không hợp lệ");

  $.validator.addMethod("PASSWORD", function(value, element) {
    return this.optional(element) || /^[\w]{6,30}$/.test(value);
  }, "Mật khẩu không hợp lệ");

  $.validator.addMethod(
    "regex",
    function(value, element, regexp) {
        var re = new RegExp(regexp);
        return re.test(value);
    },
    "Dữ liệu không hợp lệ."
	);


	$('#sign-in-form').validate({
		rules: {
      username: {
      	regex: "^[\\w.\@]{6,30}$"
      },
      password: {
      	regex: "^[\\w]{6,30}$"
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
			$('#sign-up-form').submit();
			// return false;
		}
		showTab(currentTab);
	}


	$('#sign-up-next-btn').click(function (e) {

		$('#sign-up-form').validate({

		});

		// e.preventDefault();
		if(currentTab == 0) {

			$('[name="sign-up-lastname"]').rules('add', {
        required: true
	    });
			$('[name="sign-up-firstname"]').rules('add', {
        required: true,
        email: true
	    });
			$('#sign-up-form').valid();
			if($('#sign-up-form').valid()) {
				e.preventDefault();
				changeTab(1);
			}
		}

		if(currentTab == 1) {

			$('[name="sign-up-username"]').rules('add', {
        required: true

	    });
	    $('[name="sign-up-email"]').rules("add", {
	    	required: true
	    	// regex: "^[a-zA-Z]{3,40}$"
	    });

			$('[name="sign-up-password"]').rules('add', {
        required: true
	    });
			$('#sign-up-form').valid();
			if($('#sign-up-form').valid()) {
				e.preventDefault();
				changeTab(1);
			}
		}







	});

	$('#sign-up-prev-btn').click(function (e) {
		e.preventDefault();
		changeTab(-1);
	});




	// End Form đăng ký


});
