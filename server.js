var app = require('express')();
var server = require('http').Server(app);
var io = require('socket.io')(server);
var redis = require('redis');
server.listen(6001);
io.on('error', function (s) {
    console.log(s);
});
io.on('connection', function (socket) {

    console.log("new client connected: "+socket.id);

    socket.on('chat', function (data) {
        console.log(data);
        io.sockets.emit('chat', data);
    });
});
