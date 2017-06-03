<?php
session_start(); 
 if (!(isset($_SESSION['adminId']))){
        header("location: login.php");


    } else {

require_once '../database.php';
 if ( !empty($_REQUEST)) {
        $userId = $_REQUEST['userId'];
// Fetch data from the table
        $tablename = "membersinfo";
        $cols = "profilePhoto";
        $condition = "userId='$userId'";
        $show = $obj->fetchi($tablename, $cols, $condition);
        foreach ($show as $key => $val){
        echo ('<div class="mbr-figure" style ="margin:auto;"> <image src= "../assets/images/profilePhoto/'.$val['profilePhoto'].'" style = "width:120px; height:120px; border-radius:100px; border: 2px solid white; margin:auto;"></div>');
        }
        }


}
?>