<?php

session_start();
if(!isset($_SESSION['userId']))
{
	header("Location: index.php");
}
else if(isset($_SESSION['userId'])!="")
{
	header("Location: index.php");
}

if(isset($_GET['logout']))
{
	session_destroy();
	unset($_SESSION['userId']);
	unset($_SESSION['firstName']);
	header("Location: index.php");
}
?>