<?php
include '../Model/db_functions.php';




function getUserData($loginKey){
	$dataArray=fetchUserData($loginKey);
	return $dataArray;
}

function getSuggestions($offerid){
	$suggestionsArray=fetchSuggestion($offerid);
	if($suggestionsArray==0){
		header("location: ../View/noSuggestions.php");
		exit;
	}
	return $suggestionsArray;
}











?>