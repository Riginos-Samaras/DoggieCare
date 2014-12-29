<?php 
  //Send email for verification
  function SentVerificationEmail($vcode, $email){
 	$to      = $email;
	$subject = 'Welcome to DoggieCare';
	$message = 'Welcome to DoggieCare. This email is for account verification. click on the link
	below to verify your DoggieCare account.
	'."http://localhost/DoggieCare/Registration/Controller/Authentication.php?code=".$vcode;
	$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
  
  }
  
  
?>