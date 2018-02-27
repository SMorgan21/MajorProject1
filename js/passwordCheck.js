$(document).ready(function() {//gets the document ready
  $('#conPassword').keyup(function() {//checks for key press within the confirm password input
    if ($(this).val() ==$('#password').val()) {//if the data being input matches the data in the password field
      $('#noMatch').addClass('hidden');//no match is hidden
      $('#match').removeClass('hidden');//match is not hidden
    } else {
      $('#noMatch').removeClass('hidden');//no match is not hidden
      $('#match').addClass('hidden');//match is hidden
    }
  })
});
