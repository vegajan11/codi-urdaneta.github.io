<?php
session_start(); 
 if (!(isset($_SESSION['adminId']))){
        header("location: login.php");


    } else {

require_once '../database.php';
 if ( !empty($_REQUEST)) {
        $userId = $_REQUEST['userId'];
        $adminId = $_REQUEST['adminId'];
        $eventId = $_REQUEST['eventId'];


// Fetch data from the table
        $tablename = "attendance";
        $cols = array("userId","eventId, checkInTime");
        $condition = "userId='$userId' AND eventId='$eventId'";
        $show = $obj->fetch($tablename, $cols, $condition);

            if (empty($show)) {
                  // Fetch data from the table
                    $tablename = "attendance";
                    $InsColumVals = array("adminId"=>$adminId,"userId"=>$userId,"eventId"=>$eventId);
                    $obj->insert($tablename, $InsColumVals);
                    echo "Check In Successful!";
            } else {
                foreach ($show as $key => $val)
                 echo "This person has already checked in at ". $val['checkInTime'].".";
            }
          }


}
?>
