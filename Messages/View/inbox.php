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
$username=$dataArray[1];
$offerid=$_GET['offer'];


$rating=getUserRating($loginKey);
$rating[0]=(float)number_format($rating[0],1);
$rating[1]=(float)number_format($rating[1],1);

?>
<html>

<head>
			
			<title><?php echo "$username"; ?>'s Inbox</title>
			<link rel="stylesheet" href="../View/forma/style.css" type="text/css"/>
			<link rel="stylesheet" href="../View/forma/style1.css" type="text/css"/>
			<link rel="stylesheet" href="../View/buttons.css" type="text/css"/>
			<link rel="stylesheet" href="../View/flip.css" type="text/css"/>
			<link rel="stylesheet" href="../View/forma/responsive.css" type="text/css"/>
			<link rel="stylesheet" href="../View/home-style.css" type="text/css"/>
			<link rel="stylesheet" href="../View/css/settings_style.css">
			<link rel="stylesheet" href="../../General/View/css/rating.css">
			<link rel="stylesheet" href="../../FrontPage/View/background.css">
			<link rel="stylesheet" href="../../General/View/css/buttons_gen.css" type="text/css"/>
			<link rel="stylesheet" href="../View/path/to/font-awesome/css/font-awesome.min.css">
			<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
			<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Montserrat+Alternates">
			<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Fjalla+One">
			<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Nunito">
			<meta charset="utf-8">
  			<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

			<script type="text/javascript">
			$(document).ready(function() {
			
			
				//##### Send delete Ajax request to response.php #########
				$("body").on("click", "#container1-mydogs .del_button", function(e) {
					
					 e.returnValue = false;
					 var clickedID = this.id.split('-'); //Split string (Split works as PHP explode)
					 var DbNumberID = clickedID[1]; //and get number from array
					 var myData = 'recordToDelete='+ DbNumberID; //build a post data structure
					 
						jQuery.ajax({
						type: "POST", // HTTP method POST or GET
						url: "response.php", //Where to make Ajax calls
						dataType:"text", // Data type, HTML, json etc.
						data:myData, //Form variables
						success:function(response){
							//on success, hide  element user wants to delete.
							$('#item_'+DbNumberID).fadeOut("slow");
						},
						error:function (xhr, ajaxOptions, thrownError){
							//On error, we alert user
							alert(thrownError);
						}
						});
				});
			
			});
			</script>
  			
  			
  		
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
			<section id="container1-mydogs" class="txtinput1">
		<h2><?php echo "$username"; ?>'s Inbox</h2>

			<table width="800px"  >

				<th>FROM</th><th>Message</th><th>Management</th>
			</table>
			<?php
			$messagesArray=getMessages($username);
			
    			foreach (array_reverse($messagesArray) as $column) {
				
			
			
			 ?>
			 
			  <table width="800px"  id="item_<?php echo $column[2];?>">
				
				<th></th><th></th><th></th>
			    <tr >
			    	<td><?php echo $column[0];?>
			    	</td>
			    	<td ><?php echo $column[1];?></td>
			    	<td >
			    		<button class="del_button" id="delete-<?php echo $column[2];?>">Delete</button>
			    		<button class="button_mes" value="<?php echo $column[0];?>" >Reply</button>
			    	</td>
			    </tr>
			</table>
			<?php }?>
	</section>
	<section id="element_to_pop_up" >
			
            <!-- Element to pop up   style="left: 233px; position: absolute; top: ; z-index: 9999; display: block; opacity: 1;"-->
			<div id="popup">
		        <span class="button_mes b-close"><span>X</span></span>
		       <!--  If you can't get it up use<br><span class="logo">bPopup</span>-->
		        <form id="hongkiat-form" method="post">

				<input type="hidden" id="from_user" name="from_user" maxlength="32" value ="<?php echo str_replace(' ', '', $username);?>">
				
				<input type="text" name="user_popup" id="user_popup" placeholder="Message to:" autocomplete="off" tabindex="1" value="" class="txtinput">
			
				<textarea name="message_popup" id="message_popup" placeholder="Tell us something about yourself..." tabindex="13" class="txtblock"></textarea>
			  
				<input type="button" name="submit" class="button_sub small pop1" value="Send Message" >
				</form>
		    </div>
		    
			</section> 
					<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
  				
   		    <script src="jquery.bpopup-x.x.x.min.js"></script>
			<script  type="text/javascript" src="../Controller/js/jquery.js"></script>			
			<link rel="stylesheet" href="../../Messages/View/popup/popup.css" type="text/css"/>
  			<script   type="text/javascript" src="../../Messages/Controller/js/jquery.bpopup.min.js"></script>  	
            <script type="text/javascript" src="../../Messages/Controller/js/noty/packaged/jquery.noty.packaged.min.js"></script>
  			<script   type="text/javascript" src="../../Messages/Controller/js/new_message.js"></script>  
  			<script   type="text/javascript" src="../../Messages/Controller/js/jquery.easing.1.3.js"></script>  
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
<script src="../Controller/js/test.js"></script>