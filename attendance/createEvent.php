<?php session_start(); 
 if (!(isset($_SESSION['adminUser']))){
        header("location: login.php");


    } else { 

    require_once '../database.php';

    if ( !empty($_POST)) {
       
        $eventId = $_SESSION['eventId'];
        $eventDate=($_POST['eventDate']);
        $eventType = ($_POST['eventType']);
        $speaker = ($_POST['speaker']);
        $title = ($_POST['title']);
        $eventText = ($_POST['eventText']);
        $venue = ($_POST['venue']);    
        $eventButton = ($_POST['eventButton']);    


        if ($eventButton == "CREATE") {
        // Fetch data from the table
        $tablename = "events";
        $InsColumVals = array("eventType"=>$eventType,"eventDate"=>$eventDate,"speaker"=>$speaker,"title"=>$title,"textRef"=>$eventText,"venue"=>$venue);
        $obj->insert($tablename, $InsColumVals);
        } else {

 // Fetch data from the table
        $tablename = "events";
        $cols = array("eventId","eventType","eventDate");
        $condition = "eventType = '$eventType' AND eventDate = '$eventDate' ";
        $show = $obj->fetch($tablename, $cols, $condition);
         
        foreach ($show as $key => $val) {}
            $eventId = $val['eventId'];


         if (!(isset($_SESSION['eventId']))){
         $_SESSION['eventId'] = $eventId;
        } else{
        unset($_SESSION['eventId']);
        $_SESSION['eventId'] = $eventId;



        $tablename = "events";    
         //Associative array to set query for update function
        $set = array("eventType"=>$eventType,"eventDate"=>$eventDate,"speaker"=>$speaker,"title"=>$title,"textRef"=>$eventText,"venue"=>$venue);

        //Associative array to condition query for update function
        $condition =  "eventId='$eventId'";
        
        //call update function
        $obj->update($tablename, $set,$condition);  
        
        }

       
        }
       
        header ('location: index.php'); 

}
?>


<!DOCTYPE html>
<html>
<?php include_once 'head.php'; ?>
  <link rel="stylesheet" href="../assets/theme/css/login.css">
<title>Set Event</title>
<body>
    <script src="../assets/theme/js/event.js"></script>
<?php include_once 'navigator.php'; ?>
<!--<section class="engine"><a rel="external" href="https://mobirise.com">Mobirise Website Builder</a></section>-->
<section class="mbr-section mbr-section-hero mbr-section-full mbr-parallax-background mbr-section-with-arrow" id="header1-1" style="background-image: url(../assets/images/orange.jpg); padding-top: 100px;" >

    

    <div class="mbr-table-cell">

        <div class="container">
            <div class="row ">
                
                <div class = "nb-login" style = " width:320px; max-width:320px;">
                    <nav role = "navigation" style = "margin-bottom: 1em;">
                        <ul class = "nav nav-tabs nav-justified justify-content-center" data-tabs="tabs" role = "tablist">
                            <li class = "nav-item">
                                <a class = "nav-link active" data-toggle="tab" href = "#createEvent"  role = "tab">Create Event</a>
                            </li>
                            <li class = "nav-item">
                                <a class = "nav-link" data-toggle="tab" href = "#selectEvent"   role = "tab">Select Event</a>
                            </li>
                        </ul>
                    </nav>
                    <!-- Tab panes -->
                    <div class = "tab-content">
                        <div class = "tab-pane active" id ="createEvent" role = "tabpanel">
                            <form id="logIn" class="form-signin" action="createEvent.php" method="post">
                            <input id="eventId" type="hidden" name="eventId" value="<?php echo !empty($eventId)?$eventId:'';?>" />
                                <div class="form-group">            
                                    <select id="eventType" style = "height:40px;" class="form-control" name="eventType" required />
                                        <option value="Sunday Service">Sunday Service</option>
                                        <option value="Midweek Service">Midweek Service</option>
                                        <option value="Prayer Meeting">Prayer Meeting</option>
                                        <option value="Special Event">Special Event</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                       <input id="eventDate" class="form-control" type="date" name="eventDate" data-placeholder="Date of Event" required />
                                </div> 

                                <div class="form-group">
                                    <input id="speaker" class="form-control" type="text" placeholder = "Name of Speaker" name="speaker" value="<?php echo !empty($speaker)?$speaker:'';?>"/>
                                </div>  

                                <div class="form-group">
                                       <input id="title" class="form-control" type="text" name="title" placeholder = "Title" />
                                </div> 

                                <div class="form-group">
                                       <input id="eventText" class="form-control" type="text" name="eventText" placeholder = "Text Reference" value="<?php echo !empty($text)?$text:'';?>"/>
                                </div>  


                                <div class="form-group">
                                       <input id="venue" class="form-control" type="text" name="venue" placeholder = "Venue" value="<?php echo !empty($venue)?$venue:'';?>"/>
                                </div> 
                                <input id = "idhidden" type="hidden" name = "eventButton" />
                                <input id = "eventButton"  type = "submit" class = "btn btn-block" value = "CREATE"/>
                                
                            </form>
                        </div>

                        
                        <div class = "tab-pane fade"  id ="selectEvent" role = "tabpanel">
                            <form id="logIn2" class="form-signin" action="login2.php" method="post">

                                <div class="form-group">            
                                    <select id="eventType2" style = "height:40px;" class="form-control" name="eventType"  />
                                        <option value="Sunday Service">Sunday Service</option>
                                        <option value="Weekday Service">Weekday Service</option>
                                        <option value="Prayer Meeting">Prayer Meeting</option>
                                        <option value="Special Event">Special Event</option>
                                    </select>
                                </div> 

                                <div class="form-group">            
                                    <select id="eventType3" style = "height:40px;" class="form-control" name="eventType" />
                                        <option value="Sunday Service">Sunday Service</option>
                                        <option value="Weekday Service">Weekday Service</option>
                                        <option value="Prayer Meeting">Prayer Meeting</option>
                                        <option value="Special Event">Special Event</option>
                                    </select>
                                </div> 

                                <button type = "submit" class = "btn btn-block">SELECT</button>
                                
                            </form>
                        </div>                   
                    </div>
                </div>    
            </div>
        </div>
    </div>
</section>


   

<?php include_once 'footer.php'; ?>


  <input name="animation" type="hidden">
  </body>
</html>

<?php
}
?>

