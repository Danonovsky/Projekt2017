$(document).ready(function(){
  var validation = false;
  var pass;
  var pass1;

  $('input[name="name"]').blur(function(){
    var name = $('input[name="name"]').val();
    var nameReg = /[a-z]/i;
    if (nameReg.test(name)){
      validation=true;
      $('#name').removeClass('has-error');
      $('#name').addClass('has-success');
    }
    else{
      validation=false;
      $('#name').addClass('has-error');
      $('input[name="name"]').val('');
      $('input[name="name"]').attr('placeholder', 'Podano niepoprawne imię.');
    }
  });

  $('input[name="surname"]').blur(function(){
    var name = $('input[name="surname"]').val();
    var nameReg = /[a-z]/i;
    if (nameReg.test(name)){
      validation=true;
      $('#surname').removeClass('has-error');
      $('#surname').addClass('has-success');
    }
    else{
      validation=false;
      $('#surname').addClass('has-error');
      $('input[name="surname"]').val('');
      $('input[name="surname"]').attr('placeholder', 'Podano niepoprawne nazwisko.');
    }
  });

  $('input[name="email"]').blur(function(){
    var name = $('input[name="email"]').val();
    var nameReg = /^[0-9a-zA-Z_.-]+@[0-9a-zA-Z.-]+\.[a-zA-Z]{2,3}$/;
    if (nameReg.test(name)){
      validation=true;
      $('#email').removeClass('has-error');
      $('#email').addClass('has-success');
    }
    else{
      validation=false;
      $('#email').addClass('has-error');
      $('input[name="email"]').val('');
      $('input[name="email"]').attr('placeholder', 'Podano niepoprawny E-mail.');
    }
  });

    $('input[name="password"]').blur(function(){
      pass = $('input[name="password"]').val();
      //var nameReg = /^[0-9a-zA-Z_.-]+@[0-9a-zA-Z.-]+\.[a-zA-Z]{2,3}$/;
      if (pass!=""){
        validation=true;
        $('#password').removeClass('has-error');
        $('#password').addClass('has-success');
      }
      else{
        validation=false;
        $('#password').addClass('has-error');
        $('input[name="password"]').val('');
        $('input[name="password"]').attr('placeholder', 'Hasło nie może być puste.');
      }
    });

    $('input[name="password1"]').blur(function(){
      pass1 = $('input[name="password1"]').val();
      //var nameReg = /^[0-9a-zA-Z_.-]+@[0-9a-zA-Z.-]+\.[a-zA-Z]{2,3}$/;
      if (pass==pass1){
        validation=true;
        $('#password1').removeClass('has-error');
        $('#password1').addClass('has-success');
      }
      else{
        validation=false;
        $('#password1').addClass('has-error');
        $('input[name="password1"]').val('');
        $('input[name="password1"]').attr('placeholder', 'Hasła muszą być takie same.');
      }
    });

    $('input[name="phoneNr"]').blur(function(){
      var name = $('input[name="phoneNr"]').val();
      var nameReg = /[0-9]{9}/i;
      if (nameReg.test(name)){
        validation=true;
        $('#phoneNr').removeClass('has-error');
        $('#phoneNr').addClass('has-success');
      }
      else{
        validation=false;
        $('#phoneNr').addClass('has-error');
        $('input[name="phoneNr"]').val('');
        $('input[name="phoneNr"]').attr('placeholder', 'Numer musi składać się z 9 cyfr.');
      }
    });

    $('input[name="city"]').blur(function(){
      var city = $('input[name="city"]').val();
      //var nameReg = /^[0-9a-zA-Z_.-]+@[0-9a-zA-Z.-]+\.[a-zA-Z]{2,3}$/;
      if (city!=""){
        validation=true;
        $('#city').removeClass('has-error');
        $('#city').addClass('has-success');
      }
      else{
        validation=false;
        $('#city').addClass('has-error');
        $('input[name="city"]').val('');
        $('input[name="city"]').attr('placeholder', 'Miasto musi zostać podane.');
      }
    });
});
