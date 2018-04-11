$(function() {
            $("#caution1").change(function() {
                 $("#sendOff1").prop("disabled", true);
            });
           $("#sendOff1").change(function() {
                 $("#caution1").prop("disabled", true);    
            });
        });