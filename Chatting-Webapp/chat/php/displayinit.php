<?php
	
	require ('connect.php');
	$query2 = "SELECT * FROM `rvprvprvp7824@gmail.com-nileshkevlani78@gmail.com` WHERE 1;";
	  $result2 = mysql_query($query2);
	  while($row = mysql_fetch_array($result2))
	  {
	    if($row['sender']==$_SESSION['login-user'])
	        echo '<div class="receivedmsg row"><li>'.$row['message'].'</li><br></div>';
	    else
	      echo '<div class="sentmsg row"><li>'.$row['message'].'</li><br></div>';
	  }

?>