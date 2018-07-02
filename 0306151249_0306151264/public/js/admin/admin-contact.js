
// $(document).ready(function() {
	
	// var socket = io.connect( 'http://'+window.location.hostname+':3000' );
 //    // console.log(socket);
 //    // console.log('asd');
	// socket.on('sendMessage', function(data) {
	//   // $('.alert').append('Có <strong>1</strong> phản hồi mới chưa đọc từ '+data.fullname);
	//   // Update message counter
	//   var messageCounter = parseInt($('#message-counter').attr('title'), 10) + 1; // cơ số 10
	//   $('#message-counter').attr('title', parseInt(messageCounter));
	//   if(messageCounter > 1000) {
	//   	messageCounter = parseInt(messageCounter/1000)+' k';
	//   }
	//   $('#message-counter').html(messageCounter);


	//   // Update record;

	//   var record = "<tr class='alert alert-info' style='color: #333'><td><input name='id[]' type='checkbox' value='0'></td><td><a href='view-contact.html'>Phản hồi số </a></td><td class='hidden-xs'>hoten</td><td class='hidden-sm hidden-xs'>email</td><td class='hidden-sm hidden-xs'>thoigian</td><td><i class='fa fa-envelope-o' data-toggle='tooltip' data-placement='top' title='Phản hồi chưa đọc'></i></td></tr>";

	//   $('#message-table tbody').prepend(record);






	// });


// });

$(document).ready(function() {

	$('body').on('click', '.detail-message', function(event) {

		$('.myloader').show();
		var id = $(this).attr('id');
		// alert(id); return;
		var seen = 0;

		if($('#seen'+id).attr('data-seen') == 1) {
			seen = 1;
		} else {
			$('#seen'+id).attr('class', 'fa fa-check text-success');
		}

		var data = {
			id    : id,
			seen  : seen,
			_token: $('[name=_token]').val()
		};

		$.ajax({
			url: link_host+'/admin/phanhoi/xemchitiet',
			type: 'POST',
			data: data,
		})
		.done(function(response) {
			

			$('#contact-fullname').html(response.ho_va_ten);
			$('#contact-email').html(response.email);
			$('#contact-created-at').html(response.thoi_gian_tao);
			$('#contact-id').html(response.ma);
			$('#contact-message code').html(response.tin_nhan);

			$('.myloader').hide();
		})
		.fail(function() {
			console.log("error");
		});
		
	});


});

