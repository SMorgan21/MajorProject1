$(document).ready(function(){
  $('#feedBack').load('php/check.php').show();
  $('#userName').keyup(function () {
    $.post('php/check.php', {userName: regForm.userName.value},
  function (result){
    $('#feedBack').html(result).show();
  });
  });
});
