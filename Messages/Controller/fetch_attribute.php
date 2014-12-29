<?php
include '../Model/db_functions.php';




function getUserData($loginKey){
	$dataArray=fetchUserData($loginKey);
	return $dataArray;
}

function getOfferData($userid){
	$offerArray=fetchOfferData($userid);
	return $offerArray;
}


function getMessages($username){
	$messagesArray=fetchMessages($username);
	return $messagesArray;
}








?>