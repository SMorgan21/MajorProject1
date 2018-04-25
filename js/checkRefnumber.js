$(document).ready(function(){
  $('#refereeNumberFeedBack').load('php/checkRefnumber.php').show();
  $('#refereeNumber').keyup(function () {
    $.post('php/checkRefnumber.php', {refereeNumber: regForm.refereeNumber.value},
  function (result){
    $('#refereeNumberFeedBack').html(result).show();
  });
  });
});
