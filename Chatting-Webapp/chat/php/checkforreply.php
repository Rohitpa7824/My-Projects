<?php

if($_POST)
{
	$return = $_POST;
	$i = 0;
	require('connect.php');
	header('Content-Type: application/json');
	date_default_timezone_set("Asia/Kolkata");
	$date = date('Y-m-d H:i:s');
	$currentDate = strtotime($date);
	$futureDate = $currentDate-(3);
	$formatDate = date("Y-m-d H:i:s", $futureDate);
	$query = "SELECT * FROM `rvprvprvp7824@gmail.com-nileshkevlani78@gmail.com` WHERE time BETWEEN '".$formatDate."' AND '".$date."';";
	$result = mysql_query($query);
	while($row = mysql_fetch_array($result))
	{
		$i = $i + 1;
		$return['count']=$i;
		$return[$i.'m']=$row['message'];
		$return[$i.'r']=$row['receiver'];
		$return[$i.'s']=$row['sender'];
	}
	echo json_encode($return);
}

?>