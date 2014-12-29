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
?>
<html>

<head>
	
			<title>My Doggies</title>
			<link rel="stylesheet" href="../View/forma/style.css" type="text/css"/>
			<link rel="stylesheet" href="../View/flip.css" type="text/css"/>
			<link rel="stylesheet" href="../View/forma/responsive.css" type="text/css"/>
			<link rel="stylesheet" href="../View/home-style.css" type="text/css"/>
			<link rel="stylesheet" href="../View/css/settings_style.css">
			<link rel="stylesheet" href="../../FrontPage/View/background.css">
			<link rel="stylesheet" href="../../General/View/css/rating.css">
			<link rel="stylesheet" href="../View/path/to/font-awesome/css/font-awesome.min.css">
			<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
			<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Montserrat+Alternates">
			<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Fjalla+One">
			<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Nunito">
			<meta charset="utf-8">
  			<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  			
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
						 <img class="stars"  src="../../General/View/image/star4.png" alt="Provider" title="Your rating as a Provider">	 
						 <p><h1 ><?php echo"$rating[1]";?>/5</h1></p> 
						
					</div> 
					<!--RATING-->
				<header >
					<div class="container">
						<a href="../../Home/View/Home.php" class="anchorLink"><img class="logo"  src="../../FrontPage/View/images/logo-1.png" alt="Puppy Maker" /></a>
					</div>
					<div class="pop_container user">
					      <img src="../../Profile/Controller/getProfilePic.php">
					      <h5><?php
								echo "$fullname";
					      ?></h5>
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
			<section id="container-mydogs">
		<h2>My Doggies</h2>
			<div class="DogsCard">
				<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
					  <div class="flipper">
						    <div class="front">
							      <span class="dname">Rusty</span>
							      <img class="img-front" src="../View/forma/images/rusty.png" />
							    </div>
							    <div class="back">
							     
							      <img class="img-front" src="../View/forma/images/back.png" />
							      <p>Name: Rusty<br/>Age: 5<br/>Breed: Labrador Retriever<br/>Gender: Male</p>
						    </div>
					  </div>
				</div>
				
				<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
					  <div class="flipper">
						    <div class="front">
							      <span class="dname">Coco</span>
							      <img class="img-front" src="../View/forma/images/coco.png" />
							    </div>
							    <div class="back">
							     
							      <img class="img-front" src="../View/forma/images/back.png" />
							      <p>Name: Coco<br/>Age: 2<br/>Breed: Dobermann<br/>Gender: Female</p>
						    </div>
					  </div>
				</div>
				
				<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
					  <div class="flipper">
						    <div class="front">
							      <img class="img-front" src="../View/forma/images/add-front.png" />
							    </div>
							    <div class="back">
							      <a href="AddDoggy.php" ><img class="img-front" src="../View/forma/images/add.png" /></a>
						    </div>
					  </div>
				</div>
		</div>
			
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