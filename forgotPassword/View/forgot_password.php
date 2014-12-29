<!DOCTYPE html>
<?php
//Start session
session_start();
ob_start();
 
//Check whether the session variable SESS_MEMBER_ID is present or not

if((isset($_COOKIE['login'])) || (isset($_SESSION['user'])) || (!trim($_SESSION['user']) == '')){
			
		header("location: ../../FrontPage/View/index.php");
		exit();
}
	

?>

<html>

<head>
			<title>DoggieCare Forgot Password</title>
			<link rel="stylesheet" href="../View/forma/style.css" type="text/css"/>
			<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
			<link rel="stylesheet" href="../View/Registration-style.css" type="text/css"/>
			<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
			<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Montserrat+Alternates">
			<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Fjalla+One">
			<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Nunito">
			<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
			<script src="../Controller/js/validate_email.js"></script>
			<meta charset="utf-8">
  			<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  			<!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>

<body>	
	
			
			<!-- FORM-->
			<section id="container">
				<a href="Registration.html" class="anchorLink"><img class="logo"  src="../../FrontPage/View/images/logo-1.png" alt="Puppy Maker" /></a>
		<h2>Forgot Password</h2>
		<form name="hongkiat" id="hongkiat-form">
		<div id="wrapping" class="clearfix">
			<section id="aligned">
			
			<input type="email" name="email" id="email" placeholder="Your e-mail address*" autocomplete="off" tabindex="3" class="txtinput">
			<div id="email_status"></div>
				
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
			<input type="button" onclick="email_ajax_validation();" name="submit" id="createaccbtn" class="createaccbtn" tabindex="6" value="Create my Account">
			<br style="clear:both;">
		</section>
		</form>
	</section>
		
			
</body>

</html>