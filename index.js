var express = require('express'),
  app = express(),
  server = require('http').createServer(app),
  io = require('socket.io').listen(server),
  mysql = require('mysql');

var con=mysql.createConnection({
  host:"localhost",
  user:"root",
  password:"",
  database:"projekt2017",
  dateStrings: 'date'
});

if(con) console.log("dbconnected");
else console.log("not connected");

server.listen(process.env.PORT || 3000);

io.sockets.on('connection', function (socket) {
   console.log("Socket connected.");

   socket.on('messageSend', function(msg){
     console.log(msg);
     var sql="insert into messages(ownerId,toId,content) values ?";
     var values=[
       [msg['senderId'],msg['receiverId'],msg['content']]
     ];
     con.query(sql,[values], function(err,result) {
       if(err) throw err;
       console.log("Number of records inserted: " +result.affectedRows);
       var insertedId=result.insertId;
       con.query("select * from messages where id='"+insertedId+"'", function(err,result) {
         if(err) throw err;
         io.emit('messageSent',result);
       });

     });
   });

});
