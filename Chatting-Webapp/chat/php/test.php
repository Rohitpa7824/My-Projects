<?php

require ("connect.php");
  if(isset($_POST['submit']))
  {
    $msg = $_POST['chat-window-message'];
    $query = "INSERT INTO `rvprvprvp7824@gmail.com-nileshkevlani78@gmail.com` (`message`, `sender`, `receiver`, `time`) VALUES ('".$msg."', 'rvprvprvp7824@gmail.com', 'nileshkevlani78@gmail.com', now());";
    $result = mysql_query($query);
  }

?>
