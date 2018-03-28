$(document).ready(function () {
    'use strict';
  $("#league").change(function () {
        var leagueId = $(this).val();
        console.log(leagueId);
        if (leagueId !== "") {
      $.ajax({
                url: "getTeams.php",
                data: {leagueId: leagueId},
                type: 'POST',
                success: function (data) {
                 
          $(".teams").html(data);
                    console.log(data);
                }
            });
        } else {
      $(".teams").html("<option value=''> No Teams in this league </option>");
        }
    });
});