<?php
include '../Model/db_functions.php';

$action 				= $_POST['action'];
$updateRecordsArray 	= $_POST['recordsArray'];

if ($action == "updateRecordsListings"){

	$listingCounter = 1;
	foreach ($updateRecordsArray as $recordIDValue) {
	try{
								$con=users_db_connect();
		
						  	
								  //MySql Insert data to table registration
								  
								 $sql="UPDATE offers SET recordListingID =? WHERE offerid =?";
									$q = $con->prepare($sql);
								
									$q->execute(array($listingCounter,$recordIDValue));
									
								  
								}
							catch(PDOException $pe)	
							{
							
							  die('Connection error, because: ' .$pe->getMessage());
							
							}
	$listingCounter =$listingCounter+1;
	
	}

	echo '<pre>';
	print_r($updateRecordsArray);
	echo '</pre>';
	echo 'If you refresh the page, you will see that records will stay just as you modified.';
}
?>