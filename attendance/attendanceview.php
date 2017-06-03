<?php
session_start(); 
$eventId = &$_POST['eventId'];



require_once '../database.php';

function showtime($stime){
	$d = strtotime($stime);
	return date('h:i a', $d);
}


$tablename = " attendance INNER JOIN users ON attendance.userId = users.userId ";
$cols = " attendance.recId, attendance.eventId, attendance.userId, attendance.checkInTime, users.userId, users.lastName, users.firstName ";
$condition = " attendance.eventId = '".$_SESSION['eventId']."'";


$show = $obj->fetchi($tablename, $cols, $condition);

$total = count($show);


echo "<div style = 'overflow:auto; height:85%; width:100%; border-bottom: 2px solid white;'>
<table style = 'width:100%'> 
		";
foreach ($show as $key => $val) {
echo "
		<tr class = 'table present'>
			<td style ='display:none;'>".$val['recId']."</td><td>".$val['firstName']." ".$val['lastName']."</td><td align = 'right'>". showtime ($val['checkInTime'])."</td></tr>
		";
}
echo "</table>
</div>
<div style = 'height:15%; width:100%;'><table width = '100%'><tr>
			<td width = '50%'><h6 style = 'top:35px;'>Total Number of Attendees: ".$total."</h6> </td><td width = '50%' align = 'right'><a class = 'btn btn-black' href = 'printattendance.php' target = '_blank'>Print</a></td></tr></table></div>
			";
?>


