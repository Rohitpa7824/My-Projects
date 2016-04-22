<?php
	$user=$_POST['user'];
	$pid=$_POST['pid'];
	$qty=$_POST['qty'];

	$con = mysql_connect("localhost","u522924279_root","123456789");
	mysql_select_db("u522924279_shop",$con);


	$query="INSERT INTO `cart` (`email`, `pid`, `qty`) VALUES ('$user', '$pid', '$qty')";
	$result=mysql_query($query);


	mysql_close($con);
	header("location: http://localhost/shopping");

?>