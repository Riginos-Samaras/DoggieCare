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
			<title>Add a Doggie</title>
			<link rel="stylesheet" href="../View/forma/style.css" type="text/css"/>
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
						 <img class="stars"  src="../../General/View/image/star3.png" alt="Consumer" title="Your rating as a Consumer">
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
		<h2>My Doggy's Profile</h2>
		<form name="hongkiat" id="hongkiat-form" method="post" action="MyDoggies.php">
		<div id="wrapping" class="clearfix">
			<section id="aligned">
			<input type="text" name="name" id="name" placeholder="Dog's name" autocomplete="off" tabindex="1" class="txtinput">
			<input type="tel" name="age" id="age" placeholder="Age" maxlength="2" tabindex="2" class="txtinput">
			<select tabindex="3" name="Dog's Breed" id="breed" class="txtinput">
  					<!--List of Countries -->	
  					
					<option value="">Select Breed...</option>
					<option value="b1">Affenpinscher</option>
					<option value="b2">Afghan Hound</option>
					<option value="b3">Airedale Terrier</option>
					<option value="b4">Akita</option>
					<option value="b5">Alaskan Malamute</option>
					<option value="b6">American Bulldog</option>
					<option value="b7">American Eskimo Dog</option>
					<option value="b8">American Hairless Terrier</option>
					<option value="b9">American Staffordshire Terrier</option>
					<option value="b10">American Water Spaniel</option>
					<option value="b11">Anatolian Shepherd</option>
					<option value="b12">Appenzell Mountain Dog</option>
					<option value="b13">Australian Cattle Dog (Blue Heeler)</option>
					<option value="b14">Australian Kelpie</option>
					<option value="b15">Australian Shepherd</option>
					<option value="b16">Australian Terrier</option>
					<option value="b17">Basenji</option>
					<option value="b18">Basset Hound</option>
					<option value="b19">Beagle</option>
					<option value="b20">Bearded Collie</option>
					<option value="b21">Beauceron</option>
					<option value="b22">Bedlington Terrier</option>
					<option value="b23">Belgian Shepherd Dog Sheepdog</option>
					<option value="b24">Belgian Shepherd Laekenois</option>
					<option value="b25">Belgian Shepherd Malinois</option>
					<option value="b26">Belgian Shepherd Tervuren</option>
					<option value="b27">Bernese Mountain Dog</option>
					<option value="b28">Bichon Frise</option>
					<option value="b29">Black Labrador Retriever</option>
					<option value="b30">Black Mouth Cur</option>
					<option value="b31">Black Russian Terrier</option>
					<option value="b32">Black And Tan Coonhound</option>
					<option value="b33">Bloodhound</option>
					<option value="b34">Blue Lacy</option>
					<option value="b35">Bluetick Coonhound</option>
					<option value="b36">Boerboel</option>
					<option value="b37">Bolognese</option>
					<option value="b38">Border Collie</option>
					<option value="b39">Border Terrier</option>
					<option value="b40">Borzoi</option>
					<option value="b41">Boston Terrier</option>
					<option value="b42">Bouvier Des Flanders</option>
					<option value="b43">Boxer</option>
					<option value="b44">Boykin Spaniel</option>
					<option value="b45">Briard</option>
					<option value="b46">Brittany Spaniel</option>
					<option value="b47">Brussels Griffon</option>
					<option value="b48">Bull Terrier</option>
					<option value="b49">Bullmastiff</option>
					<option value="b50">Cairn Terrier</option>
					<option value="b51">Canaan Dog</option>
					<option value="b52">Cane Corso Mastiff</option>
					<option value="b53">Carolina Dog</option>
					<option value="b54">Catahoula Leopard Dog</option>
					<option value="b55">Cattle Dog</option>
					<option value="b56">Caucasian Sheepdog (Caucasian Ovtcharka)</option>
					<option value="b57">Cavalier King Charles Spaniel</option>
					<option value="b58">Chesapeake Bay Retriever</option>
					<option value="b59">Chihuahua</option>
					<option value="b60">Chinese Crested Dog</option>
					<option value="b60">Chinese Foo Dog</option>
					<option value="b61">Chinook</option>
					<option value="b62">Chocolate Labrador Retriever</option>
					<option value="b63">Chow Chow</option>
					<option value="b64">Cirneco Dell'Etna</option>
					<option value="b65">Clumber Spaniel</option>
					<option value="b66">Cockapoo</option>
					<option value="b67">Cocker Spaniel</option>
					<option value="b68">Collie</option>
					<option value="b69">Coonhound</option>
					<option value="b70">Corgi</option>
					<option value="b71">Coton De Tulear</option>
					<option value="b72">Curly-Coated Retriever</option>
					<option value="b73">Dachshund</option>
					<option value="b74">Dalmatian</option>
					<option value="b75">Dandi Dinmont Terrier</option>
					<option value="b76">Doberman Pinscher</option>
					<option value="b77">Dogo Argentino</option>
					<option value="b78">Dogue De Bordeaux</option>
					<option value="b79">Dutch Shepherd</option>
					<option value="b80">English Bulldog</option>
					<option value="b81">English Cocker Spaniel</option>
					<option value="b82">English Coonhound</option>
					<option value="b83">English Pointer</option>
					<option value="b84">English Setter</option>
					<option value="b85">English Shepherd</option>
					<option value="b86">English Springer Spaniel</option>
					<option value="b87">English Toy Spaniel</option>
					<option value="b88">Entlebucher</option>
					<option value="b89">Eskimo Dog</option>
					<option value="b90">Feist</option>
					<option value="b91">Field Spaniel</option>
					<option value="b92">Fila Brasileiro</option>
					<option value="b93">Finnish Lapphund</option>
					<option value="b94">Finnish Spitz</option>
					<option value="b95">Flat-Coated Retriever</option>
					<option value="b96">Fox Terrier</option>
					<option value="b97">Foxhound</option>
					<option value="b98">French Bulldog</option>
					<option value="b99">Galgo Spanish Greyhound</option>
					<option value="b100">German Pinscher</option>
					<option value="b101">German Shepherd Dog</option>
					<option value="b102">German Shorthaired Pointer</option>
					<option value="b103">German Spitz</option>
					<option value="b104">German Wirehaired Pointer</option>
					<option value="b105">Giant Schnauzer</option>
					<option value="b106">Glen Of Imaal Terrier</option>
					<option value="b107">Golden Retriever</option>
					<option value="b108">Gordon Setter</option>
					<option value="b109">Great Dane</option>
					<option value="b110">Great Pyrenees</option>
					<option value="b111">Greater Swiss Mountain Dog</option>
					<option value="b112">Greyhound</option>
					<option value="b113">Harrier</option>
					<option value="b114">Havanese</option>
					<option value="b115">Hound</option>
					<option value="b116">Hovawart</option>
					<option value="b117">Husky</option>
					<option value="b118">Ibizan Hound</option>
					<option value="b119">Icelandic Sheepdog</option>
					<option value="b120">Illyrian Sheepdog</option>
					<option value="b121">Irish Setter</option>
					<option value="b122">Irish Terrier</option>
					<option value="b123">Irish Water Spaniel</option>
					<option value="b124">Irish Wolfhound</option>
					<option value="b125">Italian Greyhound</option>
					<option value="b126">Italian Spinone</option>
					<option value="b127">Jack Russell Terrier</option>
					<option value="b128">Jack Russell Terrier (Parson Russell Terrier)</option>
					<option value="b129">Japanese Chin</option>
					<option value="b130">Jindo</option>
					<option value="b131">Kai Dog</option>
					<option value="b132">Karelian Bear Dog</option>
					<option value="b133">Keeshond</option>
					<option value="b134">Kerry Blue Terrier</option>
					<option value="b135">Kishu</option>
					<option value="b136">Klee Kai</option>
					<option value="b137">Komondor</option>
					<option value="b138">Kuvasz</option>
					<option value="b139">Kyi Leo</option>
					<option value="b140">Labrador Retriever</option>
					<option value="b141">Lakeland Terrier</option>
					<option value="b142">Lancashire Heeler</option>
					<option value="b143">Leonberger</option>
					<option value="b144">Lhasa Apso</option>
					<option value="b145">Lowchen</option>
					<option value="b146">Maltese</option>
					<option value="b147">Manchester Terrier</option>
					<option value="b148">Maremma Sheepdog</option>
					<option value="b149">Mastiff</option>
					<option value="b150">McNab</option>
					<option value="b151">Miniature Pinscher</option>
					<option value="b152">Mountain Cur</option>
					<option value="b153">Mountain Dog</option>
					<option value="b154">Munsterlander</option>
					<option value="b155">Neapolitan Mastiff</option>
					<option value="b156">New Guinea Singing Dog</option>
					<option value="b157">Newfoundland Dog</option>
					<option value="b158">Norfolk Terrier</option>
					<option value="b159">Norwegian Buhund</option>
					<option value="b160">Norwegian Elkhound</option>
					<option value="b161">Norwegian Lundehund</option>
					<option value="b162">Norwich Terrier</option>
					<option value="b163">Nova Scotia Duck-Tolling Retriever</option>
					<option value="b164">Old English Sheepdog</option>
					<option value="b165">Otterhound</option>
					<option value="b166">Papillon</option>
					<option value="b167">Patterdale Terrier (Fell Terrier)</option>
					<option value="b168">Pekingese</option>
					<option value="b169">Peruvian Inca Orchid</option>
					<option value="b170">Petit Basset Griffon Vendeen</option>
					<option value="b171">Pharaoh Hound</option>
					<option value="b172">Pit Bull Terrier</option>
					<option value="b173">Plott Hound</option>
					<option value="b174">Podengo Portugueso</option>
					<option value="b175">Pointer</option>
					<option value="b176">Polish Lowland Sheepdog</option>
					<option value="b177">Pomeranian</option>
					<option value="b178">Poodle</option>
					<option value="b179">Portuguese Water Dog</option>
					<option value="b180">Presa Canario</option>
					<option value="b181">Pug</option>
					<option value="b182">Puli</option>
					<option value="b183">Pumi</option>
					<option value="b184">Rat Terrier</option>
					<option value="b185">Redbone Coonhound</option>
					<option value="b186">Retriever</option>
					<option value="b187">Rhodesian Ridgeback</option>
					<option value="b188">Rottweiler</option>
					<option value="b189">Saint Bernard St. Bernard</option>
					<option value="b190">Saluki</option>
					<option value="b191">Samoyed</option>
					<option value="b192">Sarplaninac</option>
					<option value="b193">Schipperke</option>
					<option value="b194">Schnauzer</option>
					<option value="b195">Scottish Deerhound</option>
					<option value="b196">Scottish Terrier Scottie</option>
					<option value="b197">Sealyham Terrier</option>
					<option value="b198">Setter</option>
					<option value="b199">Shar Pei</option>
					<option value="b200">Sheep Dog</option>
					<option value="b201">Shepherd</option>
					<option value="b202">Shetland Sheepdog Sheltie</option>
					<option value="b203">Shiba Inu</option>
					<option value="b204">Shih Tzu</option>
					<option value="b205">Siberian Husky</option>
					<option value="b206">Silky Terrier</option>
					<option value="b207">Skye Terrier</option>
					<option value="b208">Sloughi</option>
					<option value="b209">Smooth Fox Terrier</option>
					<option value="b210">South Russian Ovtcharka</option>
					<option value="b211">Spaniel</option>
					<option value="b212">Spitz</option>
					<option value="b213">Staffordshire Bull Terrier</option>
					<option value="b214">Standard Poodle</option>
					<option value="b215">Sussex Spaniel</option>
					<option value="b216">Swedish Vallhund</option>
					<option value="b217">Terrier</option>
					<option value="b218">Thai Ridgeback</option>
					<option value="b219">Tibetan Mastiff</option>
					<option value="b220">Tibetan Spaniel</option>
					<option value="b221">Tibetan Terrier</option>
					<option value="b222">Tosa Inu</option>
					<option value="b223">Toy Fox Terrier</option>
					<option value="b224">Treeing Walker Coonhound</option>
					<option value="b225">Vizsla</option>
					<option value="b226">Weimaraner</option>
					<option value="b227">Welsh Corgi</option>
					<option value="b228">Welsh Springer Spaniel</option>
					<option value="b229">Welsh Terrier</option>
					<option value="b230">West Highland White Terrier Westie</option>
					<option value="b231">Wheaten Terrier</option>
					<option value="b232">Whippet</option>
					<option value="b233">White German Shepherd</option>
					<option value="b234">Wire Fox Terrier</option>
					<option value="b235">Wire-Haired Pointing Griffon</option>
					<option value="b236">Wirehaired Terrier</option>
					<option value="b237">Xoloitzcuintle (Mexican Hairless)</option>
					<option value="b238">Yellow Labrador Retriever</option>
					<option value="b239">Yorkshire Terrier Yorkie</option>

			</select>
			<input type="text" name="color" id="color" placeholder="Colors" autocomplete="off" tabindex="1" class="txtinput">
			<input type="text" name="personality" id="personality" placeholder="Personality(optional)" autocomplete="off" tabindex="1" class="txtinput">
			<input type="text" name="awards" id="award" placeholder="Awards and certifications(optional)" autocomplete="off" tabindex="1" class="txtinput">
			
			<section  class="mygender" >
					
					<span class="radiobadge" tabindex="4" >
						<input type="radio"  id="Male" name="Gender" value="Male">
						<label for="Male" >Male</label>
					</span>
				
					<span class="radiobadge" tabindex="5" >
						<input type="radio" id="Female" name="Gender" value="Female" checked="checked">
						<label for="Female">Female</label>
					</span>
			</section>

			<textarea name="message" id="message" placeholder="History and Background..." tabindex="12" class="txtblock"></textarea>
			</section>

		
		</div>


		<section id="buttons">
			<input type="reset" name="reset" id="resetbtn" class="resetbtn" value="Reset">
			<input type="submit" name="submit" id="submitbtn" class="submitbtn" tabindex="6" value="Add Dog">
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