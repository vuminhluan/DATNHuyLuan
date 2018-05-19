$(document).ready(function() {


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



  // Trang index - Cài đặt tài khoản:
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
        required : "Tên tài khoản không thể để trống.",
        regex: "Tên tài khoản tối thiểu 6 kí tự, gồm chữ cái"
      }
    }
  });



  // End Trang index - Cài đặt tài khoản






});
