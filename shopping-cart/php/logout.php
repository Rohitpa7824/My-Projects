<?php 
	session_start();
	session_unset();
	session_decode(); 
	header("location:http://localhost/shopping/index.php");
	?>