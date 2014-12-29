<!DOCTYPE html>
<?php  include '../Controller/fetch_attribute.php'; 
include_once '../../General/Controller/fetch_rating_gen.php'; 

session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if((isset($_COOKIE['login'])) || (isset($_SESSION['user'])) || (!trim($_SESSION['user']) == '')){
	
	if(isset($_COOKIE['login'])){
		
		$loginKey=$_COOKIE['login'];
	}
	else{
		
		$loginKey=$_SESSION['user'];
	}
$dataArray=getUserData($loginKey);
$fullname=$dataArray[0];

$rating=getUserRating($loginKey);
$rating[0]=(float)number_format($rating[0],1);
$rating[1]=(float)number_format($rating[1],1);
//$username=$dataArray[1];
//$email=$dataArray[2];
//$phone=$dataArray[3];
//$address=$dataArray[4];
//$fb_url=$dataArray[5];
//$city=$dataArray[6];
//$dateofbirth_day=$dataArray[7];
//$dateofbirth_month=$dataArray[8];
//$dateofbirth_year=$dataArray[9];
//$message=$dataArray[10];
?>
<html>

<head>
			<title>Welcome to PuppyMaker</title>
			<link rel="stylesheet" href="../View/forma/style.css" type="text/css"/>
			<link rel="stylesheet" href="../View/forma/responsive.css" type="text/css"/>
			<link rel="stylesheet" href="../View/Profile-style.css" type="text/css"/>
			<link rel="stylesheet" href="../View/path/to/font-awesome/css/font-awesome.min.css">
			<link rel="stylesheet" href="../View/css/settings_style.css">
			<link rel="stylesheet" href="../../General/View/css/rating.css">
			<link rel="stylesheet" href="../../FrontPage/View/background.css">
			<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
			<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Montserrat+Alternates">
			<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Fjalla+One">
			<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Nunito">
			<meta charset="utf-8">
  			<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  			<!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>

<body>	
	
				<section id="second" class="main">
						<!--RATING-->
					<div class="ratings_cons">
						 <span id="A"><div class="user"><h5><small>Rank:<?php echo"$rating[2]";?> </small></h5></div></span>
						 <img class="stars" src="../../General/View/image/star3.png" alt="Consumer" title="Your rating as a Consumer">
						 <p><h1 ><?php echo"$rating[0]";?>/5</h1></p>
					</div> 
					<div class="ratings_prov">
						 <span id="A"><div class="user"><h5><small>Rank:<?php echo "$rating[3]";?> </small></h5></div></span>
						 <img class="stars" src="../../General/View/image/star4.png" alt="Provider" title="Your rating as a Provider">	 
						 <p><h1 ><?php echo"$rating[1]";?>/5</h1></p> 
						
					</div> 
					<!--RATING-->
				<header >
					<div class="container">
						<a href="../../Home/View/Home.php" class="anchorLink"><img class="logo"  src="../../FrontPage/View/images/logo-1.png" alt="Puppy Maker" /></a>
					</div>
					</div>
					<div class="pop_container user">
					      <img src="../../Profile/Controller/getProfilePic.php">
					      <h5><?php
								echo "$fullname";
					      ?><small>...</small></h5>
					      <ul>
					        <li><a href="Profile.php">Edit Profile</a></li>
					        <li><a href="../../MyDoggies/View/MyDoggies.php">My Doggies</a></li>
					        <li><a href="../Controller/logout.php">Log Out</a></li>
					        <li class="sep">Joined: Feb 9, 2014</li>
					        
					      </ul>
					    </div>
				</header>
			<!-- Log In / Register -->	
			</section> 
				
				<section id="header" >
				<nav class="side-nav">
				      <a href="../../Home/View/Home.php" class="side-nav-button">Home</a>
				    <a href="../../Messages/View/inbox.php" class="side-nav-button">Inbox</a>
				    <a href="../../MyOffers/View/MyOffers.php" class="side-nav-button">Offers</a>
				    <a href="../../Claims/View/Requests.php" class="side-nav-button">Requests</a>
				    <a href="../../Profile/View/Profile.php" class="side-nav-button">Profile</a>
				    <a href="../../MyDoggies/View/MyDoggies.php" class="side-nav-button">Doggies</a>
				    <a href="../Controller/logout.php" class="side-nav-button">Logout</a>
				</nav>
				
				</section>
			
			<!-- FORM-->
			<section id="container">
		<h2>Change Password</h2>
		<form name="hongkiat" id="hongkiat-form" method="post" action="../Controller/get_pass.php">
		<div id="wrapping" class="clearfix">
			<section id="aligned">
			<input type="password" name="oldpass" id="oldpass"  placeholder="Old Password" value="" autocomplete="off" tabindex="1" class="txtinput">
			<p class="wronginput">
			<?php 
				if(isset($_GET['true'])&&$_GET['true']==0)
					echo"*Your password is not correct";
				else{}
			?>
			</p>
			<input type="password" name="newpass" id="newpass"  placeholder="New Password" value="" autocomplete="off" tabindex="1" class="txtinput">

			<input type="password" name="confpass" id="newpass" placeholder="Confirm new Password" value="" autocomplete="off" tabindex="1" class="txtinput">	
			<p class="wronginput">
			<?php 
				if(isset($_GET['same'])&&$_GET['same']==0)
					echo"*The new password doesn't match with the confirmation password";
				else{}
			?>
			</p>
			<p class="wronginput">
			<?php 
				if(isset($_GET['good'])&&$_GET['good']==0)
					echo"*Please fill out a proper password (6-18 letters, numbers or symbols)";
				else{}
			?>
			</p>
			<p class="trueinput">
			<?php 
				if(isset($_GET['changed'])&&$_GET['changed']==1)
					echo"Your password has been changed";
				else{}
			?>
			</p>
		</section>
			
		
		</div>

		<p><?php 
			if(isset($_GET['failed'])&&$_GET['failed']==0){
				echo "Your password has been changed.";
			}
			if(isset($_GET['failed'])&&$_GET['failed']==1){
				echo "Your confirmation password is not the same.";
			}
			
			if(isset($_GET['failed'])&&$_GET['failed']==2){
				echo "Your old password is not correct";
			}
			
			
			
			?></p>
		<section id="buttons">
			<!--<input type="reset" name="reset" id="resetbtn" class="resetbtn" value="Reset">-->
			<input type="submit" name="submit" id="submitbtn" class="submitbtn" tabindex="14" value="Save Changes">
			<!--<br style="clear:both;">-->
		</section>
			
		</form>
		
	</section>
		
			
</body>

</html>
<?php
}
else
{
	header("location: ../../FrontPage/View/index.php");
	exit();
}
