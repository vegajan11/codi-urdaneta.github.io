<?php
session_start(); 




require_once '../../database.php';

function showdate($sdate){
    $d = strtotime($sdate);
    return date('M. d, Y', $d);
}

$tablename = " users INNER JOIN membersinfo ON users.userId = membersinfo.userId ";
$cols = " users.userId, users.lastName, users.firstName, membersinfo.sex, users.dateOfBirth, membersinfo.memberAddress, membersinfo.contactNumber, membersinfo.civilStatus ";
$condition = " users.userId >= '1'";


$show = $obj->fetchi($tablename, $cols, $condition);

$total = count($show);

echo ('
 <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                          <th>Name</th>
                                        <th>Address</th>
                                        <th>Contact Number</th>
                                        <th>Date of Birth</th>
                                        <th>Gender</th>
                                        <th>Civil Status</th>
                                        <th hidden>user id</th>                                       
                                    </tr>
                                </thead>
                                <tbody>');


                                foreach ($show as $key => $val) {
echo ('

                                    <tr class="odd gradeX">
                                         <td>'.$val['firstName'].' '.$val['lastName'].'</td>
                                        <td>'.$val['memberAddress'].'</td>
                                        <td>'.$val['contactNumber'].'</td>
                                        <td>'.showdate($val['dateOfBirth']).'</td>
                                        <td>'.$val['sex'].'</td>
                                        <td>'.$val['civilStatus'].'</td>
                                        <td hidden>'.$val['userId'].'</td> 
                                    </tr>
');
                                    }
echo ('
</tbody>
                                        </table>
                       
');






        $tablename = " users INNER JOIN membersinfo ON users.userId = membersinfo.userId  ";
$cols = " users.userId, TIMESTAMPDIFF(YEAR, users.dateOfBirth, CURDATE())  AS age, membersinfo.userId, membersinfo.sex  ";

$condition = " membersinfo.sex = 'Male' HAVING age BETWEEN 0 AND 7";
$show = $obj->countcategory($tablename, $cols, $condition);
$IM = count($show);

$condition = " membersinfo.sex = 'Female' HAVING age BETWEEN 0 AND 7";
$show = $obj->countcategory($tablename, $cols, $condition);
$IF = count($show);

$condition = " membersinfo.sex = 'Male' HAVING age BETWEEN 8 AND 12";
$show = $obj->countcategory($tablename, $cols, $condition);
$KM  = count($show);

$condition = " membersinfo.sex = 'Female' HAVING age BETWEEN 8 AND 12";
$show = $obj->countcategory($tablename, $cols, $condition);
$KF  = count($show);

$condition = " membersinfo.sex = 'Male' HAVING age BETWEEN 13 AND 30";
$show = $obj->countcategory($tablename, $cols, $condition);
$YM  = count($show);

$condition = " membersinfo.sex = 'Female' HAVING age BETWEEN 13 AND 30";
$show = $obj->countcategory($tablename, $cols, $condition);
$YF  = count($show);

$condition = " membersinfo.sex = 'Male' HAVING age BETWEEN 31 AND 59";
$show = $obj->countcategory($tablename, $cols, $condition);
$AM  = count($show);

$condition = " membersinfo.sex = 'Female' HAVING age BETWEEN 31 AND 59";
$show = $obj->countcategory($tablename, $cols, $condition);
$AF  = count($show);

$condition = " membersinfo.sex = 'Male' HAVING age BETWEEN 60 AND 99";
$show = $obj->countcategory($tablename, $cols, $condition);
$SM  = count($show);

$condition = " membersinfo.sex = 'Female' HAVING age BETWEEN 60 AND 99";
$show = $obj->countcategory($tablename, $cols, $condition);
$SF  = count($show);

$condition = " membersinfo.sex = 'Male' HAVING age >= 100";
$show = $obj->countcategory($tablename, $cols, $condition);
$UM  = count($show);

$condition = " membersinfo.sex = 'Female' HAVING age >= 100";
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

echo ("

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
<h6>Total Number of Members: $GT</h6>
</div>
</div>
    ");



?>
