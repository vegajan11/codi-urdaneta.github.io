<?php session_start(); ?>
<?php if (!(isset($_SESSION['userId']))){
        header("location: login.php");


    } else {
?> 


<!DOCTYPE html>
<html>
<?php include_once 'head.php'; ?>
<body>
<?php include_once 'navigator.php'; ?>



<?php require_once 'database.php';
function showdate($sdate){
    $d = strtotime($sdate);
    return date('M d, Y', $d);
}
$tablename = "skills";
$cols = array("userId","skill");
$userId = $_SESSION['userId'];
$condition = "userId='$userId'";
$mySkills = $obj->fetch($tablename, $cols, $condition);


$tablename = "users";
$cols = array("dateOfBirth");
$userId = $_SESSION['userId'];
$condition = "userId='$userId'";
$show = $obj->fetch($tablename, $cols, $condition);
foreach ($show as $key => $val1){}
// Fetch data from the table
$tablename = "membersInfo";
$cols = array("sex","civilStatus","contactNumber","memberAddress","email","occupation","mother","father","spouse");
$userId = $_SESSION['userId'];
$condition = "userId='$userId'";
$show = $obj->fetch($tablename, $cols, $condition);
foreach ($show as $key => $val){}




                
?>


<section class="mbr-section mbr-parallax-background" id="content5-3" style="background-image: url(assets/images/orange.jpg); padding-top: 120px; padding-bottom: 120px;">
 <div class="mbr-overlay" style="opacity: 0.4; background-color: rgb(255, 255, 255);">
    </div>
    <div class="mbr-section mbr-section-nopadding">
        <div class="container">
            <div class="row">
             <div class="col-xs-12">
                         <div class="col-xs-6"> 
                            <h3 class="mbr-section-title">My Profile</h3>                         
                         </div>
                        <div class="col-xs-6"> 
                            <a class = "btn btn-xs btn-white btn-black-outline pull-xs-right" href = "register.php">Edit Profile</a>
                        </div>
             </div>
  
                           
                <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                    <table class = "mbr-table-xs-up">
                        <tr>
                            <td class = "mbr-table-cell fontdisplay" colspan = "2" align = "center">Basic Information</td>
                        </tr>
                        <tr>
                            <td class = "mbr-table-cell  text-xs-right">Civil  Status</td>
                            <td class = "mbr-table-cell  text-xs-left"><?php  echo $val["civilStatus"]; ?> </td>
                        </tr>
                        <tr>
                            <td class = "mbr-table-cell  text-xs-right">Sex</td>
                            <td class = "mbr-table-cell  text-xs-left"><?php  echo $val["sex"]; ?> </td>
                        </tr>
                        <tr>
                            <td class = "mbr-table-cell  text-xs-right">Date of Birth</td>
                            <td class = "mbr-table-cell  text-xs-left"><?php echo showdate($val1["dateOfBirth"]); ?> </td>
                        </tr>
                        <tr>
                            <td class = "mbr-table-cell  fontdisplay" colspan = "2" align = "center">Contact Information</td>
                        </tr>
                        <tr>
                            <td class = "mbr-table-cell  text-xs-right">Home Address</td>
                            <td class = "mbr-table-cell  text-xs-left"><?php  echo $val["memberAddress"] ; ?> </td>
                        </tr>
                        <tr>
                            <td class = "mbr-table-cell  text-xs-right">E-mail Address</td>
                            <td class = "mbr-table-cell  text-xs-left"><?php  echo $val["email"] ; ?> </td>
                        </tr>
                        <tr>
                            <td class = "mbr-table-cell  text-xs-right">Contact Number</td>
                            <td class = "mbr-table-cell  text-xs-left"><?php  echo $val["contactNumber"] ; ?> </td>
                        </tr>   
                        <tr>                              
                            <td class = "mbr-table-cell  fontdisplay" colspan = "2" align = "center">Special Skills</td>
                        </tr>
                        <tr>
                            <td class = "mbr-table-cell  text-xs-right">Occupation</td>
                            <td class = "mbr-table-cell  text-xs-left"><?php  echo $val["occupation"]; ?> </td>
                        </tr>
                        <tr>
                            <td class = "mbr-table-cell  text-xs-right">Skills</td>
                            <td class = "mbr-table-cell  text-xs-left"><?php  foreach ($mySkills as $key => $val2) {echo $val2['skill']; echo  "<br />";  } ?> </td>
                        </tr>
                        <tr>                              
                            <td class = "mbr-table-cell  fontdisplay" colspan = "2" align = "center">Family</td>
                        </tr>
                        <tr>
                            <td class = "mbr-table-cell  text-xs-right">Father</td>
                            <td class = "mbr-table-cell  text-xs-left"><?php  echo $val["father"]; ?> </td>
                        </tr>
                        <tr>
                            <td class = "mbr-table-cell  text-xs-right">Mother</td>
                            <td class = "mbr-table-cell  text-xs-left"><?php  echo $val["mother"]; ?> </td>
                        </tr>
                        <tr>
                            <td class = "mbr-table-cell  text-xs-right">Spouse</td>
                            <td class = "mbr-table-cell  text-xs-left"><?php echo $val["spouse"]; ?> </td>
                        </tr>                                                                                  

                    </table>

                    


                    
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once 'footer.php'; ?>


  <input name="animation" type="hidden">
  </body>
</html>
<?php
}
?>