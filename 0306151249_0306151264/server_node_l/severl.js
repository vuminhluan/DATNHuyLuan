var io = require('socket.io')(6001)
console.log('Conected to port 6001')
io.on('error',function (socket) {
	console.log('error')
})
io.on('connection',function(socket) {
	console.log('Co nguoi vua ket noi'+socket.id)
})
var Redis = require('ioredis')
var redis = new Redis(1001)


redis.on('pmessenge',function(partner,channel,message){
	console.log(channel)
	console.log(message)
	console.log(partner)
	// io.emit(channel+":"+message.event,message.data.messageln)
	// console.log('Sent')
})