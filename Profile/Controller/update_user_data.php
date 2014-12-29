<?php
include '../Model/db_functions.php';
//Start session
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
$name=strip_tags($_POST['name']);
$email=strip_tags($_POST['email']);
$fb_url=strip_tags($_POST['website']);
$phone=strip_tags($_POST['telephone']);
$country=strip_tags($_POST['country']);
$address=strip_tags($_POST['address']);
$city=strip_tags($_POST['city']);
$gender=strip_tags($_POST['Gender']);
$age=strip_tags($_POST['age']);
$message=strip_tags($_POST['message']);
//ProfilePic handling
$imageName=$_FILES["profilePic"]["name"];
$imageData=file_get_contents($_FILES['profilePic']['tmp_name']);
$imageType=$_FILES["profilePic"]["type"];
$userData=fetchUserData($loginKey);
$username=$userData[1];
//image validation


$valArray=validations($name,$email,$fb_url,$phone,$country,$city,$address,$gender,$age,$message,$imageType,$imageData);



echo "name:$valArray[0]<br/>email:$valArray[1] <br/>fb_url:$valArray[2]<br/> phone:$valArray[3]<br/> country:$valArray[4]<br/> city:$valArray[5] <br/> address:$valArray[6]<br/> gender:$valArray[7]<br/> age:$valArray[8]<br/> message:$valArray[9]";
if(($valArray[0]!="1")or($valArray[1]!="1")or($valArray[2]!="1")or($valArray[3]!="1")or($valArray[4]!="1")or($valArray[5]!="1")or($valArray[6]!="1")or($valArray[7]!="1")or($valArray[8]!="1")or($valArray[9]!="1")or($valArray[10]!="1")){
	echo "Wrong shit";
	
	header("Location:../View/Profile.php?name=$valArray[0]&email=$valArray[1]&fb_url=$valArray[2]&phone=$valArray[3]&country=$valArray[4]&city=$valArray[5]&address=$valArray[6]&gender=$valArray[7]&age=$valArray[8]&message=$valArray[9]&profile_pic=$valArray[10]");
}
else{

changeUserData($name,$email,$fb_url,$phone,$country,$city,$address,$gender,$age,$message,$loginKey,$username,$imageName,$imageData,$imageType);
header("Location:../View/Profile.php");
}
?>