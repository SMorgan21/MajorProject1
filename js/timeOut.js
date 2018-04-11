$(function()
  {
    function time(){
      setInterval(function(){
        var savedTimeData = sessionStorage.getItem("previousTime");
        timeCompare(savedTimeData);
      }, 3000);
    }

    function timeCompare(timeString){
      var now = new Date();//current time
      var past    = new Date (timeString);//past time
      var difference    = now - past; // the difference between now and the past times
      var minutesPast     = Math.floor((difference/60000)); //assigning the difference variable to this variable by using
      if (minutesPast > 3) {// if the mintuesPast variable become greater than 3 minute then
        sessionStorage.removeItem("previousTime");//removes the previousTime information from the session variable
        window.location = "./logout.php";//redirects the user to the lougout page
        return false;
      }
    }
    $(document).mousemove(function()
    {
      var timeStore = new Date();
      sessionStorage.setItem("previousTime",  timeStore);//records when the last time the mouse moved
  });
  time();
});
