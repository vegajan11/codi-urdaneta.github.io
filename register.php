<?php
session_start(); 
 if (!(isset($_SESSION['userId']))){
        header("location: login.php");


    } else {




    
    require 'database.php';
// Fetch data from the table
$tablename = "membersInfo";
$cols = array("sex","civilStatus","contactNumber","memberAddress","email","occupation","mother","father","spouse");
$userId = $_SESSION['userId'];
$condition = "userId='$userId'";
$show = $obj->fetch($tablename, $cols, $condition);
foreach ($show as $key => $val)

// keep track post values
        $sex= $val['sex'];
        $civilStatus= $val['civilStatus'];
        $contactNumber= $val['contactNumber'];
        $memberAddress= $val['memberAddress'];
        $email= $val['email'];
        $occupation= $val['occupation'];
        $mother= $val['mother'];
        $father= $val['father'];
        $spouse= $val['spouse'];

    
$tablename = "skills";
$cols = array("userId","skill");
$userId = $_SESSION['userId'];
$condition = "userId='$userId'";
$show = $obj->fetch($tablename, $cols, $condition);





    if ( !empty($_POST)) {
       
        
        // keep track post values
       
        $sex= $_POST['sex'];
        $civilStatus= $_POST['civilStatus'];
        $contactNumber= $_POST['contactNumber'];
        $memberAddress= $_POST['memberAddress'];
        $email= $_POST['email'];
        $occupation= $_POST['occupation'];
        $mother= $_POST['mother'];
        $father= $_POST['father'];
        $spouse= $_POST['spouse'];

  //      $image= $_FILES['image'];

        
        // insert data



            // Create Connection
            $obj = new Database("localhost","root","","codiurd");

            // Fetch data from the table
            $tablename = "membersInfo";

            //Associative array to set query for update function
            $set = array("sex"=>$sex,"civilStatus"=>$civilStatus,"contactNumber"=>$contactNumber,"memberAddress"=>$memberAddress,"email"=>$email,"occupation"=>$occupation,"mother"=>$mother,"father"=>$father, "spouse" =>$spouse);

            //Associative array to condition query for update function
            $condition =  "userId='$userId'";
            
            //call update function
            $obj->update($tablename, $set,$condition);
            header ('location: profile.php');
/*
            // For uploading photo
            if (isset($_FILES['image'])){
                $errors= array();
                $file_name = $_FILES['image']['name'];
                $file_size = $_FILES['image']['size'];
                $file_tmp = $_FILES['image']['tmp_name'];
                $file_type = $_FILES['image']['type'];
                $file_ext = strtolower (end(explode('.',$_FILES['image']['name'])));

                $expensions = array("jpeg","jpg","png");

                if(in_array($file_ext,$expensions)=== false){
                    $errors[]="extension not allowed, please choose a JPEG or PNG file.";
                }

                if ($file_size > 2097152){
                    $errors[]='File size must be excately 2 MB';
                }

                if(empty ($errors)==true){
                    move_uploaded_file($file_tmp,"uploads/memphotos/".$file_name);
                    echo "Success";
                }else{
                   print_r($errors);
                }
            }
*/
}

?>






<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v3.12.1, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type = "text/javascript" src = "jqueryui/js/jquery-1.6.2.min.js"> </script>
    <script type = "text/javascript" src = "jqueryui/js/jquery-ui-1.8.15.custom.min.js"> </script>
  <script type = "text/javascript" src = "assets/theme/js/checkboxes.js"> </script>

    <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/animate.css/animate.min.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  
    <title>Register</title>
    <style type="text/css">

        #main { width:100%; max-width: 960px; margin: 0px auto; border:solid 1px #b2b3b5; -moz-border-radius:10px; padding:20px; background-color:#f6f6f6;} 
        #header { text-align:center; border-bottom:solid 1px #b2b3b5; margin: 0 0 20px 0; }
        fieldset { border:none; width:100%;}
        legend { font-size:18px; margin:0px; padding:10px 0px; color:#b0232a; font-weight:bold;}
        /* label { display:block; margin:15px 0 5px;}
         input[type=text], input[type=password] { width:300px; padding:5px; border:solid 1px #000;} */
        .prev, .next { background-color:#b0232a; padding:5px 10px; color:#fff; text-decoration:none;border-radius: 5px;}
        .prev:hover, .next:hover { background-color:#cccccc; text-decoration:none;}
        .prev { float:left;}
        .next { float:right;}
        #steps { list-style:none; width:100%; overflow:hidden; margin:0px; padding:0px;}
        #steps li {font-size:24px; float:left; padding:10px; color:#b0b1b3;}
        #steps li span {font-size:11px; display:block;}
        #steps li.current { color:#000;}
        #makeWizard { background-color:#b0232a; color:#fff; padding:5px 10px; text-decoration:none; font-size:18px;}
        #makeWizard:hover { background-color:#000;}
        #saveAccount { float:right; padding:5px 10px; border-radius: 5px; }

        input[type=text] { -webkit-appearance: none; -moz-appearance:none; line-height: 40px; font-size: 17px;}
    </style>


   <script type="text/javascript" src="assets/jqueryui/js/jquery-1.6.2.min.js"></script>
    <script type="text/javascript" src="formToWizard/formToWizard.js"></script>
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.min.css" />

   <!-- <link id="themecss" rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" /> -->
        <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css" />
          <link rel="stylesheet" type="text/css" href="assets/theme/css/theme.css" /> 
        <link rel="stylesheet" href="assets/theme/css/styles2.css" />

    <script type="text/javascript">
        $(document).ready(function(){
            $("#SignupForm").formToWizard({ submitButton: 'SaveAccount' })
        });
    </script>
</head>
  <body>

<section id="one" style="background-image: url(assets/images/jumbotron.jpg);">
    <div class="container wow fadeInUp">
        <div class="col-md-12 text-center">
                <h2 class="mt-0 text-primary">Registration Form</h2>
                <hr class="primary">
            </div>



        <form id="SignupForm" class="form-horizontal" action="register.php" enctype="multipart/form-data" method="post">
        <fieldset>

            <legend>Basic Information</legend>
            
            <div class="form-group">
                <label class="col-lg-2 control-label">Sex</label>
                <div class="col-lg-7">
                    <div class="radio">
                        <label>
                            <input type="hidden" name="userID" id = "userID" value = "<?php echo $userId; ?>">
                            <input type="radio" name="sex" id="optionsRadios1"  value="Male" <?php if ($sex == "Male") { echo "checked";}?>>
                            Male
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="sex" id="optionsRadios2" value="Female" <?php if ($sex == "Female") { echo "checked";}?>>
                            Female
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group"> 
                <label for="civilStatus" class="col-lg-2 control-label">Civil Status</label>
                <div class="col-lg-7">
                    <select id="civilStatus" style = "height:40px;" class="form-control" name="civilStatus" value="<?php echo !empty($civilStatus)?$civilStatus:'';?>"/>
                        <option value="Single" <?php if ($civilStatus == "Single") { echo "selected";}?>>Single</option>
                        <option value="Married" <?php if ($civilStatus == "Married") { echo "selected";}?>>Married</option>
                        <option value="Widowed" <?php if ($civilStatus == "Widowed") { echo "selected";}?>>Widowed</option>
                    </select>
               </div>
            </div>
            </fieldset>
             <fieldset> 
            <legend>Contact Information</legend>
            <div class="form-group"> 
                <label for="contactNumber" class="col-lg-2 control-label">Contact Number</label>
                <div class="col-lg-7">
                   <input id="contactNumber" class="form-control" type="tel" name="contactNumber" value="<?php echo !empty($contactNumber)?$contactNumber:'';?>" placeholder = "Contact Number" /> 
                </div> 
            </div>
            <div class="form-group"> 
                <label for="memberAddress" class="col-lg-2 control-label">Address</label>
                <div class="col-lg-7">
                   <input id="memberAddress" class="form-control" type="text" name="memberAddress" value="<?php echo !empty($memberAddress)?$memberAddress:'';?>" placeholder = "Address" autocapitalize = "word"/> 
                </div>   
            </div>                                 
            <div class="form-group">
                <label for="email" class="col-lg-2 control-label">Email</label>
                <div class="col-lg-7">
                    <input id="email" class="form-control" type="email" name="email" value="<?php echo !empty($email)?$email:'';?>" placeholder = "Email Address"/> 
               </div> 
            </div>
        </fieldset>

        <fieldset>
            <legend>Skills</legend>
            <div class="form-group">
                <label for="occupation" class="col-lg-2 control-label">Occupation</label>
                <div class="col-lg-7">
                    <input id="occupation" class="form-control" type="text" name="occupation" value="<?php echo !empty($occupation)?$occupation:'';?>" placeholder = "Occupation" autocapitalize = "word"/> 
               </div> 
            </div>

            <?php 
            $tablename = "skills";
                $cols = array("userId","skill");
                $userId = $_SESSION['userId'];
                $condition = "userId='$userId'";
                $show = $obj->fetch($tablename, $cols, $condition);
            ?>
            <div class="form-group">
                <label for="specialSkills" class="col-lg-2 control-label">Special Skills</label>
                <div class="col-lg-10">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id = "singing" name="skills[]" value = "Singing" <?php foreach ($show as $key => $val)  { if ($val['skill'] == "Singing") { echo "checked";}} ?> />
                            Singing
                        </label>
                        <label>
                            <input type="checkbox" id = "dancing" name="skills[]" value = "Dancing" <?php foreach ($show as $key => $val)  { if ($val['skill'] == "Dancing") { echo "checked";}} ?> />
                            Dancing
                        </label>
                        <label>
                            <input type="checkbox" id = "play" name="skills[]" value = "Play Instruments" <?php foreach ($show as $key => $val)  { if ($val['skill'] == "Play Instruments") { echo "checked";}} ?>/>
                            Play Instruments
                        </label>
                        <label>
                            <input type="checkbox" id = "acting" name="skills[]" value = "Acting" <?php foreach ($show as $key => $val)  { if ($val['skill'] == "Acting") { echo "checked";}} ?>/>
                            Acting
                        </label>

                        <label>
                            <input type="checkbox" id = "cooking" name="skills[]" value = "Cooking" <?php foreach ($show as $key => $val)  { if ($val['skill'] == "Cooking") { echo "checked";}} ?>/>
                            Cooking
                        </label>
                        <label>
                            <input type="checkbox" id = "driving" name="skills[]" value = "Driving" <?php foreach ($show as $key => $val)  { if ($val['skill'] == "Driving") { echo "checked";}} ?>/>
                            Driving
                        </label>
                        <label>
                            <input type="checkbox" id = "electrician" name="skills[]" value = "Electrician" <?php foreach ($show as $key => $val)  { if ($val['skill'] == "Electrician") { echo "checked";}} ?>/>
                            Electrician
                        </label>
                        <label>
                            <input type="checkbox" id = "plumbing" name="skills[]" value = "Plumbing" <?php foreach ($show as $key => $val)  { if ($val['skill'] == "Plumbing") { echo "checked";}} ?>/>
                            Plumbing
                        </label>

                        <label>
                            <input type="checkbox" id = "carpentry" name="skills[]" value = "Carpentry" <?php foreach ($show as $key => $val)  { if ($val['skill'] == "Carpentry") { echo "checked";}} ?>/>
                            Carpentry
                        </label>
                        <label>
                            <input type="checkbox" id = "interior" name="skills[]" value = "Interior Decoration" <?php foreach ($show as $key => $val)  { if ($val['skill'] == "Interior Decoration") { echo "checked";}} ?>/>
                            Interior Decoration
                        </label>
                        <label>
                            <input type="checkbox" id = "emcee" name="skills[]" value = "Emcee" <?php foreach ($show as $key => $val)  { if ($val['skill'] == "Emcee") { echo "checked";}} ?>/>
                            Emcee
                        </label>
                        <label>
                            <input type="checkbox" id = "visual" name="skills[]" value = "Visual Design" <?php foreach ($show as $key => $val)  { if ($val['skill'] == "Visual Design") { echo "checked";}} ?>/>
                            Visual Design
                        </label>
                    </div>
               </div> 
            </div>
        </fieldset>

        <fieldset>
            <legend>Family Background</legend>
            <div class="form-group"> 
                <label for="father" class="col-lg-2 control-label">Father</label>
                <div class="col-lg-7">
                   <input id="father" class="form-control" type="text" name="father" value="<?php echo !empty($father)?$father:'';?>" placeholder = "Name of Father" autocapitalize = "word"/> 
                </div> 
            </div>
            <div class="form-group"> 
                <label for="mother" class="col-lg-2 control-label">Mother</label>
                <div class="col-lg-7">
                   <input id="mother" class="form-control" type="text" name="mother" value="<?php echo !empty($mother)?$mother:'';?>" placeholder = "Name of Mother" autocapitalize = "word"/> 
                </div>   
            </div>                                 
            <div class="form-group">
                <label for="spouse" class="col-lg-2 control-label">Spouse</label>
                <div class="col-lg-7">
                    <input id="spouse" class="form-control" type="text" name="spouse" value="<?php echo !empty($spouse)?$spouse:'';?>" placeholder = "Name of Spouse" autocapitalize = "word"/> 
               </div> 
            </div> 
            <button id="saveAccount" type="submit" class="btn btn-success">Update</button>
        </fieldset>
<!--
        <fieldset>
            <legend>Your Photo</legend>
            <div class="form-group"> 
                <label for="image" class="col-lg-2 control-label">Photo</label>
                <div class="col-lg-7">
                   <input id="image" class="" type="file" name="image" /> 
                </div> 
            </div>
            
            <button id="saveAccount" type="submit" class="btn btn-success">Save</button>
        </fieldset>
-->
               


        </form>


</div>
</section>

</html>
<?php
}
?>


