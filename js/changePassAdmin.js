$(document).ready(function(){
  $('#changeEmailFeedBackAdmin').load('php/changePassAdmin.php').show();
  $('#changeEmailAdmin').keyup(function () {
    $.post('php/changePassAdmin.php', {changeEmailAdmin: changePassword.changeEmail.value},
  function (result){
    $('#changeEmailFeedBackAdmin').html(result).show();
  });
  });
});