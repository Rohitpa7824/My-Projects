<?php
session_start();
if(isset($_SESSION['login_user'])){
	print_r($_SESSION['login_user']);
	header("location: http://localhost/shopping/ ");
}

// Grab User submitted information
$email = $_POST["email"];
$pass = $_POST["password"];

// Connect to the database
$con = mysql_connect("localhost","u522924279_root","123456789");
	mysql_select_db("u522924279_shop",$con);
// Make sure we connected succesfully
if(! $con)
{
    die('Connection Failed'.mysql_error());
}


$result = mysql_query("SELECT email, password FROM login WHERE email = '$email'");

$row = mysql_fetch_array($result);

if($row["email"]==$email && $row["password"]==$pass)
{

	$_SESSION['login_user']=$email;

	mysql_close($con); // Closing connection

	header('Location: http://localhost/shopping/');
	exit();	
}
    
else
    echo"Sorry, your credentials are not valid, Please try again.";

?>