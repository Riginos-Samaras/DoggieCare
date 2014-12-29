<?php 
session_start();

include '../Model/db_functions.php';
include 'lib_email.php';

$username = $_POST['username'];
$password = $_POST['password'];
$rememberme=$_POST['rememberme']; 

$found = loginValidateUser($username,$password);
if($found==2){
	$_SESSION['username']=$username;
	header("location:../View/Not_Confirmed.php");
	exit();
}
else if($found==1){
	$loginKey=md5(uniqid(mt_rand(), true));
	if ($rememberme=="on")
	{
		
		
		updateLoginKey($loginKey,$username);
		
		
		setcookie("login",$loginKey,time()+720000,"/");
		header("location:../../Home/View/Home.php");
		exit();
	}

		session_regenerate_id();
		$_SESSION['user']=$loginKey;
		updateLoginKey($loginKey,$username);
		
		header("location:../../Home/View/Home.php");
	
	}
	else{
		
		header("location:../View/index.php?FalseLogin=failed#third");
	}

	
	