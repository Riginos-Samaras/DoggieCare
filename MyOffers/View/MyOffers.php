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
$userid=$dataArray[10];
$rating=getUserRating($loginKey);
$rating[0]=(float)number_format($rating[0],1);
$rating[1]=(float)number_format($rating[1],1);

?>
<html>

<head>
	
			<title>My Offers</title>
			
			<link rel="stylesheet" href="css/iOS.css" title="ios">
			<link rel="stylesheet" href="../View/forma/style.css" type="text/css"/>
			<link rel="stylesheet" href="../View/buttons.css" type="text/css"/>
			<link rel="stylesheet" href="../View/forma/style1.css" type="text/css"/>
			<link rel="stylesheet" href="../View/flip.css" type="text/css"/>
			<link rel="stylesheet" href="../View/forma/responsive.css" type="text/css"/>
			<link rel="stylesheet" href="../View/home-style.css" type="text/css"/>
			<link rel="stylesheet" href="../View/css/settings_style.css">
			<link rel="stylesheet" href="../../General/View/css/rating.css">
			<link rel="stylesheet" href="../../FrontPage/View/background.css">
			<link rel="stylesheet" href="../../General/View/css/buttons_gen.css" type="text/css"/>
			<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
			<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Montserrat+Alternates">
			<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Fjalla+One">
			<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Nunito">
			<meta charset="utf-8">
  			<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  			
  		
			<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
			<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
			<script src="../Controller/js/jquery.jeditable.js" type="text/javascript" charset="utf-8"></script>
			<script src="../Controller/js/jquery.jeditable.datepicker.js" type="text/javascript" ></script>
			<script src="jquery.jeditable.time.js" type="text/javascript" ></script>
  			<script src="../Controller/js/order.js"></script>
  			<script src="../Controller/js/edit.js"></script>
  		
  			
  		
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
						<a href="../../Home/View/Home.php" class="anchorLink"><img class="logo"  src="../../FrontPage/View/images/logo-1.png" alt="DoggieCare" /></a>
					</div>
					<div class="pop_container user">
					      <img src="../../Profile/Controller/getProfilePic.php">
					      <h5><?php
								echo "$fullname";
					      ?><small>...</small></h5>
					      <ul>
					        <li><a href="../../Profile/View/Profile.php">Edit Profile</a></li>
					        <li><a href="../../MyOffers/View/MyOffers.php">My Offers</a></li>
					        <li><a href="../Controller/logout.php">Log Out</a></li>
					        <li class="sep"><?php echo 'Today\'s Date:       '. date('d-m-Y');?></li>
					        
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
			<section id="container1-mydogs" class="txtinput1">
		  <h2>My Offers</h2>
	  

				 			<br />
			
			<table id="addform"width="800px">

				<th>Service:Sitting,<br/>Cleaning,Walking</th><th>Information</th><th>Description</th><th>Management</th>
			    
			    <tr ><td ><img id="serviceIcon" src="../View/forma/images/add-front.png" />
			    	</td>
			    	<td id="info" ><strong>Type:</strong> - - <br />
			    	<strong>Offer Date: </strong> - -<br />
			    	<strong>Starts at: </strong>  - -<br />
			    	<strong>Ends at: </strong>  - -<br />
			    	<strong>Location: </strong>  - -<br />
			    	<strong>Reward: </strong> - -
			    	</td>
			    	<td  id="info"></td>
			    	<td ><button class="button_mes" onclick="window.location.href='../View/AddOffer.php'">AddOffer</button></td>
			    </tr>
				<tr></tr>

			</table>
			<div id="contentLeft">
			<ul >
			<?php
			$offerArray=getOfferData($userid);
			
    			foreach ($offerArray as $column) {
				
			
			
			 ?>
			 			
			 			<li id="recordsArray_<?php echo $column[0]; ?>" class="offer">
			 <table width="800px">

				<th>Service:Doggie-<span id="service_<?php echo $column[0]; ?>_<?php echo $column[1];?>" class="service"><?php echo $column[1];?></span></th><th>Information</th><th>Description</th><th>Management</th>
			    
			    <tr ><td ><img class="serviceIcon_<?php echo $column[0]; ?>" id="serviceIcon" src="../View/img/<?php echo $column[1];?>.png" /></td>
			    	<td id="info" ><strong>Offer Type:</strong><span id="offerType_<?php echo $column[0]; ?>" class="offer_type"><?php echo $column[8];?></span><br />
			    	<strong>Date:</strong> <span id="date_<?php echo $column[0]; ?>" class="datee"> <?php echo $column[3];?></span><br />
			    	<strong>Starts at:</strong> <span id="startTime_<?php echo $column[0]; ?>" class="startTime"> <?php $time = date('H:i', strtotime($column[4]));echo $time;?></span><br />
			    	<strong>Ends at:</strong>  <span id="endTime_<?php echo $column[0]; ?>" class="endTime"> <?php $time = date('H:i', strtotime($column[5]));echo $time;?></span><br />
			    	<strong>Location:</strong><span id="location_<?php echo $column[0]; ?>" class="location"> <?php echo $column[6];?></span> <br />
			    	<strong>Reward:</strong> <span id="reward_<?php echo $column[0]; ?>" class="reward"> <?php echo $column[7];?></span>
			    	</td>
			    	<td  id="info"><span id="description_<?php echo $column[0]; ?>" class="description"><?php echo $column[9];?></span></td>
			    	<td >
			    		<button class="button_mes" onclick="window.location.href='../../Suggestions/View/Suggestions.php?offer=<?php echo $column[0];?>'">Suggestions</button>
			    		<br /><br />
			    		<button  class="button_mes" onclick="window.location.href='../Controller/deleteOffer.php?delete=<?php echo $column[0];?>'">Delete</button>
			    	</td>
			    </tr>
				<tr></tr>

			</table> 
			</li>

			<?php }?>
			</ul>
			</div>
		 <tr ></tr>
		
	</section>
					
	<script>var __links = document.querySelectorAll('a');function __linkClick(e) { parent.window.postMessage(this.href, '*');} ;for (var i = 0, l = __links.length; i < l; i++) {if ( __links[i].getAttribute('data-t') == '_blank' ) { __links[i].addEventListener('click', __linkClick, false);}}</script>
	
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