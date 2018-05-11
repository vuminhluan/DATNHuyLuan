$(document).ready(function() {

  // Add method regex
  $.validator.addMethod( "regex", function(value, element, regexp) {
        var re = new RegExp(regexp);
        return re.test(value);
    }
	);

  // End add method regex

  $('#contact-form').validate({
		rules: {
      fullname: {
      	regex: "^([A-Za-zÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚÝàáâãèéêìíòóôõùúýĂăĐđĨĩŨũƠơƯưẠ-ỹ]{1,10}\\s[A-Za-zÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚÝàáâãèéêìíòóôõùúýĂăĐđĨĩŨũƠơƯưẠ-ỹ]{1,15}((\\s[A-Za-zÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚÝàáâãèéêìíòóôõùúýĂăĐđĨĩŨũƠơƯưẠ-ỹ]{1,15})?)+$)"
      },
      email: {
      	required: true,
        email: true
      },
      message: {
      	required: true,
        minlength: 20,
        maxlength: 40
      }
    },
    messages: {
      fullname: "Họ tên không hợp lệ",
      email: {
        required: "Xin hãy nhập email để chúng tôi có thể trả lời lại trong tương lai",
        email: "Không đúng định dạng email",
      },
      message: {
        required: "Tin nhắn không được để trống",
        minlength: "Tin nhắn ngắn nhất {0} kí tự",
        maxlength: "Tin nhắn dài tối đa {0} kí tự"
      }
    }
	});






});
