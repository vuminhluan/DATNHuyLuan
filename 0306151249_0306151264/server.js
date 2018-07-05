var socket  = require( './public/node_modules/socket.io' );
var express = require('./public/node_modules/express');
var app     = express();
var server  = require('http').createServer(app);
var io      = socket.listen( server );
var port    = process.env.PORT || 3000;

server.listen(port, function () {
  console.log('Server listening at port %d', port);
});

socketsArray = { };

function getKeyByValue(obj, value) {
  var key = null;
  for (var prop in obj) {
    if (obj.hasOwnProperty(prop)) {
      if(obj[prop] === value) {
        key = prop;
        return key;
      }
    }
  }
}


io.on('connection', function (socket) {
  // console.log("co ng moi tham gia "+socket.id);
  // When login successfully => save socket to array sockets
  socket.on('mapUser', function (userID) {
    socketsArray[userID] = {'socketID': socket.id, 'online': true};
    // socketsArray[userID] = socket.id;
    console.log('maped users:');console.log(socketsArray);
  });
  
  socket.on('checkIfOnline', function (toID) {
    if (socketsArray[toID] && socketsArray[toID].online) {
      // socket.broadcast.to(socketsArray[toID].socketID).emit('checkIfOnline', true);
      // console.log('online');
      socket.emit('checkIfOnline', true);
    } else {
      // console.log('offline');
      socket.emit('checkIfOnline', false);
    }
  });


  socket.on('sendMessageToSomeone', function (data) {
    socket.broadcast.to(socketsArray[data['toID']].socketID).emit('sendMessageToSomeone', data);
  });





  // Contact - realtime

  socket.on( 'sendMessage', function(data) {
    io.sockets.emit( 'sendMessage', data);

  });

  // End contact -realtime







  // admin CHAT

  // Join admin room
  
  socket.on('joinRoomAdmin', function (room) {
    socket.join(room);
    console.log('joined '+room);
  });

  // console.log(socket.id);
  // console.log(socket.adapter.rooms['RoomAdmin'].sockets);

  socket.on( 'adminChatMessage', function(data) {
    // io.sockets.to('RoomAdmin').emit('adminChatMessage', data);
    socket.broadcast.to('RoomAdmin').emit('adminChatMessage', data);
  });
  // End admin CHAT






  socket.on('disconnect', function () {
    for(i in socketsArray) {
      if(socketsArray[i].socketID == socket.id) {
        socketsArray[i].online = false;
      }
      // console.log(socketsArray);
    }
  });

  
});
