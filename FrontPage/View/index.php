<!DOCTYPE html>
<?php
//Start session
session_start();
ob_start();
 
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
		<title>Welcome to DoggieCare</title>

			<link rel="stylesheet" href="../View/index_style.css" type="text/css"/>
			<link rel="stylesheet" href="../View/path/to/font-awesome/css/font-awesome.min.css">
			<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
			<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Montserrat+Alternates">
			<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Fjalla+One">
			<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Nunito">
			
			<script src="../Controller/js/jquery.js" type="text/javascript"></script>
			<script src="../Controller/js/jquery.anchor.js" type="text/javascript"></script>
			
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
	</head>
<body>
	
		<!-- Header -->
		<section id="header" class="dark">
				
				<header>
					<h1><span id="welcome">Welcome to DoggieCare<a href="#header" class="anchorLink"><img class="logo"  src="../View/images/logo-1.png" alt="Puppy Maker" /></a></span></h1>
					<p id="msg">An online service providing site for your Dogs</p>
				</header>
				<footer>
					<a href="#first" class="button anchorLink">How it works</a>
				</footer>
				<footer>
					<a href="#third" class="button anchorLink">Login/Register</a>
				</footer>
				
			
		</section>
	
		
		<!-- First -->
			<section id="first" class="main">
				<header>
					<div class="container">
						<h2>The way DoggieCare works is really simple</h2>
						<p>DoggieCare is an online collaborative consumption website that brings dog<br />
						  owners together and helps them exchange services regarding their beloved dogs</p>
					</div>
				</header>
				<div class="content dark style1 featured">
					<div  class="container">
						<div class="row">	
										<div class="u0">						
											<h2>You are working late again and someone has to take care of your dog. Don't worry! We got your back!</h2>
										</div>
										<div class="u1">
											<section>
												<span class="feature-icon"><img class="step_icons"  src="../View/images/icons/consumer_step1.png" alt="Step1" /></span>
												<header>
													<h3>Step 1:</h3>
												</header>
												<h2>Create a free DoggieCare account</h2>
											</section>
										</div>
										<div class="u2">
											<section>
												<span class="feature-icon"><img class="step_icons"  src="../View/images/icons/consumer_step2.png" alt="Step2" /></span>
												<header>
													<h3>Step 2:</h3>
												</header>
												<h2>Post an offer that describes your needs </h2>
											</section>
										</div>
										<div class="u3">
											<section>
												<span class="feature-icon"><img class="step_icons"  src="../View/images/icons/consumer_step3.png" alt="Step3" /></span>
												<header>
													<h3>Step 3:</h3>
												</header>
												<h2>Our system will match offers from providers for the tasks you seek</h2>
											</section>
										</div>
								
								<div class="u4">
								<a href="#second" class="anchorLink"><img class="buttonimg"  src="../View/images/button.png" alt="bookmark" /></a>
								</div>
						</div>
						
					</div>
					
				</div>
			</section><section id="second" class="main">
				<header>
					<div class="container">
						<h2>Help other dog owners</h2>
						<p>Got Some free time and love playing or taking care of man's best friend? <br />
						 You can provide services like dog walking and get rewarded when it's done</p>
					</div>
				</header>
				<div class="content dark style2 featured">
					<div class="container">
						<div class="row">
							 
										<div class="u0">						
											<h2> They say time is money, so why not make some by doing what you love?</h2>
										</div>
										<div class="u1">
											<section>
												<span class="feature-icon"><img class="step_icons"  src="../View/images/icons/step1.png" alt="Step1" /></span>
												<header>
													<h3>Step 1:</h3>
												</header>
												<h2>Post the Dog service you want to provide</h2>
											</section>
										</div>
										<div class="u2">
											<section>
												<span class="feature-icon"><img class="step_icons"  src="../View/images/icons/provider_step2.png" alt="Step2" /></span>
												<header>
													<h3>Step 2:</h3>
												</header>
												<h2>Let the System find you a client and arrange the meeting </h2>
											</section>
										</div>
										<div class="u3">
											<section>
												<span class="feature-icon"><img class="step_icons"  src="../View/images/icons/provider_step3.png" alt="Step3" /></span>
												<header>
													<h3>Step 3:</h3>
												</header>
												<h2>Complete your task and claim your reward!</h2>
											</section>
										</div>
							
							<br/>
								<div class="u4">
								
								<a href="#third" class="anchorLink "><img class="buttonimg"  src="../View/images/button.png" alt="bookmark" /></a>
								
								</div>
							
						</div>
					</div>
				</div>
			</section>
			<section id="third" class="main">
				<header >
					<div class="container">
						<h2>Your dogs happiness is one step away.<br/> Sign up today.</h2>
					</div>
				</header>
			<!-- Log In / Register -->	
			</section> 
			<section id="Login" class="dark">
				<div id="wrapper">
		
					<form name="login-form" class="login-form" action="../Controller/loginValidate.php" method="post">
				
						<div class="header">
							<h1>Login Form</h1>
							<span>Fill out the form below to login to my super awesome imaginary control panel.</span>
						</div>
					
					
						<div class="content">
							<input name="username" type="text" class="input username" placeholder="Username" />
							<div class="user-icon"></div>
							<input name="password" type="password" class="input password" placeholder="Password" />
							<div class="pass-icon"></div>		
						</div>
						<span class="radiobadge" tabindex="6" >
						<input type="checkbox" checked="checked"  id="rememberme" name="rememberme">
						<label for="Male" >Keep me signed-in on this computer.</label>
						<p><?php if($_GET['FalseLogin']=="failed"){echo "Wrong Username or Password";} ?></p>
						</span>
						<div class="footer">
						<input type="submit" name="submit" value="Login" class="button" />
						<input type="button" name="register" value="Register" class="register" onclick="window.location.href='../../Registration/View/Registration.php'" />
						<input type="button" name="register" value="Forgot your password?" class="register" onclick="window.location.href='../../forgotPassword/View/forgot_password.php'" />
						</div>
						
					
					</form>
		
				</div>
			<div class="gradient"></div>			
			</section>
			
</body>

</html>