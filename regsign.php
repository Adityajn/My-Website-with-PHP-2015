<!DOCTYPE HTML>

<html>
	<head>
		<title>Register | LogIN</title>
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
						<h1><a href="#">AdiTECH Technologies</a></h1>
						<span>Design by Aditya Jain</span>
					</div>
				
				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li><a href="index.html">Home</a></li>
							<li><a href="projects.html">Projects</a></li>
							<li class="active"><a href="regsign.php">Register/SignUp</a></li>
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

					<!-- Sidebar -->
						<div id="sidebar" class="4u">
							<section>
								<header>
									<h2>Login</h2>
									<span class="byline">Already Have Account-></span>
								</header>
								<p>
								<form method="post" action="login.php">
									<label for="email">Your Email -: </label>
									<input type="text" name="email" id="email"/></br>
									
									<label for="password">Password:</label>
									<input type="password" name="password" id="password"/></br></br>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="submit" value="Login" name="submit">
									&nbsp;&nbsp;&nbsp;&nbsp;<a href="forget.php"><span style="color:red;">
									Forget Password?</span></a>
								</form>
								</p>
								
							</section>
						</div>
					<!-- Sidebar -->
				
					<!-- Content -->
						<div id="content" class="8u skel-cell-important">
							<section>
					<?php 
						define('GW_UPLOAD','images/');
						$email=$_POST['email'];
						if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($_POST['email'])){
							$EMAIL_ERROR=true;
							$_POST['email']='';
						}		
					if( !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['gender']) &&
						!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['agreement']) &&
						!$EMAIL_ERROR)
					{
						$firstname= $_POST['firstname'];
						$lastname=$_POST['lastname'];
						$gender= $_POST['gender'];
						$email=$_POST['email'];
						$password= $_POST['password'];
						$college=$_POST['college'];
						$profile = $_FILES['profile']['name'];
						$info =$_POST['info'];
						$newsletter=$_POST['newsletter'];
						$phoneno=$_POST['phoneno'];
						
						$target = GW_UPLOAD.$profile;
						move_uploaded_file($_FILES['profile']['tmp_name'],$target);
								
						$msg = "A new registration from $firstname $lastname. \nGender: $gender \nEmail: $email
							\nCollege: $college \nPassword: $password \nINFO:- $info";
							
						$to = 'adityajn105@gmail.com';
						$subject = "A new Registration from $name";
					
						
						$dbc = mysqli_connect('mysql.hostinger.in' , 'u7101698_adi10' , 'aytida' , 'u710169871_main') or die('cant connect to database');
						
						$query = "INSERT INTO registrations VALUES(0,'$firstname','$lastname','$gender','$email','$password','$college','$info','$newsletter','$profile')";
						$result=mysqli_query($dbc,$query) or die('Email id already registered with us..');
						
						$postdata = http_build_query(
							array(
								'to' => $phoneno,
								'msg' => "Thank you for registration on Aditech Technology"
							)
						);
						$opts = array('http' =>
							array(
								'method'  => 'POST',
								'header'  => 'Content-type: application/x-www-form-urlencoded',
								'content' => $postdata
							)
						);
						$context  = stream_context_create($opts);
						$result = file_get_contents('http://adityajain.pe.hu/SMS/index.php', false, $context);


						//file_get_contents('adityajain.pe.hu/SMS/index.php?to=8989173580&msg=Thank%20YOU%20For%20Registration%20on%20Aditech%20Technologies');
						mail($to , $subject, $msg) or die('cant send confirmation mail');
						
					?>
					<header>
						<h2>Registered Successfully..</h2></br></br>
					</header>
					<?php
						echo "$firstname $lastname, You have been registered Successfully...Your email is $email";
					 }
					 else
					 {
					?>			
							
					<header>
						<h2>Register</h2>
						<span class="byline">Register and make your account</span>
					</header>
					<p>
					<?php
						if(!empty($_POST['firstname']) || !empty($_POST['lastname']) || !empty($_POST['gender']) ||
						!empty($_POST['email']) || !empty($_POST['password']) || !empty($_POST['agreement']) )
						{
					?>
					<span style="color:red;">Please fill all mandatory information, * means mandatory..</span>
					<?php
						}	
					?>			
								
					<form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
						<input type="hidden" name="MAX_FILE_SIZE" value="932768">
						<label for="firstname">First Name*&nbsp;&nbsp;&nbsp;:</label>
						<input type="text" id="firstname" name="firstname" value="<?php echo $_POST['firstname'] ?>"/></br></br>
						<label for="lastname" >Last Name*&nbsp;&nbsp;&nbsp;&nbsp;:</label>
						<input type="lastname" id="lastname" name="lastname" value="<?php echo $_POST['lastname'] ?>"/></br></br>
						<label for="phoneno">Mobile no&nbsp;&nbsp;&nbsp;&nbsp;: </label>
						<input type="text" id="phoneno" name="phoneno" value="<?php echo $_POST['lastname'] ?>"/></br></br>
						<label for="gender">Gender*&nbsp;&nbsp;&nbsp;&nbsp;:  </label>
						Male <input id="gender" name="gender" type="radio" value="male"/>
						Female <input id="gender" name="gender" type="radio" value="female"/></br></br>
						
						<label for="email"    >Email ID*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
						<input type="text" id="email" name="email" value="<?php echo $_POST['email'] ?>"/>
						<?php if($EMAIL_ERROR)
							{	$_POST['email']='';
						?>
						<span style="color:red;">Invalid Email</span>
						<?php		
							}
						?></br></br>
						<label for="password" >Password*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
						<input type="password" id="password" name="password" value="<?php echo $_POST['password'] ?>"/></br></br>
						<label for="college">Your College :</label>
						<input type="text" id="college" name="college" value="<?php echo $_POST['college'] ?>"/></br></br>
						<label for="info">Describe yourself</label></br>
						<textarea id="info" name="info" rows="10" column="10"><?php echo $_POST['info'] ?></textarea></br></br>
						<input type="checkbox" name="newsletter" value="yes"> I Subscribe for your newsletter..</br></br>
						<label for="profile"  >Profile Photo:</label>
						<input type="file" name="profile" id="profile"/></br>
						<input type="checkbox" name="agreement" value="yes"> I Agree to all terms and conditions</br></br>
							      
						<input type="submit" name="submit" id="submit" value="Register"/> 
					</form>	
					</p>
					<?php
					}
					?>
							</section>
						</div>
					<!-- /Content -->
						
					<!-- Sidebar --><!--
						<div id="sidebar" class="3u">
							<section>
								<header>
									<h2>Gravida praesent</h2>
									<span class="byline">Praesent lacus congue rutrum</span>
								</header>
								<p>Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum. Maecenas luctus lectus at sapien. Consectetuer adipiscing elit.</p>
								<ul class="default">
									<li><a href="#">Pellentesque quis lectus</a></li>
									<li><a href="#">Lorem ipsum adipiscing elit</a></li>
									<li><a href="#">Phasellus pellentesque congue</a></li>
									<li><a href="#">Cras aliquam risus pharetra</a></li>
									<li><a href="#">Duis metus euismod lobortis</a></li>
								</ul>
							</section>
						</div>-->
					<!-- Sidebar -->
				
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
