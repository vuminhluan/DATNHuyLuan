$(document).ready(function() {
	
	// Reset
	$('#chat-box').val('');

	// Socket
	var socket = io.connect( 'http://'+window.location.hostname+':3000' );


	$('#open-chat-button').click(function(event) {
		$('#admin-chat-sidebar').css({
			'width': '400px',
			'margin-left': '0'
		});
	});

	$('#close-chat-button').click(function(event) {
		$('#admin-chat-sidebar').css({
			'width': '0px',
			'margin-left': '-100%'
		});
	});

 	// Lưu chat vào session  - Gửi lên nodejs server - Hiện chat của người gửi ra khung chat (pull-right)
 	// Có 1 nút -> Lưu tin nhắn vào database (nếu cần) -> Chưa có chức năng này :((
 	$('#send-chat-button').click(function() {
		var message = $('#chat-box').val().replace(/\r?\n/g,'<br/>');
		if(message == "") return;
		var senderName = $('#admin-fullname').html();
		var dataString = {
			message: message,
			sender_name: senderName,
			time: moment().calendar(),
			_token : $('[name=_token]').val()
		};

		var myMessage = "<div class='pull-right item own' title='"+dataString.time+"'><div class='pull-right item-right'><label for=''>"+senderName+"</label><p>"+message+"</p></div></div>";
		
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
    var message = "<div class='pull-left item' title='"+dataString.time+"'><div class='pull-left item-left'><label for=''>"+dataString.sender_name+"</label><p>"+dataString.message+"</p></div></div>";
    $('#chat-list').prepend(message);

    console.log(dataString);

    var dataString = {
			message: dataString.message,
			sender_name: dataString.sender_name,
			time: moment().calendar(),
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