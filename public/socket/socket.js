var io = require('socket.io')();

var Redis = require('ioredis');
var redis = new Redis();

redis.subscribe('testChannel');

redis.on('message', function(channel, message) {
  message = JSON.parse(message);
  console.log(message);
  io.emit(channel + ':' + message.event, message.data); //Fire event with channel and data (Channel:Event)
});

io.listen(3000);