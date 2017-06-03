<?php
session_start(); 

function showtime($stime){
    $t = strtotime($stime);
    return date('h:i a', $t);
}
function showdate($sdate){
    $d = strtotime($sdate);
    return date('M d', $d);
}
 if (!(isset($_SESSION['eventId']))){
        header("location: createEvent.php");


    } else {
          require_once '../database.php';
        $eventId = $_SESSION['eventId'];
        $adminId = $_SESSION['adminId'];        
  // Fetch data from the table
        $tablename = "events";
        $cols = array("eventId","eventType","eventDate","speaker","textRef","title","venue");
        $condition = "eventId = '$eventId'";
        $show = $obj->fetch($tablename, $cols, $condition);
         
        foreach ($show as $key => $val)


?>

<!DOCTYPE html>
 


<title>Attendance</title>
<?php include_once 'navigator.php'; 
      include_once 'head.php'; ?>
<style>

        .clearable{
  background: #fff url(../assets/images/close-icon.png) no-repeat right -29px center;
  border: 1px solid #999;
  padding: 3px 40px 3px 4px;     /* Use the same right padding (18) in jQ! */
  border-radius: 3px;
  transition: background 0.4s;
}
.clearable.x  { background-position: right 8px center; } /* (jQ) Show icon */
.clearable.onX{ cursor: pointer; }              /* (jQ) hover cursor style */
.clearable::-ms-clear {display: none; width:0; height:0;} /* Remove IE default X */



tr {
  border-radius:10px;
}
td {
  font-style: italic;
  font-weight: 800;
  font-color: black;
  padding: 0.5em;
  font-size: 1.15em;
  font-family: "Lora";

}

tr.myRow:hover {
  border-radius:4px;
opacity: 0.5; background-color: rgb(255, 255,255);
color:blue;
font-size:1.10em;
}

tr.present:hover {
  border-radius:4px;
opacity: 0.5; background-color: rgb(255, 255,255);
}
td.fontdisplay {
  padding-top:.1em;
  font-size: 0.5em;
  border-bottom: 2px solid white; 
}

#suggest, #attendance-display {

    cursor:pointer;

}
#suggest{
      height:100%; 
      width:100%;
      overflow:auto;
}

#suggestdiv{
      height:300px; 
      border:2px solid white;
      border-radius:5px;
      padding:5px;
      opacity:0.5;
      background-color: rgb(255, 255, 255);
}
#attendance-display{
      height:420px;
      border:2px solid white; 
}

.myClock{
  font-style: italic;
  font-weight: 800;
  color: white;
  padding: 0.15em;
  font-size: 2.5em;
  font-family: "Lora";
}

.eventTable {
  max-width:777px;
  margin:30px auto;

  padding:20px 25px;
  border-radius:2px;
}

#searchclear {
  position: absolute;
  right: 5px;
  top:0;
  bottom: 0;
  height:14px;
  margin:auto;
  font-size: 14px;
  cursor:pointer;
  color:#ccc;
}




</style>



<section class="mbr-section mbr-parallax-background" id="content5-3" style="padding-top: 120px; padding-bottom: 120px; min-height:100vh; background-image: url(../assets/images/orange.jpg);">
  <div class="mbr-overlay" style="opacity: 0; background-color: rgb(0, 0, 0);">
  </div>

<div id = "" style = "position:fixed; z-index:100; width:100%; margin:auto;">
  <div id = "alertbox" class="alert alert-success" style = "position:relative; width:500px; max-width:100%; margin:auto; text-align:center">

    <strong id = "msg">Well done!</strong>
  </div>
