<?php 
session_start();
ob_start();
 
//Check whether the session variable SESS_MEMBER_ID is present or not

if((isset($_COOKIE['login'])) || (isset($_SESSION['user'])) || (!trim($_SESSION['user']) == '')){
			
		if(isset($_COOKIE['login'])){
			
			header("location: ../../Home/View/Home.php");
			exit();
			
		}
		header("location: ../../Home/View/Home.php");
		exit();
}

else{
	if((isset($_SESSION['email'])) || (!trim($_SESSION['email']) == '')){
		
		$email=$_SESSION['email'];
		$emailDomain = explode("@", $email);
		
		header("location: http://www.$emailDomain[1]");
		
	}
	
	
}
?>