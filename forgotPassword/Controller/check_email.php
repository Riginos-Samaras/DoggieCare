<?php 
include_once '../Model/db_functions.php';
include_once 'lib_email.php';
$vpb_email = trim(strip_tags($_POST['check_email']));
		
		$check_for_validity = checkEmail($vpb_email);
		
		if($vpb_email == "")
		{
			echo '<br><div class="info">Please enter your account email in the required field to proceed. Thanks.</div><br>';
		}
		elseif($check_for_validity[0] ==0)
		{
			sleep(1.8);
			echo '<br><div id="status_msg" class="info" align="center">Sorry, the email <b>'.$vpb_email.'</b> does not exist on this system. <br>Please enter your valid account username to proceed. <br>Thanks.</div><br>';
		}
		else
		{
			SentVerificationEmail($vpb_email,$check_for_validity[1],$check_for_validity[2]);
			sleep(1.8);
			echo '<br><div class="info" id="status_msg" align="center">An email with your username and password has been sent.<br>Check your email('.$vpb_email.')</div><br>';
			
		}
?>