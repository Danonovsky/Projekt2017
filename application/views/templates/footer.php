<footer class="text-center">
  Created by Daniel Józefiuk and Michał Misiak &copy; 2017 All rights reserved.
</footer>
<script src="<?=base_url().'assets/js/jquery-3.2.1.min.js'?>"></script>
<script src="<?=base_url().'assets/js/bootstrap.min.js'?>"></script>
<script src="<?=base_url().'assets/js/announcementPhotos.js'?>"></script>
<script src="<?=base_url().'assets/js/validation.js'?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.4/socket.io.js"></script>
<script>
var socket=io.connect('http://'+window.location.hostname+':3000');

$('#sendMessage').submit(function(){
  if($('#messageContent').val()!='') {
    var object={
      'senderId':$('#senderId').val(),
      'receiverId':$('#receiverId').val(),
      'content':$('#messageContent').val()
    };
    socket.emit('messageSend',object);
    $('#messageContent').val('');
    return false;
  }
  else {
    alert('Cannot send empty messages');
    event.preventDefault();
  }
});

socket.on('messageSent', function(msg){
  var userId=$('#senderId').val();
});
</script>
