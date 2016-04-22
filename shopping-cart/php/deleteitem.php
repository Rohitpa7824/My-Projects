<?php

// echo "hello";
// echo $_POST['pidofdel'];

	$con = mysql_connect("localhost","u522924279_root","123456789");
	mysql_select_db("u522924279_shop",$con);

	$pidofdelete = $_POST['pidofdel'];
	$emailofdelete = $_POST['username'];

	//echo $pidofdel;
	//echo $pidofdel;

	$query = "DELETE FROM `cart` WHERE `pid` = $pidofdelete AND `email` = '$emailofdelete'";
	$result = mysql_query($query);

	header("location: http://localhost/shopping/cart.php");
?>