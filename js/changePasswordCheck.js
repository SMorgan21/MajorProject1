$(document).ready(function() {//gets the document ready
  $('#changeConPassword').keyup(function() {//checks for key press within the confirm password input
    if ($(this).val() ==$('#newPassword').val()) {//if the data being input matches the data in the password field
      $('#changeNoMatch').addClass('hidden');//no match is hidden
      $('#changeMatch').removeClass('hidden');//match is not hidden
    } else {
      $('#changeNoMatch').removeClass('hidden');//no match is not hidden
      $('#changeMatch').addClass('hidden');//match is hidden
    }
  })
});
