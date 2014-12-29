<?php 
include '../Model/db_functions.php';
$vcode = $_GET["code"];

// Create connection
$db=users_db_connect();

// Check connection

$found=vcodeValidation($db,$vcode);

if($found == "0"){
	header("location:../View/Wrong_Confirmation.php");
	
}
if($found == "1"){
	updateEmailVerified($db,$vcode);
	header("location:../../Home/View/Home.php");
	
}


mysqli_close($db);

?>