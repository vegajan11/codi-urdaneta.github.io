<?php session_start(); ?>
<?php 

    require 'database.php';

    if ( !empty($_POST)) {
       
        
        $userName= mysql_real_escape_string($_POST['userName']);
        $password = mysql_real_escape_string($_POST['password']);

        // Fetch data from the table
        $tablename = "users";
        $cols = array("userId","firstName","userName","password");
        $condition = "userName='$userName'";
        $show = $obj->fetch($tablename, $cols, $condition);
        foreach ($show as $key => $val)

            if (count($show) < 1) {
                 ?>
                 <script>alert('Username not found');</script>
                 <?php
            } else {
        
                        if($val['password']==($password))
                        {
                            $_SESSION['user'] = $val['firstName'];
                            $_SESSION['userId'] = $val['userId'];

                            header("Location: index.php");
                        }
                        else
                        {
                            ?>
                            <script>alert('Please check your password.');</script>
                            <?php
                        }
                   }

}

?>




<!DOCTYPE html>
<html>
<?php include_once 'head.php'; ?>
  <link rel="stylesheet" href="assets/theme/css/login.css">
<body>
<?php include_once 'navigator.php'; ?>
<section class="engine"><a rel="external" href="#">Mobirise Website Builder</a></section>
<section class="mbr-section mbr-section-hero mbr-section-full mbr-parallax-background mbr-section-with-arrow" id="header1-1" style="background-image: url(assets/images/peniel.jpg);">

    

    <div class="mbr-table-cell">

        <div class="container">
            <div class="row ">
                <div class = "nb-login">
                    <form id="logIn" class="form-signin" action="login.php" method="post">
                        <h3 class = "scenter">
                        Please Log In
                        </h3>

                            <div class="form-group">            

                                    <input id="userName" class="form-control" type="text" name="userName" value="<?php echo !empty($userName)?$userName:'';?>" placeholder = "User Name" maxlength = "50" required="" autofocus=""/> 


                            </div>
                            <div class="form-group">

                                   <input id="password" class="form-control" type="password" name="password" value="<?php echo !empty($password)?$password:'';?>" placeholder = "Password" maxlength = "50" required />

                            </div>
                            <div class="checkbox">
                                <label>
                                    <input id="remember" type="checkbox" name="remember" value="<?php echo !empty($remember)?$remember:'';?>" /> 
                                remember me
                                </label>
                            </div>
                            
                            <button type = "submit" class = "btn btn-block">LOG IN</button>
                            <p class = "display-5">Haven't ü joined yet? <a href ="joinus.php">Join us</a> now. </p>
           
                       
                    </form>
                    </div>
                </div>
            </div>
        </div>


    </section>


   

<?php include_once 'footer.php'; ?>


  <input name="animation" type="hidden">
  </body>
</html>



