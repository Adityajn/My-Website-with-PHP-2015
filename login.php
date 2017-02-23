<!DOCTYPE HTML>

<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
	</head>
	<body>

	<!-- Header -->
		<div id="header">
			<div class="container">
					
				<!-- Logo -->
					<div id="logo">
						<h1><a href="index.html">AdiTECH Technologies</a></h1>
						<span>Designed By Aditya Jain</span>
					</div>
				
				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li><a href="index.html">Home</a></li>
							<li><a href="projects.html">Projects</a></li>
							<li><a href="regsign.php">Register/LogIn</a></li>
							<li><a href="whatwedo.html">What We Do</a></li>
							<li><a href="contact.html">Contact Us</a></li>
							<li><a href="admin.php">Admin Stuff</a></li>
						</ul>
					</nav>
			</div>
		</div>
	<!-- Header -->
			
	<!-- Main -->
		<div id="main">
			<div class="container">
				<div class="row">

					<!-- Content -->
						<div id="content" class="12u skel-cell-important">
							<section>
						<?php
						$email=$_POST['email'];
						$password =$_POST['password'];
						$dbc = mysqli_connect('mysql.hostinger.in' , 'u7101698_adi10' , 'aytida' , 'u710169871_main') or die('cant connect to database');
						$query = "SELECT * FROM registrations WHERE email = '$email' ";
						$result = mysqli_query($dbc,$query) or die('Some error occured');
						$i='0';
						while($row=mysqli_fetch_array($result)){
							$i='1';
							if($row['password']==$password){
						?>	
							<header>
								<h2>Login Successfull</h2>
							</header>	
						<?php
							define('GW_UPLOAD','images/');
							$firstname =$row['firstname'];
							$lastname =$row['lastname'];
							$email =$row['email'];
							$gender= $row['gender'];
							$id = $row['id'];
							$newsletter= $row['newsletter'];
							$college=$row['college'];
							$profile = $row['profile'];
							
							echo '<a href="remove.php?id='.$id.'&amp;email='.$email.'&amp;">Remove this Account</a></br>';
							
							echo "Name : $firstname $lastname".'</br>';
							echo "Email: $email".'</br>';
							echo "Gender: $gender".'</br>';
							echo "ID: $id".'</br>';
							echo "Subscibed for newsletter: $newsletter".'</br>';
							echo "college: $college".'</br>';
							echo '<img src="' . GW_UPLOAD . $profile . '" alt="photo"/>';
							
							}
							else
							{
						?>
							<header>
								<h2>Login unsuccessful</h2>
							</header>
						<?php
							echo "email and password do not match..";
							}
							
						}
						if($i=='0'){
						?>
							<header>
								<h2>Login unsuccessfull</h2>
								<span class="byline">Your Email Id is not registered..<a href="regsign.php">Register Yourself</a></span>
							</header>
						<?php
						}
						
								 
						?>
						</section>
						</div>
					<!-- /Content -->
						
				</div>
			
			</div>
		</div>
	<!-- Main -->

	<!-- Copyright -->
		<div id="copyright">
			<div class="container">
				Design: <a href="index.html">Aditya Jain.</a> This website has Copyright of Aditya...  
			</div>
			<div class="container">
				<a href="https://facebook.com/adityajn105"><img src="images/fb.png"/></a>
				&nbsp;&nbsp;&nbsp;
				<a href="https://in.linkedin.com/in/aditya-jain-a0777a110"><img src="images/in.png"/></a>
				&nbsp;&nbsp;&nbsp;
				<a href="https://instagram.com/adityajn105"><img src="images/insta.png"/></a>
			</div>
		</div>
		

	</body>
</html>
