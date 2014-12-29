<?php
include '../Model/db_functions.php';




function getUserData($loginKey){
	$dataArray=fetchUserData($loginKey);
	return $dataArray;
}

function getOfferData($userid,$cleaning,$sitting,$walking){
	
	if($cleaning=="on"){$cleaning="cleaning";}
	if($sitting=="on"){$sitting="sitting";}
	if($walking=="on"){$walking="walking";}
	$offerArray=fetchOfferData($userid,$cleaning,$sitting,$walking);
	return $offerArray;
}











?>