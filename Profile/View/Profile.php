<!DOCTYPE html>
<?php  include '../Controller/fetch_attribute.php'; 
include_once '../../General/Controller/fetch_rating_gen.php'; 
//Start session
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
$email=$dataArray[2];
$phone=$dataArray[3];
$address=$dataArray[4];
$fb_url=$dataArray[5];
$city=$dataArray[6];
$message=$dataArray[7];
$age=$dataArray[8];
$gender=$dataArray[9];
$rating=getUserRating($loginKey);
$rating[0]=(float)number_format($rating[0],1);
$rating[1]=(float)number_format($rating[1],1);


?>
<html>

<head>
			<title><?php echo "$fullname"; ?>'s Profile</title>
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
  			<meta charset="utf-8">
		  <title>jQuery UI Datepicker - Default functionality</title>
		  <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
		  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
		  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
		  <link rel="stylesheet" href="/resources/demos/style.css">
</head>
 <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>
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
					      ?></h5>
					      <ul>
					        <li><a href="Profile.php">Edit Profile</a></li>
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
			<section id="container">
		<h2><?php echo "$fullname"; ?>'s Profile</h2>
		<form name="hongkiat" id="hongkiat-form" method="post" action="../Controller/update_user_data.php" enctype="multipart/form-data">
		<div id="wrapping" class="clearfix">
			<section id="aligned">
			<input type="text" name="name"  id="name" placeholder="Your name" value="<?php echo "$fullname"; ?>" autocomplete="off" tabindex="1" maxlength="40" class="txtinput">
			<img class="mypic" src="../../Profile/Controller/getProfilePic.php" alt="" />
			<p class="wronginput">
			<?php 
				if(isset($_GET['email'])&&$_GET['name']=="")
					echo"*Please fill out a proper name e.g. \"Steve Jobs\"";
				else{}
			?>
			</p>
			<input type="email" name="email" id="email" placeholder="Your e-mail address" value="<?php echo "$email"; ?>" autocomplete="off" tabindex="2" class="txtinput">
			<?php 
				if(isset($_GET['email'])&&$_GET['email']=="")
					echo"*Please fill out a proper email e.g. \"LarryPage@example.com\"";
				else{}
			?>
			<input type="text" name="website" id="website" placeholder="Facebook's profile URL" value="<?php echo "$fb_url"; ?>" autocomplete="off" tabindex="3" class="txtinput">
			<p class="wronginput">
			<?php 
				if(isset($_GET['fb_url'])&&$_GET['fb_url']=="")
					echo"*Please fill out a proper facebook url e.g. \"https://www.facebook.com/Mark.Zuckerberg\"";
				else{}
			?>
			<p>
			<input type="tel" name="telephone" id="telephone"  placeholder="Phone number" value="<?php echo "$phone"; ?>" tabindex="4" maxlength="25" class="txtinput">
			<p class="wronginput">
			<?php 
				if(isset($_GET['phone'])&&$_GET['phone']=="")
					echo"*Please fill out a proper phone number e.g. \"77777777\" :)";
				else{}
			?>
			</p>
			<select tabindex="5" name="country" id="globe" class="txtinput" >
  					<!--List of Countries -->	
  					<option value="">Country...</option>
					<option value="AF">Afghanistan</option>
					<option value="AL" >Albania</option>
					<option value="DZ">Algeria</option>
					<option value="AS">American Samoa</option>
					<option value="AD">Andorra</option>
					<option value="AG">Angola</option>
					<option value="AI">Anguilla</option>
					<option value="AG">Antigua &amp; Barbuda</option>
					<option value="AR">Argentina</option>
					<option value="AA">Armenia</option>
					<option value="AW">Aruba</option>
					<option value="AU">Australia</option>
					<option value="AT">Austria</option>
					<option value="AZ">Azerbaijan</option>
					<option value="BS">Bahamas</option>
					<option value="BH">Bahrain</option>
					<option value="BD">Bangladesh</option>
					<option value="BB">Barbados</option>
					<option value="BY">Belarus</option>
					<option value="BE">Belgium</option>
					<option value="BZ">Belize</option>
					<option value="BJ">Benin</option>
					<option value="BM">Bermuda</option>
					<option value="BT">Bhutan</option>
					<option value="BO">Bolivia</option>
					<option value="BL">Bonaire</option>
					<option value="BA">Bosnia &amp; Herzegovina</option>
					<option value="BW">Botswana</option>
					<option value="BR">Brazil</option>
					<option value="BC">British Indian Ocean Ter</option>
					<option value="BN">Brunei</option>
					<option value="BG">Bulgaria</option>
					<option value="BF">Burkina Faso</option>
					<option value="BI">Burundi</option>
					<option value="KH">Cambodia</option>
					<option value="CM">Cameroon</option>
					<option value="CA">Canada</option>
					<option value="IC">Canary Islands</option>
					<option value="CV">Cape Verde</option>
					<option value="KY">Cayman Islands</option>
					<option value="CF">Central African Republic</option>
					<option value="TD">Chad</option>
					<option value="CD">Channel Islands</option>
					<option value="CL">Chile</option>
					<option value="CN">China</option>
					<option value="CI">Christmas Island</option>
					<option value="CS">Cocos Island</option>
					<option value="CO">Colombia</option>
					<option value="CC">Comoros</option>
					<option value="CG">Congo</option>
					<option value="CK">Cook Islands</option>
					<option value="CR">Costa Rica</option>
					<option value="CT">Cote D'Ivoire</option>
					<option value="HR">Croatia</option>
					<option value="CU">Cuba</option>
					<option value="CB">Curacao</option>
					<option value="CY">Cyprus</option>
					<option value="CZ">Czech Republic</option>
					<option value="DK">Denmark</option>
					<option value="DJ">Djibouti</option>
					<option value="DM">Dominica</option>
					<option value="DO">Dominican Republic</option>
					<option value="TM">East Timor</option>
					<option value="EC">Ecuador</option>
					<option value="EG">Egypt</option>
					<option value="SV">El Salvador</option>
					<option value="GQ">Equatorial Guinea</option>
					<option value="ER">Eritrea</option>
					<option value="EE">Estonia</option>
					<option value="ET">Ethiopia</option>
					<option value="FA">Falkland Islands</option>
					<option value="FO">Faroe Islands</option>
					<option value="FJ">Fiji</option>
					<option value="FI">Finland</option>
					<option value="FR">France</option>
					<option value="GF">French Guiana</option>
					<option value="PF">French Polynesia</option>
					<option value="FS">French Southern Ter</option>
					<option value="GA">Gabon</option>
					<option value="GM">Gambia</option>
					<option value="GE">Georgia</option>
					<option value="DE">Germany</option>
					<option value="GH">Ghana</option>
					<option value="GI">Gibraltar</option>
					<option value="GB">Great Britain</option>
					<option value="GR">Greece</option>
					<option value="GL">Greenland</option>
					<option value="GD">Grenada</option>
					<option value="GP">Guadeloupe</option>
					<option value="GU">Guam</option>
					<option value="GT">Guatemala</option>
					<option value="GN">Guinea</option>
					<option value="GY">Guyana</option>
					<option value="HT">Haiti</option>
					<option value="HW">Hawaii</option>
					<option value="HN">Honduras</option>
					<option value="HK">Hong Kong</option>
					<option value="HU">Hungary</option>
					<option value="IS">Iceland</option>
					<option value="IN">India</option>
					<option value="ID">Indonesia</option>
					<option value="IA">Iran</option>
					<option value="IQ">Iraq</option>
					<option value="IR">Ireland</option>
					<option value="IM">Isle of Man</option>
					<option value="IL">Israel</option>
					<option value="IT">Italy</option>
					<option value="JM">Jamaica</option>
					<option value="JP">Japan</option>
					<option value="JO">Jordan</option>
					<option value="KZ">Kazakhstan</option>
					<option value="KE">Kenya</option>
					<option value="KI">Kiribati</option>
					<option value="NK">Korea North</option>
					<option value="KS">Korea South</option>
					<option value="KW">Kuwait</option>
					<option value="KG">Kyrgyzstan</option>
					<option value="LA">Laos</option>
					<option value="LV">Latvia</option>
					<option value="LB">Lebanon</option>
					<option value="LS">Lesotho</option>
					<option value="LR">Liberia</option>
					<option value="LY">Libya</option>
					<option value="LI">Liechtenstein</option>
					<option value="LT">Lithuania</option>
					<option value="LU">Luxembourg</option>
					<option value="MO">Macau</option>
					<option value="MK">Macedonia</option>
					<option value="MG">Madagascar</option>
					<option value="MY">Malaysia</option>
					<option value="MW">Malawi</option>
					<option value="MV">Maldives</option>
					<option value="ML">Mali</option>
					<option value="MT">Malta</option>
					<option value="MH">Marshall Islands</option>
					<option value="MQ">Martinique</option>
					<option value="MR">Mauritania</option>
					<option value="MU">Mauritius</option>
					<option value="ME">Mayotte</option>
					<option value="MX">Mexico</option>
					<option value="MI">Midway Islands</option>
					<option value="MD">Moldova</option>
					<option value="MC">Monaco</option>
					<option value="MN">Mongolia</option>
					<option value="MS">Montserrat</option>
					<option value="MA">Morocco</option>
					<option value="MZ">Mozambique</option>
					<option value="MM">Myanmar</option>
					<option value="NA">Nambia</option>
					<option value="NU">Nauru</option>
					<option value="NP">Nepal</option>
					<option value="AN">Netherland Antilles</option>
					<option value="NL">Netherlands (Holland, Europe)</option>
					<option value="NV">Nevis</option>
					<option value="NC">New Caledonia</option>
					<option value="NZ">New Zealand</option>
					<option value="NI">Nicaragua</option>
					<option value="NE">Niger</option>
					<option value="NG">Nigeria</option>
					<option value="NW">Niue</option>
					<option value="NF">Norfolk Island</option>
					<option value="NO">Norway</option>
					<option value="OM">Oman</option>
					<option value="PK">Pakistan</option>
					<option value="PW">Palau Island</option>
					<option value="PS">Palestine</option>
					<option value="PA">Panama</option>
					<option value="PG">Papua New Guinea</option>
					<option value="PY">Paraguay</option>
					<option value="PE">Peru</option>
					<option value="PH">Philippines</option>
					<option value="PO">Pitcairn Island</option>
					<option value="PL">Poland</option>
					<option value="PT">Portugal</option>
					<option value="PR">Puerto Rico</option>
					<option value="QA">Qatar</option>
					<option value="ME">Republic of Montenegro</option>
					<option value="RS">Republic of Serbia</option>
					<option value="RE">Reunion</option>
					<option value="RO">Romania</option>
					<option value="RU">Russia</option>
					<option value="RW">Rwanda</option>
					<option value="NT">St Barthelemy</option>
					<option value="EU">St Eustatius</option>
					<option value="HE">St Helena</option>
					<option value="KN">St Kitts-Nevis</option>
					<option value="LC">St Lucia</option>
					<option value="MB">St Maarten</option>
					<option value="PM">St Pierre &amp; Miquelon</option>
					<option value="VC">St Vincent &amp; Grenadines</option>
					<option value="SP">Saipan</option>
					<option value="SO">Samoa</option>
					<option value="AS">Samoa American</option>
					<option value="SM">San Marino</option>
					<option value="ST">Sao Tome &amp; Principe</option>
					<option value="SA">Saudi Arabia</option>
					<option value="SN">Senegal</option>
					<option value="RS">Serbia</option>
					<option value="SC">Seychelles</option>
					<option value="SL">Sierra Leone</option>
					<option value="SG">Singapore</option>
					<option value="SK">Slovakia</option>
					<option value="SI">Slovenia</option>
					<option value="SB">Solomon Islands</option>
					<option value="OI">Somalia</option>
					<option value="ZA">South Africa</option>
					<option value="ES">Spain</option>
					<option value="LK">Sri Lanka</option>
					<option value="SD">Sudan</option>
					<option value="SR">Suriname</option>
					<option value="SZ">Swaziland</option>
					<option value="SE">Sweden</option>
					<option value="CH">Switzerland</option>
					<option value="SY">Syria</option>
					<option value="TA">Tahiti</option>
					<option value="TW">Taiwan</option>
					<option value="TJ">Tajikistan</option>
					<option value="TZ">Tanzania</option>
					<option value="TH">Thailand</option>
					<option value="TG">Togo</option>
					<option value="TK">Tokelau</option>
					<option value="TO">Tonga</option>
					<option value="TT">Trinidad &amp; Tobago</option>
					<option value="TN">Tunisia</option>
					<option value="TU">Turkmenistan</option>
					<option value="TC">Turks &amp; Caicos Is</option>
					<option value="TV">Tuvalu</option>
					<option value="UG">Uganda</option>
					<option value="UA">Ukraine</option>
					<option value="AE">United Arab Emirates</option>
					<option value="GB">United Kingdom</option>
					<option value="US">United States of America</option>
					<option value="UY">Uruguay</option>
					<option value="UZ">Uzbekistan</option>
					<option value="VU">Vanuatu</option>
					<option value="VS">Vatican City State</option>
					<option value="VE">Venezuela</option>
					<option value="VN">Vietnam</option>
					<option value="VB">Virgin Islands (Brit)</option>
					<option value="VA">Virgin Islands (USA)</option>
					<option value="WK">Wake Island</option>
					<option value="WF">Wallis &amp; Futana Is</option>
					<option value="YE">Yemen</option>
					<option value="ZR">Zaire</option>
					<option value="ZM">Zambia</option>
					<option value="ZW">Zimbabwe</option>
			
			</select>
			<input type="text" name="city" id="city" placeholder="Your city"  autocomplete="off" value="<?php echo "$city"; ?>" tabindex="6" class="txtinput">
			<p class="wronginput">
			<?php 
				if(isset($_GET['city'])&&$_GET['city']=="")
					echo"*Please fill out a proper city name e.g. \"Nicosia,Limassol,Larnaka,Paphos\" :)";
				else{}
			?>
			</p>
			<input type="text" name="address" id="address" placeholder="Home Address" value="<?php echo "$address"; ?>" tabindex="<?php echo "$address"; ?>" class="txtinput">
			<p class="wronginput">
			<?php 
				if(isset($_GET['address'])&&$_GET['address']=="")
					echo"*Please fill out a proper address name e.g.\"Mordor Street 21\"";
				else{}
			?>
			</p>
			<section  class="mygender" >
					
					<span class="radiobadgemale" tabindex="8" >
						<input type="radio" id="Male" name="Gender" value="Male" <?php if($gender=="Male")echo "checked=\"checked\""; ?>>
						<label for="Male">Male</label>
					</span>
				
					<span class="radiobadgefemale" tabindex="9" >
						<input type="radio" id="Female" name="Gender" value="Female" <?php if($gender=="Female")echo "checked=\"checked\""; ?>>
						<label for="Female">Female</label>
					</span>
			</section>
			<?php 
				if(isset($_GET['gender'])&&$_GET['gender']=="")
					echo"*Please check a gender button i.e. \"Male or Female\" ";
				else{}
			?>
			<input type="number" name="age"  id="age" class="txtinput date" tabindex="10"  value="<?php echo "$age";?>" placeholder="Age"> 
			
			<p class="wronginput">
			<?php 
				if(isset($_GET['age'])&&$_GET['age']=="")
					echo"*Please enter a proper age i.e. \"1-100\" ";
				else{}
			?>
			</p>
			
			<input type="file" id="img1"  name="profilePic" class="txtinput " />
			<?php 
				if(isset($_GET['profile_pic'])&&$_GET['profile_pic']=="")
					echo"*Please upload an image format file e.g. \"like .jpg\" :)";
				else{}
			?>
			
			<textarea name="message" id="message" placeholder="Tell us something about yourself..." tabindex="13" class="txtblock"><?php echo "$message"; ?></textarea>
			<p class="wronginput">
			<?php 
				if(isset($_GET['message'])&&$_GET['message']=="")
					echo"*Please  fill out a proper message! ";
				else{}
			?>
			</p>
			</section>
			
		
		</div>


		<section id="buttons">
			<!--<input type="reset" name="reset" id="resetbtn" class="resetbtn" value="Reset">-->
			<input type="button" onclick="window.location.href='ChangePassword.php'" name="changepass" id="resetbtn" class="resetbtn" value="Change Password">
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

?>