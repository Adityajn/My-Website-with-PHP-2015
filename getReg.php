<?php

$email = $_POST['email'];
$pass=$_POST['pass'];
$dbc = mysqli_connect('mysql.hostinger.in' , 'u7101698_adi10' , 'aytida' , 'u710169871_main') or die('cant connect to database');
$query = "SELECT * FROM registrations WHERE email = '$email' ";
$result = mysqli_query($dbc,$query) or die('Some error occured');

$row=mysqli_fetch_array($result);
if($row){
	$firstname =$row['firstname'];
	$lastname =$row['lastname'];
	$email =$row['email'];
	$gender= $row['gender'];
	$id = $row['id'];
	$newsletter= $row['newsletter'];
	$data = [ 'fname' => $firstname, 'lname' => $lastname, 'email' => $email, 'gender' => $gender, 'news' => $newsletter];
	header("Content-Type: application/json;charset=utf-8");
	$json = json_encode($data);
	if($row['password']!=$pass){
		http_response_code(400);
	}
	else if ($json == false){
		http_response_code(503);
	}
	else{
		echo $json;
	}
}
else{
	http_response_code(404);
}
?>