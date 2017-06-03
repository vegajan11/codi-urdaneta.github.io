
<?php

 require 'database.php';

    if ( !empty($_POST)) {
       
        
        $userName= mysql_real_escape_string($_POST['UserName']);
        $firstName= mysql_real_escape_string($_POST['FirstName']);        
        $lastName= mysql_real_escape_string($_POST['LastName']);        

        // Fetch data from the table
        $tablename = "users";
        $cols = array("firstName","lastName","userName");
        $condition = "userName='$userName'";
        $show = $obj->fetch($tablename, $cols, $condition);
        foreach ($show as $key => $val){}
            if (!empty($show)) {

            	echo 1;

            } else {
        
                $condition = "firstName like '$firstName' AND lastName like '$lastName'";
		        $show = $obj->fetch($tablename, $cols, $condition);
		        foreach ($show as $key => $val){}
 				if (!empty($show)) {
		        	 echo 2;
		        	} else {
                 		echo 0;
             		}


                   }

}
?>
