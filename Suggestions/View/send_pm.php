<?php
//include db configuration file
include 'db_functions.php';

if(isset($_POST["message"]) && strlen($_POST["message"])>0)
{	//do we have a delete request? $_POST["recordToDelete"]

	//sanitize post value, PHP filter FILTER_SANITIZE_NUMBER_INT removes all characters except digits, plus and minus sign.
	$message = $_POST["message"]; 
	$from_user = $_POST["from_user"]; 
	$to_user = $_POST["to_user"]; 
	
	//try deleting record using the record ID we received from POST
	save_pm_to_db($to_user,$from_user,$message);
	echo "Success";
}
else
{
	//Output error
	header('HTTP/1.1 500 Error occurred, Could not process request!');
    exit();
}
?>