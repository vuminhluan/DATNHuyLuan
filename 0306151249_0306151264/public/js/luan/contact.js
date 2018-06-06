$(document).ready(function() {

  function getFormData(form_id) {
    inputObject = {};
    $('#'+form_id+' :input').each(function() {
      // Chỉ lấy input chứa dữ liệu (thêm data-info = 1) và input chứa token, không lấy input[type = submit] hay button
      if( $(this).attr('data-info') || $(this).attr('name') == '_token'  ) {
        inputObject[$(this).attr('name')] = $(this).val();
      }
    });
    return inputObject;
  }

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
      	regex: "^([A-Za-zÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚÝàáâãèéêìíòóôõùúýĂăĐđĨĩŨũƠơƯưẠ-ỹ]{1,10}((\\s[A-Za-zÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚÝàáâãèéêìíòóôõùúýĂăĐđĨĩŨũƠơƯưẠ-ỹ]{1,15})?)+$)"
      },
      email: {
      	required: true,
        email: true
      },
      message: {
      	required: true,
        minlength: 20,
        maxlength: 500
      }
    },
    messages: {
      fullname: "Họ tên không hợp lệ.",
      email: {
        required: "Xin hãy nhập email để chúng tôi có thể trả lời lại trong trường hợp cần thiết",
        email: "Không đúng định dạng email",
      },
      message: {
        required: "Tin nhắn không được để trống",
        minlength: "Tin nhắn ngắn nhất {0} kí tự",
        maxlength: "Tin nhắn dài tối đa {0} kí tự"
      }
    }
	});


  $('.send-message-button').click(function(event) {
    event.preventDefault();
    if($('form#contact-form').valid()) {

      sendRealtimeMessage();
      return;
    }
  });

  function sendRealtimeMessage() {
    
    // alert(link_host);

    var dataString = getFormData('contact-form');
    // console.log(dataString);



    $.ajax({
      url: link_host+'/socket/gui/tinnhan',
      type: 'POST',
      data: dataString,
      cache : false,
    })
    .done(function(response) {
      console.log(response);

      // socket io
      var socket = io.connect( 'http://'+window.location.hostname+':3000' );
      // console.log(socket);

      socket.emit('sendMessage', response);

    });
    




  }






});
