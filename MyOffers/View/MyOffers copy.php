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
$userid=$dataArray[10];

?>
<html>

<head>
	
			<title>My Offers</title>
			<link rel="stylesheet" href="../View/forma/style.css" type="text/css"/>
			<link rel="stylesheet" href="../View/forma/style1.css" type="text/css"/>
			<link rel="stylesheet" href="../View/flip.css" type="text/css"/>
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
				    <a href="../../MyOffers/View/MyOffers.php" class="side-nav-button">My Offers</a>
				    <a href="../../Profile/View/Profile.php" class="side-nav-button">My Profile</a>
				    <a href="MyDoggies.php" class="side-nav-button">My Doggies</a>
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
			    	<td ><button id="add" onclick="window.location.href='../View/AddOffer.php'">AddOffer</button></td>
			    </tr>
				<tr></tr>

			</table>
			<ul class="sortable list">
			<?php
			$offerArray=getOfferData($userid);
			
    			foreach ($offerArray as $column) {
				
			
			
			 ?>
			 			<br />
			 			<li>
			 <table width="800px">

				<th>Service:Doggie-<?php echo $column[1];?></th><th>Information</th><th>Description</th><th>Management</th>
			    
			    <tr ><td ><img id="serviceIcon" src="../View/img/<?php echo $column[1];?>.png" /></td>
			    	<td id="info" ><strong>Offer Type:</strong> <?php echo $column[8];?><br />
			    	<strong>Date:</strong>  <?php echo $column[3];?><br />
			    	<strong>Starts at:</strong>  <?php $time = date('H:i', strtotime($column[4]));echo $time;?><br />
			    	<strong>Ends at:</strong>  <?php $time = date('H:i', strtotime($column[5]));echo $time;?><br />
			    	<strong>Location:</strong>  <?php echo $column[6];?><br />
			    	<strong>Reward:</strong>  <?php echo $column[7];?>
			    	</td>
			    	<td  id="info"><?php echo $column[9];?></td>
			    	<td >
			    		<button id="suggest" onclick="window.location.href='../../Suggestions/View/Suggestions.php?offer=<?php echo $column[0];?>'">Suggestions</button>
			    		<br /><br />
			    		<button id="delete" onclick="window.location.href='../Controller/deleteOffer.php?delete=<?php echo $column[0];?>'">Delete</button>
			    	</td>
			    </tr>
				<tr></tr>

			</table>
			<br />
			</li>

			<?php }?>
			</ul>
		 <tr ></tr>
		
	</section>
					
	<script>var __links = document.querySelectorAll('a');function __linkClick(e) { parent.window.postMessage(this.href, '*');} ;for (var i = 0, l = __links.length; i < l; i++) {if ( __links[i].getAttribute('data-t') == '_blank' ) { __links[i].addEventListener('click', __linkClick, false);}}</script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="../Controller/js/jquery.sortable.js"></script>
	<script>
		$(function() {
			$('.sortable').sortable();
			$('.handles').sortable({
				handle: 'span'
			});
			$('.connected').sortable({
				connectWith: '.connected'
			});
			$('.exclude').sortable({
				items: ':not(.disabled)'
			});
		});
	</script>		
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