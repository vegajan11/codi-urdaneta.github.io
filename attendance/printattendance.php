<?php

//==============================================================
//==============================================================
//==============================================================
include("../assets/mpdf60/mpdf.php");

$mpdf=new mPDF('c','A4','','',32,25,47,25,16,13); 


// LOAD a stylesheet
$stylesheet = file_get_contents('../assets/theme/css/mpdfstyletables.css');
$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text

//==============================================================
//==============================================================
//==============================================================

session_start(); 
$eventId = $_SESSION['eventId'];

require_once '../database.php';

function showtime($stime){
	$d = strtotime($stime);
	return date('h:i a', $d);
}
function showdate($sdate){
    $d = strtotime($sdate);
    return date('M d, Y', $d);
}

$tablename = " attendance INNER JOIN users ON attendance.userId = users.userId ";
$cols = " attendance.recId, attendance.eventId, attendance.userId, attendance.checkInTime, users.userId, users.lastName, users.firstName ";
$condition = " attendance.eventId = '".$eventId."'";


$show = $obj->fetchi($tablename, $cols, $condition);

$total = count($show);


  // Fetch data from the table
        $tablename = "events";
        $cols = array("eventId","eventType","eventDate","speaker","textRef","title","venue");
        $condition = "eventId = '".$eventId."'";
        $eventval = $obj->fetch($tablename, $cols, $condition);
         
        foreach ($eventval as $key => $event){
        $eventName = $event['eventType'];
        $eventDate = showdate($event['eventDate']);
        $speaker = $event['speaker'];
        $title = $event['title']; 
        $textRef = $event['textRef'];
        $venue = $event['venue'];   
        }     
