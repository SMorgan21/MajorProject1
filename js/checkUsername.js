$(document).ready(function(){
  $('#feedBack').load('php/checkUsername.php').show();
  $('#userName').keyup(function () {
    $.post('php/checkUsername.php', {userName: regForm.userName.value},
  function (result){
    $('#feedBack').html(result).show();
  });
  });
});
