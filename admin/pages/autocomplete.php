<?php
session_start(); 
$strname = &$_POST['strname'];


require_once '../../database.php';
// Fetch data from the table
$tablename = "users";
$cols = array("userId","lastName","firstName");
$condition = "firstName LIKE '%$strname%' OR lastName LIKE '%$strname%' OR userId LIKE '$strname' ";
$show = $obj->fetch($tablename, $cols, $condition);

    $data = array();
$checkInTime = time();
echo ("<table id = 'myTable' style = 'width:100%'>");   
foreach ($show as $key => $val) {

echo (" 
    <tr class = 'myRow'data-dismiss='modal'>
        <td style ='display:none;'>".$val['userId']."</td><td>".$val['firstName']." ".$val['lastName']."
</td> </tr> ");
    }
echo("</table>");   
?>