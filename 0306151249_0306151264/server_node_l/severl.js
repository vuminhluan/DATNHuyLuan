var io = require('socket.io')(6001)
console.log('Conected to port 6001')
io.on('error',function (socket) {
	console.log('error')
})
io.on('connection',function(socket) {
	console.log('Co nguoi vua ket noi'+socket.id)

	socket.on('disconnect',function(socket){
		console.log('Co nguoi vua ngat! ket noi'+socket.id)
	})


	socket.on('tao-room',function(data){
		console.log(data)
		socket.join(data)
	})




})



var Redis = require('ioredis')
var redis = new Redis(1001)
redis.psubscribe("*",function(error,count){

})



redis.on('pmessage',function(partner,channel,message){
	console.log(channel)
 console.log(message)
	console.log(partner)
	message = JSON.parse(message)
	 io.emit(channel+':'+message.event,message.data.messageln)	
	 console.log('Sent')
})