<?php

if($_POST)
{
	$input = $_POST;
	$msg = $input['msg'];
	$sender = $input['sender'];
	$receiver = $input['receiver'];
require('connect.php');

$query = "INSERT INTO `rvprvprvp7824@gmail.com-nileshkevlani78@gmail.com` (`message`, `sender`, `receiver`, `time`) VALUES ('".$msg."', '".$sender."', '".$receiver."', now());";

$result = mysql_query($query);

}
?>