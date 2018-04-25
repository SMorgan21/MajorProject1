$(document).ready(function(){
  $('#emailFeedBack').load('php/checkEmail.php').show();
  $('#email').keyup(function () {
    $.post('php/checkEmail.php', {email: regForm.email.value},
  function (result){
    $('#emailFeedBack').html(result).show();
  });
  });
});
