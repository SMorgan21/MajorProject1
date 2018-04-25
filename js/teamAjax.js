$(document).ready(function () {
    'use strict';
  $("#league").change(function () {
        var leagueId = $(this).val();
        if (leagueId !== "") {
      $.ajax({
                url: "getTeams.php",
                data: {leagueId: leagueId},
                type: 'POST',
                success: function (data) {
                 
          $(".teams").html(data);
                }
            });
        } else {
      $(".teams").html("<option value=''> No Teams in this league </option>");
        }
    });
});