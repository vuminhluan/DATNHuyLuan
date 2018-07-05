
	// var socket = io.connect( 'http://'+window.location.hostname+':3000' );
	

	// var userID = $('#userid-nodejs-server').val();
	// if(!userID) {

	// } else {
	// 	socket.emit('mapUser', userID);
	// }

	// alert(moment().format('L'));

	$('.user-chat-box__footer__text-area').val('');

	$('.user-chat-box__modal__close-button').click(function() {
		$('.user-chat-box__modal').css('display', 'none');
	});

	$('.js-user-chat-button').click(function() {
		$('.user-chat-info-box').fadeToggle('fast');
	});

	$('.user-chat-box__footer__clear-message-button').click(function() {
		// alert('clear');
		var toID = $('#js-receiver').attr('data-receiver-id');
		// alert(toID); return;
		dataString = {
			_token: $('[name=_token]').val(),
			toID: toID
		};
		$.ajax({
			url: link_host+'/taikhoan/chat/xoa_khung_chat',
			type: 'GET',
			data: dataString,
		})
		.done(function(response) {
			$('.user-chat-box__body').html('');
			$('.user-chat-box__footer__text-area').val('');
			$('.user-chat-box__modal').css('display', 'none');

			console.log(response);
		})
		.fail(function(error) {
			console.log(error);
		});
		
	});

	var chatInfo = "";
	$('.js-send-message-to-this-person-button').click(function() {
		// alert($(this).attr('data-userid'));
		var toID = $(this).attr('data-userid');
		var fromID = $('#userid-nodejs-server').val();
		// alert(from+"---"+to); return;
		// alert(link_host+);return;
		// socket.emit('chatToNewUser', to);

		dataString = {
			_token: $('[name=_token]').val(),
			fromID: fromID,
			toID: toID
		};

		// console.log(dataString);return;
		$.ajax({
			url: link_host+'/taikhoan/chat/voi/taikhoannay',
			type: 'POST',
			// async: false,
			data: dataString,
		})

		.fail(function(error) {
			console.log(error);
		})
		.done(function(response) {
			// console.log(Object.keys(response).length);
			// console.log(response);$('.user-chat-box__modal').fadeIn('fast');return;
			// console.log(response['user'+to]['chat_list']);return;
			console.log(response);
			chatInfo = response['info'];
			// Gắn tên người nhắn tin và id của người đó lên header => để xóa khung chat
			$('#js-receiver').html(response['info'][0]['to_name']);
			$('#js-receiver').attr('data-receiver-id', response['info'][0]['to_id']);

			$('.user-chat-box__body').html('');
			$('.user-chat-box__body').prepend('<p class="chat-alert chat-alert-info">Cuộc trò chuyện bắt đầu lúc '+response['info'][0]['beginning_time']+'<p>');

			if(!response || !response['chat_list'] || response['chat_list'].length <= 0) {
				
			} else {
				

				var list = response['chat_list'];
				var listLength = list.length;
				// left -> chat của người khác; right->chat của mình
				for (var i = 0; i < listLength; i++) {
					var index = "chat-item__left";
					if(list[i]['id'] == response['info'][0]['from_id']) {
						index = "chat-item__right";
					}
					// console.log(list[i]['id']);console.log(fromID);
					var divMessage =
					"<div class='chat-item' title='"+list[i].time+"'> <div class='chat-item__wrapper "+index+"'> <div class='chat-item__header'><h4>"+list[i].name+"</h4></div> <div class='chat-item__body'>"+list[i].message+"</div> </div> </div>";
					$('.user-chat-box__body').prepend(divMessage);
				}

			}

			$('.user-chat-box__modal').fadeIn('fast');return;


		});
		
	});


	$('.user-chat-box__footer__send-message-button').click(function() {
		var message = $('.user-chat-box__footer__text-area').val();
		var toID = $('#js-receiver').attr('data-receiver-id');
		if(!message) {
			return;
		} else {
			socket.emit('checkIfOnline', toID);
		}
		// $('.user-chat-box__footer__text-area').val('');
	});


	$(document).ready(function() {

		socket.on('checkIfOnline', function (bool) {
			// Nếu ko online => ko gửi
			if(!bool) {
				$('.user-chat-box__body').prepend('<p class="chat-alert chat-alert-danger">'+chatInfo[0]['to_name']+' đang không trực tuyến. '+chatInfo[0]['to_name']+' sẽ không đọc được tin nhắn của bạn.<p>');
				return;
			// Ngược lại nếu đối tượng đang online => gửi
			} else {
				// Lưu vào session => Lấy ra => Hiện lên khung chat => Chuyển lên server => Phát lại cho đối tượng đang chat (trừ người gửi) => Lưu vào session của đối tượng đó.

				// Lưu session
				dataString = {
					_token: $('[name=_token]').val(),
					name: chatInfo[0]['from_name'],
					id: chatInfo[0]['from_id'],
					message: $('.user-chat-box__footer__text-area').val(),
					time: Date.now()/1000,
					toID: $('#js-receiver').attr('data-receiver-id')
				};
				$.ajax({
					url: link_host+'/taikhoan/chat/luuchat',
					type: 'POST',
					data: dataString,
				})
				.fail(function(error) {
					console.log(error);
				})
				.done(function(response) {
					// console.log(response);
					$('.user-chat-box__footer__text-area').val('');

					// Hiện lên khung chat
					var index = 'chat-item__right';
					var divMessage = 
					"<div class='chat-item' title='"+response.time+"'> <div class='chat-item__wrapper "+index+"'> <div class='chat-item__header'><h4>"+response.name+"</h4></div> <div class='chat-item__body'>"+response.message+"</div> </div> </div>";
					$('.user-chat-box__body').prepend(divMessage);

					// Emit lên server để gửi cho đối tượng đang chat cùng.
					var data = {
						toID: $('#js-receiver').attr('data-receiver-id'),
						fromID: chatInfo[0]['from_id'],
						message: response
					}
					socket.emit('sendMessageToSomeone', data);

				});
				
			}
		});

		socket.on('sendMessageToSomeone', function (idAndMessage) {
			// Nhận tin nhắn từ người khác => Hiển thị
			var toID = idAndMessage.toID;
			var fromID = idAndMessage.fromID;
			var message = idAndMessage.message;
			// console.log(toID);

			// Nếu khung chat đang mở => nếu đang chat với người gửi tin nhắn tới -> id của họ trên header của chatbox = id của người gửi tin nhắn tới -> hiện tin nhắn của họ lên
			// Nếu đang chat với người khác => không hiện
			if($('#js-receiver').attr('data-receiver-id') == fromID) {
				var index = 'chat-item__left';
				var divMessage = 
				"<div class='chat-item' title='"+message.time+"'> <div class='chat-item__wrapper "+index+"'> <div class='chat-item__header'><h4>"+message.name+"</h4></div> <div class='chat-item__body'>"+message.message+"</div> </div> </div>";
				$('.user-chat-box__body').prepend(divMessage);
			}

			// Lưu chat vào session
			$.ajax({
				url: link_host+'/taikhoan/chat/luuchat',
				type: 'POST',
				data: {param1: 'value1'},
			})
			.fail(function(error) {
				console.log(error);
			})
			.done(function() {
				console.log("success");
			});
			
			



			



		});

	});
	


	
	