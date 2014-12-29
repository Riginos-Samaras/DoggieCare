<?php

function getUserRating($loginKey){
	$dataArray=fetchUserRating($loginKey);
	return $dataArray;
}

function users_db_connect_cn(){

$db = new PDO('mysql:host=localhost;dbname=puppymaker;charset=utf8', 'root', 'root');
return $db;
}
function fetchUserRating($loginKey){
	$db=users_db_connect_cn();
		
	foreach($db->query("SELECT * FROM registration WHERE login_key='$loginKey'") as $row) 
	{		/*
			$dataArray[0]=$row['fullname'];
			$dataArray[1]=$row['username'];
			$dataArray[2]=$row['email'];
			$dataArray[3]=$row['phone'];
			$dataArray[4]=$row['address'];
			$dataArray[5]=$row['fb_url'];
			$dataArray[6]=$row['city'];
			$dataArray[7]=$row['message'];
			$dataArray[8]=$row['gender'];
			$dateArray[9]=$row['age'];
			$dataArray[10]=$row['userid'];*/
			$dataArray[0]=$row['consumer_rating'];
			$dataArray[1]=$row['provider_rating'];
			$dataArray[2]=$row['consumer_ranking'];
			$dataArray[3]=$row['provider_ranking'];
	}
	return $dataArray;
}











?>