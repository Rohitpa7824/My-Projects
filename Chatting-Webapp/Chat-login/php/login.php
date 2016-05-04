<?php
	
	$email = $_POST["email"];
	$pass = $_POST["password"];

	require ("connect.php");

	$query="SELECT email, password FROM users WHERE email='$email'";
	$result=mysql_query($query);
	$row=mysql_fetch_array($result);

	if($row["email"]==$email && $row["password"]==$pass)
	{
		session_start();
		$_SESSION['login-user']=$email;
		mysql_close($con); // Closing connection

		header('Location: http://localhost/Chatting-Webapp/Chat/');
		//echo "Hello";
		exit();	
	}

	else
	echo"Sorry, your credentials are not valid, Please try again.";

?>