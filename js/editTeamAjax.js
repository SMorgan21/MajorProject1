$(document).ready(function () {
    'use strict';
  $("#leagueEdit").change(function () {
        var leagueId = $(this).val();
        if (leagueId !== "") {
      $.ajax({
                url: "editTeams.php",
                data: {leagueId: leagueId},
                type: 'POST',
                success: function (data) {
                 
          $(".editTeams").html(data);
                }
            });
        } else {
      $(".editTeams").html("<td>There are No Teams in this league </td>");
        }
    });
});