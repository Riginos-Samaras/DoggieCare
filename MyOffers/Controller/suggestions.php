<?php
include '../Model/db_functions.php';

$userid=$_GET['offer'];

$offerArray=fetchOfferData($userid);
	
$suggestionArray=fetchSuggestions($offerid);

header("location: ../View/MyOffers.php");
?>