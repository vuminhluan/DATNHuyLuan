var socket  = require( './public/node_modules/socket.io' );
var express = require('./public/node_modules/express');
var app     = express();
var server  = require('http').createServer(app);
var io      = socket.listen( server );
var port    = process.env.PORT || 3000;

server.listen(port, function () {
  console.log('Server listening at port %d', port);
});


io.on('connection', function (socket) {


  // console.log(socket.id);

  


  // Test
  socket.on( 'sendMessage', function(data) {
    io.sockets.emit( 'sendMessage', data);
    // console.log(data);
  });






  // admin CHAT


  // Join admin room
  socket.join('RoomAdmin');
  // console.log(socket.adapter.rooms);

  // socket.on( 'adminChatMessage', function(data) {
  //   socket.broadcast.emit( 'adminChatMessage', data);
  // });

  socket.on( 'adminChatMessage', function(data) {
    // io.sockets.to('RoomAdmin').emit('adminChatMessage', data);
    socket.broadcast.to('RoomAdmin').emit('adminChatMessage', data);
  });



  // End admin CHAT

  
});
