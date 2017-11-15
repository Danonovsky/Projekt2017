$('.slider').click(function(){
  var src = $(this).attr('src');
  $('.main').fadeOut(200, function(){
    $('.main').attr('src', src).fadeIn(100);
  });
});
