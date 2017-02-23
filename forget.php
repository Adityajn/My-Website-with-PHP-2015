<!DOCTYPE HTML>
<html>
	<head>
		<title>Forget Password..?</title>
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
							<li><a href="regsign.php">Register/Login</a></li>
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
					if(isset($_POST['email'])){
						$dbc = mysqli_connect('mysql.hostinger.in' , 'u7101698_adi10' , 'aytida' , 'u710169871_main') or die('cant connect to database');
						$email=$_POST['email'];	
						$query = "SELECT * FROM registrations WHERE email='$email'";
						$result = mysqli_query($dbc,$query) or die('Some error occured');
						if($row=mysqli_fetch_array($result)){
							?></header><h2>Email Sent...</h2></header></br></br><?php
							$msg= "You can reset your password by clicking on this link\n\n".
							'www.adityajain.pe.hu/reset.php?email='.$email.'&';
							$to =$row['email'];
							$subject ='Reset password for adityajain.pe.hu';
							mail($to,$subject,$msg) or die('Cannot Send Email');
							echo "A link has been sent to $email. Click that link to reset your password";
						}
						else{
							$ERROR=true;
						}
					}
					if(!isset($_POST['email']) || $ERROR){
						?><header><h2>Reset Password</h2></br>Enter email to reset your password</header></br><?php
						if($ERROR){echo '<span style="color:red;">Invalid Email or it is not registered..</span>';}
				?>
						
						<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
						<label for="email">Your Email:</label>
						<input type="text" name="email" id="email"/></br>
						<input type="submit" name="submit" id="submit" value="SUBMIT"/>
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
