<!DOCTYPE html>
<?php 
	include '../Controller/fetch_data.php'; 
		 


//Start session
session_start();
 
//Check whether the session variable SESS_MEMBER_ID is present or not
if((isset($_COOKIE['login'])) || (isset($_SESSION['user'])) || (!trim($_SESSION['user']) == '')){
			
		if(isset($_COOKIE['login'])){
			
			header("location: ../../Home/View/Home.php");
			exit();
			
		}
		header("location: ../../Home/View/Home.php");
		exit();
}


?>

<html>

<head>
			<title>Wrong confirmation!</title>
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
				
		<h2>The Verification Code you provided is wrong</h2>
		
		<h2>Check your inbox again to try verify your account. </h2>
		<img id="doge" src="../View/forma/images/doge.png" alt="Puppy Maker" />

		
		<section id="buttons">
			
			<input type="Button" name="Home" id="createaccbtn" class="createaccbtn" tabindex="1" value="Go to Inbox"onclick="window.location.href='../Controller/goToInbox.php'">
			<br style="clear:both;">
		</section>
		
	</section>
		
			
</body>

</html>
