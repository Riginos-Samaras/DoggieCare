<?php
//include db configuration file
include_once("../Model/db_functions.php");

if(isset($_POST["score"]) && strlen($_POST["score"])>0)
{	//do we have a delete request? $_POST["recordToDelete"]

	//sanitize post value, PHP filter FILTER_SANITIZE_NUMBER_INT removes all characters except digits, plus and minus sign.
	$idOffer = $_POST["id"]; 
	$score=$_POST["score"];
	//try deleting record using the record ID we received from POST
		$result=updateRating($score,$idOffer);
		
}
else
{
	//Output error
	header('HTTP/1.1 500 Error occurred, Could not process request!');
    exit();
}
?>