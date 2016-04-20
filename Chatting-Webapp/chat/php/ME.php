<?php
  
  
  if(!(isset($_SESSION['login-user'])))
    echo "Not logged in :(";
  else
  {
  	$current_user = $_SESSION['login-user'];
  }
  
?>