</div>
  <div class="container" >
 <div  id = "memberphoto" style = "position:fixed; top:70px; margin:auto; z-index: 100; right:25%;" > <!-- member photo will appear here --> </div>
    <div class = "row"> 
      <div class = "col-sm-12"></div>
        <div class = "myClock col-sm-6"><?php echo date("M d - l"); ?></div>
        <div class = "myClock col-sm-6"><div id = "timeDisplay" class = "pull-sm-right"></div></div>
      </div>


      <div class="col-lg-6" >
      <div id = "otp" class = "eventTable">
        <table class = "mbr-table-xs-up" style = "width:100%; color:white;">
          <tr>
            <td class = "mbr-table-cell  text-xs-right" style = "width:25%;">Title</td>
            <td class = "mbr-table-cell text-xs-left"  style = "width:75%;"><?php  echo $val["title"] ; ?></td>
          </tr>
          <tr>
            <td class = "mbr-table-cell  text-xs-right">Speaker</td>
            <td class = "mbr-table-cell  text-xs-left" ><?php  echo $val["speaker"] ; ?> </td>
          </tr>
          <tr>
            <td class = "mbr-table-cell  text-xs-right">Text</td>
            <td class = "mbr-table-cell  text-xs-left"><?php  echo $val["textRef"] ; ?> </td>
          </tr>
          <tr>
            <td class = "mbr-table-cell  text-xs-right">Venue</td>
            <td class = "mbr-table-cell  text-xs-left"><?php  echo $val["venue"] ; ?> </td>
          </tr>
        </table>
      </div>         
           
      </div>
      <div class="col-lg-6" >
   <form action="#" method="post">
              <div class="control-group">
                <input type="text" id = "name" class="form-control clearable" style = "font-size:1.5em;" name="name" placeholder ="Type Name or Member Code here..." autocomplete = "off" required autofocus/>
              </div>
              <div id = "suggestdiv">
                <div id = "suggest" > <!-- autocomplete will appear here --> </div>
              </div>
              <input type="hidden" name="event" id ="event" value = "<?php echo $eventId; ?>">
              <input type="hidden" name="admin" id ="admin" value = "<?php echo $adminId; ?>">
           </form>    

  

      </div>


    </div> 

  </div>

  <div class="mbr-arrow mbr-arrow-floating" aria-hidden="true"><a href="#content4-3"><i class="mbr-arrow-icon"></i></a></div>

</section>
<section class="mbr-section mbr-parallax-background" id="content4-3" style="padding-top: 120px; padding-bottom: 120px; min-height:100vh;">
  <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(0, 0, 0);">
  </div>
  <div class="container" style = "max-width: 777px;">

    <div class = "mbr-table" style = "border: 2px solid white; border-radius: 5px;">
      <div class = "mbr-table-cell">
      <table style = 'width:100%'> 
    <tr class = 'table'>
      <th class = 'table'>Name</th>
      <th class = 'table'>Time</th>
    </tr></table>

        <div id = "attendance-display"></div> 
      </div>
    </div>
    
  </div>


<div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i class="mbr-arrow-up-icon"></i></a></div>
</section>
<?php include_once 'footer.php';?>
  <script src="../assets/theme/js/suggest.js"></script>
  <script src="../assets/theme/js/checkIn.js"></script>
  <script src="../assets/theme/js/bootbox.min.js"></script>

  <input name="animation" type="hidden">
  </body>
<script>

$(document).ready(function(){

var name = $('#name');
name.keyup(lookfor);


function lookfor (){

if ($.isNumeric(name.val())){
  if (name.val().length == 4){

            var userId = name.val();
            $.post('checkUserId.php',{userId:userId}, function(datares){

            if (datares == 1){
                var adminId = $('#admin').val();
                var eventId = $('#event').val();
                

                $.post('checkIn.php',{userId:userId, adminId:adminId, eventId:eventId}, function(data){
                      document.getElementById('msg').innerHTML = data;
                      $("#alertbox").show('fast').delay('1200');
                      $("#alertbox").hide('5000');
                      name.select();
                });


                $.post('attendanceview.php',{eventId:eventId}, function(data2){
                   document.getElementById('attendance-display').innerHTML = data2;
                });

            } else {
                      document.getElementById('msg').innerHTML = "Member Code not found.";
                      $("#alertbox").show('fast').delay('1200');
                      $("#alertbox").hide('5000');
                      name.select();
            }
            });

   }
} else {

         if (name.val() == ""){
            $("#suggest").hide();
         } else {
            $("#suggest").show();
                var str = name.val();

            $.post('autocomplete.php',{strname:str}, function(data){
                   $("#suggest").html(data);
                });    
                
            }
        }
}

        // CLEARABLE INPUT
function tog(v){return v?'addClass':'removeClass';} 
$(document).on('input', '.clearable', function(){
    $(this)[tog(this.value)]('x');
}).on('mousemove', '.x', function( e ){
    $(this)[tog(this.offsetWidth-40 < e.clientX-this.getBoundingClientRect().left)]('onX');
}).on('touchstart click', '.onX', function( ev ){
    ev.preventDefault();
    $(this).removeClass('x onX').val('').change();
    lookfor();
});

// $('.clearable').trigger("input");
// Uncomment the line above if you pre-fill values from LS or server


});
</script>
</html>
<?php
}
?>