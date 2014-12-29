<!DOCTYPE html>
<?php  include '../Controller/fetch_attribute.php'; 
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
?>
<html>

<head>
			
			<title>AddOffer</title>
			<link rel="stylesheet" href="../View/forma/style.css" type="text/css"/>
			<link rel="stylesheet" href="../View/forma/responsive.css" type="text/css"/>
			<link rel="stylesheet" href="../View/home-style.css" type="text/css"/>
			<link rel="stylesheet" href="../View/css/settings_style.css">
			<link rel="stylesheet" href="../../FrontPage/View/background.css">
			<link rel="stylesheet" href="../View/path/to/font-awesome/css/font-awesome.min.css">
			<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
			<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Montserrat+Alternates">
			<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Fjalla+One">
			<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Nunito">
			<meta charset="utf-8">
  			<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  			 <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
			<!--<script src="//code.jquery.com/jquery-1.9.1.js"></script>-->
			<script src="assets/js/jquery.js"></script>
						 <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
    
    <script src="assets/js/bootstrap-transition.js"></script>
    <script src="assets/js/bootstrap-alert.js"></script>
    <script src="assets/js/bootstrap-modal.js"></script>
    <script src="assets/js/bootstrap-dropdown.js"></script>
    <script src="assets/js/bootstrap-scrollspy.js"></script>
    <script src="assets/js/bootstrap-tab.js"></script>
    <script src="assets/js/bootstrap-tooltip.js"></script>
    <script src="assets/js/bootstrap-popover.js"></script>
    <script src="assets/js/bootstrap-button.js"></script>
    <script src="assets/js/bootstrap-collapse.js"></script>
    <script src="assets/js/bootstrap-carousel.js"></script>
    <script src="assets/js/bootstrap-typeahead.js"></script>
    <script src="assets/js/bootstrap-affix.js"></script>

    <script src="assets/js/holder/holder.js"></script>
    <script src="assets/js/google-code-prettify/prettify.js"></script>

    <script src="assets/js/application.js"></script>

	<script src="assets/js/jqBootstrapValidation.js"></script>     
             <script>
  $(function () { $("input,select,textarea").not("[type=submit]").jqBootstrapValidation(); } );
</script>

	<!--Jquery UI required links-->
    <script src="assets/ui/jquery.ui.core.js"></script>
	<script src="assets/ui/jquery.ui.widget.js"></script>
	<script src="assets/ui/jquery.ui.position.js"></script>
	<script src="assets/ui/jquery.ui.menu.js"></script>
	<script src="assets/ui/jquery.ui.autocomplete.js"></script>   
	
		<script src="assets/script.js"></script>  
			<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
			<link rel="stylesheet" href="/resources/demos/style.css">
			<script src="../Controller/js/datepicker.js"></script>
			<script src="../Controller/js/timepicker.js"></script>
	
			<!-- Plugin files below -->
			<link rel="stylesheet" type="text/css" href="../Controller/js/jquery.ptTimeSelect.css" />
			<script type="text/javascript" src="../Controller/js/jquery.ptTimeSelect.js"></script>
			
 
			

</head>

