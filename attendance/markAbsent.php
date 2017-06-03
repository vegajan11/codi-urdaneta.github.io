<?php
session_start(); 
 if (!(isset($_SESSION['adminId']))){
        header("location: login.php");


    } else {

require_once '../database.php';
 if ( !empty($_REQUEST)) {
        $recId = $_REQUEST['recId'];
        
// Fetch data from the table
        $tablename = "attendance";
        $cond = ("recId = $recId");
        $show = $obj->deletei($tablename, $cond);
        echo "Action Taken Successfuly.";
}

}
?>
