<?php
//include db configuration file
include '../Model/db_functions.php';

//if(isset($_POST["message"]) && strlen($_POST["message"])>0)
//{	//do we have a delete request? $_POST["recordToDelete"]

	//sanitize post value, PHP filter FILTER_SANITIZE_NUMBER_INT removes all characters except digits, plus and minus sign.
	$offer_id = $_POST["offer_id"]; 
	$from_user = $_POST["from_user"]; 
	$to_user = $_POST["to_user"]; 
	
	//try deleting record using the record ID we received from POST
	save_offer_request($to_user,$from_user,$offer_id);
	//echo "Success from:$from_user to:$to_user id:$offer_id";
/*}
else
{
	//Output error
	header('HTTP/1.1 500 Error occurred, Could not process request!');
    exit();
}*/
?>