<body>	
	
				<section id="second" class="main">
				<header >
					<div class="container">
						<a href="../../Home/View/Home.php" class="anchorLink"><img class="logo"  src="../../FrontPage/View/images/logo-1.png" alt="DoggieCare" /></a>
					</div>
					<div class="pop_container user">
					      <img src="../../Profile/Controller/getProfilePic.php">
					      <h5><?php
								echo "$fullname";
					      ?></h5>
					      <ul>
					        <li><a href="../../Profile/View/Profile.php">Edit Profile</a></li>
					        <li><a href="MyDoggies.php">My Doggies</a></li>
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
				    <a href="../../MyOffers/View/MyOffers.php" class="side-nav-button">My Offers</a>
				    <a href="../../Profile/View/Profile.php" class="side-nav-button">My Profile</a>
				    <a href="MyDoggies.php" class="side-nav-button">My Doggies</a>
				    <a href="../Controller/logout.php" class="side-nav-button">Logout</a>
				</nav>
				
				</section>
			
			<!-- FORM-->
			<section id="container">
		<h2>Add Offer</h2>
		<form name="hongkiat" id="hongkiat-form" method="post" action="../Controller/insert_offer.php">
			
		<section  class="theoffer" >	
					<span class="provider" tabindex="1" >
						<input type="radio" id="provider" name="theoffer" value="provider" <?php //if($gender=="Male")echo "checked=\"checked\"";*/ ?>>
						<label for="provider">I can provide:</label>
					</span>
				
					<span class="consumer" tabindex="2" >
						<input type="radio" id="consumer" name="theoffer" value="consumer" <?php /*if($gender=="Female")echo "checked=\"checked\"";*/ ?>>
						<label for="consumer">I want someone to:</label>
					</span>
			</section>
			<p class="wronginput">
			<?php 
				if(isset($_GET['goodusertype'])&&$_GET['goodusertype']=="0")
					echo"*Choose your offer's type i.e. \"I can provide\" \"I want someone to\"";
				else{}
			?>
			</p>
		<div id="wrapping" class="clearfix">
			<section id="aligned">
					
			<select tabindex="3" name="offer" id="offer" class="txtinput">
  					<!--List of Countries -->	
					<option value="">Select Service...</option>
					<option value="walking">Doggie Walking</option>
					<option value="sitting">Doggie Sitting</option>
					<option value="cleaning">Doggie Cleaning</option>
			</select>
					<p class="wronginput">
					<?php 
						if(isset($_GET['goodoffer'])&&$_GET['goodoffer']=="0")
							echo"*Please choose a field from Select offer i.e. \"Doggie Walking\"\"Doggie Sitting\"\"Doggie Cleaning\"";
						else{}
					?>
					<p>
		<input type="tel" name="biscuits" id="biscuits"  placeholder="Doggie Biscuits reward" value="" tabindex="4" maxlength="25" class="txtinput">
			<p class="wronginput">
			<?php 
				if(isset($_GET['goodbiscuits'])&&$_GET['goodbiscuits']=="0")
					echo"*Rewarded Doggie biscuits should be between 1-999";
				else{}
			?>
			</p>
		<input type="datetime" id="datepicker" name="datepicker" class="txtinput"  tabindex="5" value="Available Date" >
			<p class="wronginput">
			<?php 
				if(isset($_GET['gooddatepicker'])&&$_GET['gooddatepicker']=="0")
					echo"*Choose a Date";
				else{}
			?>
			</p>
		<div id="sample1" >
		<input type="tel"  name="start_time" id="start_time"  value="Start time 00:00" tabindex="6" maxlength="5" class="txtinput">
		<input type="tel" name="finish_time" id="finish_time"  value="Finish time 00:00" tabindex="7" maxlength="5" class="txtinput">
		</div>
			<p class="wronginput">
			<?php 
				if(isset($_GET['badtimes'])&&$_GET['badtimes']=="1")
					echo"*Choose bigger finish time than start time";
				else{}
			?>
			</p>
		<input type="text" name="location" id="location" placeholder="Your location"   tabindex="8" class="txtinput">
			<p class="wronginput">
			<?php 
				if(isset($_GET['goodlocation'])&&$_GET['goodlocation']=="0")
					echo"*Please fill out a proper location name e.g. \"Nicosia,Limassol,Larnaka,Paphos\" :)";
				else{}
			?>
		<textarea name="description" id="description" placeholder="Tell us something about your offer..." tabindex="9" class="txtblock"></textarea>
			<p class="wronginput">
			<?php 
				if(isset($_GET['gooddescription'])&&$_GET['gooddescription']=="0")
					echo"*Write a brief description";
				else{}
			?>
			</p>
		<section id="buttons">
			<input type="reset" name="reset" id="resetbtn" class="resetbtn" value="Reset" tabindex="10" >
			<input type="submit" name="submit" id="submitbtn" class="submitbtn" tabindex="11" value="Add Offer">
			<br style="clear:both;">
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

?>