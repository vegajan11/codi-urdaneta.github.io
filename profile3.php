<!DOCTYPE html>
<html>
<?php include_once 'head.php'; ?>
<body>
<?php include_once 'navigator.php'; ?>



<?php require_once 'database.php';

// Fetch data from the table
$tablename = "members";
$cols = array("firstName","lastName","dateOfBirth","sex","civilStatus","contactNumber","memberAddress","email","occupation","mother","father","spouse");
$condition = "memberNo='2'";
$show = $obj->fetch($tablename, $cols, $condition);
foreach ($show as $key => $val)
?>


<section class="mbr-section mbr-parallax-background" id="content5-3" style="background-image: url(assets/images/stream.jpg); padding-top: 120px; padding-bottom: 120px;">
 <div class="mbr-overlay" style="opacity: 0.6; background-color: rgb(0, 0, 0);">
    </div>
    <div class="mbr-section mbr-section-nopadding">
        <div class="container">
            <div class="row">
                    <h3 class="mbr-section-title display-4">My Profile</h3>   
                    <a class = "btn pull-xs-right" href = "editprofile.php">Edit Profile</a>       
                <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                    <table class = "mbr-table-xs-up">
                        <tr>
                            <td class = "mbr-table-cell fontdisplay" colspan = "2" align = "center">Basic Information</td>
                        </tr>
                        <tr>
                            <td class = "mbr-table-cell  text-xs-right">Civil  Status</td>
                            <td class = "mbr-table-cell  text-xs-left"><?php  echo $val["civilStatus"] ; ?> </td>
                        </tr>
                        <tr>
                            <td class = "mbr-table-cell  text-xs-right">Sex</td>
                            <td class = "mbr-table-cell  text-xs-left"><?php  echo $val["sex"] ; ?> </td>
                        </tr>
                        <tr>
                            <td class = "mbr-table-cell  text-xs-right">Date of Birth</td>
                            <td class = "mbr-table-cell  text-xs-left"><?php  echo $val["dateOfBirth"] ; ?> </td>
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
                            <td class = "mbr-table-cell  fontdisplay" colspan = "2" align = "center">Special Skills</td>
                        </tr>
                        <tr>
                            <td class = "mbr-table-cell  text-xs-right">Occupation</td>
                            <td class = "mbr-table-cell  text-xs-left"><?php  echo $val["occupation"] ; ?> </td>
                        </tr>
                        <tr>
                            <td class = "mbr-table-cell  text-xs-right">Skills</td>
                            <td class = "mbr-table-cell  text-xs-left"><?php  echo $val["email"] ; ?> </td>
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
