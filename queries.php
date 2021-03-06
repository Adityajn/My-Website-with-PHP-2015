<!DOCTYPE HTML>
<html>
	<head>
		<title>Ask Queries..</title>
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
							<li><a href="regsign.php">Register/SignUp</a></li>
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
					<!--Section-->
						<div id="section" class="2u">
						</div>

					<!-- Content -->
						<div id="content" class="10u skel-cell-important">
							<section>
								
				<?php
					if( !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['query']) ){
				?>
					<header>
						<h2>Query received</h2>
						<span class="byline">Your query has been recieved</span>
					</header>
					<p>
				<?php		
						$name = $_POST['name'];
						$email = $_POST['email'];
						$query = $_POST['query'];
						$city = $_POST['city'];
						$institute = $_POST['institute'];
						$msg = "$name has asked $query. \nFrom : $institute, $city";
						$to='adityajn105@gmail.com';
						$subject = "A New Query by $name from $email";
						
						mail($to , $subject , $msg , 'From:'.$email) or die('fail to send email');
						
						$dbc = mysqli_connect('mysql.hostinger.in' , 'u7101698_adi10' , 'aytida' , 'u710169871_main') or die('cant connect to database');

						$query="INSERT INTO queries VALUES('$name','$email','$city','$institute','$query')";
						$result=mysqli_query($dbc,$query) or die('Error adding to database');
						
						mysqli_close($dbc);
						echo "$name your Query has been recieved and will be answered on $email ASAP. Thank You";	
					}
					else{
				?>
					<header>
						<h2>Ask Queries</h2>
						<span class="byline">First fill information about you?</span>
					</header>
					<p>
				<?php
						if(!empty($_POST['name']) || !empty($_POST['email']) || !empty($_POST['query'])){	
						
				?>
					
				
					<span style="color:red;">Please fill all mandatory information, * means mandatory..</span>
				<?php
						}
				?> 	
					
					<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
						<label for="name">Name*</label>
						<input type="text" name="name" id="name" value="<?php echo $_POST['name'] ?>"/></br>
						
						<label for="email">Email*</label>
						<input type="text" name="email" id="email" value="<?php echo $_POST['email'] ?>"/></br>
						
						<label for="city">Your City</label>
						<input type="text" name="city" id="city" value="<?php echo $_POST['city'] ?>"/></br>
				
						<label for="institute">Your Institute</label>
						<input type="text" name="institute" id="institute" value="<?php echo $_POST['institute'] ?>"/></br>
						
						<label for="query">Your Query*</label></br>
						<textarea name="query" id="query"><?php echo $_POST['query'] ?></textarea></br>
						
						<input type="submit" name="submit" id="submit" value="Submit"/>
					</form>
				<?php
							
					}	
				
				?>
								</p>
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
