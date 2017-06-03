<?php session_start(); ?>
<?php 

    require_once '../database.php';

    if ( !empty($_POST)) {
       
        
        $eventDate=($_POST['edate']);
        $eventType = ($_POST['etype']);

        // Fetch data from the table
        $tablename = "events";
        $cols = array("eventId","eventType","eventDate","speaker","title","textRef","venue");
        $condition = "eventType='$eventType' AND eventDate='$eventDate'";
        $show = $obj->fetch($tablename, $cols, $condition);
        foreach ($show as $key => $val)

print json_encode($show);
/*
            if (count($show) < 1) {
                echo "0";
            } else {
                echo "1";          
           
            }
*/
}

?>