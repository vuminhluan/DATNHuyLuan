var socket = io.connect( 'http://'+window.location.hostname+':3000' );
    // console.log(socket);
    // console.log('asd');
socket.on('sendMessage', function(data) {
  $('.alert').append('Có <strong>1</strong> phản hồi mới chưa đọc từ '+data.fullname);
});