$header=' <table > <tr> <td><img src="../assets/images/codilogo.png" width="80px" /></td><td align = "center"><h4 align = "center">Church of the Open Door Int\'l. - Urdaneta City</h4>
<h5 align = "center" >#55 Ambrosio St., Poblacion, Urdaneta City</h5></td></tr></table>';
$mpdf->SetHTMLHeader($header);
$mpdf->WriteHTML('<h2 align = "center" style = "margin-top:4em;">ATTENDANCE SHEET</h2>',2);
$mpdf->WriteHTML("
	<table>
	<tr>
	<td><h6>Event: $eventName</h6>
	<h6>Title: $title</h6>
	<h6>Speaker: $speaker</h6>
	</td>
	<td>
	<h6>Date: $eventDate</h6>		
	<h6>Text: $textRef</h6>	
	<h6>Venue: $venue</h6>
	</td>
	</tr>
	</table>

	",2);
$mpdf->WriteHTML('
<table class="bpmTopnTail" width = "100%" ><thead>
<tr><th align = "left" width = "7%">No.</th>
<th align = "left">Name</th>
<th align = "right">
Time In
</th>
</tr>
</thead>
<tbody>',2);
$mpdf->WriteHTML($html,2);

foreach ($show as $key => $val) {
	$n+=1;
$x = $val['lastName'];
$y = $val['firstName'];
$z = showtime($val['checkInTime']);
$mpdf->WriteHTML("
<tr>
<td><p>$n</p></td>
<td><p>$y $x</p></td>
<td align='right'><p>$z </p></td>
</tr>",2);
}
$mpdf->WriteHTML("
</tbody>
</table>
<hr>
",2);






$tablename = " ((attendance INNER JOIN users ON attendance.userId = users.userId) INNER JOIN membersinfo ON users.userId = membersinfo.userId) ";
$cols = " attendance.recId, attendance.eventId, attendance.userId, users.userId, TIMESTAMPDIFF(YEAR, users.dateOfBirth, CURDATE())  AS age, membersinfo.userId, membersinfo.sex  ";

$condition = " attendance.eventId = '".$_SESSION['eventId']."' AND membersinfo.sex = 'Male' HAVING age BETWEEN 0 AND 7";
$show = $obj->countcategory($tablename, $cols, $condition);
$IM = count($show);

$condition = " attendance.eventId = '".$_SESSION['eventId']."' AND membersinfo.sex = 'Female' HAVING age BETWEEN 0 AND 7";
$show = $obj->countcategory($tablename, $cols, $condition);
$IF = count($show);

$condition = " attendance.eventId = '".$_SESSION['eventId']."' AND membersinfo.sex = 'Male' HAVING age BETWEEN 8 AND 12";
$show = $obj->countcategory($tablename, $cols, $condition);
$KM  = count($show);

$condition = " attendance.eventId = '".$_SESSION['eventId']."' AND membersinfo.sex = 'Female' HAVING age BETWEEN 8 AND 12";
$show = $obj->countcategory($tablename, $cols, $condition);
$KF  = count($show);

$condition = " attendance.eventId = '".$_SESSION['eventId']."' AND membersinfo.sex = 'Male' HAVING age BETWEEN 13 AND 30";
$show = $obj->countcategory($tablename, $cols, $condition);
$YM  = count($show);

$condition = " attendance.eventId = '".$_SESSION['eventId']."' AND membersinfo.sex = 'Female' HAVING age BETWEEN 13 AND 30";
$show = $obj->countcategory($tablename, $cols, $condition);
$YF  = count($show);

$condition = " attendance.eventId = '".$_SESSION['eventId']."' AND membersinfo.sex = 'Male' HAVING age BETWEEN 31 AND 59";
$show = $obj->countcategory($tablename, $cols, $condition);
$AM  = count($show);

$condition = " attendance.eventId = '".$_SESSION['eventId']."' AND membersinfo.sex = 'Female' HAVING age BETWEEN 31 AND 59";
$show = $obj->countcategory($tablename, $cols, $condition);
$AF  = count($show);

$condition = " attendance.eventId = '".$_SESSION['eventId']."' AND membersinfo.sex = 'Male' HAVING age BETWEEN 60 AND 99";
$show = $obj->countcategory($tablename, $cols, $condition);
$SM  = count($show);

$condition = " attendance.eventId = '".$_SESSION['eventId']."' AND membersinfo.sex = 'Female' HAVING age BETWEEN 60 AND 99";
$show = $obj->countcategory($tablename, $cols, $condition);
$SF  = count($show);

$condition = " attendance.eventId = '".$_SESSION['eventId']."' AND membersinfo.sex = 'Male' HAVING age >= 100";
$show = $obj->countcategory($tablename, $cols, $condition);
$UM  = count($show);

$condition = " attendance.eventId = '".$_SESSION['eventId']."' AND membersinfo.sex = 'Female' HAVING age >= 100";
$show = $obj->countcategory($tablename, $cols, $condition);
$UF  = count($show);

$I = $IM + $IF;
$K = $KM + $KF;
$Y = $YM + $YF;
$A = $AM + $AF;
$S = $SM + $SF;
$U = $UM + $UF;
$Ms = $IM + $KM + $YM + $AM + $SM + $UM;
$Fs = $IF + $KF + $YF + $AF + $SF + $UF;
$GT = $Ms + $Fs;



$mpdf->WriteHTML('
	<table class ="bpmTopnTail">
	');

$mpdf->WriteHTML("
	<tr>
		<th>Category</th>
		<th>Male</th>
		<th>Female</th>
		<th>Total</th>
	</tr>
	<tr>
		<td>Infants (0-7)</td>
		<td><center>$IM</center></td>
		<td><center>$IF</center></td>
		<th>$I</th>
	</tr>
	<tr>
		<td>Kids (8-12)</td>
		<td><center>$KM</center></td>
		<td><center>$KF</center></td>
		<th>$K</th>
	</tr>
	<tr>
		<td>Youths (13-30)</td>
		<td><center>$YM</center></td>
		<td><center>$YF</center></td>
		<th><center>$Y</th>
	</tr>
	<tr>
		<td>Adults (31-59)</td>
		<td><center>$AM</center></td>
		<td><center>$AF</center></td>
		<th>$A</th>
	</tr>	
	<tr>
		<td>Seniors (60 up)</td>
		<td><center>$SM</center></td>
		<td><center>$SF</center></td>
		<th>$S</th>
	</tr>
	<tr>
		<td>Undefined</td>
		<td><center>$UM</center></td>
		<td><center>$UF</center></td>
		<th>$U</th>
	</tr>	
	<tr>
		<td> </td>
		<th>$Ms</th>
		<th>$Fs</th>
		<th>$GT</th>
	</tr>	

</table>	
<h6>Total Number of Attendees: $GT</h6>
");


$mpdf->WriteHTML('
	<table>
	<tr><td height = "4em" height = "4em">Prepared by:</td></tr>
	<tr><th height = "3em" align = "left">Angeli Lozano</th></tr>
	<tr><td height = "4em">Noted by:</td></tr>
	<tr><th align = "left">Maricar C. Valdez</th></tr>
	</table>
	');

$mpdf->SetDisplayMode('fullpage');
$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
$mpdf->Output('mpdf.pdf','I');
exit;
?>