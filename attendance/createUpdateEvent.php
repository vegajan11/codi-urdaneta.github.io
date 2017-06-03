<?php session_start(); ?>
<?php 

    require_once '../database.php';

    if ( !empty($_POST)) {
       
        $eventId=($_POST['eventId']);        
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
        $cols = array("eventType","eventDate","speaker","title","textRef","venue");
        $obj->insert($tablename, $cols);
        echo "CREATE";
        header ('location : login.php');
        } else {

        $tablename = "events";    
         //Associative array to set query for update function
        $set = array("eventType"=>$eventType,"eventDate"=>$eventDate,"speaker"=>$speaker,"title"=>$title,"textRef"=>$eventText,"venue"=>$venue);

        //Associative array to condition query for update function
        $condition =  "eventId='$eventId'";
        
        //call update function
        $obj->update($tablename, $set,$condition);  
        echo 'UPDATE';
        header ('location : index.php');         
        }

}

?>

