var app = require('express')();
var server = require('http').Server(app);
var io = require('socket.io')(server, { origins: '*:*'});
var redis = require('redis');

server.listen(6999);

io.on('connection',function(socket) {
    console.log("User connected");
    socket.on('conversation', msg => {
        console.log(msg);
        io.emit('conversation', msg);
    });
    console.log('Starting');
    var redisClient = redis.createClient();
    redisClient.subscribe('message');
    redisClient.subscribe('typingMessage');

    redisClient.on("message",function(channel, message){
        console.log(message);
        socket.emit(channel,message);
    });

    redisClient.on("typingMessage",function(channel, typingMessage){
        socket.emit(channel,typingMessage);
    });
    
    socket.on('disconnect',function(){
        redisClient.quit();
    });
});