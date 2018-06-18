$(document).ready(function() {
	

	// Reset
	$('#chat-box').val('');



	// Socket
	var socket = io.connect( 'http://'+window.location.hostname+':3000' );



	// $('#send-chat-button').click(function() {
	// 	var message = $('#chat-box').val();

	// 	socket.emit('testMessage', message);

	// 	var message = "<div class='pull-right item item-right'><label>A</label><p>"+message+"</p></div>";
 //    $('#chat-list').prepend(message);

		
	// });

	// // broadcast from server
	// socket.on('testMessage', function(data) {
    
 //    var message = "<div class='pull-left item item-left'><label>A</label><p>"+data+"</p></div>";
 //    $('#chat-list').prepend(message);
 //  });


 	// Lưu chat vào session  - Gửi lên nodejs server - Hiện chat của người gửi ra khung chat (pull-right)
 	// Có 1 nút -> Lưu tin nhắn vào database (nếu cần) -> Chưa có chức năng này :((
 	$('#send-chat-button').click(function() {
		var message = $('#chat-box').val();
		if(message == "") return;
		var senderName = $('#admin-fullname').html();
		var dataString = {
			message: message,
			sender_name: senderName,
			_token : $('[name=_token]').val()
		};

		var myMessage = "<div class='pull-right item own' title='Thời gian'><div class='pull-right item-right'><label for=''>"+senderName+"</label><p>"+message+"</p></div></div>";
		
    $('#chat-list').prepend(myMessage);
    $('#chat-box').val('');

    


		$.ajax({
			url: link_host+'/admin/chat/luuchat',
			type: 'POST',
			data: dataString,
		})
		.done(function(data) {
			socket.emit('adminChatMessage', dataString);
		})
		.fail(function() {
			console.log("error");
		});
		
	});

	// broadcast from server
	socket.on('adminChatMessage', function(dataString) {
    var message = "<div class='pull-left item' title='Thời gian'><div class='pull-left item-left'><label for=''>"+dataString.sender_name+"</label><p>"+dataString.message+"</p></div></div>";
    $('#chat-list').prepend(message);

    console.log(dataString);

    var dataString = {
			message: dataString.message,
			sender_name: dataString.sender_name,
			_token : $('[name=_token]').val()
		};

    $.ajax({
			url: link_host+'/admin/chat/luuchat',
			type: 'POST',
			data: dataString,
		})
		.done(function(data) {
			console.log('luu reply chua ta');
		})
		.fail(function() {
			console.log("error");
		});

  });


	$('#delete-chat-button').click(function() {
		// var dataString = {
		// 	_token : $('[name=_token]').val()
		// };
		$.ajax({
			url: link_host+'/admin/chat/xoa_khung_chat',
			type: 'GET',
			// data: dataString,
		})
		.done(function(data) {
			$('#chat-list').html('');
			console.log(data);
		})
		.fail(function() {
			console.log("error");
		});
	});




});