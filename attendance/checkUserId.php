
<?php
session_start(); 
 if (!(isset($_SESSION['adminId']))){
        header("location: login.php");


    } else {

    require_once '../database.php';
     if ( !empty($_REQUEST)) {
            $userId = $_REQUEST['userId'];
            // Fetch data from the table
            $tablename = "users";
            $cols = "userId";
            $condition = "userId='$userId'";
            $show = $obj->fetchi($tablename, $cols, $condition);
            foreach ($show as $key => $val){
                if (!empty($show)){
                    echo 1;
                }else{
                    echo 0;
                }
            }
        }


}
?>