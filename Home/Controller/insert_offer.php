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

$offername=strip_tags($_POST['offer']);
$biscuits=strip_tags($_POST['biscuits']);

if(strip_tags($_POST['theoffer'])=="consumer"){
	$theoffer="consumer";
}
else if(strip_tags($_POST['theoffer'])=="provider"){
	$theoffer="provider";
}
else {
	$theoffer="";
}

//createoffer($offername);
//echo"$oldPass<br/> $newPass<br/>$confPass ";
echo "$theoffer";
$goodoffer=validateoffer($offername);
$goodbiscuits=validatebiscuits($biscuits);
$goodusertype=validateusertype($theoffer);
$gooddatepicker=validatedatepicker($datepicker);
//$samepass=samePass($newPass,$confPass);
//$truepass=truePass($oldPass,$loginKey);
//$goodpass=validate_pass($newPass);

if($goodoffer==0||$goodbiscuits==0||$goodusertype==0){
	header("Location:../View/AddOffer.php?goodoffer=$goodoffer&goodbiscuits=$goodbiscuits&goodusertype=$goodusertype");
}
else {
	header("Location:../View/MyOffers.php?goodoffer=$goodoffer");
}

?>