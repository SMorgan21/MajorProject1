$(document).ready(function(){
  $('#changeEmailFeedBack').load('php/checkChangePassEmail.php').show();
  $('#changeEmail').keyup(function () {
    $.post('php/checkChangePassEmail.php', {changeEmail: changePassword.changeEmail.value},
  function (result){
    $('#changeEmailFeedBack').html(result).show();
  });
  });
});
