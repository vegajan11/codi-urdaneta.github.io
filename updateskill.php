<?php session_start(); ?>
<?php require_once 'database.php';

        $skill = &$_POST['skill'];
        $action = &$_POST['action'];
        $userId = $_SESSION['userId'];
			
        	// Assign table name
			$tablename = "skills";

            // Create Connection
            $obj = new Database("localhost","root","","codiurd");

				if ($action == "add") {

		            //Associative array for insert function
		            $InsColumnVal = array("userId"=>$userId,"skill"=>$skill,);
				 	$obj->insert($tablename, $InsColumnVal);  
				} else{
		            $InsColumnVal = array("userId"=>$userId,"skill"=>$skill,);
				 	$obj->delete($tablename, $InsColumnVal); 

				}

?>