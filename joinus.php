<?php session_start(); ?>
<?php 
    require 'database.php';

    if ( !empty($_POST)) {
       

        // keep track post values
        $sex= $_POST['sex'];
        $firstName = ucwords($_POST['firstName']);
        $lastName = ucwords($_POST['lastName']);
        $dateOfBirth= $_POST['dateOfBirth'];
        $userName= strtolower($_POST['userName']);
        $password= $_POST['password'];


        // insert data

            // Create Connection
            $obj = new Database("localhost","root","","codiurd");

            //Associative array for insert function
            $InsColumnVal = array("firstName"=>$firstName,"lastName"=>$lastName,"dateOfBirth"=>$dateOfBirth,"userName"=>$userName,"password"=>$password);

            //Call insert function to insert record
            $tablename = "users";
            $obj->insertuser($tablename, $InsColumnVal, $sex);
            header("Location: login.php");  
}
?>
<!DOCTYPE html>
<html>
<?php include_once 'head.php'; ?>


<body>
<?php include_once 'navigator.php'; ?>
<section class="engine"><a rel="external" href="#">Mobirise Website Builder</a></section>
<section class="mbr-section  mbr-section-full mbr-parallax-background " id="header1-1" style="background-image: url(assets/images/peniel.jpg);">




    <div class="mbr-table mbr-table-full">
        <div class="mbr-table-cell">

            <div class="container">
                <div class="mbr-section row">
                    <div class="mbr-table-md-up col-md-offset-1">

                        <div class="mbr-table-cell mbr-valign-top mbr-left-padding-md-up col-md-7 image-size" style="width: 50%;">
                            <div class="mbr-figure"><img src="assets/images/worship.jpg" style="border-radius: 10px;"></div>
                        </div>                      

                        <div class="mbr-table-cell col-md-5 content-size">

                            <h5 class="mbr-section-title display-5">Join Us</h5>

                            <form id="joinForm" class="form-horizontal" action="joinus.php"  method="post">
                        <fieldset>
                            <div class="form-group col-lg-8">            


                                    <input id="firstName" class="form-control" type="text" name="firstName" style ="text-transform: capitalize;" placeholder = "First Name" maxlength = "50" autocomplete = "off" required/> 

                            </div>
                            <div class="form-group col-lg-8">

                                   <input id="lastName" class="form-control" type="text" name="lastName" style ="text-transform: capitalize;" placeholder = "Last Name" maxlength = "50" autocomplete = "off" required />

                            </div>
                            <div class="form-group col-lg-8"> 


                                   <input id="dateOfBirth" class="form-control" type="date" name="dateOfBirth" data-placeholder="Date of Birth" required aria-required = "true"/>

                            </div>
                            <div class="form-group col-lg-8">  
                        

                                    <input id="userName" class="form-control" type="text" name="userName" style ="text-transform: lowercase;" placeholder = "User Name" maxlength = "25" autocomplete = "off" required/> 

                            </div>
                            <div class="form-group col-lg-8">  
                       

                                    <input id="password" class="form-control" type="password" name="password"  placeholder = "Password" maxlength = "25" autocomplete = "off" required/> 
     
                            </div>
                            <div class="form-group col-lg-8">  
                                     <input id="confirmPass" class="form-control" type="password" name="confirmPass" value="<?php echo !empty($confirmPass)?$confirmPass:'';?>" placeholder = "Confirm Password" maxlength = "25" required/> 
                            </div>
                            <div class="form-group col-lg-8">

                                    <div id = "genderdiv" class="form-control radio">
                                        <label style = "margin-right: 2em;">
                                           <input type="radio" name="sex" id="optionsRadios1"  value="Male"> 
                                            Male
                                        </label>
                                        <label>
                                            <input type="radio" name="sex" id="optionsRadios2" value="Female">
                                            Female
                                        </label>
                                    </div>

                            </div>
                            <div class="form-group col-lg-8">
                                <div class = "pull-lg-right"> 
                                    <input id="join" class="btn btn-success" value = "Join" /> 
                                 </div>
                            </div>     
                        </fieldset>
                    </form>


                    </div>
                </div>
            </div>

        </div>
    </div>

</section>



<?php include_once 'footer.php'; ?>
<script src="assets/theme/js/bootbox.min.js"></script>

  <input name="animation" type="hidden">
  </body>
</html>



