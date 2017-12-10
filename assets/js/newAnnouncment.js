$(document).ready(function() {

  function refresh() {
    var _id=$('#category').val();
    var _url=$('#site_url').data('base-url');
    $.ajax({
      type: "POST",
      url: $('#site_url').data('base-url')+'index.php/ajax/categoryData',
      dataType: 'json',
      data: {
        id: _id
      },
      success: function(data) {
        $('#subData').html('');
        if(data['response']) {
          //success
          for(i=2;i<data['response'].length;i++) {
            var x=data['response'][i]['Field'];
            var placeholder="";
            if(data['response'][i]['Type']=='date') {
              placeholder=' placeholder="yyyy-mm-dd"';
            }
            var element='<p><label class="margin label label-primary" for="'+x+'">'+x+': </label><input class="margin form-control input-sizer" type="text" name="'+x+'"'+placeholder+'></p>';
            $(element).appendTo('#subData');
          }
        }
      }
    });
  }

  function readURL(input) {
    if(input.files) {
      $('.previewPictures').empty();
      $.each(input.files, function() {
        var reader= new FileReader();
        reader.onload=function(e) {
          var element='<img class="previewPicture" src="'+e.target.result+'" alt="zdjecie">'
          $(element).appendTo('.previewPictures');
        }
        reader.readAsDataURL(this);
      });

    }
  }

  $('#pictures').on('change', function() {
    readURL(this);
  });
  $('#category').on('change', function() {
    refresh();
  });
  refresh();
});
