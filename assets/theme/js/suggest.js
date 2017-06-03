$(document).ready(function(){

var ampm;

startTime();
function startTime(){
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  h = checkampm(h);
  s = checkTime(s);
  m = checkTime(m);
  var myTime = h + ":" + m + ":" + s + " " + ampm;
  document.getElementById('timeDisplay').innerHTML = myTime;
  var t = setTimeout(startTime,1000);
}

function checkTime(i) {

    if (i < 10) { i = "0" + i} //just to add 0 on single digit
    return i;
  }
function checkampm(j) {

    if (j > 12) { j = j-12;
     j = j|0;
      ampm = "pm";
     } 
     else 
     {
      ampm = "am";
     }//just to add 0 on single digit
    return j;
  }

});

