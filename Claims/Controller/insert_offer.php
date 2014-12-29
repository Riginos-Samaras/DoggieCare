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
$datepicker=strip_tags($_POST['datepicker']);
$starttime=strip_tags($_POST['start_time']);
$finishtime=strip_tags($_POST['finish_time']);
$location=strip_tags($_POST['location']);
$description=strip_tags($_POST['description']);
$theoffer="";
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
//echo "$datepicker $starttime $finishtime";
$goodoffer=validateoffer($offername);
$goodbiscuits=validatebiscuits($biscuits);
$goodusertype=validateusertype($theoffer);
$gooddatepicker=validatedatepicker($datepicker);
//echo "$starttime $finishtime";
$times=changetimes($starttime,$finishtime);
$badtimes=biggerStartTime($times[0],$times[1]);
$gooddescription=validatedescription($description);
$goodlocation=validatelocation($location);
$date=changedate($datepicker);

//validatetimes($starttime,$finishtime);
//$samepass=samePass($newPass,$confPass);
//$truepass=truePass($oldPass,$loginKey);
//$goodpass=validate_pass($newPass);

	
if($goodoffer==0||$goodbiscuits==0||$goodusertype==0||$gooddatepicker==0||$gooddescription==0||$goodlocation==0){
	header("Location:../View/AddOffer.php?goodoffer=$goodoffer&goodbiscuits=$goodbiscuits&goodusertype=$goodusertype&gooddatepicker=$gooddatepicker&badtimes=$badtimes&goodlocation=$goodlocation&gooddescription=$gooddescription");
}
else {
	
	echo "$userid_fgn, $offername,$theoffer,$location,$biscuits,$description,$times[0],$times[1],$datepicker";
	$dataArray=fetchUserData($loginKey);
	$userid_fgn=$dataArray[10];
	insert_data_into_offers($userid_fgn,$offername,$theoffer,$location,$biscuits,$description,$times[0],$times[1],$date);
	header("Location:../View/MyOffers.php");
}

?>