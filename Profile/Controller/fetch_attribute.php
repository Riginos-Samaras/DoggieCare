<?php
include '../Model/db_functions.php';




function getUserData($loginKey){
	$dataArray=fetchUserData($loginKey);
	return $dataArray;
}


function getTheBlob($loginKey){
$userData=fetchUserData($loginKey);
$username=$userData[1];

$image=getImage($username);
return($image);
}









?>