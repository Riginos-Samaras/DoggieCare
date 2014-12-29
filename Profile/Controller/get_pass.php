<?php
include '../Model/db_functions.php';
session_start();
 
//Check whether the session variable SESS_MEMBER_ID is present or not
if((isset($_COOKIE['login'])) || (isset($_SESSION['user'])) || (!trim($_SESSION['user']) == '')){
	
	if(isset($_COOKIE['login'])){
		
		$loginKey=$_COOKIE['login'];
	}
	else{
		
		$loginKey=$_SESSION['user'];
	}
}
else{
	header("Location:../../FrontPage/View/index.php");
}
//echo 'Hello ' . htmlspecialchars($_POST["name"]) . '!';

$oldPass=$_POST['oldpass'];
$newPass=$_POST['newpass'];
$confPass=$_POST['confpass'];
echo"$oldPass<br/> $newPass<br/>$confPass ";





$samepass=samePass($newPass,$confPass);
$truepass=truePass($oldPass,$loginKey);
$goodpass=validate_pass($newPass);
/*
if( !($samepass) or !($truepass)or !($goodpass)){
	
	header("Location:../View/ChangePassword.php?same=");
}
 * *
 */
if(($truepass)&&($samepass)&&($goodpass)){
	changePass($newPass,$loginKey);
	header("Location:../View/ChangePassword.php?changed=1");
}
else {
	header("Location:../View/ChangePassword.php?same=$samepass&true=$truepass&good=$goodpass");
}
?>