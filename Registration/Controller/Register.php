<?php 
session_start();

include '../Model/db_functions.php';
//Functions

function generateVerificationCode($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomCode = '';
    for ($i = 0; $i < $length; $i++) {
        $randomCode .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomCode;
}




//Variable declaretion

$fullname = strip_tags($_POST["fullname"]);
$username = strip_tags($_POST["username"]);
$password = strip_tags($_POST["password"]);
$email 	  = strip_tags($_POST["email"]);
$ReEnterEmail = strip_tags($_POST["reenter_email"]);
$vcode=generateVerificationCode(); //vcode is for email
$loginKey=md5(uniqid(mt_rand(), true));
$valArray=validations($fullname,$username,$password,$email,$ReEnterEmail);

if(($valArray[0]!="1")or($valArray[1]!="1")or($valArray[2]!="1")or($valArray[3]!="1")or($valArray[4]!="1")){
	
	header("Location:../View/Registration.php?name=$valArray[0]&email=$valArray[1]&username=$valArray[2]&password=$valArray[3]&emailMatch=$valArray[4]");
	exit();
}
else{


$dublicate=check4dublicate($username,$email); //if $dublicate==0 then ther is no dublicates in the db. if $dublicate == 1 then dublicate username. if $dublicate==2 then dublicate email.
if($dublicate==0){

	
insert_data_into_users($fullname,$username,$password,$email,$vcode,$loginKey);
$_SESSION['email']=$email;

header("location:../View/Not_Confirmed.php");
}
else {
	
	
	header("location:../View/Registration.php?dublicateEntry=$dublicate");
}
}


  

  
?>