<?php








session_start(); 




require_once '../../database.php';
function showtime($stime){
    $t = strtotime($stime);
    return date('h:i a', $t);
}
function showdate($sdate){
    $d = strtotime($sdate);
    return date('M d', $d);
}

$_SESSION['adminId'] = "hello";


 if (!(isset($_SESSION['adminId']))){
        header("location: login.php");


    } else {


 if ( !empty($_REQUEST)) {
        $dateFrom = $_REQUEST['dateFrom'];
        $dateTo = $_REQUEST['dateTo'];
        $userId = $_REQUEST['userID'];

  // Fetch data from the table
        $tablename = "events";
        $cols = array("eventId","eventType","eventDate");
        $condition = "eventDate BETWEEN '".$dateFrom."' AND '".$dateTo."'";
        $show = $obj->fetch($tablename, $cols, $condition);
        if(!(empty($show))){

        echo ('
         <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-person">
                                        <thead>
                                            <tr>
                                                <th>Event</th>
                                                <th>Date</th>
                                                <th>Log In Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>');


        foreach ($show as $key => $val) {

        // Fetch data from the table
        $tablename = "attendance";
        $cols = array("eventId","userId","checkInTime");
        $condition = "eventId = '".$val['eventId']."' AND userId = '".$userId."'";
        $show2 = $obj->fetch($tablename, $cols, $condition);
        $status = "no attendance";
        foreach ($show2 as $key => $val2)

        if (!(empty($show2))) {
            $status = showtime($val2['checkInTime']);
        } 
        echo ('
                                            <tr class="odd gradeX">
                                                <td>'.$val['eventType'].'</td>
                                                <td>'.showdate($val['eventDate']).'</td>
                                                <td>'.$status.'</td> 
                                            </tr>
        ');
                                            }
        echo ("
        </tbody>
                                                </table>

                                     
        ");

        } else {
            echo "No event found";
        }

                }


}








?>
