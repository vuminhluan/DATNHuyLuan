var socket = io.connect( 'http://'+window.location.hostname+':3000' );

var userID = $('#userid-nodejs-server').val();
if(!userID) {

} else {
	socket.emit('mapUser', userID);
}