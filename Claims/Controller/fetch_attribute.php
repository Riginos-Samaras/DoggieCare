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
function getRequstedOffer($username,$userid){
	$offerArray=fetchRequestedOffers($username,$userid);
	return $offerArray;
}
function getAcceptedOffer($username,$userid){
	$offerArray=fetchAcceptedOffers($username,$userid);
	return $offerArray;
}













?>