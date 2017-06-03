<?php








session_start(); 




require_once '../../database.php';
function showtime($stime){
    $d = strtotime($stime);
    return date('h:i a', $d);
}

$_SESSION['adminId'] = "hello";

 if (!(isset($_SESSION['adminId']))){
        header("location: login.php");


    } else {


 if ( !empty($_REQUEST)) {
        $eventDate = $_REQUEST['eventDate'];
        $eventType = $_REQUEST['eventType'];
        $strName = $_REQUEST['strName'];

  // Fetch data from the table
        $tablename = "events";
        $cols = array("eventId","eventType","eventDate");
        $condition = "eventType = '".$eventType."' AND eventDate = '".$eventDate."'";
        $show2 = $obj->fetch($tablename, $cols, $condition);
        foreach ($show2 as $key => $val)
            $eventId = $val['eventId'];
        if(!(empty($show2))){

        // Fetch data from the table
        $tablename = " attendance INNER JOIN users ON attendance.userId = users.userId ";
        $cols = " attendance.recId, attendance.eventId, attendance.userId, attendance.checkInTime, users.userId, users.lastName, users.firstName ";
        $condition = " attendance.eventId = '".$eventId."'";


        $show3 = $obj->fetchi($tablename, $cols, $condition);

        $total = count($show3);
        $tablename = " ((attendance INNER JOIN users ON attendance.userId = users.userId) INNER JOIN membersinfo ON users.userId = membersinfo.userId) ";
$cols = " attendance.recId, attendance.eventId, attendance.userId, users.userId, TIMESTAMPDIFF(YEAR, users.dateOfBirth, CURDATE())  AS age, membersinfo.userId, membersinfo.sex  ";

$condition = " attendance.eventId = '".$eventId."' AND membersinfo.sex = 'Male' HAVING age BETWEEN 0 AND 7";
$show = $obj->countcategory($tablename, $cols, $condition);
$IM = count($show);

$condition = " attendance.eventId = '".$eventId."' AND membersinfo.sex = 'Female' HAVING age BETWEEN 0 AND 7";
$show = $obj->countcategory($tablename, $cols, $condition);
$IF = count($show);

$condition = " attendance.eventId = '".$eventId."' AND membersinfo.sex = 'Male' HAVING age BETWEEN 8 AND 12";
$show = $obj->countcategory($tablename, $cols, $condition);
$KM  = count($show);

$condition = " attendance.eventId = '".$eventId."' AND membersinfo.sex = 'Female' HAVING age BETWEEN 8 AND 12";
$show = $obj->countcategory($tablename, $cols, $condition);
$KF  = count($show);

$condition = " attendance.eventId = '".$eventId."' AND membersinfo.sex = 'Male' HAVING age BETWEEN 13 AND 30";
$show = $obj->countcategory($tablename, $cols, $condition);
$YM  = count($show);

$condition = " attendance.eventId = '".$eventId."' AND membersinfo.sex = 'Female' HAVING age BETWEEN 13 AND 30";
$show = $obj->countcategory($tablename, $cols, $condition);
$YF  = count($show);

$condition = " attendance.eventId = '".$eventId."' AND membersinfo.sex = 'Male' HAVING age BETWEEN 31 AND 59";
$show = $obj->countcategory($tablename, $cols, $condition);
$AM  = count($show);

$condition = " attendance.eventId = '".$eventId."' AND membersinfo.sex = 'Female' HAVING age BETWEEN 31 AND 59";
$show = $obj->countcategory($tablename, $cols, $condition);
$AF  = count($show);

$condition = " attendance.eventId = '".$eventId."' AND membersinfo.sex = 'Male' HAVING age BETWEEN 60 AND 99";
$show = $obj->countcategory($tablename, $cols, $condition);
$SM  = count($show);

$condition = " attendance.eventId = '".$eventId."' AND membersinfo.sex = 'Female' HAVING age BETWEEN 60 AND 99";
$show = $obj->countcategory($tablename, $cols, $condition);
$SF  = count($show);

$condition = " attendance.eventId = '".$eventId."' AND membersinfo.sex = 'Male' HAVING age >= 100";
$show = $obj->countcategory($tablename, $cols, $condition);
$UM  = count($show);

$condition = " attendance.eventId = '".$eventId."' AND membersinfo.sex = 'Female' HAVING age >= 100";
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

        echo ('
         <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-attendance">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Time</th>
                                                <th hidden>user id</th>                                       
                                            </tr>
                                        </thead>
                                        <tbody>');


                                        foreach ($show3 as $key => $val) {
        echo ('

                                            <tr class="odd gradeX">
                                                 <td>'.$val['firstName'].' '.$val['lastName'].'</td>
                                                <td>'.showtime($val['checkInTime']).'</td>
                                                <td hidden>'.$val['userId'].'</td> 
                                            </tr>
        ');
                                            }
        echo ("
        </tbody>
                                                </table>

                     <div class='panel panel-default'>
                        <div class='panel-heading'>
                            Attendance Summary
                        </div>          
                        <div class='panel-body'>                                
<table class='table table-striped table-bordered table-hover'>
    <tr>
        <th>Category</th>
        <th><center>Male</th>
        <th><center>Female</th>
        <th><center>Total</th>
    </tr>
    <tr>
        <td>Infants (0-7)</td>
        <td><center>$IM</center></td>
        <td><center>$IF</center></td>
        <th><center>$I</th>
    </tr>
    <tr>
        <td>Kids (8-12)</td>
        <td><center>$KM</center></td>
        <td><center>$KF</center></td>
        <th><center>$K</th>
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
        <th><center>$A</th>
    </tr>   
    <tr>
        <td>Seniors (60 up)</td>
        <td><center>$SM</center></td>
        <td><center>$SF</center></td>
        <th><center>$S</th>
    </tr>
    <tr>
        <td>Undefined</td>
        <td><center>$UM</center></td>
        <td><center>$UF</center></td>
        <th><center>$U</th>
    </tr>   
    <tr>
        <td> </td>
        <th><center>$Ms</th>
        <th><center>$Fs</th>
        <th><center>$GT</th>
    </tr>   

</table>    
<h6>Total Number of Attendees: $GT</h6>
</div>
</div>




                                   
        ");

        } else {
            echo "No event found";
        }

                }


}








?>
