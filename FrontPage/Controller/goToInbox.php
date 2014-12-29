<?php 
session_start();
//var_dump($_SESSION); exit;
include '../Model/db_functions.php';
include '../Controller/lib_email.php';
	
//Check whether the session variable SESS_MEMBER_ID is present or not
	if((isset($_SESSION['username'])) || (!trim($_SESSION['username']) == '')){
		
		$username=$_SESSION['username'];
		
		$email=getEmail($username);
		$vcode=getVcode($username);
		SentVerificationEmail($vcode, $email);
		$emailDomain = explode("@", $email);
		
		header("location: http://www.$emailDomain[1]");
		
	}


?>