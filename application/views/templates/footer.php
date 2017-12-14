<footer class="text-center">
  Created by Daniel Józefiuk and Michał Misiak &copy; 2017 All rights reserved.
</footer>
<script src="<?=base_url().'assets/js/jquery-3.2.1.min.js'?>"></script>
<script src="<?=base_url().'assets/js/bootstrap.min.js'?>"></script>
<script src="<?=base_url().'assets/js/announcementPhotos.js'?>"></script>
<script src="<?=base_url().'assets/js/validation.js'?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.4/socket.io.js"></script>
<script>
$(document).ready(function(){
  $("#messageList").animate({ scrollTop:100000 }, 1);
  var path=window.location.pathname;
  var pathArr=path.split("/");
  var conversation=pathArr[pathArr.length-2];
  var conversationId=pathArr[pathArr.length-1];
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
    msg[0]['date'][10]=" ";
    if(userId==msg[0]['ownerId'] || userId==msg[0]['toId']) {
      if(conversation=='conversation' && (msg[0]['ownerId']==conversationId || msg[0]['toId']==conversationId)) {
        var className='messageOwner';
        var userName=$('#myName').val();
        if(msg[0]['toId']==userId) {
          className="messageGetter";
          userName=$('#hisName').val();
        }
        var element='<div class="'+className+'">';
        element+='<span>'+userName+'</span>';
        element+='<span><sup> '+msg[0]['date']+'</sup></span>';
        element+='<p style="word-wrap: break-word;overflow-wrap:break-word">'+msg[0]['content']+'</p>';
        element+='</div>';
        $(element).appendTo("#messageList");
        $("#messageList").animate({ scrollTop: 100000 }, 1);
      }
      else {
        var href=$('#site_url').data('base-url')+'index.php/messages/conversation/';
        if(msg[0]['toId']==userId) {
          href+=msg[0]['ownerId'];
          var element='<div class="alert alert-success alert-dismissible fade in alert-fixed">';
          element+='<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
          element+='<a href="'+href+'" class="alert-link" data-dismiss="alert">New message. Click to see.</a>'
          element+='</div>'
          $(element).appendTo('body');
        }
      }
    }
  });
});
</script>
