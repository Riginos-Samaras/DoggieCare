<!DOCTYPE html>
<?php
//Start session
session_start();
ob_start();
 
//Check whether the session variable SESS_MEMBER_ID is present or not

if((isset($_COOKIE['login'])) || (isset($_SESSION['user'])) || (!trim($_SESSION['user']) == '')){
			
		header("location: if_logon.php");
		exit();
}
	

?>

<html>

<head>
			<title>DoggieCare Registration</title>
			<link rel="stylesheet" href="../View/forma/style.css" type="text/css"/>
			<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
			<link rel="stylesheet" href="../View/Registration-style.css" type="text/css"/>
			<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
			<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Montserrat+Alternates">
			<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Fjalla+One">
			<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Nunito">
			<meta charset="utf-8">
  			<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  			<!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>

<body>	
	
			
			<!-- FORM-->
			<section id="container">
				<a href="Registration.html" class="anchorLink"><img class="logo"  src="../../FrontPage/View/images/logo-1.png" alt="Puppy Maker" /></a>
		<h2>Registration Form</h2>
		<form name="hongkiat" id="hongkiat-form" action="../Controller/Register.php" method="post">
		<div id="wrapping" class="clearfix">
			<section id="aligned">
			<input type="text" name="fullname" id="name" placeholder="Full name*" autocomplete="off" tabindex="1" class="txtinput">
			<?php 
				if(isset($_GET['name'])&&$_GET['name']=="")
					echo"*Please fill out a proper name e.g. \"Steve Jobs\"";
				else{}
			?>
			<input type="text" name="username" id="user-name" placeholder="Choose your username*" autocomplete="off" tabindex="2" class="txtinput">
			<?php 
				if(isset($_GET['username'])&&$_GET['username']=="")
					echo"*Please fill out a proper username (3 to 16 letters, numbers, underscores, or hyphens)";
				else{}
			?>
			<input type="email" name="email" id="email" placeholder="Your e-mail address*" autocomplete="off" tabindex="3" class="txtinput">
			<?php 
				if(isset($_GET['email'])&&$_GET['email']=="")
					echo"*Please fill out a proper email e.g. \"LarryPage@example.com\"";
				else{}
			?>
			<input type="email" name="reenter_email" id="email" placeholder="Re-enter your e-mail address*" autocomplete="off" tabindex="4" class="txtinput">
			<?php 
				if(isset($_GET['emailMatch'])&&$_GET['emailMatch']=="")
					echo"*The Re-entered email does't match your email address";
				else{}
			?>
			<input type="password" name="password" id="passwd" placeholder="Choose your password*" autocomplete="off" tabindex="5" class="txtinput">
			<?php 
				if(isset($_GET['password'])&&$_GET['password']=="")
					echo"*Please fill out a proper password (6 to 18 letters, numbers or symbols)";
				else{}
			?>

			
          
     		<span class="radiobadge" tabindex="6" >
						
					</span>
				
				<p id=dublicate><?php 
					
					if(isset($_GET['dublicateEntry'])&&!("" == trim($_GET['dublicateEntry'])))
					{
						
						if($_GET['dublicateEntry']==1){
								
							print "* This username is already in use by a registered user *";
						}
						else if($_GET['dublicateEntry']==2){
								
							print "* This email is already in use by a registered user *";
						}
					}
				
				 ?></p>
			
		<section id="buttons">
			<input type="submit" name="submit" id="createaccbtn" class="createaccbtn" tabindex="6" value="Create my Account">
			<br style="clear:both;">
		</section>
		</form>
	</section>
		
			
</body>

</html>