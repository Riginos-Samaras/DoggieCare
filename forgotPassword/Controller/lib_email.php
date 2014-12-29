<?php 
  //Send email for verification
  function SentVerificationEmail($email,$username,$password){
 	$to      = $email;
	$subject = 'DoggieCare Forget Password';
	$message = 'Username ='.$username.' || Password='.$password;
	$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
  
  }
  
  
?>